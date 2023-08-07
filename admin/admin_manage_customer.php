<?php include "admin_base.php"; ?>






<div style="display: block;" class="product">
    <div  class="details-product">
        <div class="cardHeader">
            <h2>Détails des Abonnées</h2>
        </div>


        <div class="brand-table">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Genre</th>
                        <th>Résidence</th>
                        <th>Téléphone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    view_customers();
                    delete_customer();
                ?>
        </div>

    </div>


</div>








<?php include "admin_base_footer.php"; ?>