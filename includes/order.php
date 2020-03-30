
<?php
    if(!isset($_SESSION)){
        session_start();
    }
    require('../backend/includes/db_connect.php');
    require_once('./cart.php');

        include('./sewa-setting.php');
        if(isset($_POST['proceed'])){
            $checked_value = $_POST['checked_value'];
            $order_price =  $_POST['order_price'];
            $delivery_price = $_POST['delivery_price'];
            $items_count =  $_POST['total_items'];
            $total_price = $_POST['total_price'];
        }
    if($checked_value == "pay_with_esewa"){
 ?>
          <form id="esewa_form" action="<?=$epayURL?>" method="POST">
               <input value="100" name="tAmt" type="hidden" />
               <input value="90" name="amt" type="hidden" />
               <input value="5" name="txAmt" type="hidden" />
               <input value="2" name="psc" type="hidden" />
               <input value="3" name="pdc" type="hidden" />
               <input value="epay_payment" name="scd" type="hidden" />
               <input value="<?=$pid?>" name="pid" type="hidden" />
               <input value="<?=$success_url?>" type="hidden" name="su" />
               <input value="<?=$failure_url?>" type="hidden" name="fu" />
          </form>
          <script>
               window.onload = function() {
                    document.getElementById("esewa_form").submit();
               };
          </script>
<?php

    } else{

error_reporting(-1);
        $user_id = $_SESSION['user_id'];
        $product_id = array_column($_SESSION['cart'],'quantity','product_id');
        
            $error = false;
            $json_ids =  json_encode($product_id);
            ####################### INSERT IN CUSTOMER ORDER #############################
            $sql = "INSERT INTO `customer_order`(`product_ids`, `customer_id`, `payment_method`, `total_order_price`, `delivery_cost`, `total_order_quantity`,`product&delivery_price`)   VALUES ('$json_ids','$user_id','$checked_value','$order_price','$delivery_price ','$items_count','$total_price')";
            if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                $_SESSION['order_id'] = $last_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            ####################### UPDATE THE QUANTITY OF ORDERED ITEMS #############################
            // $keys = [];
            foreach($product_id as $key=>$value){
                $sql_select  = "SELECT stock,product_id FROM product WHERE product_id = '$key'";
                $res = mysqli_query($conn,$sql_select);
                $row = mysqli_fetch_assoc($res);
                $final_qty = $row['stock'] - $value;
                echo $row["product_id"]." ".$final_qty."<br>";
                $id =  $row["product_id"];
                $sql_update = "UPDATE product SET stock = '$final_qty' WHERE product_id = '$id'";
                if(mysqli_query($conn,$sql_update)){

                }else{
                    echo mysqli_error();
                }
            }
        unset($_SESSION['cart']);
        echo "<script>window.location = '../success.php'</script>";
    }
?>