<?php
// Orquestator - Front Controler
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Not loggin permissions
/* if (!isset($_SESSION['user'])) {
    $public_actions = ['login', 'do_login', 'set_lang'];
    $current_action = $_GET['action'] ?? 'home';

    if (!in_array($current_action, $public_actions)) {
        header('Location: index.php?action=login');
        exit;
    }
} */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$action = $_GET['action'] ?? 'home';
$method = $_SERVER['REQUEST_METHOD'];

// Global Functions
require_once __DIR__ . '/../app/helpers/i18n.php';
require_once __DIR__ . '/../app/helpers/dump.php';
require_once __DIR__ . '/../app/helpers/router.php';
require_once __DIR__ . '/../app/helpers/auth.php';

// Resources Loader
spl_autoload_register(function ($className) {
    $resources = [
        __DIR__ . '/../app/enums',
        __DIR__ . '/../app/helpers',
        __DIR__ . '/../app/models',
        __DIR__ . '/../app/controllers',
    ];
    foreach ($resources as $source) {
        $fileExact = $source . '/' . $className . '.php';

        $fileLower = $source . '/' . lcfirst($className) . '.php';

        if (file_exists($fileExact)) {
            require_once($fileExact);
            return;
        }
        if (file_exists($fileLower)) {
            require_once($fileLower);
            return;
        }
    }
});

$router = new Router();

// Public (GET)
$router->get('home',              [HomeController::class, 'index']);
$router->get('set_lang',          [HomeController::class, 'set_lang']);
$router->get('login',             [AuthController::class, 'showLogin']);
$router->get('logout',            [AuthController::class, 'logout']);
$router->get('denuncias',         [DenunciaController::class, 'listar']);
$router->get('denuncia_nueva',    [DenunciaController::class, 'crear']);
$router->get('register',      [UserController::class,      'showRegister']);

// Private (POST)
$router->post('do_login',         [AuthController::class,     'login']);
$router->post('denuncia_guardar', [DenunciaController::class, 'guardar']);
$router->post('createUser',       [UserController::class,     'createUser']);

$router->dispatch($action, $method);
