<?php

namespace App\Controller;

use App\Model\Product;

class ShopController
{
    public object $product;

    public function __construct(){
        $this->product = new Product();
    }

    public function index($page)
    {
        $productPaginate = $this->product->findPaginated($page);
        require_once __DIR__ . '/../View/shop.php';
    }
}