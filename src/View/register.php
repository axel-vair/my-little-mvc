<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
    <form method="POST" action="" name="register-form">
        <label for="fullname">
            Nom complet
            <input type="text" name="fullname" required/>
        </label>

        <label for="email">
            Email:
            <input type="email" name="email" required/>
        </label>

        <label for="password">
            Mot de passe
            <input type="password" name="password" required/>
        </label>

        <button type="submit">Je m'inscris</button>
    </form>
</body>
</html>
<?php

use App\Model\User;

if(isset($_POST["fullname"], $_POST["email"], $_POST["password"])) {
    $fullname = htmlspecialchars($_POST["fullname"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $newUser = new User();
    $newUser->create($fullname, $email, $password);
}
?>