<?php
include('con.php');

if(isset($_REQUEST['blogs'])){
    $array = array();
    $query=mysqli_query($con, "SELECT * FROM blogs") or die(mysqli_error($con));
    $count =0;
    while($row=mysqli_fetch_assoc($query))
    {
        $array[$count++] = $row;
    }
    echo json_encode($array);
    mysqli_close($con);
}

else{
  echo "An error has occured";
}
?>
