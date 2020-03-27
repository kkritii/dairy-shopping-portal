<?php
    session_start();
    require_once('./backend/includes/db_connect.php');
    include('./includes/cart.php');
    error_reporting(0);
    $error = false;
    if(isset($_POST['address-submit'])){
     $user_id = $_SESSION['user_id'];
     $dist = $_POST['district'];
     $city = $_POST['city'];
     $ward = $_POST['ward'];
     $street = $_POST['street'];
     $house= $_POST['house-no'];
     $lat =  $_POST['latitude'];
     $long =  $_POST['longitude'];
     $default = 1;
     var_dump($ward);
     if(!ctype_alpha($dist) || !ctype_alpha($dist)){
          $error = true;
     } elseif(!is_numeric($house) && !empty($house)){
          $error = true;
     }
     elseif(!is_numeric($ward) && !empty($ward)){
          $error = true;
     }
     else{
          echo "asdf";
          $sql = "INSERT INTO `customer_delivery_address`(`customer_id`, `district`, `city`, `ward_no`,`house_no`, `street`, `longitude`, `latitude`, `default_address`) 
          VALUES ('$user_id','$dist','$city','$ward','$house','$street','$long','$lat','$default')";
          if(mysqli_query($conn,$sql)){
               echo "<script>window.location = './account.php'</script>";
          } else{
               echo "error : ". mysqli_error() ;
          }

     }

 }
?>

<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8" />
          <link rel="stylesheet" href="./css/main.css" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet" />
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet" />
          <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          <link rel="stylesheet" type="text/css" href="./slick/slick.css" />
          <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css" />
          <link rel="icon" href="./imgs/title-cow.png" type="img/png" />
          <title>Dairy Store</title>
     </head>

     <body>
          <?php include('./contents/nav.php');?>

          <section class="section-set-address">
               <div class="breadcrumb ">
                    <a href="./index.php" class="breadcrumb--links">Home</a>
                    <svg class="breadcrumb-icon">
                         <use xlink:href="./imgs/icons/sprite.svg#icon-chevron-right"></use>
                    </svg>
                    <a href="./account.php" class="breadcrumb--links">User Profile</a>
                    <svg class="breadcrumb-icon">
                         <use xlink:href="./imgs/icons/sprite.svg#icon-chevron-right"></use>
                    </svg>
                    <a href="#" class="breadcrumb--links">Set Delivery Address</a>
               </div>
               <div class="set-address-container">
                    <form id="contact" action="" method="post">
                         <h3>Setup Delivery Address</h3>
                         <!-- <h4>Contact us for custom quote</h4> -->
                         <fieldset>
                              <input placeholder="District" name="district" type="text" tabindex="1" required autofocus />
                         </fieldset>
                         <fieldset>
                              <input placeholder="City" name="city" type="text" tabindex="2" required />
                         </fieldset>
                         <fieldset>
                              <input placeholder="Ward No.(Optional)" name="ward" type="text" tabindex="3" />
                         </fieldset>
                         <fieldset>
                              <input placeholder="Street" type="text" name="street" tabindex="4" required />
                         </fieldset>
                         <fieldset>
                              <input placeholder="House No. (Optional)" name="house-no" type="text" />
                         </fieldset>
                         <fieldset>
                              <input type="checkbox" tabindex="4" onchange="getLocation()" required />
                              <span class="checkmark account-message"> &nbsp;Use my Geolocation.</span>
                         </fieldset>
                         <fieldset>
                              <span class="checkmark account-message green" id="location"></span>
                         </fieldset>
                         <br />
                         <?php
                              if($error == true){
                         ?>
                          <fieldset>
                              <span id="error-msg" class="warning">Wrong input Fields</span>
                         </fieldset>
                         <?php
                                   $error = false;

                              }
                         ?>
                         <input type="hidden" value="" id="lat" name="latitude" />
                         <input type="hidden" value="" id="long" name="longitude" />
                       
                         <button name="address-submit" type="submit" id="set-address-submit" data-submit="...Sending">Submit</button>
                         <script>
                              
                         </script>
                    </form>
               </div>
          </section>
          <?php include('./contents/footer.php');?>
          <?php include('./contents/modals.php');?>
     </body>
</html>
<script>
     var x = document.getElementById("location");

     function getLocation() {
          if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(showPosition);
          } else {
               x.innerHTML = "Geolocation is not supported by this browser.";
          }
     }

     function showPosition(position) {
          x.innerHTML = "Latitude: " + position.coords.latitude + "&nbsp;&nbsp;Longitude: " + position.coords.longitude;
          var lat = position.coords.latitude;
          var long = position.coords.longitude;
          console.log(lat);
          document.getElementById("lat").value = lat;
          document.getElementById("long").value = long;
     }
</script>
