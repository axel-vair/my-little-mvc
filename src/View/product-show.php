<?php
use App\Model\User;
if (!$_SESSION) {
    header("location: login");
}
$_SESSION['user'] = User::isLoggedIn();
require_once "src/Template/__header.html";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.2/zephyr/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.2/zephyr/bootstrap.rtl.min.css">

</head>
<body>
<div class="d-flex justify-content-center container mt-2 mb-3">
    <h2>Détails de <?= $productById->getName() ?></h2>
</div>

<section class="d-flex d-flex justify-content-center container">
        <div class="card mb-3 w-50 mx-1">
            <h3 class="card-header"><?= $productById->getName() ?></h3>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200"
                 aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice"
                 viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
                <rect width="100%" height="100%" fill="#868e96"></rect>
                <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
            </svg>
            <div class="card-body">
                <h5 class="card-text">Description :</h5>
                <p><?= $productById->getDescription() ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><h5>Prix:</h5>
                    <p><?= $productById->getPrice()  ?>€</p></li>
                <li class="list-group-item"><h5>Quantité:</h5>
                    <p><?= $productById->getQuantity()  ?></p></li>
            </ul>
        </div>

</section>


</body>
</html>
