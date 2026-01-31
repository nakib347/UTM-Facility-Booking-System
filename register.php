<?php
$page_title = "Register";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $page_title ?> - UTM Facility Booking System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- TOP HEADER -->
<div class="utm-header">
  🏛️ UTM FACILITY BOOKING SYSTEM
</div>

<!-- REGISTER CONTAINER -->
<div class="auth-container">
  <div class="auth-card">

    <!-- HEADER -->
    <div class="auth-header" style="text-align:center; margin-bottom:1.5rem;">
      <div style="font-size:3rem;">🏛️</div>
      <h2 style="color: var(--primary-color); font-size:1.2rem; margin-bottom:.3rem;">
        Universiti Teknologi Malaysia
      </h2>
      <h1 class="auth-title">Create Account</h1>
      <p class="auth-subtitle">Register as UTM Student or Staff</p>
    </div>

    <!-- FORM -->
    <form method="POST" action="register_process.php">

      <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="name" class="form-input" placeholder="Enter your full name" required>
      </div>

      <div class="form-group">
        <label>Email Address</label>
        <input type="email" name="email" class="form-input" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-input" placeholder="Enter your password" required>
      </div>

      <div class="form-group">
        <label>Role</label>
        <select name="role" id="role" class="form-input" required onchange="toggleStudentFields()">
          <option value="">-- Select Role --</option>
          <option value="student">Student</option>
          <option value="staff">Staff</option>
        </select>
      </div>

      <!-- STUDENT SECTION -->
      <div id="studentFields" style="display:none; margin-top:1.2rem;">

        <hr style="border:none;border-top:1px dashed #e5e7eb; margin:1.5rem 0;">

        <h3 style="color:var(--primary-color); margin-bottom:1rem;">
          🎓 Student Information
        </h3>

        <div class="form-group">
          <label>Matric Number</label>
          <input type="text" name="matric_no" class="form-input" placeholder="e.g. 2025123456">
        </div>

        <div class="form-group">
          <label>Faculty</label>
          <input type="text" name="faculty" class="form-input" placeholder="e.g. Fakulti AI">
        </div>

        <div class="form-group">
          <label>Course</label>
          <input type="text" name="course" class="form-input" placeholder="e.g. CDIM262">
        </div>

        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" name="phone" class="form-input" placeholder="e.g. 0123456789">
        </div>

        <div class="form-group">
          <label>Address</label>
          <textarea name="address" rows="3" class="form-input" placeholder="Enter your address"></textarea>
        </div>

        <div class="form-group">
          <label>Institution</label>
          <input type="text" name="institution" class="form-input" value="UTM">
        </div>

      </div>

      <button type="submit" class="btn btn-primary" style="width:100%; margin-top:1.2rem;">
        Create Account
      </button>

    </form>

    <!-- FOOTER LINK -->
    <div class="auth-footer" style="margin-top:1.2rem; text-align:center;">
      <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>

  </div>
</div>

<!-- BOTTOM FOOTER -->
<footer style="text-align:center; padding:2rem; color:var(--text-secondary); font-size:0.85rem;">
  <p><strong style="color: var(--primary-color);">Universiti Teknologi Malaysia</strong></p>
  <p>Facility Booking System © <?= date('Y') ?> UTM</p>
</footer>

<!-- SCRIPT -->
<script>
function toggleStudentFields(){
  const role = document.getElementById("role").value;
  document.getElementById("studentFields").style.display =
    role === "student" ? "block" : "none";
}
</script>

</body>
</html>




