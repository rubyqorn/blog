<?php 

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Http\FrontController;

$controller = new FrontController();
$controller->register([
    'controller' => 'BlogController',
    'action' => 'index',
    'params' => []
]);

$controller->register([
    'controller' => 'Admin\AdminController',
    'action' => 'index'
]);

$controller->register([
    'controller' => 'BlogController',
    'action' => 'show',
]);

$controller->register([
    'controller' => 'ContactsController',
    'action' => 'index',
    'params' => []
]);

$controller->run();
