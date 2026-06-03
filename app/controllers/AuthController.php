<?php

class AuthController
{
    /**
     * Loads login visual interface
     * @return void
     */
    public static function showLogin()
    {
        require __DIR__ . '/../views/auth/login.php';
    }

    /**
     * Capture user login
     * Verify credentials & hash
     * @return never Redirect to home at success
     */
    public static function login()
    {
        $placa = $_POST['numero_placa'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByPlaca($placa);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            $_SESSION['flash'] = [
                'type'    => 'danger',
                'message' => __('auth_fail')
            ];

            header('Location: index.php?action=login');
            exit;
        }

        if (!empty($user['mfa_secret'])) {
            $_SESSION['mfa_pending_user'] = $user;
            header('Location: index.php?action=verify_mfa');
            exit;
        }

        // If not MFA set up, normal login
        $role = tipoUsuario::tryFrom($user['tipo_usuario']);
        $_SESSION['user'] = [
            'agent_id'              => $user['id_usuario'],
            'agent_plate'           => $user['numero_placa'],
            'agent_dni'             => $user['dni'],
            'agent_name'            => $user['nombre'],
            'agent_user_role'       => $user['tipo_usuario'],
            'agent_category_role'   => $role ? $role->name : 10
        ];

        header('Location: index.php?action=home');
        exit;
    }

    /** Destroy session & disconnect user
     * Redirect to home
     * @return never
     */
    public static function logout()
    {
        session_destroy();
        header('Location: index.php?action=home');
        exit;
    }
}
