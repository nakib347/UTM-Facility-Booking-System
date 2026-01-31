<?php
session_start();
include '../db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

/* =====================
   ADD SERVICE
===================== */
if(isset($_POST['add_service'])){
    $service_name = trim($_POST['service_name']);
    $description  = trim($_POST['description']);

    if($service_name){
        $stmt = $conn->prepare(
            "INSERT INTO services (service_name, description) VALUES (?, ?)"
        );
        $stmt->bind_param("ss", $service_name, $description);
        $stmt->execute();

        header("Location: manage_services.php?success=Service added successfully");
        exit();
    }
}

/* =====================
   GET SERVICES
===================== */
$services = $conn->query("SELECT * FROM services ORDER BY service_id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Services</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="utm-header">MANAGE SERVICES</div>

<div class="form-container">

    <!-- ADD SERVICE -->
    <h2>Add Service</h2>
    <p class="subtitle">Manage services available for facility bookings</p>

    <?php if(isset($_GET['success'])){ ?>
        <div class="alert success">
            <?= htmlspecialchars($_GET['success']) ?>
        </div>
    <?php } ?>

    <form method="POST" class="inline-form">

        <input type="text"
               name="service_name"
               class="form-input"
               placeholder="Service Name (e.g. Projector, PA System)"
               required>

        <textarea name="description"
                  class="form-input"
                  placeholder="Description (optional)"
                  rows="2"></textarea>

        <button type="submit"
                name="add_service"
                class="btn-maroon">
            Add Service
        </button>

    </form>

    <hr class="divider">

    <!-- SERVICE LIST -->
    <h2>Service List</h2>

    <table class="custom-table">
        <tr>
            <th style="width:80px;">No</th>
            <th>Service</th>
            <th>Description</th>
        </tr>

        <?php
        $no = 1;
        while($row = $services->fetch_assoc()){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['service_name']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
        </tr>
        <?php } ?>
    </table>

    <a href="dashboard.php" class="back-link">← Back to Dashboard</a>

</div>

</body>
</html>



