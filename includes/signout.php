<?php
if(!isset($_SESSION)){
    session_start();
}
session_destroy();
?>
 <script>
    localStorage.setItem('closed', false);
    localStorage.removeItem("closed");
    // console.log(localStorage.getItem('closed'));
</script> 
<?php
echo "<script>window.location='../index.php';</script>";


?>

