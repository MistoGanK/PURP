<?php

class AuthController
{
    /**
     * Loads login visual interface
     * @return void
     */
    public static function showLogin(): void
    {
        require __DIR__ . '/../views/auth/login.php';
    }

    /**
     * Capture user login
     * Verify credentials & hash
     * @return never Redirect to home at success
     */
    public static function login(): void
    {
        $agent_dni = (string) ($_POST['agent_dni'] ?? '');
        $password = (string) ($_POST['password'] ?? '');

        $userModel = new User();
        $user = $userModel->findByDni($agent_dni);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            $_SESSION['flash'] = [
                'type'    => 'danger',
                'message' => __('auth_fail')
            ];

            header('Location: index.php?action=login');
            exit;
        }

        // If user has MFA set up, verify mfa
        if (!empty($user['mfa_secret'])) {
            $_SESSION['mfa_pending_user'] = $user;
            header('Location: index.php?action=verify_mfa');
            exit;
        }

        // If not MFA set up, normal login
        $role = tipoUsuario::tryFrom($user['tipo_usuario']);

        $_SESSION['user'] = [
            'agent_id'                  => (int) $user['id_usuario'],
            'agent_plate'               => (string) $user['numero_placa'],
            'agent_dni'                 => (string) $user['dni'],
            'agent_name'                => (string) $user['nombre'],
            'agent_user_role'           => (int) $user['tipo_usuario'] ?? 50,
            'agent_category_role'       => (int) ($user['categoria_profesional'] ?? 10),
            'agent_forenames'           => (string) ($user['apellidos'] ?? ''),
            'agent_profesional_state'   => (int) ($user['estado_profesional'] ?? 10),
            'agent_active'              => (int) ($user['activo'] ?? 1),
            'avatar_img_src'            => (string) ($user['avatar_img_src'] ?? '/assets/images/default-avatar.png')
        ];

        header('Location: index.php?action=home');
        exit;
    }

    /** * Destroy session & disconnect user securely
     * Redirect to home
     * @return never
     */
    public static function logout(): void
    {
        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();

        header('Location: index.php?action=home');
        exit;
    }
}
