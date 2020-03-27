<?php
 if(!isset($_SESSION)){
    session_start();
    
}
require('./backend/includes/db_connect.php');
require_once('./includes/cart.php');
?>
<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <link rel="icon" href="./imgs/title-cow.png" type="img/png" />
          <title>Payment</title>
          <link rel="stylesheet" href="./css/main.css" />
          <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet" />
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet" />
          <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          <!-- <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">  -->
     </head>
     <body>
          <div class="container">
               <?php include('./contents/nav.php');
               $order_id = $_SESSION['order_id'];
                $sql = "SELECT * FROM customer_order WHERE order_id = '$order_id'";
                $result = mysqli_query($conn,$sql);
                $roww = mysqli_fetch_assoc($result);

               ?>

               <section class="section-payment">
                    <div class="payment-container">
                         <div class="payment-header">
                              <img src="./imgs/icons/tick.png" width="100" alt="" />
                              <div class="payment-heading-box">
                                   <h1 class="payment-heading-main">Order Successful</h1>
                                   <h1 class="payment-heading-sub">Your order has been submitted. Details of the order are included below.</h1>
                              </div>
                         </div>
                         <div >
                             <table class="bill-table-box" cellpadding="0px">
                                 <tr>
                                     <td class="bill-table-th">Order Id</td>
                                     <td class="bill-table-th">:</td>
                                     <td class="bill-table-th "><?=$order_id ?></td>
                                 </tr>
                                 <tr>
                                    <td class="bill-table-th ">Order Time</td>
                                    <td class="bill-table-th">:</td>
                                    <td class="bill-table-th"><?=$roww['order_placed_date'] ?></td>   
                                 </tr>
                                 <tr>
                                    <td class="bill-table-th">Payment Option</td>
                                    <td class="bill-table-th">:</td>
                                    <td class="bill-table-th">Cash on delivery</td>
                                 </tr>
                             </table>
                             <div class="br"></div>
                             <table  class="bill-table-box-2">
                                    <tr>
                                        <th class="bill-table-th">Product Names</th>
                                        <th class="bill-table-th">Unit Price</th>
                                        <th class="bill-table-th">Qty.</th>
                                        <th class="bill-table-th">Sub-total</th>
                                    </tr>
                                    <?php
                                    // echo "<pre>";
                                        $product_arr = json_decode($roww['product_ids']);
                                        foreach($product_arr as $key => $value){
                                            // echo "$key"."  "."$value"."<br>";
                                            $sql = "SELECT product_name,unit_price FROM product WHERE product_id = '$key'";
                                            $result = mysqli_query($conn,$sql);
                                            $row = mysqli_fetch_assoc($result);

                                    ?>
                                    <tr>
                                        <td class="bill-table-th"><?=$row['product_name']?></td>
                                        <td class="bill-table-th"><?=$row['unit_price']?></td>
                                        <td class="bill-table-th"><?=$value?></td>
                                        <td class="price bold bill-table-th"><?=$row['unit_price'] * $value?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                  
                                   
                                    <!-- <tr>
                                        <td class="bill-table-th">Rala</td>
                                        <td class="bill-table-th">6</td>
                                        <td class="bill-table-th">5</td>
                                        <td class="price bold bill-table-th">30</td>
                                    </tr>
                                    <tr>
                                        <td class="bill-table-th">Rala</td>
                                        <td class="bill-table-th">6</td>
                                        <td class="bill-table-th">5</td>
                                        <td class="price bold bill-table-th">30</td>
                                    </tr> -->
                                    <tr>
                                        <td class=""></td>
                                        <td class=""></td>

                                        <td class="bill-table-th bold  border-top">Delivery Charge</td>
                                        <td class="bill-table-th bold price border-top">Rs. <?=$roww['delivery_cost']?></td>
                                    </tr>
                                    <tr>
                                        <td class=""></td>
                                        <td class=""></td>

                                        <td class="bill-table-th bold  ">Total Amount</td>
                                        <td class="bill-table-th bold price">Rs. <?=$roww['total_order_price']?></td>
                                    </tr>
                             </table>
                         </div>
                    </div>
               </section>
               <?php include('./contents/footer.php');?>
               <?php include('./contents/modals.php');?>
          </div>
    
     </body>
</html>
