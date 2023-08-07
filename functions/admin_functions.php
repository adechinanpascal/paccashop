<?php

// include fichier connexion
include_once('../includes/connect.php');


//================================== Admin fonction Panel =========================================
// fonction permettant à l'administrateur de se connecter au dashboard
function admin_connexion() {
    global $con;

    if(isset($_POST['admin_connect'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $select_query = "Select * from `admin` where username='$username'";
        $result_query = mysqli_query($con, $select_query);
        $row = mysqli_fetch_assoc($result_query);

        $admin_id = $row['id'];
        $password_define = $row['password'];
        $username_deifne = $row['username'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $image_profil = $row['image_profil'];

        if(password_verify($password, $password_define)) {
            session_start();
            $_SESSION['admin'] = [
                'id' => $admin_id,
                'username' => $username_deifne,
                'fname' => $fname,
                'lname' => $lname,
                'image_profil' => $image_profil,
            ];

            header('location:admin_dashboard.php');
        }else {
            echo "<span style='color: red;'>mot de passe ou nom d'utilisateur incorrecte</span>";
        }
    }
}



// fonction pour déconnecter l'adminstrateur
function admin_logout() {
    if(isset($_GET['logout'])) {
        session_destroy();
        header('location:admin_connexion.php');
    }
}







//fonction pour ajouter produits
function add_product() {
    global $con; 

    if(isset($_POST['insert_product'])) {

    $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // Acceder aux images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    

    // Acceder aux tmp nom images
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // vérifier les case vide
    if($product_title == '' or $description == '' or $product_keywords == '' or $product_category == '' 
    or $product_brands == '' or $product_price == '' or $product_image1 == '' or $product_image2 == ''
    or $product_image3 == '') {
        echo "<script>alert('Veuillez renseigner tous les champs')</script>";
        exit();
    }
    else {
        move_uploaded_file($temp_image1, "../product_images/$product_image1");
        move_uploaded_file($temp_image2, "../product_images/$product_image2");
        move_uploaded_file($temp_image3, "../product_images/$product_image3");

        // insertion query
        $insert_products = "insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$description','$product_keywords','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

        $result_insert_query = mysqli_query($con,$insert_products);
        if($result_insert_query) {
            echo "<script>alert('Produit ajouté avec succès')</script>";
        }
    }
}

}

// foction pourafficher les produits dans le panel admin
function view_product() {
    global $con;

    $produits_par_page = 8;  //Nombre de produits à afficher par page

    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle, par défaut 1

    // Calcule de l'offset pour la clause LIMIT de la requête SQL
    $offset = ($page_actuelle - 1) * $produits_par_page;

     $select_cat = "select * from `products` order by product_title LIMIT $offset, $produits_par_page";
    $result_cat = mysqli_query($con, $select_cat);
    while($row_data = mysqli_fetch_assoc($result_cat)) {
        $product_title = $row_data['product_title'];
        $product_id = $row_data['product_id'];
        $brand_id = $row_data['brand_id'];
        $product_image1 = $row_data['product_image1'];
        $product_price = $row_data['product_price'];
        $date = date('m/d', strtotime($row_data['date']));
        $status = $row_data['status'];


        $brand_query = "Select brand_title from `brands` where brand_id=$brand_id";
        $brand_result = mysqli_query($con, $brand_query);
        $row1 = mysqli_fetch_assoc($brand_result);
        $brand_title = $row1['brand_title'];

        echo "<tr>";
        echo "<td><img src='../product_images/$product_image1' alt='' width=40 height=40></td>";
        echo "<td>".$product_title."</td>";
        echo "<td>$".$product_price."</td>";
        echo "<td>".$brand_title."</td>";
        echo "<td>".$date."</td>";
        echo "<td><a href='admin_add_product.php?deleteprod_id=$product_id'><i class='fa-solid fa-trash'></i>S</a>  <a href='admin_update_product.php?modified_id=$product_id'><i class='fa-solid fa-pen-to-square'></i>M</a></td>";
        echo "</tr>";
        }
        echo "</tbody>
                </table>";
        
                // Ajout des liens de pagination en bas de la page
                $sql = "Select count(*) as total from products";
                $resultat = mysqli_query($con, $sql);
                $donnees = mysqli_fetch_assoc($resultat);
                $total_produits = $donnees['total'];
                $nombre_pages = ceil($total_produits / $produits_par_page);


                echo '<div class="pagination">';
                if ($page_actuelle > 1) {
                    echo '<a class="sl" href="?page=' . ($page_actuelle - 1) . '">Précedent</a>';
                }

                for ($i = 1; $i <= $nombre_pages; $i++) {
                $classe = ($i == $page_actuelle) ? "active" : "";
                echo '<a class="' . $classe . '" href="?page=' . $i . '">' . $i . '</a>';
                }

                if ($page_actuelle < $nombre_pages) {
                echo '<a class="sl" href="?page=' . ($page_actuelle + 1) . '">Suivant</a>';
                }
                echo '</div>';
}



// fonction pour supprimer un produit
function delete_product() {
    global $con;

    if(isset($_GET['deleteprod_id'])) {
        $product_id = $_GET['deleteprod_id'];

        $delete_query = "delete from `products` where product_id=$product_id";
        $result_query = mysqli_query($con, $delete_query);
        if($result_query) {
            echo "<script>alert('Produit supprimer avec succès !')</script>";
            echo "<script>window.open('admin_add_product.php','_self')</script>";
        }
    }
}




// fonction pour le navbar settings
function settings() {
    echo "<div class='navigation2'>
            <ul>
                <li>
                    <a href='admin_add_category.php'>Catégories</a>
                </li>

                <li>
                    <a href='admin_add_brand.php'>Marques</a>
                </li>

                <li>
                    <a href='admin_add_coupon.php'>Coupons</a>
                </li>
            </ul>
        </div>";
}




//fonction pour ajouter blog
function add_blog() {
    global $con;

    if(isset($_POST['insert_blog'])) {
        $blog_title = mysqli_real_escape_string($con, $_POST['blog_title']);
        $blog_pre_desc = mysqli_real_escape_string($con, $_POST['blog_pre_desc']);
        $blog_description = mysqli_real_escape_string($con, $_POST['blog_description']);
        $blog_author = mysqli_real_escape_string($con, $_POST['blog_author']);
        
        // Acceder aux images
        //$blog_image = $_FILES['blog_image']['name'];

        // Acceder aux tmp nom images
        $target_dir = "../blog_images/";
        $target_file = $target_dir . basename($_FILES["blog_image"]["name"]);
        move_uploaded_file($_FILES["blog_image"]["tmp_name"], $target_file);

        

        
        //move_uploaded_file($temp_image, "./blog_images/$blog_image");

        $insert_blogs = "INSERT INTO `blog` (blog_title, blog_predesc, blog_description, blog_image, blog_date, blog_author) VALUES ('$blog_title', '$blog_pre_desc', '$blog_description', '$target_file', NOW(), '$blog_author')";
        $result_query = mysqli_query($con, $insert_blogs);
        
        if ($result_query) {
            echo "<script>alert('Blog ajouté avec succès')</script>";
        }
        else {
            printf("Error message: %s\n", mysqli_error($con));
        }
        
    }
}



// fonction pour afficher les details d'article au côté admin
function admin_view_blog() {
    global $con;

    $blog_par_page = 4;  //Nombre de blog à afficher par page
    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle, par défaut 1

    // Calcule de l'offset pour la clause LIMIT de la requête SQL
    $offset = ($page_actuelle - 1) * $blog_par_page;

    $select_query = "Select * from `blog` order by blog_date desc LIMIT $offset, $blog_par_page";
    $result_select = mysqli_query($con, $select_query);
    while($row = mysqli_fetch_assoc($result_select)) {
        $blog_id = $row['blog_id'];
        $blog_title = $row['blog_title'];
        $blog_image = $row['blog_image'];
        $blog_author = $row['blog_author'];
        $blog_date = date('Y/m/d', strtotime($row['blog_date']));

        $comment_select = "Select count(*) as total_comment from comments where blog_id=$blog_id";
        $result_comment = mysqli_query($con, $comment_select);
        $row1 = mysqli_fetch_assoc($result_comment);
        $total_comment = $row1['total_comment'];

        $like_select = "Select count(*) as total_like from likes where blog_id=$blog_id";
        $result_like = mysqli_query($con, $like_select);
        $row2 = mysqli_fetch_assoc($result_like);
        $total_like = $row2['total_like'];

        $dislike_select = "Select count(*) as total_dislike from dislikes where blog_id=$blog_id";
        $result_dislikes = mysqli_query($con, $dislike_select);
        $row3 = mysqli_fetch_assoc($result_dislikes);
        $total_dislikes = $row3['total_dislike'];

        echo "<tr>";
        echo "<td><img src='$blog_image' alt='' width=40 height=40 style='border-radius: 50%;'></td>";
        echo "<td>".$blog_date."</td>";
        echo "<td>".$blog_title."</td>";
        echo "<td>".$blog_author."</td>";
        echo "<td>".$total_comment."</td>";
        echo "<td>".$total_like."</td>";
        echo "<td>".$total_dislikes."</td>";
        echo "<td><a href='admin_add_blog.php?deleteblog_id=$blog_id'><i class='fa-solid fa-trash'></i>S</a>  <a href='admin_update_blog.php?modifiedblog_id=$blog_id'><i class='fa-solid fa-pen-to-square'></i>M</a></td>";
        echo "</tr>";

    }
    echo " </tbody>
            </table>";
    // Ajout des liens de pagination en bas de la page
    $sql = "Select count(*) as total from blog";
    $resultat = mysqli_query($con, $sql);
    $donnees = mysqli_fetch_assoc($resultat);
    $total_blog = $donnees['total'];
    $nombre_pages = ceil($total_blog / $blog_par_page);


    echo '<div class="pagination">';
    if ($page_actuelle > 1) {
        echo '<a class="sl" href="?page=' . ($page_actuelle - 1) . '">Précedent</a>';
    }

    for ($i = 1; $i <= $nombre_pages; $i++) {
    $classe = ($i == $page_actuelle) ? "active" : "";
    echo '<a class="' . $classe . '" href="?page=' . $i . '">' . $i . '</a>';
    }

    if ($page_actuelle < $nombre_pages) {
    echo '<a class="sl" href="?page=' . ($page_actuelle + 1) . '">Suivant</a>';
    }
    echo '</div>';
}




// fonction pour supprimer un article
function delete_blog() {
    global $con;

    if(isset($_GET['deleteblog_id'])) {
        $blog_id = $_GET['deleteblog_id'];

        $delete_query = "delete from `blog` where blog_id=$blog_id";
        $result_delete = mysqli_query($con, $delete_query);
        if($result_delete) {
            echo "<script>alert('Article supprimer avec succès !')</script>";
            echo "<script>window.open('admin_add_blog.php','_self')</script>";
        }
    }
}







// fonction pour ajouter de marque
function add_brand() {
    global $con;

    if(isset($_POST['insert_brand'])) {
        $brand_title = $_POST['brand_title'];

        // selectionner des données de la base de donnée
        $select_query = "select * from `brands` where brand_title='$brand_title'";
        $result_select = mysqli_query($con, $select_query);
        $numver = mysqli_num_rows($result_select);

        if($numver>0) {
            echo "<script>alert('Cette marque existe déjà dans la base de donné')</script>";
        }
        else {
            $insert_query = "insert into `brands` (brand_title) values ('$brand_title')";
            $result = mysqli_query($con, $insert_query);
            if($result) {
            echo "<script>alert('La Marque ajouté avec succès !')</script>";
            }
        }

    }
}



// fonction pour ajouter catégorie
function add_category() {
    global $con;

    if(isset($_POST['insert_cat'])) {
        $category_title = $_POST['cat_title'];

        // selectionner des données de la base de donnée
        $select_query = "select * from `categories` where category_title='$category_title'";
        $result_select = mysqli_query($con, $select_query);
        $numver = mysqli_num_rows($result_select);

        if($numver>0) {
            echo "<script>alert('Ce catégorie existe déjà dans la base de donné')</script>";
        }
        else {
            $insert_query = "insert into `categories` (category_title) values ('$category_title')";
            $result = mysqli_query($con, $insert_query);
            if($result) {
            echo "<script>alert('Catégorie ajouté avec succès !')</script>";
            }
        }

    
    }
}




// Get catégories
function getcategories() {
    global $con;
     $select_cat = "select * from `categories`";
    $result_cat = mysqli_query($con, $select_cat);
    while($row_data = mysqli_fetch_assoc($result_cat)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<tr>";
        echo "<td>".$category_id."</td>";
        echo "<td>".$category_title."</td>";
        echo "<td><a href='admin_add_category.php?deletecat_id=$category_id'><i class='fa-solid fa-trash'></i>S</a>  <a href='admin_update_category.php?modifiedcat_id=$category_id'><i class='fa-solid fa-pen-to-square'></i>M</a></td>";
        echo "</tr>";
        }
}


// fonction pour supprimer une catégorie
function delete_category() {
    global $con;

    if(isset($_GET['deletecat_id'])) {
        $category_id = $_GET['deletecat_id'];

        $delete_query = "delete from `categories` where category_id=$category_id";
        $result_delete = mysqli_query($con, $delete_query);
        if($result_delete) {
            echo "<script>alert('Catégorie supprimer avec succès !')</script>";
            echo "<script>window.open('admin_add_category.php','_self')</script>";
        }
    }
}



// fonction pour récuperer les categorie dans la page boutique

function getcategoriesshop() {
    global $con;
     $select_cat = "select * from `categories`";
    $result_cat = mysqli_query($con, $select_cat);
    while($row_data = mysqli_fetch_assoc($result_cat)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<div class='content'>
        <a  href='shop.php?category=$category_id'>$category_title</a>
        </div>";
        }
}




// fonction pour récuperer les Marques
function getbrands() {
    global $con;
    $select_brands = "select * from `brands`";
                    $result_brands = mysqli_query($con, $select_brands);
                    //$row_data = mysqli_fetch_assoc($result_brands);
                    //echo $row_data['brand_title'];
                    while($row_data = mysqli_fetch_assoc($result_brands)) {
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id'];
                        echo "<tr>";
                        echo "<td>".$brand_id."</td>";
                        echo "<td>".$brand_title."</td>";
                        echo "<td><a href='admin_add_brand.php?deletebrand_id=$brand_id'><i class='fa-solid fa-trash'></i>S</a>  <a href='admin_update_brand.php?modifiedbr_id=$brand_id'><i class='fa-solid fa-pen-to-square'></i>M</a></td>";
                        echo "</tr>";
                    }
}



// fonction pour supprimer les marques
function delete_brand() {
    global $con;

    if(isset($_GET['deletebrand_id'])) {
        $brand_id = $_GET['deletebrand_id'];

        $delete_query = "delete from `brands` where brand_id=$brand_id";
        $result_delete = mysqli_query($con, $delete_query);
        if($result_delete) {
            echo "<script>alert('Marque supprimer avec succès !')</script>";
            echo "<script>window.open('admin_add_category.php','_self')</script>";
        }
    }
}


// fonction pour ajouter les coupons
function add_coupon() {
    global $con;

    if(isset($_POST['insert_coupon'])) {
        $coupon_title = $_POST['coupon_title'];
        $coupon_percentage = $_POST['coupon_percentage'];
        $coupon_author = $_POST['coupon_author'];

        $insert_query = "insert into `coupon` (coupon_title,coupon_percentage,coupon_author) values ('$coupon_title','$coupon_percentage','$coupon_author')";
        $result_insert = mysqli_query($con, $insert_query);
        if($result_insert) {
            echo "<script>alert('Coupon ajouté avec succès !')</script>";
        }
    }
}


// fonction pour récuperer les coupon
function view_coupon() {
    global $con;

    $select_query = "Select * from `coupon`";
    $result_query = mysqli_query($con, $select_query);
    while($row = mysqli_fetch_assoc($result_query)) {
        $coupon_id = $row['coupon_id'];
        $coupon_title = $row['coupon_title'];
        $coupon_percentage = $row['coupon_percentage'];
        $coupon_author = $row['coupon_author'];

        echo "<tr>";
        echo "<td scope='row'>".$coupon_title."</td>";
        echo "<td>".$coupon_percentage."</td>";
        echo "<td>".$coupon_author."</td>";
        echo "<td><a href='admin_add_coupon.php?deletecp_id=$coupon_id'><i class='fa-solid fa-trash'></i>S</a>  <a href='admin_update_coupon.php?modifiedcp_id=$coupon_id'><i class='fa-solid fa-pen-to-square'></i>M</a></td>";
        echo "</tr>";
    }
}


// fonction pour supprimer les coupons
function delete_coupon() {
    global $con;

    if(isset($_GET['deletecp_id'])) {
        $coupon_id = $_GET['deletecp_id'];

        $delete_query = "delete from `coupon` where coupon_id=$coupon_id";
        $result_delete = mysqli_query($con, $delete_query);
        if($result_delete) {
            echo "<script>alert('Coupon supprimé avec succès !')</script>";
            echo "<script>window.open('admin_add_coupon.php','_self')</script>";
        }
    }
}



// fonction pour afficher les abonnées das un tableau
function view_customers() {
    global $con; 

    $customers_par_page = 6;  //Nombre de customers à afficher par page

    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle, par défaut 1
    $offset = ($page_actuelle - 1) * $customers_par_page;

    $select_query = "Select * from `customers` order by date LIMIT $offset, $customers_par_page";
    $result_query = mysqli_query($con, $select_query);
    while($row = mysqli_fetch_assoc($result_query)) {
        $id = $row['id'];
        $email = $row['email'];
        $complete_name = $row['complete_name'];
        $profile_image = $row['profile_image'];
        $sexe = $row['sexe'];
        $address = $row['address'];
        $city = $row['city'];
        $department = $row['department'];
        $country = $row['country'];
        $zipcode = $row['zip_code'];
        $phone = $row['phone'];

        echo "<tr>";
        echo "<td><img src='../$profile_image' alt='' width=40 height=40 style='border-radius: 50%;'></td>";
        echo "<td>".$complete_name."</td>";
        echo "<td>".$email."</td>";
        echo "<td>".$sexe."</td>";
        echo "<td>".$city.", ".$department.", ".$country."</td>";
        echo "<td>".$phone."</td>";
        echo "<td><a href='admin_manage_customer.php?deletecus_id=$id'><i class='fa-solid fa-trash'></i>S</a>  <a href='admin_update_customer.php?modified_id=$id'><i class='fa-solid fa-pen-to-square'></i>M</a></td>";
        echo "</tr>";
    }
    echo " </tbody>
                </table>";
    echo '</div>';
    // Ajout des liens de pagination en bas de la page
    $sql = "Select count(*) as total from customers";
    $resultat = mysqli_query($con, $sql);
    $donnees = mysqli_fetch_assoc($resultat);
    $total_produits = $donnees['total'];
    $nombre_pages = ceil($total_produits / $customers_par_page);


    echo '<div class="pagination">';
    if ($page_actuelle > 1) {
        echo '<a class="sl" href="?page=' . ($page_actuelle - 1) . '">Précedent</a>';
    }

    for ($i = 1; $i <= $nombre_pages; $i++) {
    $classe = ($i == $page_actuelle) ? "active" : "";
    echo '<a class="' . $classe . '" href="?page=' . $i . '">' . $i . '</a>';
    }

    if ($page_actuelle < $nombre_pages) {
    echo '<a class="sl" href="?page=' . ($page_actuelle + 1) . '">Suivant</a>';
    }
    echo '</div>';
}



// fonction pour visualiser les abonnés sur le dashboard
function view_customers_dash() {
    global $con;

    $select_query = "Select * from `customers` order by date LIMIT 0,8";
    $result_query = mysqli_query($con, $select_query);
    while($row = mysqli_fetch_assoc($result_query)) {
        $id = $row['id'];
        $email = $row['email'];
        $complete_name = $row['complete_name'];
        $profile_image = $row['profile_image'];
        $sexe = $row['sexe'];
        $address = $row['address'];
        $city = $row['city'];
        $department = $row['department'];
        $country = $row['country'];
        $zipcode = $row['zip_code'];
        $phone = $row['phone'];

        echo "<tr>";
        echo "<td><img src='../$profile_image' alt='' width=40 height=40 style='border-radius: 50%;'></td>";
        echo "<td>".$complete_name."</td>";
        echo "<td>".$phone."</td>";
        echo "<td>".$city."</td>";
        echo "</tr>";

    }
}



// fonction qui retourne le nombre d'abooné qu'on a
function count_customers() {
    global $con;

    $sql = "Select count(*) as total from customers";
    $resultat = mysqli_query($con, $sql);
    $donnees = mysqli_fetch_assoc($resultat);
    $total_customers = $donnees['total'];

    return $total_customers;
}







// fonction pour supprimer un customer
function delete_customer() {
    global $con;

    if(isset($_GET['deletecus_id'])) {
        $id = $_GET['deletecus_id'];

        $delete_query = "delete from `customers` where id=$id";
        $result_delete = mysqli_query($con, $delete_query);
        if($result_delete) {
            echo "<script>alert('Abonner supprimé avec succès !')</script>";
            echo "<script>window.open('admin_manage_customer.php','_self')</script>";
        }
    }
}

// fonction pour visualiser les commandes
function admin_view_orders() {
    global $con;

    $orders_par_page = 6;  //Nombre de commande à afficher par page

    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle, par défaut 1
    $offset = ($page_actuelle - 1) * $orders_par_page;

    $select_query = "Select * from `orders` LIMIT $offset, $orders_par_page";
    $result_query = mysqli_query($con, $select_query);
    while($row = mysqli_fetch_assoc($result_query)) {
        $order_id = $row['order_id'];
        $customer_name = $row['customer_name'];
        $customer_address = $row['customer_address'];
        $customer_email = $row['customer_email'];
        $total_unique = $row['total_unique'];
        $coupon = $row['coupon'];
        $shipping = $row['shipping'];
        $total_price = $row['total_price'];
        $date = date('Y/m/d', strtotime($row['date']));
        $status = $row['status'];
        $payment = $row['payment'];


        echo "<tr>";
        echo "<td>".$order_id."</td>";
        echo "<td>".$customer_name."</td>";
        echo "<td>".$customer_address."</td>";
        echo "<td>".$customer_email."</td>";
        echo "<td>$".$total_unique."</td>";
        echo "<td>".$coupon."</td>";
        echo "<td>$".$shipping."</td>";
        echo "<td>$".$total_price."</td>";
        echo "<td>".$date."</td>";
        if($status == "En cour") {
            echo "<td><span class='status inProgress'>".$status."</span></td>";
        } elseif($status == "Suspendu") {
            echo "<td><span class='status pending'>".$status."</span></td>";
        } elseif($status == "Retourner") {
            echo "<td><span class='status return'>".$status."</span></td>";
        } else {
            echo "<td><span class='status delivered'>".$status."</span></td>";
        }
        
        if($payment == "Inpaye") {
            echo "<td><span class='status return'>".$payment."</span></td>";
        } else {
            echo "<td><span class='status delivered'>".$payment."</span></td>";
        }
        
        echo "<td><a href='admin_view_orders.php?deleteorder_id=$order_id'><i class='fa-solid fa-trash'></i>S</a>  <a href='admin_update_orders.php?modified_id=$order_id'><i class='fa-solid fa-pen-to-square'></i>M</a>";

        // fonctionnalité pour ajouté une commande (payé par le client et livrer) comme étant une vente
        // Cherchons d'abord si la commande n'a pas été déjà ajouté au panier
        $select_sell = "Select * from `sells` where order_id=$order_id";
        $result_sell = mysqli_query($con, $select_sell);
        $count_row = mysqli_num_rows($result_sell);
        if($count_row == 0) {
            if($status == "Livrer" and $payment == "Paye") {
                echo "<a style='text-decoration: none; margin-left: 8px;' href='admin_view_orders.php?add_id=$order_id'><span class='status delivered'>Ajouter au vente</span></a>";            
                if(isset($_GET['add_id'])) {
                    $sell_order_id = $_GET['add_id'];
    
                    $insert_query = "insert into `sells` (order_id,price,date) values ($sell_order_id,'$total_price',NOW())";
                    $result_insert = mysqli_query($con, $insert_query);
                    if($result_insert) {
                        echo "<script>alert('Commande ajoutée comme vente avec succès !')</script>";
                        echo "<script>window.open('admin_view_orders.php','_self')</script>";
                    }
                }
            }
        } else {
            if($status == "Livrer" and $payment == "Paye") {
                echo "<span style='margin-left: 8px' class='status delivered'>Vendu</span>";            
            }

        }
        
        echo "</td>";
        echo "</tr>";


    }
    echo " </tbody>
                </table>";
    //echo '</div>';

    // Ajout des liens de pagination en bas de la page
    $sql = "Select count(*) as total from orders";
    $resultat = mysqli_query($con, $sql);
    $donnees = mysqli_fetch_assoc($resultat);
    $total_produits = $donnees['total'];
    $nombre_pages = ceil($total_produits / $orders_par_page);


    echo '<div class="pagination">';
    if ($page_actuelle > 1) {
        echo '<a class="sl" href="?page=' . ($page_actuelle - 1) . '">Précedent</a>';
    }

    for ($i = 1; $i <= $nombre_pages; $i++) {
    $classe = ($i == $page_actuelle) ? "active" : "";
    echo '<a class="' . $classe . '" href="?page=' . $i . '">' . $i . '</a>';
    }

    if ($page_actuelle < $nombre_pages) {
    echo '<a class="sl" href="?page=' . ($page_actuelle + 1) . '">Suivant</a>';
    }
    echo '</div>';
}


// fonction pour visualiser les commandes dans le dashbord
function admin_view_orders_dash() {
    global $con;

    $select_query = "Select * from `orders` LIMIT 0,8";
    $result_query = mysqli_query($con, $select_query);
    while($row = mysqli_fetch_assoc($result_query)) {
        $order_id = $row['order_id'];
        $product_count = $row['product_number'];
        $total_price = $row['total_price'];
        $date = date('Y/m/d', strtotime($row['date']));
        $status = $row['status'];
        $payment = $row['payment'];


        echo "<tr>";
        echo "<td>".$product_count."</td>";
        echo "<td>$".$total_price."</td>";

        if($payment == "Inpaye") {
            echo "<td><span class='status return'>".$payment."</span></td>";
        } else {
            echo "<td><span class='status delivered'>".$payment."</span></td>";
        }

        if($status == "En cour") {
            echo "<td><span class='status inProgress'>".$status."</span></td>";
        } elseif($status == "Suspendu") {
            echo "<td><span class='status pending'>".$status."</span></td>";
        } elseif($status == "Retourner") {
            echo "<td><span class='status return'>".$status."</span></td>";
        } else {
            echo "<td><span class='status delivered'>".$status."</span></td>";
        }
        echo "</tr>";
        
       

    }

}


// fonction pour supprimer une commande
function delete_orders() {
    global $con;

    if(isset($_GET['deleteorder_id'])) {
        $order_id = $_GET['deleteorder_id'];

        $delete_query = "delete from `orders` where order_id=$order_id";
        $result_query = mysqli_query($con, $delete_query);
        if($result_query) {
            echo "<script>alert('Commande supprimée avec succès !')</script>";
            echo "<script>window.open('admin_view_orders.php','_self')</script>";
        }
    }
}


// fonction qui permet de calculer le nombre de vente
function sells_count() {
    global $con;

    $sql = "Select count(*) as total from sells";
    $resultat = mysqli_query($con, $sql);
    $donnees = mysqli_fetch_assoc($resultat);
    $total = $donnees['total'];

    return $total;
}




// fonction pour calculer le protefeuil de la boutique
function calculate_budget() {
    global $con;

    $sql = "Select sum(price) as total from sells";
    $resultat = mysqli_query($con, $sql);
    $donnees = mysqli_fetch_assoc($resultat);
    $total = $donnees['total'];
    
    return $total;
}


// fonction pour visualiser les ventes
function admin_view_sells() {
    global $con;

    $sells_par_page = 6;  //Nombre de vente à afficher par page

    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle, par défaut 1
    $offset = ($page_actuelle - 1) * $sells_par_page;

    $select_query = "Select * from `sells` LIMIT $offset, $sells_par_page";
    $result_query = mysqli_query($con, $select_query);
    while($row = mysqli_fetch_assoc($result_query)) {
        $sell_id = $row['sell_id'];
        $order_id = $row['order_id'];
        $price = $row['price'];
        $date_sell = date('Y/m/d H:i:s', strtotime($row['date']));

        $select_order = "Select * from `orders` where order_id=$order_id";
        $result_order = mysqli_query($con, $select_order);
        $row_data = mysqli_fetch_assoc($result_order);
        $customer_name = $row_data['customer_name'];
        $customer_email = $row_data['customer_email'];
        $order_date = date('Y/m/d H:i:s', strtotime($row_data['date']));

        echo "<tr>";
        echo "<td>".$sell_id."</td>";
        echo "<td>".$customer_name."</td>";
        echo "<td>".$customer_email."</td>";
        echo "<td>".$price."</td>";
        echo "<td>".$order_date."</td>";
        echo "<td>".$date_sell."</td>";
        echo "<td><a href=''><i class='fa-solid fa-trash'></i>S</a>  <a href=''><i class='fa-solid fa-pen-to-square'></i>M</a></td>";
        echo "</tr>";
        
    }
    echo " </tbody>
                </table>";
    //echo '</div>';

    // Ajout des liens de pagination en bas de la page
    $sql = "Select count(*) as total from sells";
    $resultat = mysqli_query($con, $sql);
    $donnees = mysqli_fetch_assoc($resultat);
    $total_produits = $donnees['total'];
    $nombre_pages = ceil($total_produits / $sells_par_page);


    echo '<div class="pagination">';
    if ($page_actuelle > 1) {
        echo '<a class="sl" href="?page=' . ($page_actuelle - 1) . '">Précedent</a>';
    }

    for ($i = 1; $i <= $nombre_pages; $i++) {
    $classe = ($i == $page_actuelle) ? "active" : "";
    echo '<a class="' . $classe . '" href="?page=' . $i . '">' . $i . '</a>';
    }

    if ($page_actuelle < $nombre_pages) {
    echo '<a class="sl" href="?page=' . ($page_actuelle + 1) . '">Suivant</a>';
    }
    echo '</div>';
}