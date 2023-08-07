<?php
    include "./navbar.php";
?>




<!--================= HERO SECTION =================== !-->

<section id="hero" style="background-image: url('img/hero4.png');">
    <h4>Offre d'échange</h4>
    <h2>offres de super valeur</h2>
    <h1>Sur tous les produits</h1>
    <p>économisez plus avec des coupons & jusqu'à 70% de réduction!</p>
    <button style="background-image: url('img/button.png');">Achetez maintenant</button>
</section>



<!--================= OPTIONS SECTION =================== !-->

<section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="img/features/f1.png" alt="">
        <h6>Livraison gratuite</h6>
    </div>

    <div class="fe-box">
        <img src="img/features/f2.png" alt="">
        <h6>Commande en ligne</h6>
    </div>

    <div class="fe-box">
        <img src="img/features/f3.png" alt="">
        <h6>Economiser de l'argent</h6>
    </div>

    <div class="fe-box">
        <img src="img/features/f4.png" alt="">
        <h6>Promotions</h6>
    </div>

    <div class="fe-box">
        <img src="img/features/f5.png" alt="">
        <h6>Bonne vente</h6>
    </div>

    <div class="fe-box">
        <img src="img/features/f6.png" alt="">
        <h6>Assistance F24/7</h6>
    </div>
</section>



<!--================= produit été SECTION =================== !-->
<section id="product1" class="section-p1">
    <h2>Caractéristiques Produits</h2>
    <p>collection Eté - Nouveau Design Moderne</p>
    <div class="pro-container">
        <?php
            getproducts();
        ?>
        

    </div>
</section>




<!--================= Repair service SECTION =================== !-->


<section id="banner" class="section-m1" style="background-image: url('img/banner/b2.jpg');">
    <h4>Services de Réparation</h4>
    <h2>Jusqu'à <span> 70% de Réduction </span> - Tous les T-Shirts et Accessoires</h2>
    <button class="normal">En savoir Plus</button>
</section>




<!--================== New arrival section ================ !-->

<section id="product1" class="section-p1">
    <h2>Nouveaux Arrivages</h2>
    <p>collection Eté - Nouveau Design Moderne</p>
    <div class="pro-container">


    <?php
        getnewproduct();
    ?>

    </div>
</section>




<!--================== footer optionssection ================ !-->


<section id="sm-banner" class="section-p1">
    <div class="banner-box" style="background-image: url('img/banner/b17.jpg');">
        <h4>Affaire folle</h4>
        <h2>acheter 1 obtenez 1</h2>
        <span>La meilleure robe classique est en vente chez pacca</span>
        <button class="white">En savoir plus</button>
    </div>


    <div class="banner-box" style="background-image: url('img/banner/b10.jpg');">
        <h4>Printemps/Eté</h4>
        <h2>Saison prochaine</h2>
        <span>La meilleure robe classique est en vente chez pacca</span>
        <button class="white">Collection</button>
    </div>
</section>




<!--================== footer 2 optionssection ================ !-->

<section id="banner3" >
    <div class="banner-box" style="background-image: url('img/banner/b7.jpg');">
        <h2>VENTE SAISONNIERE</h2>
        <h3>Collection Hiver -50% de réduction</h3>
    </div>

    <div class="banner-box" style="background-image: url('img/banner/b4.jpg');">
        <h2>NOUVELLE COLLECTION DE CHAUSSURES</h2>
        <h3>Printemps / Eté 2023</h3>
    </div>

    <div class="banner-box" style="background-image: url('img/banner/b18.jpg');">
        <h2>T-SHIRTS</h2>
        <h3>Nouveaux Imprimés Tendance</h3>
    </div>
</section>





<!--================== newsletter section ================ !-->

<section id="newsletter" class="section-p1 section-m1" style="background-image: url('img/banner/b14.png');">
    <div class="newstext">
        <h4>S'inscrire aux Newsletters</h4>
        <p>Recevez des mises à jour par e-mail sur notre dernière boutique et nos <span> offres spéciales </span> </p>
    </div>
    <div class="form">
        <input type="text" placeholder="Votre adresse email">
        <button class="normal">S'inscrire</button>
    </div>
</section>


<?php
    include "./footer.php";
?>