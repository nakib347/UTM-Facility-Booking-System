<?php
session_start();
include '../db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$status = mysqli_real_escape_string($conn, $_GET['status']);

// 1. Update status booking
mysqli_query($conn, "UPDATE bookings SET status='$status' WHERE booking_id='$id'");

// 2. Ambil event_id dari booking
$get = mysqli_query($conn, "SELECT event_id FROM bookings WHERE booking_id='$id'");
$row = mysqli_fetch_assoc($get);
$event_id = $row['event_id'] ?? null;

// 3. Update status event ikut status booking
if($event_id){
    mysqli_query($conn, "UPDATE events SET status='$status' WHERE event_id='$event_id'");
}

// 4. Kembali ke manage bookings dengan success message
$message = "Booking status updated to " . htmlspecialchars($status);
header("Location: manage_bookings.php?success=" . urlencode($message));
exit();
?>
