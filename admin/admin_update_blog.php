<?php include "admin_base.php"; 

if(isset($_GET['modifiedblog_id'])) {
    global $con;
    $blog_id = $_GET['modifiedblog_id'];

    $select_query = "Select * from `blog` where blog_id=$blog_id";
    $result_select = mysqli_query($con, $select_query);
    $row = mysqli_fetch_assoc($result_select);
    $blog_title = $row['blog_title'];
    $blog_pre_desc = $row['blog_predesc'];
    $blog_description = $row['blog_description'];
    $blog_image = $row['blog_image'];
    $blog_author = $row['blog_author'];
    $blog_date = date('m/d', strtotime($row['blog_date']));

    if(isset($_POST['update_blog'])) {
        $new_blog_title = mysqli_real_escape_string($con, $_POST['blog_title']);
        $new_blog_pre_desc = mysqli_real_escape_string($con, $_POST['blog_pre_desc']);
        $new_blog_description = mysqli_real_escape_string($con, $_POST['blog_description']);
        $new_blog_author = mysqli_real_escape_string($con, $_POST['blog_author']);


        // Acceder aux tmp nom images
        //$target_dir = "blog_images/";
        //$target_file = $target_dir . basename($_FILES["blog_image"]["name"]);
        //move_uploaded_file($_FILES["blog_image"]["tmp_name"], $target_file);

        $update_query = "update `blog` set blog_title='$new_blog_title', blog_predesc='$new_blog_pre_desc', blog_description='$new_blog_description', blog_author='$new_blog_author' where blog_id=$blog_id";
        $result_update = mysqli_query($con, $update_query);
        if($result_update) {
            echo "<script>alert('Informations modifiées avec succès !')</script>";
        }

        $select_query = "Select * from `blog` where blog_id=$blog_id";
        $result_select = mysqli_query($con, $select_query);
        $row = mysqli_fetch_assoc($result_select);
        $blog_title = $row['blog_title'];
        $blog_pre_desc = $row['blog_predesc'];
        $blog_description = $row['blog_description'];
        $blog_image = $row['blog_image'];
        $blog_author = $row['blog_author'];
        $blog_date = date('m/d', strtotime($row['blog_date']));
    }
}

?>




<div style="display: block;" class="product">
    <div class="add-product update-blog">
        <div class="cardHeader">
            <h2>Modifier un Article</h2>
        </div>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="view">
                <div class="part1">
                    <img src="<?= $blog_image ?>" alt="" width="250" height="250" style="border-radius: 50%">

                    <!-- <label for="blog_title">Titre de blog</label> !-->
                    <textarea class="form-groupe" type="text" name="blog_title" cols="60" rows="3" id="blog_title" ><?= $blog_title ?></textarea>
                </div>

                <!--<textarea name="" id="" cols="30" rows="10"></textarea> !-->

                <label for="blog_pre_desc">Pré-description</label>
                <textarea style="line-height: 30px; border: none;"  class="form-groupe" type="text" name="blog_pre_desc" id="blog_pre_desc" cols="100" rows="6" ><?= $blog_pre_desc ?></textarea>

                <label for="blog_description">Description</label>
                <textarea style="line-height: 30px; border: none;" class="form-groupe" type="text" name="blog_description" id="blog_description" cols="100" rows="30"><?= $blog_description ?></textarea>

                <!--<label for="blog_image">Image</label>
                <input class="form-groupe" type="file" name="blog_image" id="blog_image" required="required"> !-->

                <div class="author">
                    <label for="blog_author">Auteur</label>
                    <input class="form-groupe" type="text" name="blog_author" id="blog_author" value="<?= $blog_author ?>" required="required">
                </div>
        
            </div>
           

           <input class="button-signup" type="submit" value="Modifier" name="update_blog">
           <a href="admin_view_blog.php" class="button-cancel">Annuler</a>
        </form>
    </div>



</div>










<?php include "admin_base_footer.php"; ?>