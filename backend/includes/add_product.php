<?php
     require_once("../includes/db_connect.php");
     session_start();
     if(isset($_POST['input-product-submit'])){
        $file = $_FILES['file'];
        // print_r($file);
        $file_name=$_FILES['file']['name'];
        $file_size=$_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $file_tmp_name = $_FILES['file']['tmp_name'];
        $file_store = "../uploads/".basename($_FILES['file']['name']);
        $file_ext = explode('.',$file_name);
        $file_actual_ext = strtolower(end($file_ext));

        $allowed_ext = array('jpg','jpeg','png','gif'); 
        if(in_array($file_actual_ext,$allowed_ext)){
            if($file_size < 1000000){
                move_uploaded_file($file_tmp_name,$file_store);
            } else{
                $message = "Your file size is too big";
                echo "Your size is too big"; 
            }
        }else{
            $message = "Extension not supported";
            echo "You cannot upload file of ".$file_actual_ext ." extension";
        }

        

        $product = array($_POST['product_name'],$_POST['category'],$_POST['price'],$_POST['size'],$_POST['description'],$_POST['quantity'],$file_name);
        if(empty($product[0]) || empty($product[1]) || empty($product[2]) || empty($product[3]) || empty($product[4]) || empty($product[6])){
            $message =  "All field must be filled";
            $error = true;
        } else{
            $sql_check = "SELECT * FROM product WHERE product_name = '$product[0]'";
            if ($result = mysqli_query($conn,$sql_check)) 
            {       
                if(mysqli_num_rows($result) >= 1){
                    $message = "Product Already Exist in Database.Use<button class='button-small button'>Edit product</button> to increase quantity";
                    $error = true;
                     echo "already";
                    
                }else{
                    $sql = "INSERT INTO product (`product_name`,`category`,`unit_price`,`size`,`description`,`stock`,`image_source`) VALUES ('$product[0]','$product[1]','$product[2]','$product[3]','$product[4]','$product[5]','$product[6]')";
                    if (mysqli_query($conn, $sql)) {
                        $message = "Item added Successfully in Database";
                        echo "<script>alert('Successfully added')</script>";
                    } else {
                        $message =  "Error: " . $sql . "<br>" . mysqli_error($conn);
                        $error = true;
                    }
                }   
            }
        }
        $_SESSION['message'] = $message;
        $_SESSION['error'] = $error;
        // header('loaction: ../index.php');
    }    
    
?>
<script>	
	$(document).ready(function(){
        $(".message-box").load("./includes/popup_message.php")
	});
</script>