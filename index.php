<?php

use App\Controller\ProductController;

require 'vendor/autoload.php';
const MY_LITTLE_MVC_DIR = '/my-little-mvc/';

$router = new AltoRouter();
$router->setBasePath(MY_LITTLE_MVC_DIR);

$match = $router->match();

if(is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // TODO: Create a 404 view / page to handle this
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}