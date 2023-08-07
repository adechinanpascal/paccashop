<?php
    include "./navbar.php";
?>



<!--================= HEADER SECTION =================== !-->

<section id="page-header" style="background-image: url('img/banner/b1.jpg');">
  
    <h2>#ResterAlaMaison</h2>
    
    <p>économisez plus avec des coupons & jusqu'à 70% de réduction!</p>
    
</section>




<section id="product1" class="section-p1">
    <h2>Boutique</h2>
    <p>Effectuer vos choix et passer à l'action</p> 
</section>


<section class="seachby">
    <div class="search-container">
        <form action="search_product.php" method="get">
            <input  type="search" name="search_data" placeholder="Recherche par mot clé ou catégorie">
            <input  name="search_data_product" type="submit" value="Rechercher">
        </form>
    </div>
</section>
      
           
<!--================= Produits SECTION =================== !-->
<section id="product1" class="section-p1">

    <div class="pro-container">
        <?php
            getproductschop(8);

        ?>
    
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
