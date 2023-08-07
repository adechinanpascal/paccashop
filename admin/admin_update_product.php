
<?php 
include "admin_base.php"; 

add_product();

if(isset($_GET['modified_id'])) {
    global $con;
    $product_id = $_GET['modified_id'];

    $select_query = "Select * from `products` where product_id=$product_id";
    $result_query = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result_query);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
    $date = date('Y-m-d', strtotime($row['date']));
    $status = $row['status'];


        $brand_query = "Select brand_title from `brands` where brand_id=$brand_id";
        $brand_result = mysqli_query($con, $brand_query);
        $row1 = mysqli_fetch_assoc($brand_result);
        $brand_title = $row1['brand_title'];

        $category_query = "Select category_title from `categories` where category_id=$category_id";
        $category_result = mysqli_query($con, $category_query);
        $row2 = mysqli_fetch_assoc($category_result);
        $category_title = $row2['category_title'];


        if(isset($_POST['update_product'])) {
            $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
            $description = mysqli_real_escape_string($con, $_POST['description']);
            $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
            $product_category = $_POST['product_category'];
            $product_brands = $_POST['product_brands'];
            $product_price = $_POST['product_price'];

            // Acceder aux images
            $product_image1 = $_FILES['product_image1']['name'];
            $product_image2 = $_FILES['product_image2']['name'];
            $product_image3 = $_FILES['product_image3']['name'];
            

            // Acceder aux tmp nom images
            $temp_image1 = $_FILES['product_image1']['tmp_name'];
            $temp_image2 = $_FILES['product_image2']['tmp_name'];
            $temp_image3 = $_FILES['product_image3']['tmp_name'];


            if($product_image1 != '') {
                $update_requet = "update `products` set product_title='$product_title', product_description='$description', product_keywords='$product_keywords', category_id=$product_category, brand_id=$product_brands, product_image1='$product_image1', product_price=$product_price where product_id=$product_id";
                $update_result = mysqli_query($con, $update_requet);
                if($update_result) {
                    echo "<script>alert('Information modifiées avec succès !')</script>";
                }
            }
            elseif($product_image2 != '') {
                $update_requet = "update `products` set product_title='$product_title', product_description='$description', product_keywords='$product_keywords', category_id=$product_category, brand_id=$product_brands, product_image2='$product_image2', product_price=$product_price where product_id=$product_id";
                $update_result = mysqli_query($con, $update_requet);
                if($update_result) {
                    echo "<script>alert('Information modifiées avec succès !')</script>";
                }
            }
            elseif($product_image3 != '') {
                $update_requet = "update `products` set product_title='$product_title', product_description='$description', product_keywords='$product_keywords', category_id=$product_category, brand_id=$product_brands, product_image3='$product_image3', product_price=$product_price where product_id=$product_id";
                $update_result = mysqli_query($con, $update_requet);
                if($update_result) {
                    echo "<script>alert('Information modifiées avec succès !')</script>";
                }
            }
            elseif($product_image1 != '' and $product_image2 != '') {
                $update_requet = "update `products` set product_title='$product_title', product_description='$description', product_keywords='$product_keywords', category_id=$product_category, brand_id=$product_brands, product_image1='$product_image1', product_image2='$product_image2', product_price=$product_price where product_id=$product_id";
                $update_result = mysqli_query($con, $update_requet);
                if($update_result) {
                    echo "<script>alert('Information modifiées avec succès !')</script>";
                }
            }
            elseif($product_image1 != '' and $product_image3 != '') {
                $update_requet = "update `products` set product_title='$product_title', product_description='$description', product_keywords='$product_keywords', category_id=$product_category, brand_id=$product_brands, product_image1='$product_image1', product_image3='$product_image3', product_price=$product_price where product_id=$product_id";
                $update_result = mysqli_query($con, $update_requet);
                if($update_result) {
                    echo "<script>alert('Information modifiées avec succès !')</script>";
                }
            }
            elseif($product_image2 != '' and $product_image3) {
                $update_requet = "update `products` set product_title='$product_title', product_description='$description', product_keywords='$product_keywords', category_id=$product_category, brand_id=$product_brands, product_image2='$product_image2', product_image3='$product_image3', product_price=$product_price where product_id=$product_id";
                $update_result = mysqli_query($con, $update_requet);
                if($update_result) {
                    echo "<script>alert('Information modifiées avec succès !')</script>";
                }
            }
            else {
                $update_requet = "update `products` set product_title='$product_title', product_description='$description', product_keywords='$product_keywords', category_id=$product_category, brand_id=$product_brands, product_price=$product_price where product_id=$product_id";
                $update_result = mysqli_query($con, $update_requet);
                if($update_result) {
                    echo "<script>alert('Information modifiées avec succès !')</script>";
                }
            }

            $select_query = "Select * from `products` where product_id=$product_id";
            $result_query = mysqli_query($con, $select_query);
            $row = mysqli_fetch_assoc($result_query);
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $product_price = $row['product_price'];
            $date = date('Y-m-d', strtotime($row['date']));
            $status = $row['status'];


                $brand_query = "Select brand_title from `brands` where brand_id=$brand_id";
                $brand_result = mysqli_query($con, $brand_query);
                $row1 = mysqli_fetch_assoc($brand_result);
                $brand_title = $row1['brand_title'];

                $category_query = "Select category_title from `categories` where category_id=$category_id";
                $category_result = mysqli_query($con, $category_query);
                $row2 = mysqli_fetch_assoc($category_result);
                $category_title = $row2['category_title'];


        }
}

 ?>





<div style="display: block;" class="product">
    <div class="add-product">
        <div class="cardHeader">
            <h2>Modifier un produit</h2>
        </div>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="product-list-image">
                <img src="../product_images/<?= $product_image1 ?>" alt="" width="200" height="200" style="border-radius: 50%">
                <img src="../product_images/<?= $product_image2 ?>" alt="" width="200" height="200" style="border-radius: 50%">
                <img src="../product_images/<?= $product_image3 ?>" alt="" width="200" height="200" style="border-radius: 50%">
            </div>
            <label for="product_title">Nom</label>
            <input class="form-groupe" type="text" id="product_title" name="product_title" value="<?= $product_title ?>" required="required"> 
            <span id="item_name"></span>


            <label for="description">Description</label>
            <textarea style="line-height: 24px" type="text" class="form-groupe" id="description" name="description" cols="100" rows="25"  required="required" ><?= $product_description ?></textarea>

            <label for="product_keywords">Mots Clés</label>
            <input class="form-groupe" type="text"  id="product_keywords" name="product_keywords" value="<?= $product_keywords ?>" required="required">

            <label for="product_category">Catégorie</label>
            <select style="width: 30%;" class="form-groupe" name="product_category" id="product_category">
                <option value="<?= $category_id ?>"><?= $category_title ?></option>
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
                <option value="<?= $brand_id ?>"><?= $brand_title ?></option>
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
            <span style="font-size: 0.8rem;">Selectionner l'image que vous voulez changé (si vous ne vous voulez pas changé une image laissé la case vide)</span><br>
            <label for="product_image1">Image en avant 1</label>
            <input style="padding: 0px; width: 30%;" class="form-groupe" type="file" name="product_image1" id="product_image1" value="<?= $product_image1 ?>" > 


            <label for="product_image2">Image en avant 2</label>
            <input style="padding: 0px; width: 30%;" class="form-groupe" type="file" name="product_image2" id="product_image2" value="<?= $product_image2 ?>" > 


            <label for="product_image3">Image en avant 3</label>
            <input style="padding: 0px; width: 30%;" class="form-groupe" type="file" name="product_image3" id="product_image3" value="<?=$product_image3 ?>" > 
 

            <label for="product_price">Prix Unitaire</label>
            <input class="form-groupe" type="text" name="product_price" id="product_price" value="<?= $product_price ?>" required="required" > 

            

            <input class="button-signup" type="submit" name="update_product" value="Modifier Produit">
            <a href="admin_view_product.php" class="button-cancel">Annuler</a>

        </form>
    </div>



</div>









<?php include "admin_base_footer.php"; ?>
