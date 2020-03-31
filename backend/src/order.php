
     
         <div  style="color:white; font-size:26px; margin-left:20px; margin-top:10px; font-weight:bold;" >Booking list</div>
     <div class="product-list">
          <table class="product_table">
              <tr>
                 <th>S.no</th>
                 <th>Full name</th>
                 <th>Address</th>
                 <th>Contact No</th>
                 <th>Email</th>
                 <th>Product_name</th>
                 <th>Quantity</th>
                 <th>Total Price</th>
                 <th>Order Date</th>
                 <th>Deliver?</th>
              </tr>
              <?php
                    
                    $i = 1;
                    require_once("../includes/db_connect.php");
                    $sql = "SELECT `full_name`,`address`,`contact_number`,`email`,`product_name`,`quantity`,`total_price`,`order_date`,`deliver` FROM booking LIMIT 100";
                    $result = mysqli_query($conn,$sql);  

                    if(mysqli_num_rows($result)>0){
                         while($row = mysqli_fetch_assoc($result)) {
               ?>
                         <tr>
                              <td><?=$i++?></td>

                              <td><?=$row['full_name']?></td>
                              <td><?=$row['address']?></td>
                              <td><?=$row['contact_number']?></td>
                              <td><?=$row['email']?></td>
                              <td><?=$row['product_name']?></td>
                              <td><?=$row['quantity']?></td>
                              <td><?=$row['total_price']?></td>
                              <td><?=$row['order_date']?></td>
                              <td><?=$row['deliver']?></td>
                              <!-- <td><a onclick="return confirm('Are you sure you want to delete this entry?')" href="src/delete_customer.php?action=delete&id=<?= $row['customer_id'];?>"><img class='table-icon ' src='./icons/trash.png'></img></a></td> -->
                              
                              
                    <?php
                       }
                    }
                         ?>   
           
          </table> 
     </div>
    