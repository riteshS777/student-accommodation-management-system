<?php
// session check
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: welcome.php");
    exit;
}

$error = false;
$show = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '_includes/connect.php';
    
    $rid = $_POST["rid"];
    $rtype = $_POST["rtype"];
    $rlocation = $_POST["rlocation"];
    $rcharge = $_POST["rcharge"];

    // checking if room id exist or not
    $idexits = "SELECT * FROM `rooms` WHERE `Room ID` = '$rid'";
    $result = mysqli_query($conn, $idexits);
    $noRows1 = mysqli_num_rows($result);

    if ($noRows1 > 0) {
        $error = " Room ID already exists.";
    } else {
        $sql = "INSERT INTO `rooms` (`Room ID`, `Type`, `Location`, `Charge`, `Room Status`, `Payment Status`, `Date Time`) VALUES ('$rid', '$rtype', '$rlocation', '$rcharge', 'Available', 'Not Paid', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $show = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel | Insert Details</title>

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
            <span class="navbar-brand" style="color: yellow;">Insert Room Details</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logout.php">LogOut</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if ($show) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulations!</strong> You have added new ROOM.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if ($error) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!!</strong> You have failed to create a room.' . $error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    ?>

    <!-- comtent starts here -->
    <div class="container-md mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 createR">
                <H3 class="mt-5 text-center">Create Rooms</H3>

                <div class="row mt-5">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="insert.php" method="post">
                            <!-- Room ID input -->
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" name="rid" placeholder="Room ID *" required />
                            </div>

                            <!-- Room Type input -->
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" name="rtype" placeholder="Room Type *" required />
                            </div>

                            <!-- Room Location input -->
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" name="rlocation" placeholder="Room Location *" required />
                            </div>

                            <!-- Room Charge input -->
                            <div class="form-outline mb-4">
                                <input type="number" class="form-control" name="rcharge" placeholder="Room Charge *" min="1" required />
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-success cr" name="submit123">Create Room</button> <br><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>