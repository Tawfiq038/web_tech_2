<?php
// /public/index.php
session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 'login';

switch ($page) {
    case 'login':
        require_once '../controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;
    case 'register':
        require_once '../controllers/AuthController.php';
        $controller = new AuthController();
        $controller->register();
        break;
    case 'logout':
        require_once '../controllers/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'home':
        require_once '../controllers/HomeController.php';
        $controller = new HomeController();
        $controller->home();
        break;
    case 'change_password':
        require_once '../controllers/AuthController.php';
        $controller = new AuthController();
        $controller->changePassword();
        break;
    default:
        require_once '../controllers/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;
}
?>
