<?php
     require_once("../backend/includes/db_connect.php");
     session_start();
     if(isset($_POST['submit'])){
         $user_id = $_SESSION['user_id'];
        $file = $_FILES['file'];
        // print_r($file);
        $file_name=$_FILES['file']['name'];
        echo "<scrpit>alert('".$file_name."')</script>";
        $file_size=$_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $file_tmp_name = $_FILES['file']['tmp_name'];
        $file_store = "../backend/avatars/".basename($_FILES['file']['name']);
        $file_ext = explode('.',$file_name);
        $file_actual_ext = strtolower(end($file_ext));

        $allowed_ext = array('jpg','jpeg','png','gif','svg'); 
        if(in_array($file_actual_ext,$allowed_ext)){
            if($file_size < 10000000){
                move_uploaded_file($file_tmp_name,$file_store);
                $sql = "UPDATE customer SET profile_pic='$file_name' WHERE customer_id = '$user_id'";
            } else{
                $message = "Your file size is too big";
                echo "Your size is too big"; 
            }
        }else{
            $message = "Extension not supported";
            echo "You cannot upload file of ".$file_actual_ext ." extension";
        }
        if(mysqli_query($conn,$sql)){
            echo "Successfull";
        } else{
            echo "failed";
        }                   
    }    
    
?>
