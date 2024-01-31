<?php

namespace App\Route;
require_once 'vendor/autoload.php';

use App\Controller\ProductController;
$router->map('GET', '/products', function () {
    $productController = new ProductController();
    $productController->showPage();
});

