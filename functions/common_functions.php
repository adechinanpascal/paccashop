<?php

// fonction de nom des pages
function page() {
    $nom_page = "";
    if(isset($_GET['pag'])) {
        $page_actuelle = $_GET['pag'];
        if($page_actuelle == 1) {
            $nom_page = "Acceuil";
        }
        elseif($page_actuelle == 2) {
            $nom_page = "Boutique";
        }
        elseif($page_actuelle == 3) {
            $nom_page = "Blog";
        }
        elseif($page_actuelle == 4) {
            $nom_page = "A propos";
        }
        elseif($page_actuelle == 5) {
            $nom_page = "Contacte";
        }
        elseif($page_actuelle == 6) {
            $nom_page = "Connexion";
        }
        elseif($page_actuelle == 7) {
            $nom_page = "S'abonner";
        }
        elseif($page_actuelle == 8) {
            $nom_page = "Panier";
        }
        else {
            $nom_page = "Pacca Shop";
        }
        return $nom_page;
    }
}


// include fichier connexion
include_once('./includes/connect.php');

// Get produits
function getproducts() {
    global $con;
     $select_query = "Select * from `products` order by rand() LIMIT 0,8";
            $result_query = mysqli_query($con, $select_query);
            //$row = mysqli_fetch_assoc($result_query);
            while($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                $brand_query = "Select brand_title from `brands` where brand_id=$brand_id";
                $brand_result = mysqli_query($con, $brand_query);
                $row = mysqli_fetch_assoc($brand_result);
                $brand_title = $row['brand_title'];

                echo "<div class='pro'>
            <img src='./product_images/$product_image1' alt=''>
            <div class='des'>
                <span>$brand_title</span>
                <h5>$product_title</h5>
                <div class='star'>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                </div>
                <h4>$$product_price</h4>
            </div>
            <a href='index.php?add_to_cart=$product_id'><i class='fal fa-shopping-cart cart'></i></a>
            <a href='product.php?product_id=$product_id'><i style='right: 60px;' class='fal fa-eye cart'></i></a>
            </div>";

            }
}



// Get Produit nouveau arrivé

function getnewproduct() {
    global $con;
     $select_query_new = "Select * from `products` where product_keywords='Nouveau' order by rand() LIMIT 0,8";
            $result_query_new = mysqli_query($con, $select_query_new);
            //$row = mysqli_fetch_assoc($result_query);
            while($row_new = mysqli_fetch_assoc($result_query_new)) {
                $product_id = $row_new['product_id'];
                $product_title = $row_new['product_title'];
                $product_description = $row_new['product_description'];
                $product_image1 = $row_new['product_image1'];
                $product_price = $row_new['product_price'];
                $category_id = $row_new['category_id'];
                $brand_id = $row_new['brand_id'];

                $brand_query = "Select brand_title from `brands` where brand_id=$brand_id";
                $brand_result = mysqli_query($con, $brand_query);
                $row = mysqli_fetch_assoc($brand_result);
                $brand_title = $row['brand_title'];

                echo "<div class='pro'>
            <img src='./product_images/$product_image1' alt=''>
            <div class='des'>
                <span>$brand_title</span>
                <h5>$product_title</h5>
                <div class='star'>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                </div>
                <h4>$$product_price</h4>
            </div>
            <a href='index.php?add_to_cart=$product_id'><i class='fal fa-shopping-cart cart'></i></a>
            <a href='product.php?product_id=$product_id'><i style='right: 60px;' class='fal fa-eye cart'></i></a>
            </div>";
            }
}









//==================================== Publique Panel ========================================
// Afficher les produits dans la boutique
function getproductschop($produits_par_page) {
    global $con;


    // Afficher les produits par catégories
    if(isset($_GET['category'])) {
    $category_id = $_GET['category'];
     $select_query = "Select * from `products` where category_id=$category_id order by product_title";
            $result_query = mysqli_query($con, $select_query);
            //$row = mysqli_fetch_assoc($result_query);
            while($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                $brand_query = "Select brand_title from `brands` where brand_id=$brand_id";
                $brand_result = mysqli_query($con, $brand_query);
                $row = mysqli_fetch_assoc($brand_result);
                $brand_title = $row['brand_title'];

                echo "<div class='pro'>
            <img src='./product_images/$product_image1' alt=''>
            <div class='des'>
                <span>$brand_title</span>
                <h5>$product_title</h5>
                <div class='star'>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                </div>
                <h4>$$product_price</h4>
            </div>
            <a href='shop.php?add_to_cart=$product_id'><i class='fal fa-shopping-cart cart'></i></a>
            <a href='product.php?product_id=$product_id'><i style='right: 60px;' class='fal fa-eye cart'></i></a>
            </div>";

            }


    } 
    else {
        // Afficher les produits en pagination dans la page boutique

            //$produits_par_page =  Nombre de produits à afficher par page

            $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle, par défaut 1

            // Calcule de l'offset pour la clause LIMIT de la requête SQL
            $offset = ($page_actuelle - 1) * $produits_par_page;

            $select_query = "Select * from `products` order by product_title LIMIT $offset, $produits_par_page";
                    $result_query = mysqli_query($con, $select_query);
                    //$row = mysqli_fetch_assoc($result_query);
                    while($row = mysqli_fetch_assoc($result_query)) {
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_image1 = $row['product_image1'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];

                        $brand_query = "Select brand_title from `brands` where brand_id=$brand_id";
                        $brand_result = mysqli_query($con, $brand_query);
                        $row = mysqli_fetch_assoc($brand_result);
                        $brand_title = $row['brand_title'];

                        echo "<div class='pro'>
                    <img src='./product_images/$product_image1' alt=''>
                    <div class='des'>
                        <span>$brand_title</span>
                        <h5>$product_title</h5>
                        <div class='star'>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                        </div>
                        <h4>$$product_price</h4>
                    </div>
                    <a href='shop.php?add_to_cart=$product_id'><i class='fal fa-shopping-cart cart'></i></a>
                    <a href='product.php?product_id=$product_id'><i style='right: 60px;' class='fal fa-eye cart'></i></a>
                    </div>";

                    }
                    echo '</div>';
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
}



// Fonction pour visualiser un produit
function get_unique_product() {
    global $con;

    if(isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        echo "<section class='section-p1' id='prodetails'>";
        
        $select_query = "Select * from `products` where product_id=$product_id";
            $result_query = mysqli_query($con, $select_query);
            //$row = mysqli_fetch_assoc($result_query);
            while($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];

                $brand_query = "Select brand_title from `brands` where brand_id=$brand_id";
                $brand_result = mysqli_query($con, $brand_query);
                $row = mysqli_fetch_assoc($brand_result);
                $brand_title = $row['brand_title'];

                $cat_query = "Select category_title from `categories` where category_id=$category_id";
                $cat_result = mysqli_query($con, $cat_query);
                $row = mysqli_fetch_assoc($cat_result);
                $category_title = $row['category_title'];

                echo "<div class='single-pro-image'>
                        <img src='./product_images/$product_image1' width='100%' id='MainImg' alt=''>

                        <div class='small-img-group'>
                            <div class='small-img-col'>
                                <img src='./product_images/$product_image1' width='100%' class='small-img' alt=''>
                            </div>

                            <div class='small-img-col'>
                                <img src='./product_images/$product_image2' width='100%' class='small-img' alt=''>
                            </div>

                            <div class='small-img-col'>
                                <img src='./product_images/$product_image3' width='100%' class='small-img' alt=''>
                            </div>
                        </div>
                    </div>

                    <div class='single-pro-details'>
                        <h6>$brand_title / $category_title</h6>
                        <h4>$product_title</h4>
                        <h2>$$product_price</h2>
                        <input type='number' name='number' value='1'>
                        <a href='product.php?add_to_cart=$product_id'><button class='normal' type='submit'>Ajouter au Panier</button></a>
                        <h4>Détails Produit</h4>
                        <span>$product_description</span>
                    </div>
                    ";

            }
            echo "</section>";

                    // Afficher les produits similaires

                    echo "<section id='product1' class='section-p1'>
                                <h2>Produits Similaires</h2>
                                <p>collection Eté - Nouveau Design Moderne</p>
                                <div class='pro-container'>";

                    $select_query = "Select * from `products` where category_id=$category_id order by rand() LIMIT 0,8";
                    $result_query = mysqli_query($con, $select_query);
                    //$row = mysqli_fetch_assoc($result_query);
                    while($row = mysqli_fetch_assoc($result_query)) {
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_image1 = $row['product_image1'];
                        $product_image2 = $row['product_image2'];
                        $product_image3 = $row['product_image3'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];

                        $brand_query = "Select brand_title from `brands` where brand_id=$brand_id";
                        $brand_result = mysqli_query($con, $brand_query);
                        $row = mysqli_fetch_assoc($brand_result);
                        $brand_title = $row['brand_title'];

                        echo "
                                <div class='pro'>
                                <img src='./product_images/$product_image1' alt=''>
                                <div class='des'>
                                    <span>$brand_title</span>
                                    <h5>$product_title</h5>
                                    <div class='star'>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                    </div>
                                    <h4>$$product_price</h4>
                                </div>
                                <a href='product.php?add_to_cart=$product_id'><i class='fal fa-shopping-cart cart'></i></a>
                                <a href='product.php?product_id=$product_id'><i style='right: 60px;' class='fal fa-eye cart'></i></a>
                                </div>
                                ";


                    }
                    echo "</div>
                            </section>";

           
    }
}


// fonction pour recherche produit
function search_product() {
    global $con;

    if(isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
    $search_query = "Select * from `products` where product_keywords like '%$search_data_value%'";
                    $result_query = mysqli_query($con, $search_query);
                    //$row = mysqli_fetch_assoc($result_query);
                    $num_of_rows = mysqli_num_rows($result_query);
                    if($num_of_rows == 0) {
                        echo "<h3 style='text-align: center;'>Aucun produit de ce mot clé ou de cette catégorie</h3>";
                    }
                    while($row = mysqli_fetch_assoc($result_query)) {
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_image1 = $row['product_image1'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];

                        $brand_query = "Select brand_title from `brands` where brand_id=$brand_id";
                        $brand_result = mysqli_query($con, $brand_query);
                        $row = mysqli_fetch_assoc($brand_result);
                        $brand_title = $row['brand_title'];

                        echo "<div class='pro'>
                    <img src='./product_images/$product_image1' alt=''>
                    <div class='des'>
                        <span>$brand_title</span>
                        <h5>$product_title</h5>
                        <div class='star'>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                            <i class='fas fa-star'></i>
                        </div>
                        <h4>$$product_price</h4>
                    </div>
                    <a href='search_product.php?add_to_cart=$product_id'><i class='fal fa-shopping-cart cart'></i></a>
                    <a href='product.php?product_id=$product_id'><i style='right: 60px;' class='fal fa-eye cart'></i></a>
                    </div>";

                }

    }
}




// fonction pour avoir l'adresse ip d'une machine
function getIPAddress() {
    //whether ip is from the share internet
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }

    // whether ip is from the proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // whether ip is from the remote address
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}



// fonction pour ajouter produit au panier
function cart() {
    global $con;

    if(isset($_GET['add_to_cart'])) {
        
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from `cart` where ip_address='$get_ip_add' and product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows>0) {
            echo "<script>alert('Ce produit est déjà ajouté au panier')</script>";
            echo "<script>window.open('shop.php','_self')</script>";
        }else {
            $insert_cart = "insert into `cart` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',1)";
            $result_query2 = mysqli_query($con, $insert_cart);
            echo "<script>alert('Produit ajouté au panier')</script>";
            echo "<script>window.open('shop.php','_self')</script>";
        }

    }
}

// fonction pour avoir le nombre total de produit dans le panier d'un visiteur sur le site
function get_total_cart() {
    global $con;

     $get_ip_add = getIPAddress();
     $select_query = "Select * from `cart` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

    return $num_of_rows;
}




// fonction pour avoir une coupon appliquer
function get_coupon() {
    global $con;

    if(isset($_POST['apply'])) {
        $coupon_title = $_POST['coupon'];

        $select_query = "Select * from `coupon` where coupon_title='$coupon_title'";
        $result_query = mysqli_query($con, $select_query);
        $row = mysqli_fetch_assoc($result_query);
        $coupon_percentage = $row['coupon_percentage'];
    }else {
        $coupon_percentage = 0;
    }
    return $coupon_percentage;
}








// fonction pour afficher les produit ajouter au panier dans la page cart
function view_cart($shipping) {
    global $con;
    // inserer l'addresse ip de l machine dans la variable $get_ip_add
    $get_ip_add = getIPAddress();
    $select_query = "Select * from `cart` where ip_address='$get_ip_add'";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if($num_of_rows == 0) {
        echo "<h3 style='text-align: center; margin-top: 200px; margin-bottom: 200px;'>Le Panier est vide !</h3>";
    }else {

        echo "<section id='cart' class='section-p1'>
                    <table width='100%'>
                        <thead>
                            <tr>
                                <td>Supprimer</td>
                                <td>Image</td>
                                <td>Produit</td>
                                <td>Prix</td>
                                <td>Quantité</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>";
        $total_cart = 0;
        $order_infos = "";
        $product_title = "";
        $product_price = "";
        $quantity = 0;
        $total_unitaire = 0;
        $i = 1;
        while($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $ip_address = $row['ip_address'];
            $quantity = $row['quantity'];

            // rêquete pour avoir les données propre à chaque produit dans le panier
            $select_query_pro = "Select * from `products` where product_id=$product_id";
            $result_query_pro = mysqli_query($con, $select_query_pro);
            $row_pro = mysqli_fetch_assoc($result_query_pro);
            $product_title = $row_pro['product_title'];
            $product_description = $row_pro['product_description'];
            $product_image1 = $row_pro['product_image1'];
            $product_price = $row_pro['product_price'];
            $category_id = $row_pro['category_id'];
            $brand_id = $row_pro['brand_id'];

            // Les calcules de total et autre
            
            
            $total_unitaire = $quantity * $product_price;
            $total_cart += $total_unitaire;
            $total_pre = $total_cart + $shipping;
            $coupon = get_coupon();
            $total_coupon = $total_cart * $coupon;
            $total = $total_pre - $total_coupon;


            echo "
                            <tr>
                                <td><a href='cart.php?product_id_cart=$product_id'><i class='far fa-times-circle'></i></a></td>
                                <td><img src='./product_images/$product_image1' alt=''></td>
                                <td>$product_title</td>
                                <td>$$product_price</td>
                                <td><input type='number' name='quantity'  min='1' ></td>
                                <td>$$total_unitaire</td>
                            </tr>
                       ";
            

                       $order_infos = $order_infos."<br><br><strong> $i-</strong>  $product_title <br>    Prix Unitaire : $$product_price <br>     Quantité : $quantity <br>    Prix total produit : $$total_unitaire";
                       $i += 1;
        }
        $coupon_title = "";
        if(isset($_POST['apply'])) {
            $coupon_title = $_POST['coupon'];
        }
       // echo $order_infos;

        echo " </tbody>
                    </table>
                </section>
                
                
                <section id='cart-add' class='section-p1'>
                    <div id='coupon'>
                        <h3>Appliquer Coupon</h3>
                        <div><form action='cart.php' method='post'>
                            <input type='text' name='coupon' placeholder='Entrer votre coupon'>
                            <input type='submit' class='normal btn' name='apply' value='Appliquer'></input>
                            </form>
                        </div>
                    </div>

                    <div id='subtotal'>
                        <h3>Total Panier</h3>
                        <table>
                            <tr>
                                <td>Total Panier</td>
                                <td>$$total_cart</td>
                            </tr>
                            <tr>
                                <td>Livraison</td>
                                <td>$$shipping</td>
                            </tr>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td><strong>$$total</strong></td>
                            </tr>
                        </table>
                        <a href='checkout.php?order_infos=$order_infos&coupon=$coupon&total_cart=$total_cart&shipping=$shipping&total=$total&total_coupon=$total_coupon&number=$i&coupon_title=$coupon_title'><button class='normal' type='submit' name='proced'>Passer au paiement</button></a>
                    </div>
                </section>";
    }

}



// fonction pour supprimer les produit dans le panier
function delete_product_cart() {
    global $con;

    if(isset($_GET['product_id_cart'])) {
        $product_id = $_GET['product_id_cart'];
        $get_ip_add = getIPAddress();

        $delete_query = "delete from `cart` where ip_address='$get_ip_add' and product_id=$product_id";
        $result_query = mysqli_query($con, $delete_query);
        if($result_query) {
            echo "<script>alert('Produit supprimer avec succès')</script>";
            echo "<script>window.open('cart.php','_self')</script>";
        }
    }
}





// fonction pour afficher les blogs
function show_blog($blog_par_page) {
    global $con;

    //$blog_par_page =  Nombre de produits à afficher par page

            $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle, par défaut 1

            // Calcule de l'offset pour la clause LIMIT de la requête SQL
            $offset = ($page_actuelle - 1) * $blog_par_page;

            $select_query = "Select * from `blog` order by blog_date LIMIT $offset, $blog_par_page";
                    $result_query = mysqli_query($con, $select_query);
                    //$row = mysqli_fetch_assoc($result_query);
                    echo "<section id='blog'>";
                    while($row = mysqli_fetch_assoc($result_query)) {
                        $blog_id = $row['blog_id'];
                        $blog_title = $row['blog_title'];
                        $blog_pre_desc = $row['blog_predesc'];
                        $blog_image = $row['blog_image'];
                        $blog_author = $row['blog_author'];
                        $blog_date = date('m/d', strtotime($row['blog_date'])); 
                        

                        

                        echo "
                                <div class='blog-box'>
                                    <div class='blog-img'>
                                        <img src='$blog_image' alt=''>
                                    </div>

                                    <div class='blog-details'>
                                        <h4>$blog_title</h4>
                                        <p>
                                            $blog_pre_desc
                                        </p>
                                        <a href='blog_single.php?blog_id=$blog_id'>CONTINUER DE LIRE</a>
                                    </div>
                                    <h1>$blog_date</h1>
                                </div>";

                    }
                    echo "</section>";

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



// fonction pour continuer la lecture de blogs
function show_blog_more() {
    global $con;

    if(isset($_GET['blog_id'])) {
        $blog_id = $_GET['blog_id'];

        $select_query = "Select * from `blog` where blog_id=$blog_id";
        $result_query = mysqli_query($con, $select_query);
        $row = mysqli_fetch_assoc($result_query);
        $blog_id = $row['blog_id'];
        $blog_title = $row['blog_title'];
        $blog_pre_desc = $row['blog_predesc'];
        $blog_description = $row['blog_description'];
        $blog_image = $row['blog_image'];
        $blog_author = $row['blog_author'];
        $blog_date = date('m/d', strtotime($row['blog_date']));


        echo "<section id='page-header1' class='blog-header' style='background-image: url($blog_image); background-size: cover; background-position: center; background-color: rgba(0, 0, 0, 0.2);'>
  
                <h2>#Blog</h2>
                
                <p>Lisez toutes les études de cas sur nos produits !</p>
                
            </section>


            <section id='blog-single' class='section-p1'>
                <div class='single-details'>
                    <h2>$blog_title</h2>
                    <p>
                        $blog_description
                    </p>
                </div>

                <div class='single-bottom'>
                    <div class='rond'></div>
                    <span>$blog_author</span>
                    <div class='rond1'></div>
                    <span>$blog_date</span>";


                $select_total_like = "Select count(*) as total_like from likes where blog_id=$blog_id";
                $result_total_like = mysqli_query($con, $select_total_like);
                $donnees = mysqli_fetch_assoc($result_total_like);
                $total_like = $donnees['total_like'];


                $select_total_dislike = "Select count(*) as total_dislike from dislikes where blog_id=$blog_id";
                $result_total_dislike = mysqli_query($con, $select_total_dislike);
                $donnees2 = mysqli_fetch_assoc($result_total_dislike);
                $total_dislike = $donnees2['total_dislike'];


                
                $ip_address = getIPAddress();
                $select_like = "Select * from `likes` where blog_id=$blog_id and ip_address='$ip_address'";
                $result_like = mysqli_query($con, $select_like);
                $check_like = mysqli_num_rows($result_like);

                $select_dislike = "Select * from `dislikes` where blog_id=$blog_id and ip_address='$ip_address'";
                $result_dislike = mysqli_query($con, $select_dislike);
                $check_dislike = mysqli_num_rows($result_dislike);

                if($check_like == 1) {
                    echo "<a class='like' style='color: #088178; text-decoration: none;' href='blog_single.php?t=1&blog_id=$blog_id'><i class='fa fa-thumbs-up'></i> $total_like</a>
                    <a class='unlike' style='text-decoration: none;' href='blog_single.php?t=2&blog_id=$blog_id'><i class='fa fa-thumbs-down'></i> $total_dislike</a>";
                }
                elseif($check_dislike == 1) {
                    echo "<a class='like' style='text-decoration: none;' href='blog_single.php?t=1&blog_id=$blog_id'><i class='fa fa-thumbs-up'></i> $total_like</a>
                    <a class='unlike' style='color: #088178; text-decoration: none;' href='blog_single.php?t=2&blog_id=$blog_id'><i class='fa fa-thumbs-down'></i> $total_dislike</a>";
                }
                else {
                    echo "<a class='like' style='text-decoration: none;' href='blog_single.php?t=1&blog_id=$blog_id'><i class='fa fa-thumbs-up'></i> $total_like</a>
                    <a class='unlike' style='text-decoration: none;' href='blog_single.php?t=2&blog_id=$blog_id'><i class='fa fa-thumbs-down'></i> $total_dislike</a>";
                }

                
                
               echo "</div>
            </section>
            
            <section id='comments' class='section-p1'>
                <div class='comment-container'>
                    <h2>Commentez le blog <i class='fa fa-smile'></i></h2>
                    <div class='comment-form'>
                        <form action='' method='post'>
                            <label for='comment_name'>Nom</label>
                            <input class='form-controle1' type='text' name='comment_name' placeholder='Votre nom complet' required='required'>

                            <label for='comment_content'>Commentaire</label><br><br>
                            <input class='form-controle2' type='text' name='comment_content' placeholder='Votre commentaire ici' required='required'>

                            <input type='submit' name='insert_comment' value='' class='submit-button'>
                            <span class='icon-comment form-controle2'><i class='fa fa-paper-plane'></i></span>
                        </form>
                    </div>

                    ";


                    $select_comment_query = "Select * from `comments` where blog_id=$blog_id order by date LIMIT 0,9";
                    $result_comment_query = mysqli_query($con, $select_comment_query);
                    //$row = mysqli_fetch_assoc($result_query);
                    while($row_comment = mysqli_fetch_assoc($result_comment_query)) {
                        $comment_id = $row_comment['comment_id'];
                        $comment_author = $row_comment['comment_author'];
                        $comment_content = $row_comment['comment_content'];
                        $date = date('m/d à H:i:s', strtotime($row_comment['date']));



                    echo "<div class='comment-list'>
                            <div class='comment-info'>
                                <div class='list-img'>
                                    <img src='img/user.png' alt=''>
                                </div>
                                <div class='list-detail'>
                                    <h4>$comment_author</h4>
                                    <span>Publier le $date</span>
                                    
                                </div>
                            </div>

                            <div class='comment-content'>
                                <p>$comment_content</p>
                            </div>
                        </div><br>";
                }

                echo "</div>
                        </section>";
    }
}


// fonction pour envoyer un commentaire dans la base de donnée
function add_comment() {
    global $con;

    if(isset($_POST['insert_comment'])) {
        $blog_id = $_GET['blog_id'];
        $ip_address = getIPAddress();

        $comment_author = mysqli_real_escape_string($con, $_POST['comment_name']);
        $comment_content = mysqli_real_escape_string($con, $_POST['comment_content']);


        $insert_comment = "INSERT INTO `comments` (comment_author, comment_content, blog_id, ip_address, date) VALUES ('$comment_author', '$comment_content', $blog_id, '$ip_address', NOW())";
        $result_query = mysqli_query($con, $insert_comment);
        
        if ($result_query) {
            echo "<script>alert('Commentaire envoyé avec succès')</script>";
            echo "<script>window.open('blog_single.php?blog_id=$blog_id','_self')</script>";
        }
        else {
            printf("Error message: %s\n", mysqli_error($con));
        }


    }
}



// fonction de système de like et dislike
function action_blog() {
    global $con;

    if(isset($_GET['t'], $_GET['blog_id']) AND !empty($_GET['t']) AND !empty($_GET['blog_id'])) {
        $blog_id = $_GET['blog_id'];
        $action = $_GET['t'];
        $ip_address = getIPAddress();

        $slect_query1 = "Select * from `blog` where blog_id=$blog_id";
        $result_query1 = mysqli_query($con, $slect_query1);

        $check1 = mysqli_num_rows($result_query1);
        if($check1 == 1) {
            if($_GET['t'] == 1) {
                $select_query2 = "Select * from `likes` where blog_id=$blog_id and ip_address='$ip_address'";
                $result_query2 = mysqli_query($con, $select_query2);

                $delete_query3 = "delete from `dislikes` where blog_id=$blog_id and ip_address='$ip_address'";
                $result_delete3 = mysqli_query($con, $delete_query3);

                $check2 = mysqli_num_rows($result_query2);
                if($check2 == 1) {
                    $delete_query1 = "delete from `likes` where blog_id=$blog_id and ip_address='$ip_address'";
                    $result_delete1 = mysqli_query($con, $delete_query1);
                    if($result_delete1) {
                        echo "<script>window.open('blog_single.php?blog_id=$blog_id','_self')</script>";
                    }
                }
                else {
                    $insert_query1 = "insert into `likes` (blog_id, ip_address) values ($blog_id, '$ip_address')";
                    $result_insert1 = mysqli_query($con, $insert_query1);
                    if($result_insert1) {
                        echo "<script>window.open('blog_single.php?blog_id=$blog_id','_self')</script>";
                    }
                }
            }
            elseif($_GET['t'] == 2) {
                $select_query2 = "Select * from `dislikes` where blog_id=$blog_id and ip_address='$ip_address'";
                $result_query2 = mysqli_query($con, $select_query2);

                $delete_query4 = "delete from `likes` where blog_id=$blog_id and ip_address='$ip_address'";
                $result_delete4 = mysqli_query($con, $delete_query4);

                $check2 = mysqli_num_rows($result_query2);
                if($check2 > 0) {
                    $delete_query1 = "delete from `dislikes` where blog_id=$blog_id and ip_address='$ip_address'";
                    $result_delete1 = mysqli_query($con, $delete_query1);
                    if($result_delete1) {
                        echo "<script>window.open('blog_single.php?blog_id=$blog_id','_self')</script>";
                    }
                }
                else {
                    $insert_query1 = "insert into `dislikes` (blog_id, ip_address) values ($blog_id, '$ip_address')";
                    $result_insert1 = mysqli_query($con, $insert_query1);
                    if($result_insert1) {
                        echo "<script>window.open('blog_single.php?blog_id=$blog_id','_self')</script>";
                    }
                }
            }
            else {
                header('Loation: http://localhost/ecommerce/blog_single.php?blog_id='.$blog_id);
            }    
            exit('Erreur Fatale');
        }
        exit("Erreur Fatale <a href='index.php'>Page d'acceuil </a>");
    }
}


// fonction pour qu'un client s'inscrire
function add_customer() {
    global $con;

    if(isset($_POST['insert_customer'])) {
        $email = mysqli_real_escape_string($con, $_POST['emailaddress']);
        $complete_name = mysqli_real_escape_string($con, $_POST['complete_name']);
        $sexe = $_POST['sexe'];
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $city = mysqli_real_escape_string($con, $_POST['city']);
        $department = mysqli_real_escape_string($con, $_POST['department']);
        $country = mysqli_real_escape_string($con, $_POST['country']);
        $zip_code = mysqli_real_escape_string($con, $_POST['zipcode']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $password1 = $_POST['password'];
        $repassword = $_POST['repassword'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        

        // Acceder aux tmp nom images
        $target_dir = "customers_images/";
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);

        if($password1 == $repassword) {
            $insert_query = "insert into `customers` (email,complete_name,profile_image,sexe,address,city,department,country,zip_code,phone,password,date) values ('$email','$complete_name','$target_file','$sexe','$address','$city','$department','$country','$zip_code','$phone','$password',NOW())";
            $result_query = mysqli_query($con, $insert_query);
            if($result_query) {
                echo "<script>alert('Compte créer avec succès !')</script>";
                echo "<script>window.open('signin.php','_self')</script>";
            }
        }
    }
}



// fonction pour déconnecter l'adminstrateur
function customer_logout_index() {
    if(isset($_GET['logout'])) {
        session_destroy();
        header('location:index.php');
    }
}

// fonction pour q'un abonnée puisse passer une commandes
function pass_order() {
    global $con;

    $product_list = $_GET['order_infos'];
    $coupon = $_GET['coupon'];
    $total_cart = $_GET['total_cart'];
    $shipping = $_GET['shipping'];
    $total_coupon = $_GET['total_coupon'];
    $total = $_GET['total'];
    $product_count = $_GET['number'];
    $product_number = $product_count - 1;
    $coupon_title = $_GET['coupon_title'];

    // acceder à l'id du client si il est un abonné
    $customer_id = (isset($_SESSION['customer']))? $_SESSION['customer']['id']: NULL;


    if(isset($_POST['payement'])) {
        $customer_name = $_POST['name'];
        $customer_address = mysqli_real_escape_string($con, $_POST['address']);
        $customer_zipcode = $_POST['zipcode'];
        $customer_phone = $_POST['phone'];
        $customer_email = $_POST['email'];

        // acceder à l'adresse de résidence si l'abonné clique sur le checkbox
        $facturation = $_POST['facturation'];
         $facturation_address = $_POST['facturation_address'];
        
        

        $name_card = $_POST['name_card'];
        $card_number = $_POST['card_number'];
        $expiration_date = $_POST['expiration_date'];
        $cvv_card = $_POST['cvv_card'];

        // acceder à l'adresse de résidence si l'abonné clique sur le checkbox
        $facturation_ca = $_POST['facturation_ca'];
        $facturation_card = $_POST['facturation_card'];



        if($facturation == "on") {
            $facturation_address = $customer_address;
        } 
        if($facturation_ca == "on") {
            $facturation_card = $customer_address;
        } 

        echo "<script>window.open('#validation','_self')</script>"; 

        echo "<section id='validation' class='payment'>
        <div class='validate-container'>
            <div style='display: flex; justify-content: space-between;' class='info1'>
                <div>
                    <h3><strong>Liste des produits :</strong></h3>
                    <p>$product_list</p>
                </div>
                <div style='margin-left: 80px' >
                    <h3><strong>Information de Livraison</strong></h3><br>
                    <p>Nom : $customer_name</p>
                    <p>Adresse : $customer_address</p>
                    <p>Code Postal : $customer_zipcode</p>
                    <p>Téléphone : $customer_phone</p>
                    <p>Email : $customer_email</p><br>
                </div>
            </div>

            <h3><strong>Information de Paiement</strong></h3>
            <div class='info2'>
                
                    <p>Propriétaire de la carte : $name_card</p>
                    <p>Numéro de la carte : $card_number</p>
            </div>

            <div class='info3'>
                <p>code de la carte : $cvv_card</p>
                <p>Date d'expiration : $expiration_date</p><br>
            </div>

            <h3><strong>Résumé de la commande</strong></h3>
            <div class='info4'>
            <p>Total Brute : $$total_cart</p>
            <p>Livraison : $$shipping</p>
            </div>";

            echo "<div class='info5'>";
            if($coupon == 0) {
                echo "<p>Coupon : Pas de coupon appliquer<p>";
            } else {
                $coupon_final = $coupon * 100; 
                echo "<p>Coupon : $coupon_title ( $coupon_final% )</p>";
            }

            echo "<p>Montant à déduit : $$total_coupon</p>
                </div>

                <div class='info6'>
                <p>Nombre de produit : $product_number</p>
                <h5 style='font-size: 1rem;'>Coût total :  $$total </h5><br><br>
                </div>

                <h3><strong>Information de facturation</strong></h3>
                <div class='info6'>
                <p>Adresse de facturation : $facturation_address</p>
                <p>Adresse de facturation associé à la carte : $facturation_card </p><br>
                </div>
            <div style='display: flex; margin-top: 40px'>
            <a href='cart.php' class='button-return'>Retour</a>
            </div>


            </div>
            </section>";


            $insert_query = "insert into `orders` (product_number,product_list,coupon,total_unique,shipping,
            total_coupon,total_price,customer_id,customer_name,customer_email,customer_address,customer_zipcode,customer_phone,
            facturation_address,name_card,card_number,card_cvv,date_expiration_card,facturation_address_card,date)
            values ('$product_number','$product_list','$coupon','$total_cart','$shipping','$total_coupon','$total',$customer_id,
            '$customer_name','$customer_email','$customer_address','$customer_zipcode','$customer_phone','$facturation_address',
            '$name_card','$card_number','$cvv_card','$expiration_date','$facturation_card',NOW())";

            $result_query = mysqli_query($con, $insert_query);
            if($result_query) {
                echo "<script>alert('Commande passé avec succès')</script>";
                
            }
        

        
        
    }
}



?>