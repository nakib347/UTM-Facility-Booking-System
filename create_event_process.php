<?php
session_start();
include '../db.php';

/* =========================
   SECURITY CHECK
========================= */

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student') {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: create_event.php");
    exit();
}

/* =========================
   GET USER → APPLICANT
========================= */

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT applicant_id FROM applicants WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: dashboard.php?error=" . urlencode("You are not registered as applicant. Please contact admin."));
    exit();
}

$row = $result->fetch_assoc();
$applicant_id = $row['applicant_id'];

/* =========================
   GET FORM DATA
========================= */

$event_name = trim($_POST['event_name']);
$event_type = trim($_POST['event_type']);
$event_date = $_POST['event_date'];
$event_time = trim($_POST['event_time']);
$target_audience = trim($_POST['target_audience']);
$expected_attendance = intval($_POST['expected_attendance']);
$description = trim($_POST['description']);

/* =========================
   BASIC VALIDATION
========================= */

if (
    empty($event_name) || empty($event_type) || empty($event_date) ||
    empty($event_time) || empty($target_audience) || empty($description) ||
    $expected_attendance <= 0
) {
    header("Location: create_event.php?error=" . urlencode("Please fill in all fields correctly."));
    exit();
}

/* =========================
   INSERT EVENT (PREPARED)
========================= */

$sql = "INSERT INTO events 
(applicant_id, event_name, event_type, event_date, event_time, target_audience, expected_attendance, description, status) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Pending')";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "isssssis",
    $applicant_id,
    $event_name,
    $event_type,
    $event_date,
    $event_time,
    $target_audience,
    $expected_attendance,
    $description
);

if ($stmt->execute()) {
    header("Location: dashboard.php?success=" . urlencode("Event created successfully."));
    exit();
} else {
    header("Location: create_event.php?error=" . urlencode("Database error. Please try again."));
    exit();
}
?>
