<?php 

include "customer_base.php";
?>


<!-- ======================== Cards ======================== !-->

<div class="cardBox">
    <div class="card">
        <div>
            <div class="numbers">3</div>
            <div class="cardName">Commandes</div>
        </div>

        <div class="iconBx">
            <i class="fa-regular fa-eye"></i>
        </div>
    </div>


    <div class="card">
        <div>
            <div class="numbers">8</div>
            <div class="cardName">Achats</div>
        </div>

        <div class="iconBx">
            <i class="fal fa-shopping-cart"></i>
        </div>
    </div>


    <div class="card">
        <div>
            <div class="numbers">285</div>
            <div class="cardName">Abonnés</div>
        </div>

        <div class="iconBx">
            <i class="fa-solid fa-users"></i>
        </div>
    </div>


    <div class="card">
        <div>
            <div class="numbers">$7.675</div>
            <div class="cardName">Dépenses</div>
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
            <a href="" class="btn">Voir plus</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Paiement</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Star Refrigerator</td>
                    <td>$1200</td>
                    <td>Payer</td>
                    <td><span class="status delivered">Livrer</span></td>
                </tr>

                <tr>
                    <td>Dell PC</td>
                    <td>$1000</td>
                    <td>Payer</td>
                    <td><span class="status return">Retourner</span></td>
                </tr>

                <tr>
                    <td>Iphone 11 pro</td>
                    <td>$2200</td>
                    <td>Payer</td>
                    <td><span class="status pending">Suspendu</span></td>
                </tr>

                <tr>
                    <td>Camon 11</td>
                    <td>$800</td>
                    <td>Payer</td>
                    <td><span class="status inProgress">En cour</span></td>
                </tr>
            </tbody>
        </table>
    </div>



    <!--================== Clients !-->
   

       <div class='recentCustomers'>
        <div class='cardHeader'>
        <h2>Abonnés précedents</h2>
        </div>



            
           
            
    </div>


</div>





<?php

include "customer_base_footer.php";

?>