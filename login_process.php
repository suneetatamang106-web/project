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

/* Fetch user by email & role */
$stmt = mysqli_prepare(
    $conn,
    "SELECT id, name, password, role FROM users WHERE email=? AND role=? LIMIT 1"
);
mysqli_stmt_bind_param($stmt, "ss", $email, $role);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($user = mysqli_fetch_assoc($result)) {

    /* Verify password */
    if (password_verify($password, $user['password'])) {

        /* Create Session */
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name']    = $user['name'];
        $_SESSION['role']    = $user['role'];

        /* Role-based Redirect */
        switch ($user['role']) {
            case 'ADMIN':
                header("Location: admin/dashboard.php");
                break;

            case 'DONOR':
                header("Location: donor/dashboard.php");
                break;

            case 'PATIENT':
                header("Location: patient/dashboard.php");
                break;
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
