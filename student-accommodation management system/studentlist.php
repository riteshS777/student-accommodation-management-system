<?php
// session check
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: welcome.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Powers | Student Details</title>

    <!-- Styling codes here -->
    <link href="_css/styles.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="adminbackground">

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand" style="color: yellow;">Student Details</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="roomdetails.php">RoomDetails</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="insert.php">Insert</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logout.php">LogOut</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-md">

        <!--added data table for studnet Details-->
        <div class="card-body">
            <div class="table-responsive mt-2">
                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    <thead class="head">
                        <tr>
                            <th rowspan="2">ID</th>
                            <th rowspan="2">Student Name</th>
                            <th rowspan="2">Student Email</th>
                            <th colspan="5">Room Details</th>
                            <th rowspan="2">Delete</th>
                        </tr>

                        <tr>
                            <th>Room Id</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Charge</th>
                            <th>Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '_includes/connect.php';
                        $sql = mysqli_query($conn, "SELECT * FROM students");
                        $i = 1;
                        while ($row = mysqli_fetch_array($sql)) {

                            $sql_record = mysqli_query($conn, "SELECT * FROM record WHERE SEmail = '$row[SEmail]'");
                            if (@mysqli_num_rows($sql_record) > 0) {
                                $row_record = mysqli_fetch_array($sql_record);
                                $sql_room = mysqli_query($conn, "SELECT * FROM rooms WHERE  `Room ID` = '$row_record[RoomID]'");
                                $row_room = mysqli_fetch_array($sql_room);
                        ?>
                                <!-- class odd is for color indication that student has booked room -->
                                <tr class="odd">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['Student Name']; ?></td>
                                    <td><?php echo $row['SEmail']; ?></td>
                                    <td><?php echo $row_record['RoomID']; ?></td>
                                    <td><?php echo $row_room['Type']; ?></td>
                                    <td><?php echo $row_room['Location']; ?></td>
                                    <td>&#8377; <?php echo $row_room['Charge']; ?></td>
                                    <!-- for payment  -->
                                    <td>

                                        <?php
                                        if ($row_record['payment_status'] == 1) { ?>
                                            <a href="change-payment-status.php?id=<?php echo $row_record['RoomID']; ?>" class="btn btn-success" onclick="return confirm('Do you want to change status?');">Successfull</a>

                                        <?php } else { ?>
                                            <a href="change-payment-status.php?id=<?php echo $row_record['RoomID']; ?>" class="btn btn-danger" onclick="return confirm('Do you want to change status?');">Due</a>
                                        <?php }
                                        ?>
                                    </td>
                                    <!-- for delete data -->
                                    <td><a href="sdelete.php?ID=<?php echo $row['ID']; ?>&smail=<?php echo $row['SEmail']; ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete the Student?');">Delete</a></td>
                                    

                                </tr>
                            <?php } else {
                            ?>
                                <!-- class even is for color indication that student has not book any room -->
                                <tr class="even">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['Student Name']; ?></td>
                                    <td><?php echo $row['SEmail']; ?></td>
                                    <td colspan="5">Not booked yet</td>
                                    <!-- for delete data -->
                                    <td><a href="sndelete.php?ID=<?php echo $row['ID']; ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete the Student?');">Delete</a></td>
                                </tr>

                        <?php }
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>




</body>

</html>