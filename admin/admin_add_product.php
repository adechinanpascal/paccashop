
<?php 
include "admin_base.php"; 

add_product();
 ?>





<div style="display: block;" class="product">
    <div class="add-product">
        <div class="cardHeader">
            <h2>Ajouter un produit</h2>
        </div>

        <form action="" method="post" enctype="multipart/form-data">

            <label for="product_title">Nom</label>
            <input class="form-groupe" type="text" id="product_title" name="product_title" placeholder="Entrer le nom du produit" autocomplete="off" required="required"> 
            <span id="item_name"></span> 


            <label for="description">Description</label>
            <textarea type="text" class="form-groupe" id="description" name="description" cols="100" rows="20" placeholder="Décriver le produit" autocomplete="off" required="required" ></textarea> 

            <label for="product_keywords">Mots Clés</label>
            <input class="form-groupe" type="text"  id="product_keywords" name="product_keywords" placeholder="Les mots clés de votre produit" autocomplete="off" required="required">

            <label for="product_category">Catégorie</label>
            <select style="width: 30%;" class="form-groupe" name="product_category" id="product_category">
                <option value="">Selectionner catégorie</option>
                <?php
                    $select_query = "select * from `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }

                ?>  
            </select>


            <label for="product_brands">Marque</label>
            <select style="width: 30%;" class="form-groupe" name="product_brands" id="product_brands">
                <option value="">Selectionner marque</option>
                <?php
                    $select_query_brand = "select * from `brands`";
                    $result_query_brand = mysqli_query($con, $select_query_brand);
                    while($row1 = mysqli_fetch_assoc($result_query_brand)) {
                        $brand_title = $row1['brand_title'];
                        $brand_id = $row1['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }

                ?>  
            </select>

            <label for="product_image1">Image produit 1</label>
            <input style="padding: 0px; width: 30%;" class="form-groupe" type="file" name="product_image1" id="product_image1" required="required"> 


            <label for="product_image2">Image produit 2</label>
            <input style="padding: 0px; width: 30%;" class="form-groupe" type="file" name="product_image2" id="product_image2" required="required"> 


            <label for="product_image3">Image produit 3</label>
            <input style="padding: 0px; width: 30%;" class="form-groupe" type="file" name="product_image3" id="product_image3" required="required"> 
 

            <label for="product_price">Prix Unitaire</label>
            <input class="form-groupe" type="text" name="product_price" id="product_price" required="required" > 

            

            <input class="button-signup" type="submit" name="insert_product" value="Ajouter Produit">
            <a href="admin_view_product.php" class="button-cancel">Voir détails produits</a>

        </form>
    </div>


</div>









<?php include "admin_base_footer.php"; ?>
