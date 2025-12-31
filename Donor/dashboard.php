<?php
session_start();
require_once "../includes/dbconnect.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'donor') {
    header("Location: ../login.php");
    exit;
}

$donor_id = $_SESSION['user_id'];

/* COUNTS */
$donated = $conn->query("
    SELECT IFNULL(SUM(quantity),0) total 
    FROM donations 
    WHERE donor_id=$donor_id AND status='approved'
")->fetch_assoc()['total'];

$totalReq = $conn->query("
    SELECT COUNT(*) total 
    FROM requests 
")->fetch_assoc()['total'];

$pending = $conn->query("
    SELECT COUNT(*) total 
    FROM requests 
    WHERE status='Pending'
")->fetch_assoc()['total'];

$accepted = $conn->query("
    SELECT COUNT(*) total 
    FROM requests 
    WHERE status='Approved'
")->fetch_assoc()['total'];

$rejected = $conn->query("
    SELECT COUNT(*) total 
    FROM requests 
    WHERE status='Rejected'
")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Donor Dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f7f7f7;
}

/* NAVBAR */
.navbar{
    background:#d63031;
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
    border-top:5px solid #d63031;
}

.card h3{
    margin-bottom:8px;
    color:#d63031;
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
    border:4px solid #d63031;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <b>🩸 Blood Bank Management System</b>
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="donate.php">Donate</a>
        <a href="requests.php">Requests</a>
        <a href="certificate.php">Print Certificate</a>
        <a href="../logout.php">Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

<div class="cards">
    <div class="card">
        <h3>Blood Donated</h3>
        <p>Total Units Donated</p>
        <b><?= $donated ?> ml</b>
    </div>

    <div class="card">
        <h3>Total Requests</h3>
        <p>All Requests</p>
        <b><?= $totalReq ?></b>
    </div>

    <div class="card">
        <h3>Pending</h3>
        <p>Requests Pending</p>
        <b><?= $pending ?></b>
    </div>

    <div class="card">
        <h3>Accepted</h3>
        <p>Requests Accepted</p>
        <b><?= $accepted ?></b>
    </div>

    <div class="card">
        <h3>Rejected</h3>
        <p>Requests Rejected</p>
        <b><?= $rejected ?></b>
    </div>
</div>

</div>
</body>
</html>
