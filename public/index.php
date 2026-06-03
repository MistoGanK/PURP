<?php
// Orquestator - Front Controler
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Global Requires
require_once __DIR__ . '/../app/helpers/i18n.php';
require_once __DIR__ . '/../app/helpers/dump.php';
require_once __DIR__ . '/../app/helpers/router.php';
require_once __DIR__ . '/../app/helpers/auth.php';
require_once __DIR__ . '/../vendor/autoload.php';

// Not loggin permissions
if (!isset($_SESSION['user'])) {
    $public_actions = ['login', 'set_lang', 'verify_mfa'];
    $current_action = $_GET['action'] ?? 'home';

    if (!in_array($current_action, $public_actions)) {
        header('Location: index.php?action=login');
        exit;
    }
}
// Logged permissions
if (isset($_SESSION['user'])) {
    $logged_blocked_actions = ['login'];
    $current_action = $_GET['action'] ?? 'home';

    if (in_array($current_action, $logged_blocked_actions)) {
        header('Location: index.php?action=home');
        exit;
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$action = $_GET['action'] ?? 'home';
$method = $_SERVER['REQUEST_METHOD'];

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
$router->get('home',              [HomeController::class,       'index']);
$router->get('set_lang',          [HomeController::class,       'set_lang']);
$router->get('login',             [AuthController::class,       'showLogin']);
$router->get('verify_mfa',        [MfaController::class,        'showVerifyMfa']);
$router->get('logout',            [AuthController::class,       'logout']);
$router->get('denuncias',         [DenunciaController::class,   'listar']);
$router->get('denuncia_nueva',    [DenunciaController::class,   'crear']);
$router->get('register',          [UserController::class,       'showRegister']);

// GET MfaController
$router->get('setup_mfa',         [MfaController::class,        'setUpMfa']);
$router->get('mfa_success',       [MfaController::class,        'showSuccess']);

// Private (POST)   
$router->post('login',            [AuthController::class,       'login']);
$router->post('denuncia_guardar', [DenunciaController::class,   'guardar']);
$router->post('createUser',       [UserController::class,       'createUser']);
$router->post('verify_mfa',       [MfaController::class,        'verifyMfa']);

// POST MfaController
$router->post('confirm_mfa',      [MfaController::class,        'confirmMfa']);

// dump_die($router);
$router->dispatch($action, $method);
