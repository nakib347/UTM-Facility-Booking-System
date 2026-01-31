<?php
session_start();
include '../db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

/* =========================
   FETCH ALL BOOKINGS
========================= */
$sql = "
SELECT 
    b.booking_id,
    b.booking_date,
    b.status,
    e.event_name,
    f.facility_name,
    u.name AS student_name
FROM bookings b
JOIN events e ON b.event_id = e.event_id
JOIN facilities f ON b.facility_id = f.facility_id
JOIN users u ON b.user_id = u.user_id
ORDER BY b.booking_id DESC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Bookings</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="utm-header">MANAGE BOOKINGS</div>

<div class="table-container">
<h2>Booking Requests</h2>

<table class="custom-table">
<tr>
<th>No</th>
<th>Student</th>
<th>Event</th>
<th>Facility</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
$no = 1;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $statusClass = strtolower($row['status']);
?>
<tr>
<td><?= $no++ ?></td>
<td><?= htmlspecialchars($row['student_name']) ?></td>
<td><?= htmlspecialchars($row['event_name']) ?></td>
<td><?= htmlspecialchars($row['facility_name']) ?></td>
<td><?= htmlspecialchars($row['booking_date']) ?></td>
<td><span class="status <?= $statusClass ?>"><?= $row['status'] ?></span></td>
<td>
<?php if($row['status'] == 'Pending'){ ?>
<a class="btn-small approve" href="update_booking_status.php?id=<?= $row['booking_id'] ?>&status=Approved">Approve</a>
<a class="btn-small reject" href="update_booking_status.php?id=<?= $row['booking_id'] ?>&status=Rejected">Reject</a>
<?php } else { echo "-"; } ?>
</td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='7' style='text-align:center;'>No booking found</td></tr>";
}
?>

</table>

<a href="dashboard.php" class="back-link">← Back to Dashboard</a>
</div>

</body>
</html>

