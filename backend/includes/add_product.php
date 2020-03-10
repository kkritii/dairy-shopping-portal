<?php
     require_once("../includes/db_connect.php");
     if(isset($_POST['input-product-submit'])){
      $filename=$_FILES['file']['name'];
      $filetmpname=$_FILES['file']['tmp_name'];
      $folder='';
      move_uploaded_file($filetmpname,$folder,$filename);
        $product = array($_POST['product_name'],$_POST['category'],$_POST['price'],$_POST['size'],$_POST['description'],$_POST['quantity']);
        if(empty($product[0]) || empty($product[1]) || empty($product[2]) || empty($product[3]) || empty($product[4]) || empty($product[5])  || empty($product[6])){
            $message =  "All field must be filled";
            $error = true;
             echo "arun cahoar";
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
    }    
?>