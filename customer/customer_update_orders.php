<?php
include "customer_base.php";

if(isset($_GET['modified_id'])) {
    global $con;
    $order_id = $_GET['modified_id'];

    $select_query = "Select * from `orders` where order_id=$order_id";
    $result_query = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result_query);
        $order_id = $row['order_id'];
        
        // Informations de livraison
        $customer_id = $row['customer_id'];
        $customer_name = $row['customer_name'];
        $customer_address = $row['customer_address'];
        $customer_email = $row['customer_email'];
        $customer_zipcode = $row['customer_zipcode'];
        $customer_phone = $row['customer_email'];
        
        // Informations de facturation
        $facturation_address = $row['facturation_address'];

        // Informations de la carte
        $name_card = $row['name_card'];
        $card_number = $row['card_number'];
        $card_cvv = $row['card_cvv'];
        $date_expiration_card = $row['date_expiration_card'];
        $facturation_address_card = $row['facturation_address_card'];
        
        // information d'achat
        $product_list = $row['product_list'];
        $product_number = $row['product_number'];
        $total_unique = $row['total_unique'];
        $coupon = $row['coupon'];
        $coupon_per = $coupon * 100;
        $shipping = $row['shipping'];
        $total_price = $row['total_price'];
        $date = date('Y/m/d', strtotime($row['date']));
        $status = $row['status'];
        $payment = $row['payment'];

    if(isset($_POST['update_order'])) {
        $customer_name = $_POST['name'];
        $customer_address = mysqli_real_escape_string($con, $_POST['address']);
        $customer_zipcode = $_POST['zipcode'];
        $customer_phone = $_POST['phone'];
        $customer_email = $_POST['email'];

        
         $facturation_address = $_POST['facturation_address'];
        
        

        $name_card = $_POST['name_card'];
        $card_number = $_POST['card_number'];
        $expiration_date = $_POST['expiration_date'];
        $cvv_card = $_POST['cvv_card'];
        $facturation_card = $_POST['facturation_card'];


       
        $update_query = "update `orders` set product_number='$product_number',product_list='$product_list',coupon='$coupon',total_unique='$total_cart',shipping='$shipping',
            total_coupon='$total_coupon',total_price='$total',customer_name='$customer_name',customer_email='$customer_email',customer_address='$customer_address',customer_zipcode='$customer_zipcode',customer_phone='$customer_phone',
            facturation_address='$facturation_address',name_card='$name_card',card_number='$card_number',card_cvv='$cvv_card',date_expiration_card='$expiration_date',facturation_address_card='$facturation_card'  where order_id=$order_id";
            

        $result_update = mysqli_query($con, $update_query);
        if($result_update) {
            echo "<script>alert('Information de la commande modifié avec succès !')</script>";
        }
        
    
    }

}

?>






<div style="display: block;" class="product">
<div class="add-product">
        <div class="cardHeader">
            <h2>Modifier l'état de la commande</h2>
        </div>

            <?php if($status == "Livrer") { ?>  
            <div class="Update-order No">

                <p style="color: red;">Vous ne pouvez pas modifier les informations d'une commande déjà livrer</p><br>
                <br><h2>Informations de livraison</h2>
                <div>
                    <p><strong>Nom du client :</strong> <?= $customer_name ?></p>
                    <p><strong>Adresse du client :</strong> <?= $customer_address ?></p>
                </div>
                <div>
                    <p><strong>Adresse du client :</strong> <?= $customer_address ?></p>
                    <p><strong>Email du client :</strong> <?= $customer_email ?></p>
                </div>
                <div>
                    <p><strong>Code Postale :</strong> <?= $customer_zipcode ?></p>
                    <p><strong>Téléphone :</strong> <?= $customer_phone ?></p>
                </div>


                <h2>Informations de facturaction</h2>
                <div>
                    <p><strong>Adresse de facturation client :</strong> <?= $facturation_address ?></p>
                    <p><strong>Adresse de facturation lié à la carte :</strong> <?= $facturation_address_card ?></p>
                </div>


                <h2>Option de paiement</h2>
                <div>
                    <p><strong>Propriétaire de la carte :</strong> $<?= $name_card ?></p>
                    <p><strong>N° de la carte : </strong><?= $card_number ?>%</p>
                </div>
                <div>
                    <p><strong>Code sécurité :</strong> $<?= $card_cvv ?></p>
                    <p><strong>Date d'expiration :</strong> $<?= $date_expiration_card ?></p>
                </div>


                <h2>Informations d'achats</h2>
                <div>
                    <p><strong>Liste de produits :</strong> <?= $product_list ?></p>
                </div><br><br>
                <div>
                    <p><strong>Coût d'achat brute :</strong> $<?= $total_unique ?></p>
                    <p><strong>Coupon : </strong><?= $coupon_per ?>%</p>
                </div>
                <div>
                    <p><strong>Livraison :</strong> $<?= $shipping ?></p>
                    <p><strong>Coût total :</strong> $<?= $total_price ?></p>
                </div>

            </div>
            <div style="margin-bottom: 20px; margin-top: 30px; ">
                <a href="customer_view_orders.php" class="button-cancel">Retour</a>
            </div>
            <?php } else { ?>

                <form action="" method="post">

                    <!-- Information de livraison  !-->
                    <h2 class="form-title">Information de livraison</h2><br>
                        <div class="input-line">
                            <label for="name">Nom complet</label>
                            <input class="form-groupe" type="text" name="name" id="name" value="<?= $customer_name ?>" placeholder="Votre nom et prénom">
                        </div>
                        <div class="input-line">
                            <label for="address">Adresse de livraison</label>
                            <input class="form-groupe" type="text" name="address" id="address" value="<?= $customer_address ?>" placeholder="Votre adresse de résidence actuel (rue, ville, département/province, pays)">
                        </div>
                        <div class="input-line">
                            <label for="zipcode">Code Postal</label>
                            <input class="form-groupe" type="text" name="zipcode" id="zipcode" value="<?= $customer_zipcode ?>" placeholder="Votre code postale">
                        </div>
                        <div class="input-container">
                        <div class="input-line">
                            <label for="phone">Téléphone</label>
                            <input class="form-groupe" type="text" name="phone" id="phone" value="<?= $customer_phone ?>" placeholder="Ex: +29951954404">
                        </div>
                        <div class="input-line">
                            <label for="email">Couriel électronique</label>
                            <input class="form-groupe" type="email" name="email" id="email" value="<?= $customer_email ?>" placeholder="Votre adresse email">
                        </div>
                        </div><br><br>

                        <!-- Information sur la facturation  !-->
                    <h2 class="form-title">Information de facturaction</h2><br>
                        <div class="input-checkbox">
                            <label for="facturation_address">Votre adresse de fracturation</label>
                            <input class="form-groupe" class="" type="text" name="facturation_address" id="facturation-address" value="<?= $facturation_address ?>" placeholder="Votre adresse de fracturation">
                        </div><br><br>


                    <!-- Information de paiment  !-->
                    <h2 class="form-title">Option de paiement</h2><br>
                        <div class="input-line">
                            <label for="name_card">Nom sur la carte</label>
                            <input class="form-groupe" type="text" name="name_card" id="name_card" value="<?= $name_card ?>" placeholder="Votre nom et prénom">
                        </div>
                        <div class="input-container">
                        <div class="input-line">
                            <label for="card_number">Numéro de la carte</label>
                            <input class="form-groupe" type="text" name="card_number" id="card_number" value="<?= $card_number ?>" placeholder="1111-2222-3333-4444">
                        </div>
                        <img src="img/pay/pay.png" alt="">
                        </div>
                        <div class="input-container">
                            <div class="input-line">
                                <label for="expiration_date">Date d'expiration</label>
                                <input class="form-groupe" type="text" name="expiration_date" id="expiration_date" value="<?= $date_expiration_card ?>" placeholder="09-21">
                            </div>
                            <div class="input-line">
                                <label for="cvv_card">CVV</label>
                                <input class="form-groupe" type="text" name="cvv_card" id="cvv_card" value="<?= $card_cvv ?>" placeholder="***">
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <label for="facturation_card">Adresse de facturation associée à la carte de crédit</label>
                            <input class="form-groupe" type="text" name="facturation_card" id="facturation_card" value="<?= $facturation_address_card ?>" placeholder="Adresse de facturation associée à la carte de crédit">
                        </div>


                    <input type="submit" class="button-signup" name="update_order" value="Modifier">
                    <a href="customer_view_orders.php" class="button-cancel">Annuler</a>
                </form>
            <?php } ?>
            

        

        
</div>


</div>












<?php
include "customer_base_footer.php";
?>