<?php

namespace App\Route;

use App\Controller\ProductController;
use App\Controller\ShopController;


$router->map('GET', '/shop', function() {
    $page = $_GET['page'] ?? 1;
    $shopController = new ShopController();
    $shopController->index($page);

}, 'home');

$router->map('GET', '/products', function () {
    $productController = new ProductController();
    $productController->showPage();
});


