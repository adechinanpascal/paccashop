<?php


include('../includes/connect.php');


global $con;

$select_query = "Select * from `customers`";
$result_query = mysqli_query($con, $select_query);
$rows_num_admin = mysqli_num_rows($result_query);


if($rows_num_admin > 0) {
    header('location:customer_connexion.php');
}
else {
    exit();
}




?>