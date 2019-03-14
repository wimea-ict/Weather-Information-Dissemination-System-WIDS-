
<?php
include('con.php');
 if(isset($_REQUEST['post'])){

  $title = $_POST['title'];
  $message = $_POST['message'];
  $date = date("M,d,Y h:i:s A");


  $p = mysqli_query($con, "insert into blogs values (NULL,'$title','$message','$date','Ses','Not')") or die(mysqli_error($con));
   if($p){
     header("Location: ../client/blog.php");
   }
  else {
     echo "bad things";
  }

}else{
  echo "dam you";
}

?>
