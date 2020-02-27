<?php
session_start();
if(isset($_SESSION['message'])){
    echo "<script>$('.form-box').addClass('message-aminate'); </script>";

    if($_SESSION['error'] == true){
        echo "   <div class='form-box-error'>
                        <div class='popup-code'>
                            ERROR
                        </div>
                        <div class='popup-message'>"
                            .$_SESSION['message'].
                        "</div>
                </div>";
    } else{
        echo "   <div class='form-box-success'>
                        <div class='popup-code'>
                            SUCCESS
                        </div>
                        <div class='popup-message'>"
                            .$_SESSION['message'].
                        "</div>
                </div>";
    }
    $error =false;
}
?>
<script>
    setTimeout(function() {
        $('.form-box-error').fadeOut('fast');
        $('.form-box-success').fadeOut('fast'); 
    }, 5000); 
</script>