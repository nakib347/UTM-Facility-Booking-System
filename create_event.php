<?php
$page_title = "Create Event";
session_start();
include '../db.php';

/* Security check */
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'student'){
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= $page_title ?> - UTM Facility Booking System</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<!-- ================= HEADER ================= -->
<header class="main-header">
  <div class="header-left">
    🏛️ <span>UTM Facility Booking System</span>
  </div>

  <div class="header-right">
    <span class="user-name">👤 <?= $_SESSION['name']; ?></span>
    <a href="../logout.php" class="logout-btn">Logout</a>
  </div>
</header>

<div class="page-wrapper">
  <div class="form-container">
    <div class="form-card">

      <div class="form-header">
        <h1>Create New Event</h1>
        <p>Fill in the details for your UTM event</p>
      </div>

      <form method="POST" action="create_event_process.php">

        <div class="form-body">

          <div class="form-group">
            <label>Event Name</label>
            <input type="text" name="event_name" placeholder="Enter event name" required>
          </div>

          <div class="form-group">
            <label>Event Type</label>
            <input type="text" name="event_type" placeholder="e.g. Conference, Workshop, Seminar" required>
          </div>

          <div class="form-group">
            <label>Event Date</label>
            <input type="date" name="event_date" required>
          </div>

          <div class="form-group">
            <label>Event Time</label>
            <input type="text" name="event_time" placeholder="e.g. 8:00 AM - 5:00 PM" required>
          </div>

          <div class="form-group">
            <label>Target Audience</label>
            <input type="text" name="target_audience" placeholder="e.g. Students, Faculty, Public" required>
          </div>

          <div class="form-group">
            <label>Expected Attendance</label>
            <input type="number" name="expected_attendance" placeholder="Enter number of attendees" min="1" required>
          </div>

          <div class="form-group full">
            <label>Description</label>
            <textarea name="description" rows="5" placeholder="Enter event description" required></textarea>
          </div>

        </div>

        <div class="form-actions">
          <button type="submit">Submit Event</button>
          <a href="dashboard.php">Cancel</a>
        </div>

      </form>

    </div>
  </div>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>

