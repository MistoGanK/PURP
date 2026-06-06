<?php

class UserController
{
  /**
   * Loads the user registration visual interface.
   * * @return void
   */
  public static function showRegister(): void
  {
    require __DIR__ . '/../views/user/register.php';
  }

  /**
   * Creates the user with hashed password to the db.
   * * Expects form data via $_POST:
   * - user_password, dni, numero_placa, nombre, apellidos, 
   * categoria_profesional, estado_profesional, tipo_usuario.
   * * @return void
   */
  public static function createUser(): void
  {
    $plainPassword = (string) ($_POST['user_password'] ?? '');
    $hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);

    $userModel = new User();

    try {
      $result = $userModel->insertUser([
        'dni'                   => (string) ($_POST['dni'] ?? ''),
        'numero_placa'          => (string) ($_POST['numero_placa'] ?? ''),
        'nombre'                => (string) ($_POST['nombre'] ?? ''),
        'apellidos'             => (string) ($_POST['apellidos'] ?? ''),
        'password_hash'         => $hashedPassword,
        'categoria_profesional' => (int)    ($_POST['categoria_profesional'] ?? 10),
        'estado_profesional'    => (int)    ($_POST['estado_profesional'] ?? 10),
        'tipo_usuario'          => (int)    ($_POST['tipo_usuario'] ?? 50)
      ]);

      if ($result) {
        $_SESSION['flash'] = [
          'type'    => 'success',
          'message' => __('success_register')
        ];
      } else {
        $_SESSION['flash'] = [
          'type'    => 'error',
          'message' => __('unsuccess_register')
        ];
      }
    } catch (Exception $error) {
      $_SESSION['flash'] = [
        'type'    => 'error',
        'message' => __('unsuccess_register') ?? 'No se pudo procesar el registro. Verifique los datos.'
      ];
    }

    header('Location: /index.php?action=register');
    exit;
  }

  /**
   * Loads the user agent profile visual interface.
   * * @return void
   */
  public static function showProfile(): void
  {
    if (!isset($_SESSION['user']['agent_id'])) {
      header('Location: index.php?action=login');
      exit;
    }

    $userModel = new User();
    $usuarioActual = $userModel->findUserById($_SESSION['user']['agent_id']);

    if (!$usuarioActual) {
      $_SESSION['flash'] = [
        'type' => 'error',
        'message' => 'Usuario no encontrado'
      ];
      header('Location: index.php?action=logout');
      exit;
    }

    require __DIR__ . '/../views/user/show_profile.php';
  }

  /**
   * Updates the user's profile information from form submission.
   * * Expects form data via $_POST:
   * - agent_id, agent_name, agent_forenames, agent_dni, agent_plate,
   * agent_user_role, agent_category_role, agent_profesional_state, agent_active.
   * * @return void
   */
  public static function updateProfile(): void
  {
    $data = [
      'avatar_img_src'          => (string)   ($_POST['avatar_img_src'] ?? '/assets/images/default-avatar.png'),
      'agent_id'                => (int)      ($_POST['agent_id'] ?? 0),
      'agent_name'              => (string)   ($_POST['agent_name'] ?? ''),
      'agent_forenames'         => (string)   ($_POST['agent_forenames'] ?? ''),
      'agent_dni'               => (string)   ($_POST['agent_dni'] ?? ''),
      'agent_plate'             => (string)   ($_POST['agent_plate'] ?? ''),
      'agent_user_role'         => (int)      ($_POST['agent_user_role'] ?? 0),
      'agent_category_role'     => (int)      ($_POST['agent_category_role'] ?? 0),
      'agent_profesional_state' => (int)      ($_POST['agent_profesional_state'] ?? 0),
      'agent_active'            => (int)      ($_POST['agent_active'] ?? 1)
    ];

    if (empty($data['agent_id'])) {
      $_SESSION['flash'] = [
        'type'    => 'error',
        'message' => __('error_missing_id')
      ];
      header('Location: /index.php?action=show_profile');
      exit;
    }

    $userModel = new User();

    try {
      $result = $userModel->updateUser($data);

      if ($result) {
        $_SESSION['flash'] = [
          'type'    => 'success',
          'message' => __('success_update')
        ];
      } else {
        $_SESSION['flash'] = [
          'type'    => 'error',
          'message' => __('unsuccess_update')
        ];
      }
    } catch (Exception $error) {
      $_SESSION['flash'] = [
        'type'    => 'error',
        'message' => __('error_system')
      ];
    }

    header('Location: /index.php?action=show_profile');
    exit;
  }
}
