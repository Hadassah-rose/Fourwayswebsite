<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['regno'])) {
    $regno = $_POST['regno']; // Do not convert to integer if it's not meant to be numeric

    // Validate regno
    if (empty($regno)) {
        $_SESSION['message'] = "Invalid car registration number.";
        header("Location: viewdeletecar.php");
        exit;
    }

    // Prepare and execute the delete query
    $query = "DELETE FROM cars WHERE regno = ?";
    $stmt = $con->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $regno); // Use "s" for string parameter
        if ($stmt->execute()) {
            $_SESSION['message'] = "Car deleted successfully.";
        } else {
            $_SESSION['message'] = "Failed to delete car.";
        }
        $stmt->close();
    } else {
        $_SESSION['message'] = "Failed to prepare delete statement.";
    }

    // Redirect back to the admin dashboard
    header("Location: viewdeletecar.php");
    exit;
} else {
    $_SESSION['message'] = "Invalid request.";
    header("Location: viewdeletecar.php");
    exit;
}
?>
