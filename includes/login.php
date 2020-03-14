<?php
session_start();
    require_once('../backend/includes/db_connect.php');
    if(isset($_POST['login_submit'])){
    $u = $_POST['login_email'];
    $p = md5($_POST['login_password']);      
    $sql = "SELECT customer_id,email,is_active,email_activation FROM `customer` WHERE `email`='$u' AND `password`='$p' AND `is_active` = 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['customer_id'];
            $_SESSION['user_id'] = $id;
            echo "<script>window.location='../index.php?userId=$id';</script>";
    }else{
     echo "<script>alert('Email or Password Incorrect!');</script>";
     echo "<script>window.location='../index.php';</script>";
 }
 }
?>