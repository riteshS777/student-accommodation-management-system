<?php

$error = false;
$show = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '_includes/connect.php';

    $sname = $_POST["sname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];

    // checking if student email exist or not
    $emailexits = "SELECT * FROM `students` WHERE `SEmail` = '$email'";
    $result = mysqli_query($conn, $emailexits);
    $noRows1 = mysqli_num_rows($result);

    if ($noRows1 > 0) {
        $error = " Student EMAIL already exists.";
    } else {
        if (($pass == $cpass)) {
            // creating student data table
            $sql = "INSERT INTO `students` (`Student Name`, `SEmail`, `SPassword`, `Date Time`) VALUES ('$sname', '$email', '$pass', current_timestamp())";
            $result = mysqli_query($conn, $sql);

            $show = true;
        } else {
            $error = " Password don't match";
        }
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

    <title>Sign Up</title>

    <!-- Styling codes here -->
    <link href="_css/styles.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="adminbackground">
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    if ($show) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulations!</strong> You have successfully created a new ACCOUNT.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if ($error) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!!</strong> You have failed to create a ACCOUNT.' . $error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    ?>

    <!-- comtent starts here -->
    <div class="container-md mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 createR">
                <H3 class="mt-5 text-center">Students Details</H3>

                <div class="row mt-5">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="sSignup.php" method="post">
                            <!-- Student name input -->
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" name="sname" placeholder="Studnet Name *" required />
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" class="form-control" name="email" placeholder="Your Email *" required />
                            </div>

                            <!-- Passward input -->
                            <div class="form-outline mb-4">
                                <input type="password" class="form-control" name="pass" placeholder="Your Password *" required />
                            </div>

                            <!-- Confirm Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" class="form-control" name="cpass" placeholder="Again type Ur Password *" required />
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-success cr">Create Account</button><br><br>
                            <a href="welcome.php" class="alink">Signin</a> <br><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>