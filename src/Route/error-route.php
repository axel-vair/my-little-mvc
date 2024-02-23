<?php


namespace App\Route;

$router->map('GET', '/error', function () {
    require_once __DIR__ . "/../../src/View/error404.php";
});

