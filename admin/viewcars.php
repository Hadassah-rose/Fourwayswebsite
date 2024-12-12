<?php
session_start();
include("connection.php");
include("function.php");

$query = "SELECT * FROM cars ORDER BY make";
$result = mysqli_query($con, $query);



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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
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


        .title {
            color: grey;
            font-size: 18px;


        }

        button:hover,
        a:hover {
            opacity: 0.7;
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



    <div class="container-fluid" style=" width: 100%;">
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
                <div style="text-align: center;">
                    <p style="font-weight:bolder; font-size:18px; color:darkblue;">Welcome to FourWays Motors!!!
                        <br><span>Here is the list of all cars</span>
                    </p>
                </div>

                <!-- Add your header content here -->

                <?php
                // Database connection parameters
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "admins";
                if (!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
                    die("failed to connect!");
                }
                // SQL query to retrieve data from the students table
                $sql = "SELECT regno, make, YOM, enginecc, transmission, fuel,price FROM cars ORDER BY id";
                $result = $conn->query($sql);
                // Display data in a table
                // Display data in a table
                if ($result->num_rows > 0) {
                    echo '<div class="table-responsive">';
                    echo "<table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Reg No</th>
                <th>Make</th>
                <th>YOM</th>
                <th>Engine CC</th>
                <th>Transmission</th>
                <th>Fuel</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>";
                    $counter = 1; // Counter variable
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
            <td>{$counter}</td>
            <td>{$row['regno']}</td>
            <td>{$row['make']}</td>
            <td>{$row['YOM']}</td>
            <td>{$row['enginecc']}</td>
            <td>{$row['transmission']}</td>
            <td>{$row['fuel']}</td>
            <td>{$row['price']}</td>
        </tr>";
                        $counter++;
                    }
                    echo "</tbody></table>";
                    echo '</div>';
                } else {
                    echo "No records found";
                }


                // Close connection
                $conn->close();
                ?>



                <!-- Add your footer content here -->


            </div>


        </div>
    </div>
    <style>
        table {
            margin-top: 20px;
        }

        @media screen and (max-width: 767px) {
            table {
                font-size: 12px;
                /* Adjust font size for smaller screens */
            }
        }

        .container-fluid {
            background-color: #90d5ff;
            background-size: cover;

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
            background-color: #f2f2f2;
        }
    </style>


</body>

</html>

<?php
// Close the database connection
mysqli_close($con);
?>