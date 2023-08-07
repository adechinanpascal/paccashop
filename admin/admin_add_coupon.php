<?php include "admin_base.php"; 

settings();
add_coupon();
?>



<div class="product">
    <div class="add-product">
        <div class="cardHeader">
            <h2>Ajouter un Coupon</h2>
        </div>

        <form action="" method="post">
            <label for="coupon_title">Nom du coupon</label>
            <input class="form-groupe" type="text" name="coupon_title" size="30">

            <label for="coupon_percentage">Pourcentage</label>
            <input class="form-groupe" type="text" name="coupon_percentage" size="30">

            <label for="coupon_author">Détenteur du coupon</label>
            <input class="form-groupe" type="text" name="coupon_author" placeholder="Le nom complet du détenteur du coupon" size="30">

            <input class="button-add" type="submit" value="Ajouter Coupon" name="insert_coupon">
        </form>
    </div>

    <div class="details-product">
        <div class="cardHeader">
            <h2>Détails Coupon</h2>
        </div>


        <div class="brand-table">
        <table>
                <thead>
                    <tr>
                        <th>Nom Coupon</th>
                        <th>Pourcentage</th>
                        <th>Détenteur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                   view_coupon();
                   delete_coupon();
                ?>

                </tbody>
            </table>
        </div>

    </div>


</div>











<?php include "admin_base_footer.php"; ?>