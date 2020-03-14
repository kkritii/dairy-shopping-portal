<?php

    require_once('../backend/includes/db_connect.php');
    if(isset($_POST['submit'])){
       $name =  $_POST['name'];
       $email =  $_POST['email'];
       $address =  $_POST['address'];
       $contact =  $_POST['contact'];
       $password =  $_POST['password'];
       $isempty = false;
       $uppercase = preg_match('@[A-Z]@', $password);
       $lowercase = preg_match('@[a-z]@', $password);
       $number    = preg_match('@[0-9]@', $password);
    

       echo "<script>alert('".$contact."')</script>";

        if(empty($name) || empty($email)|| empty($address) || empty($contact) ||empty($password) ){
            $isempty = true;
            echo "<span class='notice-warning'>Fill in all the inputs</span>";
        }  else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "<span class='notice-warning'>Invalid Email</span>";
        } else if(!(filter_var($contact,FILTER_SANITIZE_NUMBER_INT))){
            echo "<span class='notice-warning'>Invalid Contact number</span>";
        } else if((!strlen($contact) == 7 || !strlen($contact) == 10)){
            echo "<span class='notice-warning'>Invalid Contact number</span>";
        } else if(is_numeric($address)){
            echo "<span class='notice-warning'>Invalid Address</span>";
        } else if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            echo "<span class='notice-warning'>Password should be at least 8 characters in length and should include at least one upper case letter and one number.</span>";
        } else{
            $sql = "SELECT email FROM customer WHERE email = '$email'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) >0 ){
                echo "<span class='notice-warning'>Email Already Exists</span>";

            }else{
                $sql = "INSERT INTO `customer` (`fullname`,`email`,`password`,`contact_number`,`address`) VALUES ('$name','$email',md5('$password'),'$contact','$address')";
                if(mysqli_query($conn,$sql)){
                    echo "<script>window.location = 'index.php'</script>";
                }else{
                    echo "<script>alert('".mysqli_error($conn)."')</script>";
                    mysqli_error($conn);
                    // echo "<script>alert('not Inserted')</script>";    
                }
            
            }
        }
        }
?>