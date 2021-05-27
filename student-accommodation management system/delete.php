<?php
include '_includes/connect.php';
$sql = mysqli_query($conn,"DELETE FROM rooms WHERE ID= '$_GET[ID]'");
header('location:roomdetails.php');
?>