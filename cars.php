<?php
// Include the database connection
include("connection.php");

// Fetch data from the `admins` table
$sql = "SELECT make, YOM, enginecc, transmission, fuel, price, profile_image FROM cars";
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - Fourways Automobile</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .grid-item {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .grid-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .grid-item .details {
            padding: 15px;
        }

        .grid-item .details p {
            margin: 5px 0;
            font-size: 14px;
            color: #333;
        }

        .grid-item .details .price {
            font-size: 16px;
            font-weight: bold;
            color: #007BFF;
        }
    </style>

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="assets/img/logo.png" alt="">
                <h1 style=" font-weight:600;" class="sitename">Fourways</h1>
                <span>Motors</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php" class="active">Home<br></a></li>
                    <li><a href="#about">Cars</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>



        </div>
    </header>

    <main class="main">


        <div class="grid-container">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($regno = $result->fetch_assoc()): ?>
                    <div class="grid-item">
                        <img src="../admin/uploads/<?= htmlspecialchars($regno['profile_image']) ?>"
                            alt="<?= htmlspecialchars($regno['make']) ?>">

                        <div class="details">
                            <p><strong>Make:</strong> <?= htmlspecialchars($regno['make']) ?></p>
                            <p><strong>Year:</strong> <?= htmlspecialchars($regno['YOM']) ?></p>
                            <p><strong>Engine CC:</strong> <?= htmlspecialchars($regno['enginecc']) ?>cc</p>
                            <p><strong>Transmission:</strong> <?= htmlspecialchars($regno['transmission']) ?></p>
                            <p><strong>Fuel:</strong> <?= htmlspecialchars($regno['fuel']) ?></p>
                            <p class="price"><strong>Price:</strong> $<?= htmlspecialchars($regno['price']) ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No vehicles found.</p>
            <?php endif; ?>
        </div>




    </main>

    <br><br><br>

    <footer id="footer" class="footer dark-background">



        <div class="copyright text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div>
                        © Copyright <strong><span>Fourways Motors</span></strong>. All Rights Reserved
                    </div>

                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">

                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>

                </div>

            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
<?php
// Close the database connection
$con->close();
?>