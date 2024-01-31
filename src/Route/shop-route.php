<?php

namespace App\Route;

use App\Controller\ProductController;


$router->map('GET', '/shop', function() {
    /* require __DIR__ . '/src/View/shop.php'; */
    echo "Welcome to shop page";
}, 'home');

$router->map('GET', '/products', function () {
    $productController = new ProductController();
    $productController->showPage();
});


