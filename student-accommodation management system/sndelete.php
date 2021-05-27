<?php
include '_includes/connect.php';
$sql = mysqli_query($conn,"DELETE FROM students WHERE ID= '$_GET[ID]'");

//fetching room ID
$sql = mysqli_query($conn,"SELECT `RoomID` FROM record WHERE SEmail= '$_GET[smail]'");
$row = mysqli_fetch_array($sql);
$roomid = $row['RoomID'];
// echo $roomid;

$sql = mysqli_query($conn,"DELETE FROM record WHERE SEmail= '$_GET[smail]'");

$sql = mysqli_query($conn,"UPDATE rooms SET `Room Status` = 'Available' WHERE `Room ID` = '$roomid'");
header('location:studentlist.php');
?>