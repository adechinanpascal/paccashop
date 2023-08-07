<?php include('./functions/common_functions.php'); ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nom_page ?></title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="css/customer.css" />
</head>
<body>
    <div class="containe">
        <div class="connexion">
            <h2>Connexion compte Abonner</h2>
            <?php customer_connexion(); ?>
            <form action="" method="post">
                <input type="email" name="emailaddress" placeholder="Entrer votre mail">

                <input type="password" name="password" id="password" placeholder="Votre mot de passe">

                <input class="button-signup" type="submit" name="connect_customer" value="Connexion">

                <a href="index.php" class="button-cancel">Retour</a>
            </form>
            <p>Vous n'avez pas un compte ? <a href="./signup.php">créer votre compte ici</a></p>
        </div>
    </div>
</body>
</html>