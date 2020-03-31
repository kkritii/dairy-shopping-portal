<div class="nav_text" style="color:white; font-size:20px;"> Customer List </div>
<div class="product-list">
          <table class="product_table">
                <tr>
                    <th>S.No</th>    
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact Number</th>     
                    <th>Joined_Date</th> 
                    <th>Active</th>               
                    
                </tr>
               <?php
                    require_once("../includes/db_connect.php");
                    $i = 1;
                
                    $sql = "SELECT `customer_id`,`is_active`,`fullname`,`email`,`address`,`contact_number`,`joined_on` FROM customer LIMIT 10";
                    $result = mysqli_query($conn,$sql);  

                    if(mysqli_num_rows($result)>0){
                         while($row = mysqli_fetch_assoc($result)) {
               ?>
                         <tr>
                              <td><?=$i++?></td>

                              <td><?=$row['fullname']?></td>
                              <td><?=$row['email']?></td>
                              <td><?=$row['address']?></td>
                              <td><?=$row['contact_number']?></td>
                              <td><?=$row['joined_on']?></td>
                              <td><?=$row['is_active']?></td>
                              <!-- <td><a onclick="return confirm('Are you sure you want to delete this entry?')" href="src/delete_customer.php?action=delete&id=<?= $row['customer_id'];?>"><img class='table-icon ' src='./icons/trash.png'></img></a></td> -->
                              
                              
                    <?php
                       }
                    }
                         ?>          
          </table>
     </div>
   
     