<?php include "admin_base.php"; 

add_category();

settings();


if(isset($_GET['modifiedcat_id'])) {
    global $con;
    $category_id = $_GET['modifiedcat_id'];

    $select_query = "Select * from `categories` where category_id=$category_id";
    $result_select = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result_select);
    $category_title = $row['category_title'];

    if(isset($_POST['update_cat'])) {
        $category_title = $_POST['cat_title'];

        $update_query = "update `categories` set category_title='$category_title' where category_id=$category_id";
        $result_update = mysqli_query($con, $update_query);
        if($result_update) {
            echo "<script>alert('Informations modifiées avec succès')</script>";
        }
    }
}



?>





<div class="product">
    <div class="add-product">
        <div class="cardHeader">
            <h2>Modifier un catégorie</h2>
        </div>

        <form action="" method="post">
            <label for="cat_title">Nom Catégorie</label>
            <input class="form-groupe" type="text" name="cat_title" value="<?= $category_title ?>" size="30">

            <input class="button-add" type="submit" value="Modifier Catégorie" name="update_cat">
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