<?php
include('./functions/common_functions.php');
session_start();
$nom_page = page();
$acceuil = "";
$boutique = "";
$blog = "";
$about = "";
$contacte = "";
$signin = "";
$signup = "";
$cart = "";
if(isset($_GET['pag'])) {
    $page = $_GET['pag'];
    if($page == 1) {
        $acceuil = "active";
    }
    elseif($page == 2) {
        $boutique = "active";
    }
    elseif($page == 3) {
        $blog = "active";
    }
    elseif($page == 4) {
        $about = "active";
    }
    elseif($page == 5) {
        $contacte = "active";
    }
    elseif($page == 6) {
        $signin = "active";
    }
    elseif($page == 7) {
        $signup = "active";
    }
    elseif($page == 8) {
        $cart = "active";
    }
    else {
        exit();
    }
}

$classe = "";
if(isset($_GET['page'])) {
    $po = $_GET['page'];
    if($po == 2) {
         $classe = "active";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nom_page ?></title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="css/style1.css" />
</head>
<body onload="afficherHeure();">


<!--================= HEDAER SECTION =================== !-->

<section id="header">
    <a href="index.php"><img src="img/logo11.png" class="logo" alt=""></a>

    <div>
        <ul id="navbar">
            <li><a class="<?php echo $acceuil; ?>" href="index.php?pag=1">Acceuil</a></li>
            <li><a class="<?php echo $boutique; echo $classe; ?>" href="shop.php?pag=2">Boutique</a></li>
            <li><a class="<?php echo $blog; ?>" href="blog.php?pag=3">Blog</a></li>
            <li><a class="<?php echo $about; ?>" href="about.php?pag=4">A propos</a></li>
            <li><a class="<?php echo $contacte; ?>" href="contact.php?pag=5">Contacte</a></li>
            <?php if(isset($_SESSION['customer'])) { ?>
                <li><a  href="customer/customer_dashboard.php">Mon compte</a></li>
                <li><a href="?logout">Déconnexion</a></li>
                <?php customer_logout_index(); ?>
            <?php } else {  ?>
                <li><a class="<?php echo $signin; ?>" href="customer">Connexion</a></li>
                <li><a class="<?php echo $signup; ?>" href="signup.php?pag=7">S'abooner</a></li>
            <?php  } ?>
            <li id="lg-bag"><a class="<?php echo $cart; ?>" href="cart.php?pag=8"><i class="far fa-shopping-bag"></i><sup><?php echo get_total_cart();  ?></sup></a></li>
            <a id="close"><i class="far fa-times"></i></a>
        </ul>
    </div>
    
    <?php if(isset($_SESSION['customer'])) { ?>
        <ul id="navbar">
            <li><img  src="<?= $_SESSION['customer']['profile_image']; ?>" alt="" width="40" height="40" style="border-radius: 50%;"></li>
        </ul>
    <?php } ?>

    <div id="mobile">
        <a style="text-decoration: none;" class="<?php echo $cart; ?>" href="cart.php?pag=8"><i class="far fa-shopping-bag"></i><sup><?php echo get_total_cart();  ?></sup></a>
        <?php if(isset($_SESSION['customer'])) { ?>
            <img  src="<?= $_SESSION['customer']['profile_image']; ?>" alt="" width="40" height="40" style="border-radius: 50%;">
        <?php } ?>
        <i class="fas fa-outdent" id="bar"></i>
    </div>
</section>

<?php
cart();
?>

