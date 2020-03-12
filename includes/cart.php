<?php
//  require_once('./backend/includes/db_connect.php');
//For adding item to cart
    if(isset($_POST['add'])) {
        if(isset($_SESSION['cart'])){
            print_r($_SESSION['cart']);
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
            echo "Bitch ass nigga";
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            $_SESSION['cart'][0] =  $item_array;
        }
    }
    $count_cart_items =  count($_SESSION['cart']);    

    //for removing item from cart
    if(isset($_POST['remove'])){
        $_POST['product_id'];
        foreach($_SESSION['cart'] as $key => $value){
            if($value['product_id'] == $_POST['product_id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>window.location='index.php'</script>";
            }
        }
    }

    //for emptying cart
    if(isset($_POST['empty-cart'])){
        unset($_SESSION['cart']);
        $_SESSION['cart'] = array();
        echo "<script>window.location='index.php'</script>";

    }
    ?>