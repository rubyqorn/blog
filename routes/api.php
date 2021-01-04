<?php 

$frontController->register([
    'controller' => 'API\PostsController',
    'action' => 'all'
]);

$frontController->register([
    'controller' => 'API\PostsController',
    'action' => 'stats'
]);
