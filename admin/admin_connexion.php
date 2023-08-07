<?php
include('../functions/admin_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion admistrateur</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="../css/admin.css">

    <script src="https://kit.fontawesome.com/24286ce605.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="containe">
        <div class="connexion">
            <h2>Connexion compte administrateur</h2>
            <?php admin_connexion(); ?>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Entrer votre nom d'utilisateur">

                <input type="password" name="password" id="password" placeholder="Votre mot de passe">

                <input class="button-signup" type="submit" name="admin_connect" value="Connexion">
            </form>
        </div>
    </div>
</body>
</html>