<?php

// include fichier connexion
include_once('../includes/connect.php');


// fonction permettant à l'administrateur de se connecter au dashboard
function customer_connexion() {
    global $con;

    if(isset($_POST['connect_customer'])) {
        $emailaddress = $_POST['emailaddress'];
        $password = $_POST['password'];

        $select_query = "Select * from `customers` where email='$emailaddress'";
        $result_query = mysqli_query($con, $select_query);
        $row = mysqli_fetch_assoc($result_query);

        $customer_id = $row['id'];
        $password_define = $row['password'];
        $emailaddress_deifne = $row['email'];
        $complete_name = $row['complete_name'];
        $sexe = $row['sexe'];
        $profile_image = $row['profile_image'];
        $address = $row['address'];
        $city = $row['city'];
        $department = $row['department'];
        $country = $row['country'];
        $zip_code = $row['zip_code'];
        $phone = $row['phone'];
    


        if(password_verify($password, $password_define)) {
            session_start();
            $_SESSION['customer'] = [
                'id' => $customer_id,
                'email' => $emailaddress_deifne,
                'complete_name' => $complete_name,
                'sexe' => $sexe,
                'profile_image' => $profile_image,
                'address' => $address,
                'city' => $city,
                'department' => $department,
                'country' => $country,
                'zip_code' => $zip_code,
                'phone' => $phone,
            ];

            
           header('location:../index.php');
        }else {
            echo "<span style='color: red;'>mot de passe ou nom d'utilisateur incorrecte</span>";
        }
    }
}



// fonction pour déconnecter l'adminstrateur
function customer_logout() {
    if(isset($_GET['logout'])) {
        session_destroy();
        header('location:customer_connexion.php');
    }
}





// fonction pour visualiser les commandes
function customer_view_orders() {
    global $con;
    if(isset($_SESSION['customer'])) {
        $customer_id = $_SESSION['customer']['id'];
    
     

    $orders_par_page = 6;  //Nombre de commande à afficher par page

    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle, par défaut 1
    $offset = ($page_actuelle - 1) * $orders_par_page;

    $select_query = "Select * from `orders` where customer_id=$customer_id LIMIT $offset, $orders_par_page";
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
        echo "<td>".$total_unique."</td>";
        echo "<td>".$coupon."</td>";
        echo "<td>".$shipping."</td>";
        echo "<td>".$total_price."</td>";
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
        
        echo "<td><a href='customer_view_orders.php?deleteorder_id=$order_id'><i class='fa-solid fa-trash'></i>S</a>  <a href='customer_update_orders.php?modified_id=$order_id'><i class='fa-solid fa-pen-to-square'></i>M</a></td>";
        echo "</tr>";


    }
    echo " </tbody>
                </table>";
    //echo '</div>';

    // Ajout des liens de pagination en bas de la page
    $sql = "Select count(*) as total from orders where customer_id=$customer_id";
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
}



// fonction pour supprimer les commandes 
function customer_delete_orders() {
    global $con;

    if(isset($_GET['deleteorder_id'])) {
        $order_id = $_GET['deleteorder_id'];

        $delete_query = "delete from `orders` where order_id=$order_id";
        $result_query = mysqli_query($con, $delete_query);
        if($result_query) {
            echo "<script>alert('Commande supprimée avec succès !')</script>";
            echo "<script>window.open('customer_view_orders.php','_self')</script>";
        }
    }
}

?>