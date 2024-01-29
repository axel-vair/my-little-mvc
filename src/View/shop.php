<?php

require_once "../../vendor/autoload.php";
use App\Model\Product;

$product = new Product();
$products = $product->findAll();

foreach ($products as $getProduct){
    echo "<pre>";
    echo "Nom: " . $getProduct->getName() . " ";
    echo "Prix: " . $getProduct->getPrice() . " ";
    echo "Description: " . $getProduct->getDescription() . "";
    echo "Quantité: " . $getProduct->getQuantity() . " ";
    echo "Description: " . $getProduct->getDescription() . " ";
    echo "</pre>";
}

?>
