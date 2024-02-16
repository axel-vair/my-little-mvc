<?php
session_start();
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

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

<h2>Welcome to Shop Page, <b><?= $_SESSION['user']['fullname'] ?></b></h2>
    <h1>Produits</h1>
    <ul>
        <?php foreach ($productPaginate['products'] as $product): ?>
            <li>
                <h2><?= $product['name'] ?></h2>
                <p>Description: <?= $product['description'] ?></p>
                <p>Prix: <?= $product['price'] ?></p>
                <p>Quantité: <?= $product['quantity'] ?></p>
            </li>
        <?php endforeach; ?>
</ul>
<div>
    <?php if ($currentPage > 1): ?>
        <a href="/my-little-mvc/shop?page=<?= $currentPage - 1 ?>">Page précédente</a>
    <?php endif; ?>

    <?php if ($currentPage < $productPaginate['totalPages']): ?>
        <a href="/my-little-mvc/shop?page=<?= $currentPage + 1 ?>">Page suivante</a>
    <?php endif; ?>
</div>

</body>
</html>
