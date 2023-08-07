<?php
    include "./navbar.php";
    $nom_page = "Blog";
?>


<!--================= HEADER SECTION =================== !-->

<section id="page-header" class="blog-header" style="background-image: url('img/banner/b19.jpg');">
  
    <h2>#Blog</h2>
    
    <p>Lisez toutes les études de cas sur nos produits !</p>
    
</section>


<?php
show_blog(4);
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