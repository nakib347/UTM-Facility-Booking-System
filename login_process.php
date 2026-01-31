<?php
session_start();
include "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){

    $user = mysqli_fetch_assoc($result);

    // Jika password belum hash
    if($password == $user['password']){

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['department_id'] = $user['department_id'];

        // 🔀 REDIRECT IKUT ROLE
        if($user['role'] == 'student'){
            header("Location: student/dashboard.php");
        }
        elseif($user['role'] == 'staff'){
            header("Location: staff/dashboard.php");
        }
        elseif($user['role'] == 'admin' || $user['role'] == 'system_admin'){
            header("Location: admin/dashboard.php");
        }
        else{
            header("Location: login.php?error=Role not recognized");
        }
        exit();

    } else {
        header("Location: login.php?error=Wrong password");
        exit();
    }

} else {
    header("Location: login.php?error=Account not found");
    exit();
}
?>


