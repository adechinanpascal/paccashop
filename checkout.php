<?php
    include "./navbar.php";


?>


<!--================= HEADER SECTION =================== !-->
<section id="page-header" style="background-image: url('img/about/banner.png');">
  
    <h2>#Paiement</h2>
    
    <p>économisez plus avec des coupons & jusqu'à 70% de réduction!</p>
    
</section>


<section id="payment" class="payment">
<div class="form-container">
    
        <form action="" method="post" class="checkout-form">
        <!-- Information de livraison  !-->
        <h2 class="form-title">Information de livraison</h2>
            <div class="input-line">
                <label for="name">Nom complet</label>
                <input type="text" name="name" id="name" value="<?= (isset($_SESSION['customer']))? $_SESSION['customer']['complete_name']: "" ?>" placeholder="Votre nom et prénom">
            </div>
            <div class="input-line">
                <label for="address">Adresse de livraison</label>
                <input type="text" name="address" id="address" value="<?= (isset($_SESSION['customer']))? $_SESSION['customer']['address'].", ".$_SESSION['customer']['city'].", ".$_SESSION['customer']['department'].", ".$_SESSION['customer']['country']: "" ?>" placeholder="Votre adresse de résidence actuel (rue, ville, département/province, pays)">
            </div>
            <div class="input-line">
                <label for="zipcode">Code Postal</label>
                <input type="text" name="zipcode" id="zipcode" value="<?= (isset($_SESSION['customer']))? $_SESSION['customer']['zip_code']: "" ?>" placeholder="Votre code postale">
            </div>
            <div class="input-container">
            <div class="input-line">
                <label for="phone">Téléphone</label>
                <input type="text" name="phone" id="phone" value="<?= (isset($_SESSION['customer']))? $_SESSION['customer']['phone']: "" ?>" placeholder="Ex: +29951954404">
            </div>
            <div class="input-line">
                <label for="email">Couriel électronique</label>
                <input type="email" name="email" id="email" value="<?= (isset($_SESSION['customer']))? $_SESSION['customer']['email']: "" ?>" placeholder="Votre adresse email">
            </div>
            </div>

            <!-- Information sur la facturation  !-->
        <h2 class="form-title">Information de facturaction</h2>
            <div class="input-checkbox">
                <input type="checkbox" name="facturation" id="facturation" >
                <span> Utliser votre adresse de résidence pour l'adresse sur la facturation</span><br><br>
                <input class="" type="text" name="facturation_address" id="facturation-address" placeholder="Votre adresse de fracturation">
            </div>


        <!-- Information de paiment  !-->
        <h2 class="form-title">Option de paiement</h2>
            <div class="input-line">
                <label for="name_card">Nom sur la carte</label>
                <input type="text" name="name_card" id="name_card" placeholder="Votre nom et prénom">
            </div>
            <div class="input-container">
            <div class="input-line">
                <label for="card_number">Numéro de la carte</label>
                <input type="text" name="card_number" id="card_number" placeholder="1111-2222-3333-4444">
            </div>
            <img src="img/pay/pay.png" alt="">
            </div>
            <div class="input-container">
                <div class="input-line">
                    <label for="expiration_date">Date d'expiration</label>
                    <input type="text" name="expiration_date" id="expiration_date" placeholder="09-21">
                </div>
                <div class="input-line">
                    <label for="cvv_card">CVV</label>
                    <input type="text" name="cvv_card" id="cvv_card" placeholder="***">
                </div>
            </div>
            <div class="input-checkbox">
                <input type="checkbox" name="facturation_ca" id="facturation-ca" >
                <span> Utliser votre adresse de résidence pour l'adresse sur la facturation associée à la carte de crédit</span><br><br>
                <input class="" type="text" name="facturation_card" id="facturation_card" placeholder="Adresse de facturation associée à la carte de crédit">
            </div>
           

            <!-- Poltiques  !-->
            <div class="input-checkbox">
                <input type="checkbox" name="politique" id="facturation" required="required">
                <span> En cochant cette case vous accepter nos <a href="#">nos termes de conditions</a>
                et notre <a href="#">Politique de confidentialité</a> pour vos achats sur notre boutique.
                 </span>
            </div>

            <div class="input-checkbox">
                <input type="checkbox" name="send-couriel" id="facturation" >
                <span> En cochant cette case vous accepter de recevoir des couriels promotionnels sur les 
                    produits de notre boutique.
                </span>
            </div>
            <input type="submit" name="payement"  value="Paiement">
        </form>
    </div>
</section>
<?php pass_order(); ?>





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
    var menuItem = document.getElementById('facturation');

    menuItem.addEventListener("click", function(){
        document.getElementById('facturation-address').classList.add('check-select');

        menuItem.addEventListener("click", function(){
        document.getElementById('facturation-address').classList.remove('check-select');

            menuItem.addEventListener("click", function(){
            document.getElementById('facturation-address').classList.add('check-select');

                menuItem.addEventListener("click", function(){
                document.getElementById('facturation-address').classList.remove('check-select');

                    menuItem.addEventListener("click", function(){
                    document.getElementById('facturation-address').classList.add('check-select');

                        menuItem.addEventListener("click", function(){
                        document.getElementById('facturation-address').classList.remove('check-select');
                        });
                    });
                });
            });
        });
    });



    var menuItem2 = document.getElementById('facturation-ca');

    menuItem2.addEventListener("click", function(){
        document.getElementById('facturation_card').classList.add('check-select');

        menuItem2.addEventListener("click", function(){
        document.getElementById('facturation_card').classList.remove('check-select');

        menuItem2.addEventListener("click", function(){
            document.getElementById('facturation_card').classList.add('check-select');

            menuItem2.addEventListener("click", function(){
                document.getElementById('facturation_card').classList.remove('check-select');

                menuItem2.addEventListener("click", function(){
                    document.getElementById('facturation_card').classList.add('check-select');

                    menuItem2.addEventListener("click", function(){
                        document.getElementById('facturation_card').classList.remove('check-select');
                        });
                    });
                });
            });
        });
    });


   
    
</script>




<?php
    include "./footer.php";
?>