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


<form method="post" action="/my-little-mvc/profile">
    <label for="fullname">
        Nom complet :
        <input type="text" name="fullname" value="<?= $userFromDatabase->getFullname() ?>">
    </label>

    <label for="email">
        Email :
        <input type="email" name="email" value="<?= $userFromDatabase->getEmail() ?>">
    </label>

    <label for="password">
        Mot de passe :
        <input type="password" name="password" value="">
    </label>

    <button type="submit">Modifier mes informations</button>
</form>

</body>
</html>
