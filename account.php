<?php
    session_start();
    require_once('./backend/includes/db_connect.php');
    include('./includes/cart.php');
    if(isset($_POST['pending-cancel'])){

     $order_id = $_POST['order_id'];
     $select_json = "SELECT product_ids FROM  customer_order WHERE order_id = '$order_id'";
     $result = mysqli_query($conn,$select_json);
     $row = mysqli_fetch_assoc($result);
     $id_arr = json_decode($row['product_ids']);

     $id_arr = get_object_vars($id_arr);
   

     foreach($id_arr as $key=>$value){
          $sql_select  = "SELECT product_id,stock FROM product WHERE product_id = '$key'";
          $result = mysqli_query($conn,$sql_select);
          $rows = mysqli_fetch_assoc($result);
              
               $final_qty = $rows['stock'] + $value;
          
               $sql_update = "UPDATE product SET stock = '$final_qty' WHERE product_id = $key";
               if(mysqli_query($conn,$sql_update)){

               }else{
                    echo mysqli_error();
               }
               $sql_del = "DELETE FROM customer_order WHERE order_id = $order_id";
               mysqli_query($conn,$sql_del);
          
   
     }

    }
?>
<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <link rel="icon" href="./imgs/title-cow.png" type="img/png" />
          <title>Dairy Store</title>
          <link rel="stylesheet" href="./css/main.css" />
          <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet" />
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet" />
          <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          <!-- <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">  -->
     </head>

     <body>
          <div class="container">
               <?php include('./contents/nav.php');?>
               <?php
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM customer WHERE customer_id = '$user_id'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $joined_on = explode(" ",$row['joined_on']);
            
        ?>
               <div class="section-account">
                    <div class="breadcrumb ">
                         <a href="./index.php" class="breadcrumb--links">Home</a>
                         <svg class="breadcrumb-icon">
                              <use xlink:href="./imgs/icons/sprite.svg#icon-chevron-right"></use>
                         </svg>
                         <a href="#" class="breadcrumb--links">User Profile</a>
                    </div>
                    <div class="account-container">
                         <div class="col-1">
                              <div class="profile-box">
                                   <img src="./backend/avatars/<?=$row['profile_pic']?>" class="profile-pic" alt="" />
                                   <!-- <button onclick="chooseFile();" name="profile_pic"  class="btn-sm btn-file u-margin-top-v-small profile-btn">Change avatar</button> -->
                                   <form id="upload-avatar-form" class="u-margin-top-v-small upload-avatar-form" action="./includes/uploadAvatar.php" method="POST" enctype="multipart/form-data">
                                        <input type="file" class="u-margin-top-v-small" name="file" id="fileinput" />
                                        <input type="submit" class="btn-sm btn-file u-margin-top-v-small" value="submit" name="submit" id="upload-avatar-submit" />
                                   </form>
                              </div>
                              <div class="">
                                   <h1 class="heading_name u-margin-top-v-small"><?=$row['fullname']?></h1>
                                   <div>
                                        <span class=" heading-bold">Email :</span>
                                        <span class="heading-email"> <?=$row['email']?> </span>
                                   </div>
                                   <div>
                                        <span class=" heading-bold">Joined on :</span>
                                        <span class="heading-email"> <?=$joined_on[0];?> </span>
                                   </div>
                                   <span id="upload_message"></span>
                              </div>
                         </div>


                         <div class="col-2">
                              <div class="history u-margin-top-2">
                                   <h1 class="pl-1">
                                        Pending Delivery
                                   </h1>
                                   <div class="border">
                                                  <?php
                                                       $user = $_SESSION['user_id'];
                                                       $i = 1;
                                                       $tot = 0;
                                                       $select_order = "SELECT * FROM customer_order WHERE customer_id = '$user' AND order_status = 'pending' " ;
                                                       $result_order = mysqli_query($conn,$select_order);
                                                       if(mysqli_num_rows($result_order) != 0){
                                                            
                                                  ?>
                                                 
                                                       <table class="default-table">
                                                            <thead>
                                                                 <th class="numeric">#</th>
                                                                 <th>Order Id</th>
                                                                 <th>Products Name (Qty.)</th>
                                                                 <th>Payment Method</th>
                                                                 <th class="numeric">Order Placed On</th>
                                                                 <th class="">Sub-total</th>
                                                                 <th class="">Action</th>
                                                            </thead>
                                                            <tbody>
                                                  <?php
                                                            while($rows=mysqli_fetch_assoc($result_order)){
                                                                 // echo "<pre>";
                                                                 // print_r($rows);
                                                                 // echo "</pre>";
                                                  ?>
                                                             <tr>
                                                                 <td class="numeric"><?=$i++?></td>
                                                                 <td><?=$rows['order_id']?></td>
                                                                 <td><?=$rows['product_ids']?></td>
                                                                 <td><?=$rows['payment_method']?></td>
                                                                 <td><?=$rows['order_placed_date']?></td>
                                                                 <td class="numeric"> <span class="bold">Rs.</span> <?=$rows['total_order_price']?></td>
                                                                 <td>
                                                                 <form action="" method="POST">
                                                                      <input type="hidden" value="<?=$rows['order_id']?>"  name="order_id">
                                                                      <button type="submit" class="btn-danger btn-v-sm" onclick="return confirm('Are You Sure?')" name="pending-cancel">Cancel</button>
                                                                 </form>
                                                                 </td>

                                                            </tr>
                                                  <?php
                                                                 $tot += $rows['total_order_price'];
                                                            }
                                                  ?>
                                                            </tbody>
                                                            <tfoot>
                                                                 <tr>
                                                                      <td colspan="4"></td>
                                                                      <td colspan="numeric bold">Total</td>
                                                                      <!-- <td class="numeric green">£13,800.00</td> -->
                                                                      <td class="numeric green"> <span class="bold">Rs.</span><?=$tot?></td>
                                                                      <td></td>
                                                                      <!-- <td colspan="3"></td> -->
                                                                 </tr>
                                                            
                                                            </tfoot>
                                                       </table>
                                                  <?php
                                                       } else{
                                                  ?>
                                                       <div class="ptb">
                                                            <span class="account-message">There is no any pendings transactions.</span>

                                                       </div>
                                                  <?php
                                                       }
                                                  ?>
                                           
                                   </div>
                              </div>
                              <div class="history u-margin-top-2">
                                   <h1 class="pl-1">
                                        Purchase History
                                   </h1>
                                   <div class="overview-container">
                                        <span class="account-message">Your Purchase History is Empty!</span>
                                   </div>
                              </div>
                              <div class="overview">
                              
                                   <h1 class="pl-1 u-margin-top-2">
                                        Edit Profile
                                   </h1>
                                   
                                   <div class="overview-container">
                                        <table>
                                             <form action="" class="profile-form " method="POST">
                                                  <tr class="form__group u-margin-top-small">
                                                       <th>
                                                            <label class="profile_label">Fullname</label>
                                                       </th>
                                                       <th>
                                                            :
                                                       </th>
                                                       <td>
                                                            <input type="text" name="profile_name" class="profile-form-input" placeholder="" value="<?=$row['fullname'];?>" />
                                                       </td>
                                                  </tr>
                                                  <tr class="form__group">
                                                       <th>
                                                            <label class="profile_label">Address</label>
                                                       </th>
                                                       <th>
                                                            :
                                                       </th>
                                                       <td>
                                                            <input type="text" name="profile_name" class="profile-form-input" placeholder="" value="<?=$row['address'];?>" />
                                                       </td>
                                                  </tr>
                                                  <tr class="form__group">
                                                       <th>
                                                            <label class="profile_label">Contact Number</label>
                                                       </th>
                                                       <th>
                                                            :
                                                       </th>
                                                       <td>
                                                            <input type="text" name="profile_name" class="profile-form-input" placeholder="" value="<?=$row['contact_number'];?>" />
                                                       </td>
                                                  </tr>
                                                  <tr class="form__group">
                                                       <th>
                                                            <label class="profile_label">New Password</label>
                                                       </th>
                                                       <th>
                                                            :
                                                       </th>
                                                       <td>
                                                            <input type="text" name="profile_name" class="profile-form-input" placeholder="Enter new Password" />
                                                       </td>
                                                  </tr>
                                                  <tr class="form__group">
                                                       <th>
                                                            <label class="profile_label">Old Password</label>
                                                       </th>
                                                       <th>
                                                            :
                                                       </th>
                                                       <td>
                                                            <input type="text" name="profile_name" class="profile-form-input" placeholder="Your Old Password" />
                                                       </td>
                                                  </tr>
                                                  <tr class="form__group">
                                                       <th></th>
                                                       <td></td>
                                                       <td>
                                                            <input type="submit" name="profile_submit" placeholder="" class="btn-primary btn-sm" value=" Save " />
                                                       </td>
                                                  </tr>
                                             </form>
                                        </table>
                                   </div>
                              </div>

                              <div class="history u-margin-top-2">
                                   <h1 class="pl-1">
                                        Delivery Addresses
                                   </h1>

                                   <div class="overview-container delivery-address-container">
                                        <?php
                                             $user = $_SESSION['user_id'];
                                             $sql = "SELECT * FROM customer_delivery_address WHERE customer_id = '$user'";
                                             $result = mysqli_query($conn,$sql);
                                             $row = mysqli_fetch_assoc($result);
                                             if(count($row) == 0){
                                                  echo "<span class='account-message'>You have not set your delivery address. </span>";
                                        ?>   
                                        <span>  
                                             <form action="./set-address-form.php" method="POST">
                                                  <input type="submit" name="profile_submit" placeholder="" class="btn-primary btn-sm ml-1" value=" Setup now " />
                                             </form>
                                        </span>
                                                
                                        <?php
                                             } else{
                                        ?>
                                        <table class="delivery_table" border-spacing="0" cellpadding="1px">
                                             <!-- <tr>
                                                  <th class="delivery_table-th">SN.</th>
                                                  <th class="delivery_table-th">District</th>
                                                  <th class="delivery_table-th">City</th>
                                                  <th class="delivery_table-th">Ward No.</th>
                                                  <th class="delivery_table-th">House No.</th>
                                                  <th class="delivery_table-th">Street</th>
                                                  <th class="delivery_table-th">Longitude</th>
                                                  <th class="delivery_table-th">Latitude</th>
                                             </tr> -->
                                        <?php
                                        $i = 0;
                                        $userid = $_SESSION['user_id'];
                                             $select = "SELECT * FROM customer_delivery_address WHERE customer_id = $userid";
                                             $result = mysqli_query($conn,$select);
                                             while($row= mysqli_fetch_assoc($result)){
                                        ?>
                                                  <form action="" class="profile-form" method="POST">
                                                       <tr class="form__group u-margin-top-small">
                                                            <th>
                                                                 <label class="profile_label">District</label>
                                                            </th>
                                                            <th>
                                                                 :
                                                            </th>
                                                            <td>
                                                                 <input type="text" name="profile_name" class="profile-form-input" placeholder="" value="<?=$row['district']?>" />
                                                            </td>
                                                       </tr>
                                                       <tr class="form__group">
                                                            <th>
                                                                 <label class="profile_label">City</label>
                                                            </th>
                                                            <th>
                                                                 :
                                                            </th>
                                                            <td>
                                                                 <input type="text" name="profile_name" class="profile-form-input" placeholder="" value="<?=$row['city']?>" />
                                                            </td>
                                                       </tr>
                                                       <tr class="form__group">
                                                            <th>
                                                                 <label class="profile_label">Ward No.</label>
                                                            </th>
                                                            <th>
                                                                 :
                                                            </th>
                                                            <td>
                                                                 <input type="text" name="profile_name" class="profile-form-input" placeholder="" value="<?=$row['ward_no']?>" />
                                                            </td>
                                                       </tr>
                                                       <tr class="form__group">
                                                            <th>
                                                                 <label class="profile_label">Street</label>
                                                            </th>
                                                            <th>
                                                                 :
                                                            </th>
                                                            <td>
                                                                 <input type="text" name="profile_name" class="profile-form-input" value="<?=$row['street']?>" />
                                                            </td>
                                                       </tr>
                                                       <tr class="form__group">
                                                            <th>
                                                                 <label class="profile_label">House No.</label>
                                                            </th>
                                                            <th>
                                                                 :
                                                            </th>
                                                            <td>
                                                                 <input type="text" name="profile_name" class="profile-form-input" value="<?=$row['house_no']?>" />
                                                            </td>
                                                       </tr>
                                                       <tr class="form__group">
                                                            <th>
                                                                 <label class="profile_label">Latitude</label>
                                                            </th>
                                                            <th>
                                                                 :
                                                            </th>
                                                            <td>
                                                                 <input type="text" name="profile_name" class="profile-form-input" value="<?=$row['latitude']?>" />
                                                            </td>
                                                       </tr>
                                                       <tr class="form__group">
                                                            <th>
                                                                 <label class="profile_label">Longitude</label>
                                                            </th>
                                                            <th>
                                                                 :
                                                            </th>
                                                            <td>
                                                                 <input type="text" name="profile_name" class="profile-form-input" value="<?=$row['longitude']?>" />
                                                            </td>
                                                       </tr>
                                                       <tr class="form__group">
                                                            <th></th>
                                                            <td></td>
                                                            <td>
                                                                 <input type="submit" name="profile_submit" placeholder="" class="btn-primary btn-sm" value=" Save " />
                                                            </td>
                                                       </tr>
                                             </form>

                           
                                        <?php
                                             }
                                             
                                        ?>
                                             
                                        </table>
                                        <?php
                                             }
                                        ?>
                                   </div>
                              </div>

                              

                              <div class="setting u-margin-top-2">
                                   <h1 class="pl-1">
                                        Setting
                                   </h1>
                                   <div class="overview-container">
                                        <span class="account-message">Deactivate your account?</span>
                                        <span>
                                             <input type="submit" name="profile_submit" placeholder="" class="btn-danger btn-sm ml-1" value="Deactivate" />
                                        </span>
                                   </div>
                              </div>
                           
                         </div>
                    </div>
               </div>
               <?php include('./contents/footer.php');?>
               <?php include('./contents/modals.php');?>
          </div>
     </body>
</html>
