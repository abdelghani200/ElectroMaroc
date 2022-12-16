<?php

use Router\Router;


require '../vendor/autoload.php';

// echo $_GET['url'];
define('VIEWS',dirname(__DIR__) . DIRECTORY_SEPARATOR .'views' .DIRECTORY_SEPARATOR);
define('SCRIPTS',dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

$router = new Router($_GET['url']);

$router->get('/','App\Controllers\BlogController@index');
$router->get('/posts/:id','App\Controllers\BlogController@show');

$router->run();