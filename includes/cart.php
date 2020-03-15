<?php
//  require_once('./backend/includes/db_connect.php');
//For adding item to cart

error_reporting(0);
if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['remove'])){
    echo $_POST['product_id'];
    echo $_SESSION['cart'];
    echo naku;

    $loc ="index.php";
  
    $action ="removeFromCheckout";
    foreach($_SESSION['cart'] as $key => $value){
        if($value['product_id'] == $_POST['product_id']){
            unset($_SESSION['cart'][$key]);
    echo "naku";

            if($_GET['action'] == $action){
                echo "<script>window.location='../checkout.php'</script>";
            }else{
                echo "<script>window.location='index.php'</script>";
            }
        }
    }
}
    if(isset($_POST['add'])) {
        // $action = $_GET['action'];
        // echo "$action";
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'],"product_id");
            if(in_array($_POST['product_id'],$item_array_id)){
                echo "<script>alert('Item already exists')</script>";
                echo "<script>window.location = 'index.php'</script>";
                
            }  else{
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $_POST['product_id']
                );
                $_SESSION['cart'][$count] = $item_array;
                $count_cart_items = $count;
            echo "<script>window.location='index.php'</script>";

            }
        } else{
            print_r($_POST['product_id']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][0] =  $item_array;
        }
    }
    $count_cart_items =  count($_SESSION['cart']);    

    //for removing item from cart
 

    //for emptying cart
    if(isset($_POST['empty-cart'])){
        unset($_SESSION['cart']);
        $_SESSION['cart'] = array();
        echo "<script>window.location='index.php'</script>";
    }
    error_reporting(-1);
    ?>