<?php
session_start();
include("connection.php");
include("function.php");

$user_data = check_login($con);
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
                <h2>FourWays Motors</h2>
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
                <div class="row">

                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Add Car</h4>
                            <a href="addcars.php">More</a>
                        </div>
                    </div><br>

                    <div class="col-sm-3">
                        <div class="well">
                            <h4>View cars</h4>
                            <a href="viewcars.php">More</a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Edit car Details</h4>
                            <a href="vieweditcar.php">More</a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Delete cars</h4>
                            <a href="viewdeletecar.php">More</a>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="well">
                            <h4>Logout</h4>
                            <a href="index.php">More</a>
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
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>

</html>