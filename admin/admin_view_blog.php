<?php include "admin_base.php"; 

add_blog();
?>



<div style="display: block;" class="product">

    <div class="details-product">
        <div class="cardHeader">
            <h2>Détails Article</h2>
        </div>


        <div style=" overflow-x: scroll;" class="brand-table">
        <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Nom d'Article</th>
                        <th>Auteur</th>
                        <th>Commentaire</th>
                        <th>J'aime</th>
                        <th>J'aime pas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    admin_view_blog();
                    delete_blog();
                ?>

        
        </div>
        <div class="div-retout">
        <a href="admin_add_blog.php" class="button-cancel">Retour</a>
        </div>
       
    </div>


</div>











<?php include "admin_base_footer.php"; ?>