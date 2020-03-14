<?php
    session_start();
    require_once('./backend/includes/db_connect.php');
    include('./includes/cart.php');
    //for userlogin
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./imgs/title-cow.png" type="img/png">
    <title>Dairy Store</title>
    <link rel="stylesheet" href="./css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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
             // echo $row['fullname'];
        ?>
        <div class="section-account">
            <div class="account-container">
                <div class="col-1">
                    <div class="profile-box">
                        <img src="./backend/avatars/<?=$row['profile_pic']?>" class="profile-pic" alt="">
                        <!-- <button onclick="chooseFile();" name="profile_pic"  class="btn-sm btn-file u-margin-top-v-small profile-btn">Change avatar</button> -->
                        <form id="upload-avatar-form" class="u-margin-top-v-small upload-avatar-form" action="./includes/uploadAvatar.php" method="POST" enctype="multipart/form-data">
                            <input type="file" class="u-margin-top-v-small" name="file" id="fileinput" >
                            <input type="submit" class="btn-sm btn-file u-margin-top-v-small" value="submit" name="submit" id="upload-avatar-submit">
                        </form>
                        
                        <script>
                            function chooseFile(){
                                document.getElementById('fileinput').click();
                            }
                        </script>
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
                    <div class="overview">
                        <h1 class="pl-2">
                            Edit Profile
                        </h1>
                        <div class="overview-container">
                            <table>
                                <form action="" class="profile-form" method="POST">
                                    <tr class="form__group u-margin-top-small">
                                        <th>
                                            <label  class="profile_label">Fullname</label>
                                        </th> 
                                        <th>
                                        :
                                        </th>
                                        <td>
                                            <input type="text" name="profile_name" class="profile-form-input" placeholder="" value="<?=$row['fullname'];?>" >
                                        </td>
                                    </tr>
                                    <tr class="form__group">
                                        <th>
                                            <label  class="profile_label">Address</label>
                                        </th> 
                                        <th>
                                        :
                                        </th>
                                        <td>
                                            <input type="text" name="profile_name" class="profile-form-input" placeholder=""  value="<?=$row['address'];?>">
                                        </td>
                                    </tr>
                                    <tr class="form__group">
                                        <th>
                                            <label  class="profile_label">Contact Number</label>
                                        </th> 
                                        <th>
                                        :
                                        </th>
                                        <td>
                                            <input type="text" name="profile_name" class="profile-form-input" placeholder=""  value="<?=$row['contact_number'];?>">
                                        </td>
                                    </tr><tr class="form__group">
                                        <th>
                                            <label  class="profile_label">New Password</label>
                                        </th> 
                                        <th>
                                        :
                                        </th>
                                        <td>
                                            <input type="text" name="profile_name" class="profile-form-input" placeholder="Enter new Password">
                                        </td>
                                    </tr>
                                    <tr class="form__group">
                                        <th>
                                            <label  class="profile_label">Old Password</label>
                                        </th> 
                                        <th>
                                        :
                                        </th>
                                        <td>
                                            <input type="text" name="profile_name" class="profile-form-input" placeholder="Your Old Password">
                                        </td>
                                    </tr>
                                    <tr class="form__group">
                                        <th>
                                        </th> 
                                        <td>
                                        </td>
                                        <td>
                                            <input type="submit" name="profile_submit" placeholder=""  class="btn-primary btn-sm" value=" Save ">
                                        </td>
                                    </tr>
                                    <!-- <tr class="form__group">
                                       
                                    </tr> -->
                                </form>
                            </table>
                        </div>
                    </div>
                    <div class="history u-margin-top-2">
                        <h1 class="pl-2">
                            Purchase History
                        </h1>
                        <div class="overview-container">
                            <span class="account-message">Your Purchase History is Empty!</span>
                            
                        </div>
                    </div>
                    <div class="setting u-margin-top-2">
                        <h1 class="pl-2">
                           Setting
                        </h1>
                        <div class="overview-container">
                            <span class="account-message">Deactivate your account?</span>
                            <span>
                                <input type="submit" name="profile_submit" placeholder=""  class="btn-danger btn-sm ml-1" value="Deactivate">
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