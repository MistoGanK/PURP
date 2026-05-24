<?php
// Orquestator - Front Controler
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Not loggin permissions
if (!isset($_SESSION['user'])) {
    $public_actions = ['login', 'do_login', 'set_lang'];
    $current_action = $_GET['action'] ?? 'home';

    if (!in_array($current_action, $public_actions)) {
        header('Location: index.php?action=login');
        exit;
    }
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$action = $_GET['action'] ?? 'home';
$method = $_SERVER['REQUEST_METHOD'];

// Helpers
require_once __DIR__ . '/../app/helpers/router.php';
require_once __DIR__ . '/../app/helpers/dump.php';

require_once __DIR__ . '/../app/helpers/i18n.php';

// Models
require_once __DIR__ . '/../app/models/BaseModel.php';
require_once __DIR__ . '/../app/models/User.php';

// Controlers
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/DenunciaController.php';

$router = new Router();

// Public (GET)
$router->get('home',              [HomeController::class, 'index']);
$router->get('set_lang',          [HomeController::class, 'set_lang']);
$router->get('login',             [AuthController::class, 'showLogin']);
$router->get('logout',            [AuthController::class, 'logout']);
$router->get('denuncias',         [DenunciaController::class, 'listar']);
$router->get('denuncia_nueva',    [DenunciaController::class, 'crear']);

// Private (POST)
$router->post('do_login',         [AuthController::class, 'login']);
$router->post('denuncia_guardar', [DenunciaController::class, 'guardar']);

$router->dispatch($action, $method);
