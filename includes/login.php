<?php

if(isset($_POST['submit'])){
    $u = $_POST['email'];
    $p = $_POST['password'];
      
    $sql = "SELECT * FROM `customer` WHERE `email`='$u' AND `password`='$p' AND `is_active` = 1 AND `email_activation` = 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
     session_start();
     $_SESSION['email'] = $u;
     $row = mysqli_fetch_assoc($result);
     echo "<script>alert('thanks for signing ');</script>";
     echo "<script>window.location='index.php';</script>";
}else{
     echo "<script>alert('Email or Password Incorrect!');</script>";
     echo "<script>window.location='./index.php';</script>";
 }
 }
?>