<?php

use Router\Router;
use App\Exceptions\NotFoundException;


require '../vendor/autoload.php';

// echo $_GET['url'];
define('VIEWS',dirname(__DIR__) . DIRECTORY_SEPARATOR .'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS',dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);


define('DB_NAME', 'ElectroMaroc');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', '');

$router = new Router($_GET['url']);

$router->get('/','App\Controllers\BlogController@welcome');
$router->get('/contact','App\Controllers\BlogController@contact');


// $router->get('/dashboard','App\Controllers\DashboardController@index');



$router->get('/produits','App\Controllers\BlogController@index');
$router->get('/produits/:id','App\Controllers\BlogController@show');

$router->get('/admin/produits', 'App\Controllers\Admin\ProduitController@index');
$router->get('/admin/produits/create', 'App\Controllers\Admin\ProduitController@create');
$router->post('/admin/produits/create', 'App\Controllers\Admin\ProduitController@createProduit');
$router->post('/admin/produits/delete/:id', 'App\Controllers\Admin\ProduitController@destroy');
$router->get('/admin/produits/edit/:id', 'App\Controllers\Admin\ProduitController@edit');
$router->post('/admin/produits/edit/:id', 'App\Controllers\Admin\ProduitController@update');

$router->get('/admin/categories', 'App\Controllers\Admin\CategorieController@index');
$router->get('/admin/categories/create', 'App\Controllers\Admin\CategorieController@create');
$router->post('/admin/categories/create', 'App\Controllers\Admin\CategorieController@createCategorie');
$router->post('/admin/categories/delete/:id', 'App\Controllers\Admin\CategorieController@destroy');
$router->get('/admin/categories/edit/:id', 'App\Controllers\Admin\CategorieController@edit');
$router->post('/admin/categories/edit/:id', 'App\Controllers\Admin\CategorieController@update');

$router->get('/login','App\Controllers\UserController@login');
$router->post('/login','App\Controllers\UserController@loginPost');
$router->get('/logout','App\Controllers\UserController@logout');

$router->get('/register','App\Controllers\RegisterController@register');
$router->post('/register','App\Controllers\RegisterController@registerClient');

// add cart
$router->get('/cart','App\Controllers\CartShop\CartController@cart');
$router->post('/cart/:id', 'App\Controllers\Admin\CartController@cartid');
$router->post('/cart','App\Controllers\CartShop\CartController@display');

try{
    $router->run();
} catch(NotFoundException $e){
    return $e->error404();
}