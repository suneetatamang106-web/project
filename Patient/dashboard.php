<?php
session_start();
require_once "../includes/dbconnect.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'patient') {
    header("Location: ../login.php");
    exit;
}

$patient_id = $_SESSION['user_id'];

/* COUNTS */
$total = $conn->query("SELECT COUNT(*) total FROM requests WHERE patient_id=$patient_id")
              ->fetch_assoc()['total'];

$pending = $conn->query("SELECT COUNT(*) total FROM requests WHERE patient_id=$patient_id AND status='Pending'")
                ->fetch_assoc()['total'];

$approved = $conn->query("SELECT COUNT(*) total FROM requests WHERE patient_id=$patient_id AND status='Approved'")
                 ->fetch_assoc()['total'];

$rejected = $conn->query("SELECT COUNT(*) total FROM requests WHERE patient_id=$patient_id AND status='Rejected'")
                 ->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Patient Dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f7f7f7;
}

/* NAVBAR */
.navbar{
    background:#c0392b;
    color:#fff;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.navbar a{
    color:#fff;
    text-decoration:none;
    margin-left:20px;
    font-size:14px;
}

/* MAIN */
.main{
    padding:30px;
}

/* CARDS */
.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    max-width:1100px;
}

.card{
    background:#fff;
    padding:22px;
    border-radius:8px;
    box-shadow:0 4px 10px rgba(0,0,0,.12);
    text-align:center;
    border-top:5px solid #c0392b;
}

.card h3{
    margin-bottom:8px;
    color:#c0392b;
}

.card p{
    font-size:14px;
    color:#555;
}

.card b{
    font-size:24px;
    color:#2c3e50;
}

/* PROFILE */
.profile{
    position:fixed;
    right:30px;
    bottom:30px;
}

.profile img{
    width:95px;
    height:95px;
    border-radius:50%;
    border:4px solid #c0392b;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <b>🩸 Blood Bank Management System</b>
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="request_blood.php">Request Blood</a>
        <a href="my_requests.php">My Requests</a>
        <a href="../logout.php">Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

<div class="cards">
    <div class="card">
        <h3>Total Requests</h3>
        <p>All Blood Requests</p>
        <b><?= $total ?></b>
    </div>

    <div class="card">
        <h3>Pending Requests</h3>
        <p>Awaiting Approval</p>
        <b><?= $pending ?></b>
    </div>

    <div class="card">
        <h3>Approved Requests</h3>
        <p>Accepted Requests</p>
        <b><?= $approved ?></b>
    </div>

    <div class="card">
        <h3>Rejected Requests</h3>
        <p>Declined Requests</p>
        <b><?= $rejected ?></b>
    </div>
</div>

</div>
</body>
</html>
