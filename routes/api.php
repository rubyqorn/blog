<?php 

$frontController->register([
    'route' => 'api/posts/all',
    'controller' => 'API\PostsController',
    'action' => 'all'
]);

$frontController->register([
    'route' => 'api/posts/stats',
    'controller' => 'API\PostsController',
    'action' => 'stats'
]);

$frontController->register([
    'route' => 'api/users/stats',
    'controller' => 'API\UsersController',
    'action' => 'stats'
]);
