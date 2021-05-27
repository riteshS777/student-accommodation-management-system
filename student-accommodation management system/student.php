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

    <title>Student Portal | Room/(s) Checkout</title>

    <!-- Styling codes here -->
    <link href="_css/styles.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="studentbackground">

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand" style="color: yellow;">Room/(s) CheckOut</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="student2.php">Check In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logout.php">LogOut</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-md">

        <!--added data table for Room Details-->
        <div class="card-body">
            <div class="table-responsive mt-2">
                <table class="table table-bordered " width="100%" cellspacing="0">
                    <thead class="head text-center">
                        <th>SL No.</th>
                        <th>ROOM ID</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Charge</th>
                        <th>CheckOut</th>
                    </thead>
                    <tbody>
                        <?php

                        include '_includes/connect.php';

                        $smail = $_SESSION['smail'] ;

                        // fetching corrosponding details form record table using student email
                        $sql = mysqli_query($conn, "SELECT * FROM record WHERE `SEmail` = '$smail'");
                        $i = 1;

                        
                        // fetching corrosponding details form room table using room id
                        while ($row = mysqli_fetch_array($sql)) {

                            $sql_room = mysqli_query($conn,"SELECT * FROM rooms WHERE `Room ID` = '$row[RoomID]'");
                            $row_room = mysqli_fetch_array($sql_room);
                        ?>

                        <!-- displaying the values -->
                        <tr class="even">
                            <td class="text-center"><?php echo $i; ?></td>
                            <td class="text-center"><?php echo $row['RoomID']; ?></td>
                            <td class="text-center"><?php echo $row_room['Type']; ?></td>
                            <td class="text-center"><?php echo $row_room['Location']; ?></td>
                            <td class="text-center">&#8377; <?php echo $row_room['Charge']; ?></td>

                            <!-- sending student eamil and room id for checkout purpose -->
                            <td class="text-center"><a href="checkout.php?SEmail=<?php echo $smail; ?>&RoomID=<?php echo $row['RoomID']; ?>" class="btn btn-danger" onclick="return confirm('Do you want to CHECKOUT?');">CHECKOUT</a></td>
                        </tr>
                           
                        <?php 
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    </div>




</body>

</html>