<?php
include "admin_base.php";
?>


<div style="display: block;" class="product">
    <div  class="details-product">
        <div class="cardHeader">
            <h2>Détails des Commandes</h2>
            <a href="admin_view_sells.php" class="button-cancel">Voir les ventes</a>
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
                    admin_view_orders();
                    delete_orders();
                ?>
        </div>

    </div>


</div>













<?php
include "admin_base_footer.php";
?>