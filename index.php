<?php
session_start();

// If user is already logged in, redirect to their dashboard
if(isset($_SESSION['user_id'])){
    if($_SESSION['role'] == 'admin'){
        header("Location: admin/dashboard.php");
    } elseif($_SESSION['role'] == 'staff'){
        header("Location: staff/dashboard.php");
    } else {
        header("Location: student/dashboard.php");
    }
    exit();
}

// Otherwise, redirect to login
header("Location: login.php");
exit();
?>
