<?php

session_start();
$con = mysqli_connect('localhost','root','karanzi','security') or die("connection error".mysqli_connect.error());
if (!$con){
  echo "no database connection";
  exit();
}

 ?>
