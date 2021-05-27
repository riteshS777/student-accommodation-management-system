<?php
include '_includes/connect.php';
$sql = mysqli_query($conn,"DELETE FROM record WHERE SEmail= '$_GET[SEmail]' AND RoomID = '$_GET[RoomID]'");

$sql = mysqli_query($conn,"UPDATE rooms SET `Room Status` = 'Available' WHERE `Room ID` = '$_GET[RoomID]'");

header('location:student.php');
?>
