<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$action = $_GET['action'] ?? 'home';

require_once __DIR__ . '/../app/helpers/i18n.php';

require_once __DIR__ . '/../app/models/BaseModel.php';
require_once __DIR__ . '/../app/models/User.php';

require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/DenunciaController.php';


switch ($action) {

    /* --- HOME --- */
    case 'home':
        HomeController::index();
        break;

    /* --- Lang ---*/
    case 'set_lang':
        $newLang = $_GET['lang'] ?? 'es';
        $_SESSION['lang'] = $newLang;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
        break;

    /* --- AUTH --- */
    case 'login':
        AuthController::showLogin();
        break;

    case 'do_login':
        AuthController::login();
        break;

    case 'logout':
        AuthController::logout();
        break;

    /* --- DENUNCIAS --- */
    case 'denuncias':
        DenunciaController::listar();
        break;

    case 'denuncia_nueva':
        DenunciaController::crear();
        break;

    case 'denuncia_guardar':
        DenunciaController::guardar();
        break;

    /* --- 404 --- */
    default:
        http_response_code(404);
        echo 'Página no encontrada';
        break;
}
