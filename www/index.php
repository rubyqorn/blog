<?php 

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Http\FrontController;

$frontController = new FrontController();

$frontController->register([
    'controller' => 'IndexController',
    'action' => 'index'
]);

$frontController->run();
