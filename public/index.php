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




try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
