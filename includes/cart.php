<?php
//  require_once('./backend/includes/db_connect.php');
//For adding item to cart

error_reporting(0);
if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['remove'])){
    // echo $_POST['product_id'];
    $action ="removeFromCheckout";
    foreach($_SESSION['cart'] as $key => $value){
        if($value['product_id'] == $_POST['product_id']){
            unset($_SESSION['cart'][$key]);
            // if($_GET['action'] == $action){
            //     echo "checkout";
            //     echo "<script>window.location='../checkout.php'</script>";
            // }else{
            //     echo "index";
            //     echo "<script>window.location='index.php'</script>";
            // }
        }
    }
}

    if(isset($_POST['add'])) {
        if(!isset($_SESSION)){
            session_start();
        }
       
        $action = "addFromDetail";
        if($_GET['action']==$action){
            $prod_id = $_GET['productId'];
        }
        if(isset($_SESSION['cart'])){
            
           
            if(in_array($_POST['product_id'],$item_array_id)){
                $item_array_id = array_column($_SESSION['cart'],"product_id");
               
                if($_GET['action']==$action){
                    echo "<script>alert('Item already exists')</script>";
                    echo "<script>window.location = '../product-detail.php?productId=".$prod_id."'</script>";
                } else{
                    echo "<script>alert('Item already exists')</script>";
                    echo "<script>window.location = './index.php'</script>";
                }
            }  else{
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $_POST['product_id'],
                    'quantity'=>$_POST['quantity']
                );
                $_SESSION['cart'][$count] = $item_array;
                $count_cart_items = $count;
                if($_GET['action']==$action){
                    echo "<script>window.location = '../product-detail.php?productId=".$prod_id."'</script>";
                } else{
                    echo "<script>window.location = './index.php'</script>";
                }

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
    }
    error_reporting(-1);
    ?>