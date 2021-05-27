<?php
$error = false;

// for student credential check
if (isset($_POST["submit1"])) {
    // Connecting with data base
    include '_includes/connect.php';

    $smail = $_POST["smail"];
    $spass = $_POST["spass"];

    // fetchings datas
    $user = "SELECT * FROM `students` WHERE SEmail = '$smail' AND SPassword = '$spass'";
    $result = mysqli_query($conn, $user);
    $num = mysqli_num_rows($result);
    if (($num > 0)) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['smail'] = $smail;
        header("location: student.php");
    } else {
        $error = "Invalid Credentials";
    }
}


// for admin credential check
if (isset($_POST["submit2"])) {
    // Connecting with data base
    include '_includes/connect.php';

    $amail = $_POST["amail"];
    $apass = $_POST["apass"];

    // fetchings datas
    $user = "SELECT * FROM `admin` WHERE AEmail = '$amail' AND APassword = '$apass'";
    $result = mysqli_query($conn, $user);
    $num = mysqli_num_rows($result);
    if (($num > 0)) {
        session_start();
        $_SESSION['loggedin'] = true;
        header("location: admin.php");
    } else {
        $error = "Invalid Credentials";
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

    <title>Welcome</title>

    <!-- Styling codes here -->
    <link href="_css/styles.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="welcome">
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- giving error msg if worng data given -->
    <?php
    if ($error) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!!</strong> ' . $error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    ?>

    <!-- container for login forms -->
    <div class="container-md mt-5">
        <div class="row">

            <!-- Student login -->
            <div class="col-md-6 Login">
                <H3 class="mt-5 text-center">Login for Student</H3>

                <!-- form for student details input -->
                <div class="row mt-5" style="height: 300px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="welcome.php" method="post">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" class="form-control" name="smail" placeholder="Your Email *" required />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" class="form-control" name="spass" placeholder="Your Password *" required />
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-success ssubmit" name="submit1">LogIn</button>
                        </form><br>
                        <a href="sSignup.php" class="alink">Signup?</a>
                    </div>
                </div>

            </div>

            <!-- Admin login -->
            <div class="col-md-6 Login">
                <H3 class="mt-5 text-center">Login for Admin</H3>

                <!-- form for admin details input -->
                <div class="row mt-5" style="height: 300px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="welcome.php" method="post">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" class="form-control" name="amail" placeholder="Your Email *" required />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" class="form-control" name="apass" placeholder="Your Password *" required />
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-danger ssubmit" name="submit2">LogIn</button>
                        </form><br>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>