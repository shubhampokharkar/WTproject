<?php

include "connection.php";

$STB_No=$_GET['STB_No'];

$sql="delete from registration where STB_No = $STB_No";
$query=mysqli_query($conn,$sql);

if($query)
{
   echo "<script>alert('Data deleted Successfully')</script>";
   echo "<script>window.open('suspend.php','_self')</script>";
}
else
{
   echo "<script>alert('failed to delete data')</script>";
   echo "<script>window.open('suspend.php','_self')</script>";
}

?>