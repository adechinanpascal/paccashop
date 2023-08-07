<?php
    include "./navbar.php";
?>



<!--================= HEADER SECTION =================== !-->

<section id="page-header" style="background-image: url('img/about/banner.png');">
  
    <h2>#Panier</h2>
    
    <p>économisez plus avec des coupons & jusqu'à 70% de réduction!</p>
    
</section>

<!-- ================== Table pour les produits ========= !-->

<?php
view_cart(35);

delete_product_cart();

?>








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