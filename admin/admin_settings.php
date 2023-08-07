<?php include "admin_base.php"; 

add_category();

settings();
?>





<div class="product">
    <div class="add-product">
        <div class="cardHeader">
            <h2>Ajouter un catégorie</h2>
        </div>

        <form action="" method="post">
            <label for="cat_title">Nom Catégorie</label>
            <input class="form-groupe" type="text" name="cat_title" size="30">

            <input class="button-add" type="submit" value="Ajouter Catégorie" name="insert_cat">
        </form>
    </div>

    <div class="details-product">
        <div class="cardHeader">
            <h2>Détails Catégories</h2>
        </div>


        <div class="brand-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Catégorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    getcategories();
                    delete_category();
                ?>

                </tbody>
            </table>
        </div>

    </div>


</div>






<?php include "admin_base_footer.php"; ?>