<?php
include "admin_base.php";
?>


<div style="display: block;" class="product">
    <div  class="details-product">
        <div class="cardHeader">
            <h2>Détails des Ventes</h2>
            <a href="admin_view_orders.php" class="button-cancel">Retour</a>
        </div>


        <div class="brand-table" style="overflow: auto;">
            <table style="width: 120%;">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom du Client</th>
                        <th>Email du client</th>                        
                        <th>Prix</th>
                        <th>Date de commande</th>
                        <th>Date de vente</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                   admin_view_sells();
                ?>
        </div>

    </div>


</div>













<?php
include "admin_base_footer.php";
?>