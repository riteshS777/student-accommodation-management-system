<?php
$conn = mysqli_connect("localhost", "root", "", "students_room");
    if (!$conn) {
        die("Error" . mysqli_connect_error());
    }
?>