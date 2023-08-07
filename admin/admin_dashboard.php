<?php 

include "admin_base.php";
?>


<!-- ======================== Cards ======================== !-->

<div class="cardBox">
    <div class="card">
        <div>
            <div class="numbers">1.050</div>
            <div class="cardName">Vues Journalières</div>
        </div>

        <div class="iconBx">
            <i class="fa-regular fa-eye"></i>
        </div>
    </div>


    <div class="card">
        <div>
            <div class="numbers"><?= sells_count() ?></div>
            <div class="cardName">Ventes</div>
        </div>

        <div class="iconBx">
            <i class="fal fa-shopping-cart"></i>
        </div>
    </div>


    <div class="card">
        <div>
            <div class="numbers"><?= count_customers() ?></div>
            <div class="cardName">Abonnés</div>
        </div>

        <div class="iconBx">
            <i class="fa-solid fa-users"></i>
        </div>
    </div>


    <div class="card">
        <div>
            <div class="numbers">$<?= calculate_budget() ?></div>
            <div class="cardName">Portefeuil</div>
        </div>

        <div class="iconBx">
            <i class="fa-solid fa-wallet"></i>
        </div>
    </div>
</div>




<!-- ======================== Commandes ======================== !-->

<div class="details">
    <!--================= Detail commandes=================== !-->
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Commandes précedentes</h2>
            <a href="admin_view_orders.php" class="btn">Voir plus</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nombre de produit</th>
                    <th>Prix</th>
                    <th>Paiement</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
               <?php
                    admin_view_orders_dash();
               ?>

            </tbody>
        </table>
    </div>



    <!--================== Clients !-->
   

       <div class='recentCustomers'>
            <div class='cardHeader'>
            <h2>Abonnés précedents</h2>
            </div>

            <table>
            <thead >
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Tél</th>
                    <th>Ville</th>
                </tr>
            
            </thead>

            <tbody>
               <?php
                    view_customers_dash();
               ?>

            </tbody>
        </table>    
            
    </div>


</div>





<?php

include "admin_base_footer.php";

?>