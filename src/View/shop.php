<?php

/*// Afficher les produits
foreach ($products as $getProduct) {
    echo "<pre>";
    echo "Nom: " . $getProduct->getName() . " ";
    echo "Prix: " . $getProduct->getPrice() . " ";
    echo "Description: " . $getProduct->getDescription() . "";
    echo "Quantité: " . $getProduct->getQuantity() . " ";
    echo "</pre>";

    echo "<a href='http://localhost/my-little-mvc/src/?id_product=" . $getProduct->getId() . "'>url</a>";
}*/
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Welcome to Shop Page, <b><?= $owner ?></b></h2>
    <h1>Produits</h1>
    <ul>
    <?php foreach ($products as $product): ?>
<li>
    <h2><?= $product->getName() ?></h2>
    <p>Description: <?= $product->xgetDescription() ?></p>
    <p>Price: <?= $product->getPrice() ?></p>
    <p>Quantity: <?= $product->getQuantity() ?></p>
</li>
<?php endforeach; ?>
</ul>

</body>
</html>
