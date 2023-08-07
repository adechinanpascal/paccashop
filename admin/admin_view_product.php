
<?php 
include "admin_base.php"; 

 ?>





<div style="display: block;" class="product">

    <div class="details-product">
        <div class="cardHeader">
            <h2>Détails produits</h2>
        </div>

        <div style="overflow-x: scroll;" class="brand-table">

        <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Marque</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    view_product();
                    delete_product();
                ?>

            <div class="div-retout">
        <a href="admin_add_product.php" class="button-cancel">Retour</a>
        </div>
        </div>
        
    </div>



</div>









<?php include "admin_base_footer.php"; ?>
