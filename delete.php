<?php

include "connection.php";

$STB_No=$_GET['STB_No'];

$sql="delete from registration where STB_No = $STB_No";
$query=mysqli_query($conn,$sql);

header("location:index.php");

?>