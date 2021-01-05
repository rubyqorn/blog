<?php 

$frontController->register([
    'route' => 'api/posts/all',
    'controller' => 'API\PostsController',
    'action' => 'all'
]);

$frontController->register([
    'route' => 'api/app/metrics',
    'controller' => 'API\MetricsController',
    'action' => 'getMetrics'
]);
