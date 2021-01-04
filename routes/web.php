<?php 

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
