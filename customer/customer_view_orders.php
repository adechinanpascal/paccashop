<?php
include "customer_base.php";
?>


<div style="display: block;" class="product">
    <div  class="details-product">
        <div class="cardHeader">
            <h2>Détails de vos Commandes</h2>
        </div>


        <div class="brand-table" style="overflow: auto;">
            <table style="width: 200%;">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom du Client</th>
                        <th>Adresse du Client</th>
                        <th>Email du client</th>
                        <th>Coût total brute</th>
                        <th>Coupon</th>
                        <th>Livraison</th>
                        <th>Coût total</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Paiement</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    customer_view_orders();
                    customer_delete_orders();
                ?>
        </div>

    </div>


</div>













<?php
include "customer_base_footer.php";
?>