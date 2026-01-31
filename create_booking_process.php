<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid form submission.");
}

$user_id = $_SESSION['user_id'];

/* =========================
   1. CHECK / CREATE APPLICANT
========================= */
$checkApp = $conn->prepare(
    "SELECT applicant_id FROM applicants WHERE user_id = ?"
);
$checkApp->bind_param("i", $user_id);
$checkApp->execute();
$appResult = $checkApp->get_result();

if ($appResult->num_rows > 0) {
    $applicant_id = $appResult->fetch_assoc()['applicant_id'];
} else {
    $insertApp = $conn->prepare("
        INSERT INTO applicants 
        (user_id, status, institution, address, phone, matric_no, faculty, course)
        VALUES (?, 'Active', 'UTM', '', '', 'TEMP', 'TEMP', 'TEMP')
    ");
    $insertApp->bind_param("i", $user_id);
    $insertApp->execute();
    $applicant_id = $conn->insert_id;
}

/* =========================
   2. GET FORM DATA
========================= */
$event_name   = trim($_POST['event_name']);
$facility_id  = (int) $_POST['facility_id'];
$booking_date = $_POST['booking_date'];
$services     = $_POST['services'] ?? [];

/* =========================
   3. GET FACILITY + DEPARTMENT
========================= */
$getFacility = $conn->prepare("
    SELECT department_id 
    FROM facilities 
    WHERE facility_id = ?
");
$getFacility->bind_param("i", $facility_id);
$getFacility->execute();
$facility = $getFacility->get_result()->fetch_assoc();

if (!$facility) {
    die("Facility not found.");
}

$department_id = $facility['department_id'];

/* =========================
   4. CREATE EVENT
========================= */
$event_stmt = $conn->prepare("
    INSERT INTO events (applicant_id, event_name, status)
    VALUES (?, ?, 'Pending')
");
$event_stmt->bind_param("is", $applicant_id, $event_name);
$event_stmt->execute();
$event_id = $conn->insert_id;

/* =========================
   5. CREATE BOOKING
========================= */
$booking_stmt = $conn->prepare("
    INSERT INTO bookings 
    (user_id, event_id, facility_id, booking_date, status, department_id)
    VALUES (?, ?, ?, ?, 'Pending', ?)
");
$booking_stmt->bind_param(
    "iiisi",
    $user_id,
    $event_id,
    $facility_id,
    $booking_date,
    $department_id
);
$booking_stmt->execute();
$booking_id = $conn->insert_id;

/* =========================
   6. INSERT SERVICES (USING service_id)
========================= */
if (!empty($services)) {
    $service_stmt = $conn->prepare("
        INSERT INTO booking_services (booking_id, service_id)
        VALUES (?, ?)
    ");

    foreach ($services as $service_id) {
        $service_id = (int) $service_id;
        $service_stmt->bind_param("ii", $booking_id, $service_id);
        $service_stmt->execute();
    }
}

/* =========================
   DONE
========================= */
header("Location: my_bookings.php?success=Booking submitted successfully");
exit();
?>


