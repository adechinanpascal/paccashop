<?php
include "admin_base.php";

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
        $status = $_POST['status'];
        $payment = $_POST['payment'];

       
        
        $update_query = "update `orders` set status='$status', payment='$payment' where order_id=$order_id";
        $result_update = mysqli_query($con, $update_query);
        if($result_update) {
            echo "<script>alert('Etat de commande modifié avec succès !')</script>";
        }
        
    
    }

}

?>






<div style="display: block;" class="product">
<div class="add-product">
        <div class="cardHeader">
            <h2>Modifier l'état de la commande</h2>
            
        </div>

        <div class="Update-order">

                <h2>Informations de livraison</h2>
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
            
                <form action="" method="post">
                    <label for="status"><strong>Status de la commande</strong></label>
                    <select class="form-groupe" name="status" id="status">
                        <option value="<?= $status ?>"><?= $status ?></option>
                        <option value="En cour">En cour</option>
                        <option value="Suspendu">Suspendu</option>
                        <option value="Retourner">Retourner</option>
                        <option value="Livrer">Livrer</option>
                    </select>

                    <label for="payment"><strong>Paiment de la commande</strong></label>
                    <select class="form-groupe" name="payment" id="payment">
                        <option value="<?= $payment ?>"><?= $payment ?></option>
                        <option value="Inpaye">Inpayé</option>
                        <option value="Paye">Payé</option>
                    </select>

                    <input type="submit" class="button-signup" name="update_order" value="Modifier">
                    <a href="admin_view_orders.php" class="button-cancel">Annuler</a>
                </form>

        </div>

        
</div>


</div>












<?php
include "admin_base_footer.php";
?>