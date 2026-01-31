<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>UTM Facility Booking System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php if(isset($_SESSION['user_id'])): ?>
    <header class="header">
        <div class="nav-container">
            <a href="<?php 
                if($_SESSION['role'] == 'student') echo 'student/dashboard.php';
                elseif($_SESSION['role'] == 'admin') echo 'admin/dashboard.php';
                else echo '#';
            ?>" class="logo">
                <span style="font-size: 1.2em; margin-right: 0.5rem;">🏛️</span>
                UTM Facility Booking System
            </a>
            <nav>
                <ul class="nav-links">
                    <li class="user-info">
                        <span class="user-name">👤 <?php echo htmlspecialchars($_SESSION['name']); ?></span>
                        <a href="../logout.php" class="btn-logout">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <?php endif; ?>
