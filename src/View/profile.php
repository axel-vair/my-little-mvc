<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
</head>
<body>
<h1>Page de profil</h1>

<form method="post">
    <label for="fullname">
        Nom complet :
        <input type="text" name="fullname" placeholder="<?= $user['fullname'] ?>">
    </label>

    <label for="email">
        Email :
        <input type="email" name="email" placeholder="<?= $user['email'] ?>">
    </label>

    <label for="password">
        Mot de passe :
        <input type="password" name="password" placeholder="<?= $user['password'] ?>">
    </label>

    <button type="submit">Modifier mes informations</button>
</form>

</body>
</html>

