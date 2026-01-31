<?php
session_start();
include_once '../db.php';

/* =========================
   AUTH CHECK
========================= */
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$user_id = $_SESSION['user_id'];


/* =========================
   FETCH BOOKINGS BY DEPARTMENT
========================= */
$stmt = $conn->prepare("
  SELECT 
    b.booking_date,
    b.status,
    e.event_name,
    f.facility_name
  FROM bookings b
  JOIN events e ON b.event_id = e.event_id
  JOIN facilities f ON b.facility_id = f.facility_id
  WHERE b.user_id = ?
  ORDER BY b.booking_date DESC
");

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Bookings</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header class="utm-header">
  UTM FACILITY BOOKING SYSTEM
</header>

<section class="table-container">
  <h2>My Bookings</h2>

  <table class="custom-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Event</th>
        <th>Facility</th>
        <th>Date</th>
        <th>Status</th>
      </tr>
    </thead>

    <tbody>
    <?php
    $no = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $statusClass = strtolower($row['status']);
    ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($row['event_name']) ?></td>
        <td><?= htmlspecialchars($row['facility_name']) ?></td>
        <td><?= htmlspecialchars($row['booking_date']) ?></td>
        <td>
          <span class="status <?= $statusClass ?>">
            <?= htmlspecialchars($row['status']) ?>
          </span>
        </td>
      </tr>
    <?php
      }
    } else {
      echo "<tr><td colspan='5' style='text-align:center;color:#6b7280;'>No bookings found</td></tr>";
    }
    ?>
    </tbody>
  </table>

  <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
</section>

</body>
</html>

