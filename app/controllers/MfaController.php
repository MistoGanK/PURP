<?php

use RobThree\Auth\TwoFactorAuth;

class MfaController
{
  /**
   * Generates 2FA secret & prepares QR inside Profile
   * @return void
   */
  public static function setUpMfa()
  {
    // Only logged users && with no MFA set up
    if (!isset($_SESSION['user'])) {
      header('Location: index.php?action=login');
      exit;
    }
    // Checks if has MFA setup
    $userModel = new User;
    $agent_id = (int) ($_SESSION['user']['agent_id'] ?? 0);

    $hasMfa = $userModel->checkActiveMfa($agent_id);

    if ($hasMfa) {

      $_SESSION['flash'] = [
        'type'    => 'info',
        'message' => __('mfa_already_active')
      ];

      header('Location: index.php?action=home');
      exit;
    }

    $tfa = new TwoFactorAuth('PURP');
    $secret = $tfa->createSecret();

    $_SESSION['mfa_setup_secret'] = $secret;

    $username = $_SESSION['user']['username'] ?? 'Agente';
    $qrCodeUri = $tfa->getQRText($username, $secret);

    require __DIR__ . '/../views/mfa/mfa_setup.php';
  }

  /**
   * Validates the first code from Aegis and persists to DB
   * @return void
   */
  public static function confirmMfa()
  {
    if (!isset($_SESSION['user']) || !isset($_SESSION['mfa_setup_secret'])) {
      header('Location: index.php?action=home');
      exit;
    }

    $insertedCode = (string) ($_POST['first_mfa_code'] ?? '');
    $secretKey = (string) $_SESSION['mfa_setup_secret'];

    $tfa = new TwoFactorAuth('PURP');
    $checkTfa = $tfa->verifyCode($secretKey, $insertedCode);

    if (!$checkTfa) {
      $_SESSION['flash'] = [
        'type' => 'danger',
        'message' => __('error_mfa')
      ];
      header('Location: index.php?action=setup_mfa');
      exit;
    }

    // Backup codes generation
    $rawBackupCodes = [];
    $hashedBackupCodes = [];

    for ($i = 0; $i < 8; $i++) {
      $code = (string) rand(10000000, 99999999);
      $rawBackupCodes[] = $code;
      $hashedBackupCodes[] = password_hash($code, PASSWORD_BCRYPT);
    }

    $userId = (int) ($_SESSION['user']['agent_id'] ?? 0);
    $jsonBackup = json_encode($hashedBackupCodes);

    $userModel = new User();
    $userModel->insert2fa([
      'secretKey'  => $secretKey,
      'jsonBackup' => $jsonBackup,
      'userId'     => $userId
    ]);

    unset($_SESSION['mfa_setup_secret']);
    $_SESSION['show_backup_codes'] = $rawBackupCodes;

    header('Location: index.php?action=mfa_success');
    exit;
  }

  /**
   * Captures code submission during LOGIN process (Passively validates user)
   * @return never
   */
  public static function verifyMfa()
  {
    if (!isset($_SESSION['mfa_pending_user'])) {
      header('Location: index.php?action=login');
      exit;
    }

    $userCode = (string) ($_POST['code_verification'] ?? '');
    $user = $_SESSION['mfa_pending_user'];

    $tfa = new TwoFactorAuth('PURP');
    $checkTfa = $tfa->verifyCode((string) $user['mfa_secret'], $userCode);

    if (!$checkTfa) {
      $_SESSION['flash'] = [
        'type'    => 'danger',
        'message' => __('incorrect_mfa')
      ];
      header('Location: index.php?action=verify_mfa');
      exit;
    }

    unset($_SESSION['mfa_pending_user']);

    // CORRECCIÓN OPCIÓN 2: Añadida la ruta absoluta con namespace para localizar el Enum
    $role = \app\enums\tipoUsuario::tryFrom($user['tipo_usuario']);
    $_SESSION['user'] = [
      'agent_id'              => (int) $user['id_usuario'],
      'agent_plate'           => (string) $user['numero_placa'],
      'agent_dni'             => (string) $user['dni'],
      'agent_name'            => (string) $user['nombre'],
      'agent_user_role'       => (int) $user['tipo_usuario'],
      'agent_category_role'   => $role ? $role->name : 10
    ];

    header('Location: index.php?action=home');
    exit;
  }

  /**
   * Displays the MFA success screens and shows generated backup codes
   * @return void
   */
  public static function showSuccess()
  {
    if (!isset($_SESSION['user']) || !isset($_SESSION['show_backup_codes'])) {
      header('Location: index.php?action=home');
      exit;
    }

    $backupCodes = $_SESSION['show_backup_codes'];

    unset($_SESSION['show_backup_codes']);

    require __DIR__ . '/../views/mfa/mfa_success.php';
  }

  /**
   * Displays the MFA verify
   * @return void
   */
  public static function showVerifyMfa()
  {
    if (!isset($_SESSION['mfa_pending_user'])) {
      header('Location: index.php?action=login');
      exit;
    }

    require __DIR__ . '/../views/mfa/verify_mfa.php';
  }
}
