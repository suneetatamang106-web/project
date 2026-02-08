<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");

$donor_id = $_GET['id'];

$q = mysqli_query($conn,
    "SELECT * FROM donor_medical WHERE donor_id = $donor_id"
);
$data = mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donor Medical Report</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body class="admin-body">

<?php include("navbar.php"); ?>

<div class="main-wrapper">
<h2 class="page-title">Donor Medical Report</h2>

<table class="data-table">
<tr><th>Hemoglobin</th><td><?= $data['hemoglobin']; ?></td></tr>
<tr><th>Blood Pressure</th><td><?= $data['blood_pressure']; ?></td></tr>
<tr><th>Weight</th><td><?= $data['weight']; ?></td></tr>
<tr><th>Disease</th><td><?= $data['disease']; ?></td></tr>
<tr><th>Last Donation</th><td><?= $data['last_donation']; ?></td></tr>
<tr><th>Medical Status</th><td><?= ucfirst($data['medical_status']); ?></td></tr>
<tr><th>Doctor Remark</th><td><?= $data['doctor_remark']; ?></td></tr>
</table>

<br>
<a href="donors.php" class="btn-edit">Back</a>
</div>
</body>
</html>
