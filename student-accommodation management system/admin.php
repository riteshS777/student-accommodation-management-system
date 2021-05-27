<?php
// session check
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: welcome.php");
    exit;
}
// Connecting with data base
include '_includes/connect.php';

// Count of number of student
$row1 = "SELECT * FROM `students`";
$noRows1 = mysqli_num_rows(mysqli_query($conn, $row1));

// Count of number of rooms
$row2 = "SELECT * FROM `rooms`";
$noRows2 = mysqli_num_rows(mysqli_query($conn, $row2));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>

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
            <span class="navbar-brand" style="color: yellow;">Admin</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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

    <!-- comtent starts here -->
    <div class="container-md mt-5">
        <div class="row mt-5">

            <!-- student details -->
            <div class="col-md-6 cardb">
                <!-- 1st box -->
                <div class="card ">
                    <div class="card-body text-center">
                        <div class="container">
                            <img style="max-width: 125px;" class="img-fluid rounded-circle" src="_icon/users.png" alt="students">
                        </div>
                        <h1><?php echo $noRows1 ?></h1>
                        <p>Here you can veiw student details</p>
                        <a href="studentlist.php">
                            <h2>STUDENT DETAILS</h2>
                        </a>
                    </div>
                </div>
            </div>

            <!-- room details -->
            <div class="col-md-6 cardb">
                <!-- 1st box -->
                <div class="card ">
                    <div class="card-body text-center">
                        <div class="container">
                            <img style="max-width: 125px;" class="img-fluid rounded-circle" src="_icon/categories.png" alt="room details">
                        </div>
                        <h1><?php echo $noRows2 ?></h1>
                        <p>Here you can veiw Room details</p>
                        <a href="roomdetails.php">
                            <h2>ROOM DETAILS</h2>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>



</body>

</html>