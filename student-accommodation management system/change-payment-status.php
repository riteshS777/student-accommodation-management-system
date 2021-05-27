<?php
 include '_includes/connect.php';
//  feching room id
 $sql = mysqli_query($conn,"SELECT payment_status FROM record WHERE RoomID = '$_GET[id]'");
 $row = mysqli_fetch_array($sql);
 if($row[0] == 0){
 	$sql = mysqli_query($conn,"UPDATE record SET payment_status = '1' WHERE RoomID = '$_GET[id]'");
 	$sql = mysqli_query($conn,"UPDATE rooms SET `Room Status` = 'Allocated' WHERE `Room ID` = '$_GET[id]'");
 }
 if($row[0] == 1){
 	$sql = mysqli_query($conn,"UPDATE record SET payment_status = '0' WHERE RoomID = '$_GET[id]'");
 	$sql = mysqli_query($conn,"UPDATE rooms SET `Room Status` = 'Available' WHERE `Room ID` = '$_GET[id]'");
 }

header('location:studentlist.php');


?>