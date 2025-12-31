<?php
session_start();
require_once "../includes/dbconnect.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'donor') {
    header("Location: ../login.php");
    exit;
}

$donor_id = $_SESSION['user_id'];

if (isset($_POST['donate'])) {

    $blood_group = $_POST['blood_group'];
    $units       = intval($_POST['units']);        // number of units
    $disease     = trim($_POST['disease']);
    $date        = date("Y-m-d");

    if ($disease == "") {
        $disease = "None";
    }

    $stmt = $conn->prepare("
        INSERT INTO donations 
        (donor_id, blood_group, quantity, disease, donation_date, status)
        VALUES (?, ?, ?, ?, ?, 'pending')
    ");
    $stmt->bind_param("isiss", $donor_id, $blood_group, $units, $disease, $date);
    $stmt->execute();

    $msg = "Donation request submitted successfully!";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Donate Blood</title>

<style>
body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f8f9fa;
}
.navbar{
    background:#c0392b;
    color:#fff;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
}
.navbar a{
    color:#fff;
    text-decoration:none;
    margin-left:20px;
}
.form-box{
    max-width:480px;
    background:#fff;
    margin:60px auto;
    padding:30px;
    border-radius:8px;
    box-shadow:0 4px 12px rgba(0,0,0,.15);
}
h2{
    text-align:center;
    color:#c0392b;
}
label{
    font-size:14px;
    font-weight:bold;
}
input, select{
    width:100%;
    padding:10px;
    margin:8px 0 18px;
    border:1px solid #ccc;
    border-radius:5px;
}
button{
    width:100%;
    background:#c0392b;
    color:#fff;
    border:none;
    padding:12px;
    font-size:15px;
    border-radius:5px;
    cursor:pointer;
}
button:hover{
    background:#a93226;
}
.success{
    background:#d4edda;
    color:#155724;
    padding:10px;
    margin-bottom:15px;
    border-radius:5px;
    text-align:center;
}
</style>
</head>

<body>

<div class="navbar">
    <b>🩸 Blood Bank System</b>
    <div>
        <a href="dashboard.php">Dashboard</a>
        <a href="../logout.php">Logout</a>
    </div>
</div>

<div class="form-box">
    <h2>Donate Blood</h2>

    <?php if(isset($msg)) echo "<div class='success'>$msg</div>"; ?>

    <form method="post">

        <label>Blood Group</label>
        <select name="blood_group" required>
            <option value="">-- Select --</option>
            <option>A+</option><option>A-</option>
            <option>B+</option><option>B-</option>
            <option>AB+</option><option>AB-</option>
            <option>O+</option><option>O-</option>
        </select>

        <label>Number of Units (ml)</label>
        <input type="number" name="units" min="250" max="500" required>

        <label>Disease (if any)</label>
        <input type="text" name="disease" placeholder="Eg: None / Diabetes / BP">

        <button name="donate">Submit Donation</button>
    </form>
</div>

</body>
</html>
