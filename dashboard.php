<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php if(isset($_GET['success'])): ?>
  <div class="alert-success">
    <?= htmlspecialchars($_GET['success']) ?>
  </div>
<?php endif; ?>

<?php if(isset($_GET['error'])): ?>
  <div class="alert-error">
    <?= htmlspecialchars($_GET['error']) ?>
  </div>
<?php endif; ?>


<div class="utm-header">UTM FACILITY BOOKING SYSTEM</div>

<div class="dashboard-container">
  <h2>Welcome, Student 👋</h2>

  <div class="dashboard-grid">

    <a href="create_event.php" class="dash-card">
    🎉 <h4>Create Event</h4>
    <p>Create new event details</p>
    </a>

    <a href="create_booking.php" class="dash-card">
      📅 <h4>Create Booking</h4>
      <p>Book facility for your event</p>
    </a>

    <a href="my_bookings.php" class="dash-card">
      📄 <h4>My Bookings</h4>
      <p>View booking status</p>
    </a>

    <a href="../logout.php" class="dash-card logout">
      🚪 <h4>Logout</h4>
    </a>

  </div>
</div>

</body>
</html>

