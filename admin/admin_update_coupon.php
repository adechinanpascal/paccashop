<?php include "admin_base.php"; 

settings();

if(isset($_GET['modifiedcp_id'])) {
    global $con;
    $coupon_id = $_GET['modifiedcp_id'];

    $select_query = "Select * from `coupon` where coupon_id=$coupon_id";
    $result_query = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result_query);
    $coupon_title = $row['coupon_title'];
    $coupon_percentage = $row['coupon_percentage'];
    $coupon_author = $row['coupon_author'];

    if(isset($_POST['update_coupon'])) {
        $coupon_title = $_POST['coupon_title'];
        $coupon_percentage = $_POST['coupon_percentage'];
        $coupon_author = $_POST['coupon_author'];

        $update_query = "update `coupon` set coupon_title='$coupon_title', coupon_percentage='$coupon_percentage', coupon_author='$coupon_author' where coupon_id=$coupon_id";
        $result_update = mysqli_query($con, $update_query);
        if($result_update) {
            echo "<script>alert('Informations modifiées avec succès !')</script>";
        }
    }
}

?>



<div class="product">
    <div class="add-product">
        <div class="cardHeader">
            <h2>Modifier un Coupon</h2>
        </div>

        <form action="" method="post">
            <label for="coupon_title">Nom du coupon</label>
            <input class="form-groupe" type="text" name="coupon_title" value="<?= $coupon_title ?>" size="30">

            <label for="coupon_percentage">Pourcentage</label>
            <input class="form-groupe" type="text" name="coupon_percentage" value="<?= $coupon_percentage ?>" size="30">

            <label for="coupon_author">Détenteur du coupon</label>
            <input class="form-groupe" type="text" name="coupon_author" value="<?= $coupon_author ?>" size="30">

            <input class="button-add" type="submit" value="Modifier Coupon" name="update_coupon">
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