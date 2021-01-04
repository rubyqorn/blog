<?php 

session_start();

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Http\FrontController;

$frontController = new FrontController();

require_once dirname(__DIR__) . '/routes/web.php';
require_once dirname(__DIR__) . '/routes/api.php';

$frontController->run();
