<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if ($_SESSION['status'] !== 'approved') {
    echo "Admin not approved!";
    exit();
}
