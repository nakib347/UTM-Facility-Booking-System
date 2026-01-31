<?php
session_start();
include '../db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

if(mysqli_query($conn, "DELETE FROM services WHERE service_id='$id'")){
    header("Location: manage_services.php?success=Service deleted successfully");
} else {
    header("Location: manage_services.php?error=" . urlencode("Error: " . mysqli_error($conn)));
}
exit();
?>
