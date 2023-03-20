<?php

use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
/* feel free to edit these credentials based on your env. */ 
define('DB_NAME', 'whattoeat');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', '');

$router = new Router($_GET['url']);

$router->get('/','App\Controllers\HomeController@showDashboard'); 
$router->get('/atba9','App\Controllers\MealsController@showMeals'); 
$router->post('/addmeal','App\Controllers\MealsController@addMeal'); 
$router->post('/editmeal/:id','App\Controllers\MealsController@editMeal'); 
$router->post('/deletemeal/:id','App\Controllers\MealsController@deleteMeal'); 

$router->post('/decide','App\Controllers\MealsController@decide'); 
try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
