<?php
session_start();
require_once "includes/dbconnect.php";

if (!isset($_POST['login'])) {
    header("Location: login.php");
    exit();
}

$email    = trim($_POST['email']);
$password = trim($_POST['password']);
$role     = trim($_POST['role']);

$stmt = $conn->prepare(
    "SELECT user_id, username, password, role, status 
     FROM users 
     WHERE email=? AND role=? 
     LIMIT 1"
);
$stmt->bind_param("ss", $email, $role);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {

    if (!password_verify($password, $user['password'])) {
        header("Location: login.php?error=Invalid password");
        exit();
    }

    /* ===== ADMIN CHECK ===== */
    if ($user['role'] === 'admin' && $user['status'] !== 'approved') {
        header("Location: login.php?error=Admin not approved yet");
        exit();
    }

    /* ===== DONOR MEDICAL CHECK ===== */
    if ($user['role'] === 'donor') {

        $check = mysqli_query($conn,
            "SELECT medical_status 
             FROM donors 
             WHERE user_id = {$user['user_id']}"
        );

        $donor = mysqli_fetch_assoc($check);

        if ($donor['medical_status'] !== 'fit') {
            header("Location: login.php?error=Donor not medically fit");
            exit();
        }
    }

    /* ===== CREATE SESSION ===== */
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['name']    = $user['username'];
    $_SESSION['role']    = $user['role'];

    /* ===== REDIRECT ===== */
    if ($user['role'] === 'admin') {
        header("Location: admin/dashboard.php");
    } elseif ($user['role'] === 'donor') {
        header("Location: donor/dashboard.php");
    } else {
        header("Location: patient/dashboard.php");
    }
    exit();

} else {
    header("Location: login.php?error=Invalid email or role");
    exit();
}
