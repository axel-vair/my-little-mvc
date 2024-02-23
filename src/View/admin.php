<?php
require_once "src/Template/__header.html";
if($_SESSION['user']['role'] !== "admin")
{
    header('location: /my-little-mvc/error');}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.2/zephyr/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.2/zephyr/bootstrap.rtl.min.css">

    <title>Administration</title>
</head>
<body>
<div class="d-flex justify-content-center container mt-2 mb-3">
    <h2><b>Tous les utilisateurs</b></h2>
</div>

<section class="d-flex justify-content-center container mt-2 mb-3">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom complet</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($allUsers as $user): ?>
            <tr>
                <td>  <a href="show/<?= $user['id']; ?>"><?= $user['id'] ?></a></td>
                <td>  <?= $user['fullname'] ?></td>
                <td>  <?= $user['email'] ?></td>
                <td> <?= $user['role'] ?></td>
                <td> <a href="/my-little-mvc/admin/user/delete/<?= $user['id'] ?>">Supprimer</a>
                    / <a href="/my-little-mvc/admin/user/edit/<?= $user['id'] ?>">Modifier</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

</body>
</html>
