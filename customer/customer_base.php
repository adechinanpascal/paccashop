<?php
include_once('../functions/customer_functions.php'); 
session_start();
if(isset($_SESSION['customer'])) { 


 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="../css/customer.css">

    
    <script src="https://kit.fontawesome.com/24286ce605.js" crossorigin="anonymous"></script>
 </head>
 <body>
   
<!--============ Navigation ========!-->
<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="">
                    <span class="icon"><i style="font-size: 1.75rem;" class="fa-solid fa-dumpster-fire"></i></span>
                    <span class="title">Pacca Shop</span>
                    
                </a>
            </li>

            <li>
                <a href="customer_dashboard.php">
                    <span class="icon"><i style="font-size: 1.75rem;" class="fa fa-home"></i></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="customer_profil.php">
                    <span class="icon"><i style="font-size: 1.75rem;" class="fa fa-user"></i></span>
                    <span class="title">Profile</span>
                </a>
            </li>

            <li>
                <a href="customer_view_orders.php">
                    <span class="icon"><i style="font-size: 1.75rem;" class="fa-sharp fa-solid fa-circle-check"></i></span>
                    <span class="title">Commandes</span>
                </a>
            </li>

            <li>
                <a href="admin_add_blog.php">
                    <span class="icon"><i style="font-size: 1.75rem;" class="fa-solid fa-blog"></i></span>
                    <span class="title">Annonce</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span class="icon"><i style="font-size: 1.75rem;" class="fa-solid fa-circle-info"></i></span>
                    <span class="title">Aide</span>
                </a>
            </li>

            <li>
                <a href="customer_base.php?logout">
                    <?php customer_logout(); ?>
                    <span class="icon"><i style="font-size: 1.75rem;" class="fa-solid fa-right-from-bracket"></i></span>
                    <span class="title">Déconnexion</span>
                </a>
            </li>
        </ul>
    </div>




    <!--================= Main ======================================= !-->

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <i class="fa fa-bars"></i> 
            </div>

            <div class="search">
                <label>
                    <input type="text" placeholder="Rechercher">
                    <i style="position: absolute; left: 10px; top: 0; font-size: 1.2rem;" class="fa fa-search icon"></i>
                </label>
            </div>
            
            <span><?= $_SESSION['customer']['complete_name'] ?> </span>
            <div class="user">
                
                <img src="../<?= $_SESSION['customer']['profile_image'] ?>" alt="">
            </div>
        </div>
   





<?php 
} else {
    header('location:customer_connexion.php');
} 
?>



