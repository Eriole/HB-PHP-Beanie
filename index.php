<?php
require_once 'includes/autoloader.php';

use Controller\CartController;
use Controller\ContactController;
use Controller\HomeController;
use Controller\ListController;
use Controller\LoginController;
use Controller\LogoutController;

$controllerName = [
    'cart' => CartController::class,
    'contact' => ContactController::class,
    'home' => HomeController::class,
    'list' => ListController::class,
    'login' => LoginController::class,
    'logout' => LogoutController::class,
];

$id = 'home';
if (isset($_GET['page'])){
    $id = $_GET['page'];
}

$controller = $controllerName[$id];

(new $controller())->render();
