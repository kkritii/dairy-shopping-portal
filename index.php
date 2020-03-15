<?php
    session_start();
    require_once('./backend/includes/db_connect.php');
    include('./includes/cart.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
    <link rel="icon" href="./imgs/title-cow.png" type="img/png">
    <title>Dairy Store</title>
</head>

<body>
    <div class="container">
        <?php include('./contents/notification.php');?>
        <?php include('./contents/nav.php');?>    
        <?php include('./contents/header.php');?>    
        <?php include('./contents/products.php');?>
        <?php include('./contents/footer.php');?>
        <?php include('./contents/modals.php');?>
    </div>
</body>
</html>