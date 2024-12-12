<?php
session_start();
include("connection.php");
include("function.php");

$user_data = check_login($con);

if (isset($_GET['id'])) {
    $regno = $_GET['id'];

    // Fetch car details
    $query = "SELECT * FROM cars WHERE regno = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $regno);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $car = $result->fetch_assoc();
    } else {
        echo "Car not found";
        exit;
    }
} else {
    echo "Invalid request";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $make = $_POST['make'];
    $YOM = $_POST['YOM'];
    $enginecc = $_POST['enginecc'];
    $transmission = $_POST['transmission'];
    $fuel = $_POST['fuel'];
    $price = $_POST['price'];

    // Update car details
    $update_query = "UPDATE cars SET  make = ?, YOM = ?, enginecc = ?, transmission = ?, fuel = ?, price = ? WHERE regno = ?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("sssssss", $make, $YOM, $enginecc, $transmission, $fuel, $price, $regno);


    if ($stmt->execute()) {
        header("Location: vieweditcar.php");
        exit;
    } else {
        echo "Error updating record: " . $con->error;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            width: auto;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 675px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: lavender;
            height: 100%;
        }




        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }
        }
    </style>
</head>

<body>



    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Fourways Motors</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Dashboard</a></li>

                    <li><a href="addcars.php">Add cars</a></li>
                    <li><a href="viewcars.php">view cars</a></li>
                    <li><a href="vieweditcar.php">Edit Car Details</a></li>
                    <li><a href="viewdeletecar.php">Delete cars</a></li>
                    <li><a href="index.php">Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>



    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <h2>Fourways Motors</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="admindashboard.php">Dashboard</a></li>
                    <li><a href="addcars.php">Add cars</a></li>
                    <li><a href="viewcars.php">View cars</a></li>
                    <li><a href="vieweditcar.php">Edit Car Details</a></li>
                    <li><a href="viewdeletecar.php">Delete cars</a></li>
                    <li><a href="index.php">Logout</a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <div class="well">

                    <p style="font-size:30px;font-weight:bolder; color:darkblue;">Hello Admin
                        <?php echo $user_data['fullname']; ?>
                    </p>
                    <p style="font-weight:bolder;">Welcome to FourWays Motors</p>
                    <p style="font-weight:550;">
                    </p>
                </div>
                <div class="container">
                    <h2>Edit Car Details</h2>
                    <form method="post">

                        <div class="form-group">
                            <label for="make">Make:</label>
                            <input type="text" class="form-control" id="make" name="make"
                                value="<?= htmlspecialchars($car['make']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="YOM">Year of Manufacture:</label>
                            <input type="text" class="form-control" id="YOM" name="YOM"
                                value="<?= htmlspecialchars($car['YOM']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="enginecc">Engine CC:</label>
                            <input type="text" class="form-control" id="enginecc" name="enginecc"
                                value="<?= htmlspecialchars($car['enginecc']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="transmission">Transmission:</label>
                            <input type="text" class="form-control" id="transmission" name="transmission"
                                value="<?= htmlspecialchars($car['transmission']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="fuel">Fuel:</label>
                            <input type="text" class="form-control" id="fuel" name="fuel"
                                value="<?= htmlspecialchars($car['fuel']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="price">price:</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="<?= htmlspecialchars($car['price']) ?>" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="vieweditcar.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>



                <style>
                    .container-fluid {
                        background-color: #90d5ff;
                        background-size: cover;
                    }
                </style>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>

</html>