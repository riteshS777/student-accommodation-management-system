<?php
// session check
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: welcome.php");
    exit;
}

//updating the values
if (isset($_POST['update'])) {
    include '_includes/connect.php';
    $rid = $_POST["rid"];
    $rtype = $_POST["rtype"];
    $rlocation = $_POST["rlocation"];
    $rcharge = $_POST["rcharge"];

    $sql = mysqli_query($conn, "UPDATE rooms SET `Room ID` = '$rid', `Type` = '$rtype', `Location` = '$rlocation', `Charge` = '$rcharge' WHERE ID = '$_GET[ID]'");
}
?>

<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Powers | Room Details</title>

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
            <span class="navbar-brand" style="color: yellow;">Room Details</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="studentlist.php">StudentDetails</a>
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
                        <th>Room Status</th>
                        <th>Payment Status</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        include '_includes/connect.php';
                        $sql = mysqli_query($conn, "SELECT * FROM rooms");
                        $i = 1;
                        // displaying the values 
                        while ($row = mysqli_fetch_array($sql)) {
                            if ($row['Room Status'] == 'Available') { ?>
                                <tr class="even">
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td class="text-center"><?php echo $row['Room ID']; ?></td>
                                    <td class="text-center"><?php echo $row['Type']; ?></td>
                                    <td class="text-center"><?php echo $row['Location']; ?></td>
                                    <td class="text-center">&#8377; <?php echo $row['Charge']; ?></td>
                                    <td class="text-center"><?php echo $row['Room Status']; ?></td>
                                    <td class="text-center">Not Paid</td>
                                    <td>
                                        <!-- modal for edit data -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editroom<?php echo $i; ?>">Update</button>

                                        <div class="modal fade" id="editroom<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="">Edit Room details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form for edit values  -->
                                                        <form action="roomdetails.php?ID=<?php echo $row['ID']; ?>" method="post">
                                                            <div class="mb-3">
                                                                <label for="rid" class="form-label">Edit Room ID</label>
                                                                <input type="text" class="form-control" id="rid" name="rid" value="<?php echo $row['Room ID']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="rtype" class="form-label">Edit Room Type</label>
                                                                <input type="text" class="form-control" id="rtype" name="rtype" value="<?php echo $row['Type']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="rlocation" class="form-label">Edit Room Location</label>
                                                                <input type="text" class="form-control" id="rlocation" name="rlocation" value="<?php echo $row['Location']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="rcharge" class="form-label">Edit Room Charge</label>
                                                                <input type="number" class="form-control" id="rcharge" name="rcharge" value="<?php echo $row['Charge']; ?>">
                                                            </div>
                                                            <button type="submit" class="btn btn-success" name="update">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- for delete data -->
                                    <td><a href="delete.php?ID=<?php echo $row['ID']; ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete?');">Delete</a></td>
                                </tr>
                            <?php } else { ?>
                                <tr class="odd">
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td class="text-center"><?php echo $row['Room ID']; ?></td>
                                    <td class="text-center"><?php echo $row['Type']; ?></td>
                                    <td class="text-center"><?php echo $row['Location']; ?></td>
                                    <td class="text-center">&#8377; <?php echo $row['Charge']; ?></td>
                                    <td class="text-center"><?php echo $row['Room Status']; ?></td>
                                    <td class="text-center">Paid</td>
                                    <td>
                                        <!-- modal for edit data -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editroom<?php echo $i; ?>">Update</button>

                                        <div class="modal fade" id="editroom<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="">Edit Room details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form for edit values  -->
                                                        <form action="roomdetails.php?ID=<?php echo $row['ID']; ?>" method="post">
                                                            <div class="mb-3">
                                                                <label for="rid" class="form-label">Edit Room ID</label>
                                                                <input type="text" class="form-control" id="rid" name="rid" value="<?php echo $row['Room ID']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="rtype" class="form-label">Edit Room Type</label>
                                                                <input type="text" class="form-control" id="rtype" name="rtype" value="<?php echo $row['Type']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="rlocation" class="form-label">Edit Room Location</label>
                                                                <input type="text" class="form-control" id="rlocation" name="rlocation" value="<?php echo $row['Location']; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="rcharge" class="form-label">Edit Room Charge</label>
                                                                <input type="number" class="form-control" id="rcharge" name="rcharge" value="<?php echo $row['Charge']; ?>">
                                                            </div>
                                                            <button type="submit" class="btn btn-success" name="update">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- for delete data -->
                                    <td><a href="delete.php?ID=<?php echo $row['ID']; ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete?');">Delete</a></td>
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


    </div>




</body>

</html>