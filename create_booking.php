<?php
session_start();
include '../db.php';

/* SECURITY: STUDENT ONLY */
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: ../login.php");
    exit();
}

/* GET FACILITIES */
$facilities = $conn->query(
    "SELECT facility_id, facility_name FROM facilities ORDER BY facility_name"
);

/* GET SERVICES */
$services = $conn->query(
    "SELECT service_id, service_name FROM services ORDER BY service_name"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Create Booking - UTM Facility Booking System</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header class="main-header">
  <div class="logo">🏛️ <strong>UTM Facility Booking System</strong></div>
  <div class="user-box">
    <a href="dashboard.php" class="logout-btn">Dashboard</a>
  </div>
</header>

<section class="page-wrapper">

  <div class="form-container">
    <div class="form-card">

      <!-- HEADER -->
      <div class="form-header">
        <h1>Create New Booking</h1>
        <p>Please fill in the details below to book a facility</p>
      </div>

      <form method="POST" action="create_booking_process.php">

        <div class="form-body">

          <!-- EVENT -->
          <div class="form-group full">
            <label>Event Name</label>
            <input type="text"
                   name="event_name"
                   placeholder="e.g. Seminar Keusahawanan"
                   required>
          </div>

          <!-- FACILITY -->
          <div class="form-group">
            <label>Facility</label>
            <select name="facility_id" required>
              <option value="">-- Select Facility --</option>
              <?php while($f = $facilities->fetch_assoc()): ?>
                <option value="<?= $f['facility_id'] ?>">
                  <?= htmlspecialchars($f['facility_name']) ?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>

          <!-- DATE -->
          <div class="form-group">
            <label>Booking Date</label>
            <input type="date" name="booking_date" required>
          </div>

          <!-- SERVICES -->
          <div class="form-group full">
            <label>Services Required</label>

            <div class="services-box">
              <?php while($s = $services->fetch_assoc()): ?>
                <label>
                  <input type="checkbox"
                         name="services[]"
                         value="<?= $s['service_id'] ?>">
                  <?= htmlspecialchars($s['service_name']) ?>
                </label>
              <?php endwhile; ?>
            </div>
          </div>

        </div>

        <!-- ACTION -->
        <div class="form-actions">
          <button type="submit">Submit Booking</button>
          <a href="dashboard.php">Cancel</a>
        </div>

      </form>

    </div>
  </div>

</section>

</body>
</html>



