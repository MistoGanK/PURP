<?php
class AuthController
{
    public static function showLogin()
    {
        require __DIR__ . '/../views/auth/login.php';
    }

    public static function login()
    {
        $placa = $_POST['numero_placa'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByPlaca($placa);

        if (!$user) {
            die('Usuario no encontrado');
        }

        if (!password_verify($password, $user['password_hash'])) {
            die('Contraseña incorrecta');
        }

        $_SESSION['user'] = [
            'id'     => $user['id_usuario'],
            'nombre' => $user['nombre'],
            'rol'    => $user['rol']
        ];

        header('Location: /PURP/public/index.php?action=home');
        exit;
    }

    public static function logout()
    {
        session_destroy();
        header('Location: /PURP/public/index.php?action=login');
        exit;
    }
}
?>