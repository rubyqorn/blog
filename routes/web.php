<?php 

$frontController->register([
    'route' => '/',
    'controller' => 'IndexController',
    'action' => 'index'
]);

$frontController->register([
    'route' => 'about/index',
    'controller' => 'AboutController',
    'action' => 'index'
]);

$frontController->register([
    'route' => 'posts/index',
    'controller' => 'PostController',
    'action' => 'index'
]);

$frontController->register([
    'route' => 'login/index',
    'controller' => 'LoginController',
    'action' => 'index'
]);

$frontController->register([
    'route' => 'login/login',
    'controller' => 'LoginController',
    'action' => 'login'
]);
