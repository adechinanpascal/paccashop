<?php include "admin_base.php"; 

add_brand();

settings();
?>





<div class="product">
    <div class="add-product">
        <div class="cardHeader">
            <h2>Ajouter une Marque</h2>
        </div>

        <form action="" method="post">
            <label for="brand_title">Nom de la Marque</label>
            <input class="form-groupe" type="text" name="brand_title" size="30">

            <input class="button-add" type="submit" value="Ajouter Marque" name="insert_brand">
        </form>
    </div>

    <div class="details-product">
        <div class="cardHeader">
            <h2>Détails Marques</h2>
        </div>

        <div class="brand-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Marque</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    getbrands();
                    delete_brand();
                ?>

                </tbody>
            </table>
        </div>

    </div>


</div>















<?php include "admin_base_footer.php"; ?>