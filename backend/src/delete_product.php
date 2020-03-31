<?php
$p_id = @$_GET['id'];
// if (!isset($user_id)) {
// 	header('Location: list_user.php');
// }
 
require_once('../includes/db_connect.php');
$sql = "DELETE FROM `product` WHERE product_id='$p_id';";

if (mysqli_query($conn, $sql)) {
   
    header('Location: ../index.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}