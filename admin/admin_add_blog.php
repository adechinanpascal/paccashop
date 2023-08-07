<?php include "admin_base.php"; 

add_blog();
?>



<div style="display: block;" class="product add-blog">
    <div class="add-product">
        <div class="cardHeader">
            <h2>Ajouter un Article</h2>
        </div>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="blog-titre">
                <label for="blog_title">Titre de l'article</label>
                <input class="form-groupe" type="text" name="blog_title" id="blog_title" placeholder="Entrer le titre de blog" autocomplete="off" required="required">
            </div>
           
            <div class="blog-content">
                <label for="blog_pre_desc">Pré-description</label>
                <textarea class="form-groupe" type="text" name="blog_pre_desc" id="blog_pre_desc" cols="100" rows="5" placeholder="La pré-description" autocomplete="off" required="required"></textarea>

                <label for="blog_description">Description</label>
                <textarea class="form-groupe" type="text" name="blog_description" id="blog_description" cols="100" rows="25" placeholder="La description entier du blog" autocomplete="off" required="required"></textarea>
            </div>
          
            <div class="blog-reference">
                <label for="blog_image">Image</label>
                <input class="form-groupe" type="file" name="blog_image" id="blog_image" required="required">

                <label for="blog_author">Auteur</label>
                <input class="form-groupe" type="text" name="blog_author" id="blog_author" placeholder="Entrer le nom de l'auteur" autocomplete="off" required="required">
            </div>
           


           <input class="button-signup" type="submit" value="Ajouter" name="insert_blog">
           <a href="admin_view_blog.php" class="button-cancel">Voir détails articles</a>
        </form>
        
    </div>



</div>











<?php include "admin_base_footer.php"; ?>