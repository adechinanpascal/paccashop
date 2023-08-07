
<?php
    include "./navbar.php";
?>




    <?php

        get_unique_product();
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



<script>
      // Pour les selection dynamique dans la page produits unique
    var MainImg = document.getElementById("MainImg");
    var smalling = document.getElementsByClassName("small-img");

    smalling[0].onclick = function() {
        MainImg.src = smalling[0].src
    }
    smalling[1].onclick = function() {
        MainImg.src = smalling[1].src
    }
    smalling[2].onclick = function() {
        MainImg.src = smalling[2].src
    }
</script>


<?php
    include "./footer.php";
?>