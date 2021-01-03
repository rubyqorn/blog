<?php 

session_start();

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Http\FrontController;

$frontController = new FrontController();

$frontController->register([
    'controller' => 'IndexController',
    'action' => 'index'
]);

$frontController->register([
    'controller' => 'AboutController',
    'action' => 'index'
]);

$frontController->register([
    'controller' => 'PostController',
    'action' => 'index'
]);

$frontController->register([
    'controller' => 'LoginController',
    'action' => 'index'
]);

$frontController->register([
    'controller' => 'LoginController',
    'action' => 'login'
]);

$frontController->run();
