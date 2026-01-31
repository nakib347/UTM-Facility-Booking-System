<?php
include 'db.php';
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];   // ✅ TAMBAH INI
$plainPassword = $password;        // ✅ SEKARANG BARU BETUL
$role = $_POST['role'];

$matric = $_POST['matric_no'] ?? null;
$faculty = $_POST['faculty'] ?? null;
$course = $_POST['course'] ?? null;
$phone = $_POST['phone'] ?? null;
$address = $_POST['address'] ?? null;
$institution = $_POST['institution'] ?? null;

/* INSERT USER */
$stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?,?,?,?)");
$stmt->bind_param("ssss", $name, $email, $plainPassword, $role);
$stmt->execute();

$user_id = $stmt->insert_id;

/* INSERT APPLICANT (STUDENT) */
if($role == "student"){
    $stmt2 = $conn->prepare("
        INSERT INTO applicants (user_id, matric_no, faculty, course, phone, address, institution, status)
        VALUES (?,?,?,?,?,?,?, 'Active')
    ");

    $stmt2->bind_param("issssss", $user_id, $matric, $faculty, $course, $phone, $address, $institution);
    $stmt2->execute();
}

header("Location: login.php?register=success");
exit();







