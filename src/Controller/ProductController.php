<?php

namespace App\Controller;
use App\Model\Product;

class ProductController
{
    public function __construct(){
        $this->productModel = new Product();
    }

    public function getAllProducts(){
        return $this->productModel->findAll();
    }

    public function showPage(){
        $products = $this->getAllProducts();
        require_once __DIR__ . './shop.php';
    }
}