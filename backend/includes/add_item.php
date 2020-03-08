<?php
    require_once("./db_connect.php");
    $message = "";
    $error = false;

    //Check if data is already in Database
    if(isset($_POST['product_submit'])){
        $product = array($_POST['product_name'],$_POST['category'],$_POST['price'],$_POST['size'],$_POST['description'],$_POST['quantity']);
        if(empty($product[0]) || empty($product[1]) || empty($product[2]) || empty($product[3]) || empty($product[4])){
            $message =  "All field must be filled";
            $error = true;
        } else{
            $sql_check = "SELECT * FROM product WHERE product_name = '$product[0]'";
            if ($result = mysqli_query($conn,$sql_check)) 
            {       
                if(mysqli_num_rows($result) >= 1){
                    $message = "Product Already Exist in Database.Use<button class='button-small button'>Edit product</button> to increase quantity";
                    $error = true;
         
                }else{
                    $sql = "INSERT INTO product (`product_name`,`category`,`unit_price`,`size`,`description`,`stock`) VALUES ('$product[0]','$product[1]','$product[2]','$product[3]','$product[4]','$product[5]')";
                    if (mysqli_query($conn, $sql)) {
                        $message = "Item added Successfully in Database";

                    } else {
                        $message =  "Error: " . $sql . "<br>" . mysqli_error($conn);
                        $error = true;
                    }
                }   
            }
        }
    }    
    echo "<script>$('.form-box').addClass('message-aminate'); </script>";

    if($error == true){
        echo "   <div class='form-box-error'>
                        <div class='popup-code'>
                            ERROR
                        </div>
                        <div class='popup-message'>"
                            .$message.
                        "</div>
                </div>";
    } else{
        echo "   <div class='form-box-success'>
                        <div class='popup-code'>
                            SUCCESS
                        </div>
                        <div class='popup-message'>"
                            .$message.
                        "</div>
                </div>";
    }
    $error =false;

    //echo "<span style='color:reds'>".$message."</span>"; 
?>
<script>
    setTimeout(function() {
        $('.form-box-error').fadeOut('fast');
        $('.form-box-success').fadeOut('fast'); 
    }, 5000); 
</script>