<?php
include('con.php');
if (isset($_POST['but'])) {


$email = $_POST['email'];
$pass = $_POST['password'];
$query = "select * from Admin where email = '".$email."'";
$suc = mysqli_query($con, $query) or die(mysqli_error($con));

if(mysqli_num_rows($suc) != 0){
  $_SESSION['email'] = $email;
  header("Location: ../client/blog.php");
}
else{
    header("Location: ../client/index.php");
}
}
else {
echo "database not connected";
}




 ?>
