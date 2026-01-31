<?php
$page_title = "Login";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $page_title ?> - UTM Facility Booking System</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- TOP HEADER -->
<div class="utm-header">
  <div class="logo">UTM FACILITY BOOKING SYSTEM</div>
</div>

<!-- LOGIN CONTAINER -->
<div class="auth-container">

  <div class="auth-card">

    <!-- HEADER -->
    <div style="text-align:center; margin-bottom:1.5rem;">
      <div style="font-size:3.2rem; margin-bottom:.5rem;">🏛️</div>
      <h2 style="margin:0; font-weight:800;">Universiti Teknologi Malaysia</h2>
      <h1 class="auth-title" style="margin-top:.8rem;">Welcome Back</h1>
      <p style="color:#6b7280; font-size:.95rem;">Sign in to your UTM account</p>
    </div>

    <!-- FORM -->
    <form method="POST" action="login_process.php">

      <div class="form-group">
        <label>Email Address</label>
        <input type="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>
      </div>

      <button type="submit" style="
        width:100%;
        margin-top:1rem;
        background:var(--primary-color);
        border:none;
        padding:.8rem;
        border-radius:10px;
        font-weight:700;
        color:white;
        cursor:pointer;
      ">
        Login
      </button>

    </form>

    <!-- FOOTER -->
    <div style="text-align:center; margin-top:1.5rem; font-size:.9rem;">
      <p>Don't have an account? 
        <a href="register.php" style="color:var(--primary-color); font-weight:700;">
          Create new account
        </a>
      </p>
    </div>

  </div>
</div>

<!-- BOTTOM FOOTER -->
<footer style="text-align:center; padding:1.5rem 1rem; color:#6b7280; font-size:.85rem;">
  <p style="margin:0;"><strong>Universiti Teknologi Malaysia</strong></p>
  <p style="margin:.3rem 0 0;">Facility Booking System © <?= date('Y') ?> UTM</p>
</footer>

</body>
</html>

