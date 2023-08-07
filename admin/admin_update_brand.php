<?php include "admin_base.php"; 


settings();


if(isset($_GET['modifiedbr_id'])) {
    global $con;
    $brand_id = $_GET['modifiedbr_id'];

    $select_query = "Select * from `brands` where brand_id=$brand_id";
    $result_select = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result_select);
    $brand_title = $row['brand_title'];

    if(isset($_POST['update_brand'])) {
        $brand_title = $_POST['brand_title'];

        $update_query = "update `brands` set brand_title='$brand_title' where brand_id=$brand_id";
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
            <h2>Modifier la Marque</h2>
        </div>

        <form action="" method="post">
            <label for="brand_title">Nom de la Marque</label>
            <input class="form-groupe" type="text" name="brand_title" value="<?= $brand_title ?>" size="30">

            <input class="button-add" type="submit" value="Modier Marque" name="update_brand">
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