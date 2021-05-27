<?php
session_start();
if (empty($_SESSION['smail'])) {
    header("location: welcome.php");
    exit;
}
include '_includes/connect.php';

$smail = $_SESSION['smail'];

$sql = mysqli_query($conn, "SELECT * FROM rooms WHERE ID = '$_GET[ID]'");

$row = mysqli_fetch_array($sql);
$roomid = $row['Room ID'];



$sql = "INSERT INTO `record` (`SEmail`, `RoomID`, `payment_status`, `DateTime`) VALUES ('$smail', '$roomid', '0', current_timestamp())";
$result = mysqli_query($conn, $sql);
header('location:student2.php');
