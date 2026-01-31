<?php
session_start();
include '../db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

/* =====================
   ADD FACILITY
===================== */
if(isset($_POST['add_facility'])){
    $name = $_POST['facility_name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];

    if($name && $location && $capacity){
        $stmt = $conn->prepare("INSERT INTO facilities (facility_name, location, capacity) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $name, $location, $capacity);
        $stmt->execute();

        header("Location: manage_facilities.php?success=Facility added successfully");
        exit();
    }
}

/* =====================
   GET FACILITIES
===================== */
$facilities = $conn->query("SELECT * FROM facilities ORDER BY facility_id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Facilities</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="utm-header">MANAGE FACILITIES</div>

<div class="manage-container">

<h1 class="manage-title">Add Facility</h1>
<p class="manage-subtitle">Manage all facilities available in the system</p>

<?php if(isset($_GET['success'])){ ?>
<div class="success-msg"><?= htmlspecialchars($_GET['success']) ?></div>
<?php } ?>

<form method="POST" class="facility-form">
    <input type="text" name="facility_name" placeholder="Facility Name" required>
    <input type="text" name="location" placeholder="Location" required>
    <input type="number" name="capacity" placeholder="Capacity" required>
    <button type="submit" name="add_facility">Add Facility</button>
</form>

<h2 class="section-title">Facility List</h2>

<table class="facility-table">
<tr>
<th>No</th>
<th>Facility</th>
<th>Location</th>
<th>Capacity</th>
</tr>

<?php
$no = 1;
while($row = $facilities->fetch_assoc()){
?>
<tr>
<td><?= $no++ ?></td>
<td><?= htmlspecialchars($row['facility_name']) ?></td>
<td><?= htmlspecialchars($row['location']) ?></td>
<td><?= htmlspecialchars($row['capacity']) ?></td>
</tr>
<?php } ?>
</table>

<a href="dashboard.php" class="back-link">← Back to Dashboard</a>

</div>

</body>
</html>

