<?php 

$frontController->register([
    'route' => 'api/posts/all',
    'controller' => 'API\PostsController',
    'action' => 'all'
]);

$frontController->register([
    'route' => 'api/posts/post',
    'controller' => 'API\PostsController',
    'action' => 'getPostById'
]);

$frontController->register([
    'route' => 'api/posts/post/edit',
    'controller' => 'API\PostsController',
    'action' => 'edit'
]);

$frontController->register([
    'route' => 'api/users/all',
    'controller' => 'API\UsersController',
    'action' => 'all'
]);

$frontController->register([
    'route' => 'api/users/user',
    'controller' => 'API\UsersController',
    'action' => 'getUserById'
]);

$frontController->register([
    'route' => 'api/users/user/edit',
    'controller' => 'API\UsersController',
    'action' => 'edit'
]);

$frontController->register([
    'route' => 'api/app/metrics',
    'controller' => 'API\MetricsController',
    'action' => 'getMetrics'
]);
