<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `customer` WHERE CONCAT(`customer_id`,`is_active`,`fullname`,`email`,`address`,`contact_number`,`joined_on`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `customer`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "dairy");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<div class="nav_text" style="color:white; font-size:26px; margin-left:20px; margin-top:10px; font-weight:bold;"> Customer List </div>
<!-- <form action="src/manage.php" class="search" method="post">
					<input type="text" class="search__input" placeholder="Search" name="valueToSearch" w/>
					<button class="search__btn" name="search"> <svg class="search__icon">
							<use xlink:href="./img/sprite.svg#icon-search">
						</svg>
					</button> -->
				<!-- </form> -->
<form action="src/manage.php" method="post">
     <div style="float:right; margin-right:5px;">
            <input type="text" name="valueToSearch" placeholder="Value To Search" >
            <input type="submit" name="search" value="Search"></div><br><br>
          
            <div class="customer-list">
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

      <!--  table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                <td><?php echo $row['customer_id'];?></td>

              <td><?=$row['fullname']?></td>
               <td><?=$row['email']?></td>
               <td><?=$row['address']?></td>
               <td><?=$row['contact_number']?></td>
               <td><?=$row['joined_on']?></td>
               <td><?=$row['is_active']?></td>
                </tr>
                <?php endwhile;?>
                </div>
            </table>
        </form>
    
