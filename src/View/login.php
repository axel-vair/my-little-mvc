<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>
<body>
    <form method="post">
        <label for="email">
            <input type="email" name="email">
        </label>
        <label for="password">
            <input type="password" name="password">
        </label>

        <button type="submit">Me connecter</button>

    </form>
</body>
</html>

<?php
if (isset($_SESSION['error'])) {
    echo "<p>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}

?>