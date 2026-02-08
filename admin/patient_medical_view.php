<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");

$pid = $_GET['id'];

$q = mysqli_query($conn,
    "SELECT * FROM patient_medical WHERE patient_id = $pid"
);
$data = mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Medical Report</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body class="admin-body">

<?php include("navbar.php"); ?>

<div class="main-wrapper">
<h2 class="page-title">Patient Medical Report</h2>

<table class="data-table">
<tr><th>Disease</th><td><?= $data['disease']; ?></td></tr>
<tr><th>Blood Group</th><td><?= $data['blood_group']; ?></td></tr>
<tr><th>Units Needed</th><td><?= $data['units_needed']; ?></td></tr>
<tr><th>Urgency</th><td><?= ucfirst($data['urgency']); ?></td></tr>
<tr><th>Doctor</th><td><?= $data['doctor_name']; ?></td></tr>
<tr><th>Hospital</th><td><?= $data['hospital']; ?></td></tr>
<tr><th>Date</th><td><?= $data['report_date']; ?></td></tr>
</table>

<br>
<a href="patients.php" class="btn-edit">Back</a>
</div>
</body>
</html>
