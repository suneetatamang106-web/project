<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'ADMIN') {
    header("Location: ../login.php");
    exit();
}
?>
