<?php
session_start();
require_once "includes/dbconnect.php";

/* Block direct access */
if (!isset($_POST['login'])) {
    header("Location: login.php");
    exit();
}

$email    = trim($_POST['email']);
$password = trim($_POST['password']);
$role     = trim($_POST['role']);

/* Fetch user */
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

    if (password_verify($password, $user['password'])) {

        /* Create session */
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name']    = $user['username'];
        $_SESSION['role']    = $user['role'];
        $_SESSION['status']  = $user['status'];

        /* Admin approval check */
        if ($user['role'] === 'admin' && $user['status'] !== 'approved') {
            header("Location: login.php?error=Admin not approved yet");
            exit();
        }

        /* Redirect by role */
        if ($user['role'] === 'admin') {
            header("Location: admin/dashboard.php");
        } elseif ($user['role'] === 'donor') {
            header("Location: donor/dashboard.php");
        } else {
            header("Location: patient/dashboard.php");
        }
        exit();

    } else {
        header("Location: login.php?error=Invalid password");
        exit();
    }

} else {
    header("Location: login.php?error=Invalid email or role");
    exit();
}
