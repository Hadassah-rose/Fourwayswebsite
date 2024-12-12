<?php
session_start();
include("connection.php");
include("function.php");
$user_data = check_login($con);

$message = ""; // Initialize the message variable

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Capture form inputs
    $regno = $_POST['regno'];
    $make = $_POST['make'];
    $YOM = $_POST['YOM'];
    $enginecc = $_POST['enginecc'];
    $transmission = $_POST['transmission'];
    $fuel = $_POST['fuel'];
    $price = $_POST['price'];

    // Handle file upload
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["profileImage"]["name"]);
    $uploadOk = 1;

    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)) {
        $query = "INSERT INTO cars (regno, make, YOM, enginecc, transmission, fuel, price, profile_image)
                  VALUES ('$regno','$make', '$YOM', '$enginecc', '$transmission', '$fuel','$price', '$targetFile')";

        if (mysqli_query($con, $query)) {
            $message = "Registration successful";
        } else {
            $message = "Database error: " . mysqli_error($con);
        }
    } else {
        $message = "Sorry, there was an error uploading your file.";
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
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 810px;
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

        .signup-container {
            background-color: lavender;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 4px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: steelblue;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: steelblue;
        }

        .signup-link {
            text-align: center;
            margin-top: 16px;
        }

        .signup-link a {
            color: #007bff;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            background-color: lavender;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: steelblue;
            color: black;
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
                    <li class="active"><a href="admindashboard.php">Dashboard</a></li>
                    <li><a href="addcars.php">Add cars</a></li>
                    <li><a href="viewcars.php">View cars</a></li>
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
                <div class="well" style="width:100%;">
                    <p style="font-size:30px;font-weight:bolder; color:darkblue;">Hello Admin
                        <?php echo $user_data['fullname']; ?>
                    </p>

                    <p style="font-weight:bolder;">Welcome to Fourways Motors</p>
                    <p style="font-weight:550;">

                    </p>



                    <div class="row">
                        <div class="column left">
                            <div class="signup-container">
                                <h2>Add Cars</h2>
                                <form action="" method="POST" enctype="multipart/form-data">

                                    <label for="regno">Reg No:</label>
                                    <input type="text" id="regno" name="regno" required>

                                    <label for="make">Make $ Model:</label>
                                    <input type="text" id="make" name="make" required>

                                    <label for="YOM">YOM:</label>
                                    <input type="text" id="YOM" name="YOM" required>

                                    <label for="enginecc">Engine CC:</label>
                                    <input type="text" id="enginecc" name="enginecc" required>

                                    <label for="transimission">Transmission:</label>
                                    <select id="transmission" name="transmission" required="">
                                        <option value="Automatic">Automatic</option>
                                        <option value="Manual">Manual</option>
                                        <option value="CVT">CVT</option>

                                        <!-- Add more options as needed -->
                                    </select>
                                    <label for="fuel">Fuel:</label>
                                    <select id="fuel" name="fuel" required="">
                                        <option value="Petrol">Petrol</option>
                                        <option value="Diesel">Diesel</option>
                                        <!-- Add more options as needed -->
                                    </select>

                                    <label for="price">Price:</label>
                                    <input type="text" id="price" name="price" required>

                                    <label for="profileImage">Profile Image: </label>
                                    <input type="file" name="profileImage" id="profileImage" accept="image/*">

                                    <button value="signup" type="submit">Submit</button>
                                    <span id="successMessage" style="color: green; font-size:large; font-weight: bold;">
                                        <?php if (!empty($message))
                                            echo $message; ?>
                                    </span>
                                </form>

                            </div>
                        </div>

                        <div class="column right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .container-fluid {
            background-color: #90d5ff;
            background-size: cover;
        }

        * {
            box-sizing: border-box;
        }

        /* Create two unequal columns that floats next to each other */
        .column {
            float: left;
            padding: 10px;
            /* Should be removed. Only for demonstration */
        }

        .left {
            width: 35%;
        }

        .right {
            width: 65%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Add this script section at the end of the HTML body -->

</body>

</html>