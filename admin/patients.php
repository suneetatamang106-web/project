<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patients - Admin</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="admin-body">

<?php include("navbar.php"); ?>

<div class="main-wrapper">
    <h2 class="page-title">List of all Patients</h2>

    <table class="data-table">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Mobile No</th>
                <th>Medical Test</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

<?php
$sql = "
SELECT 
    p.patient_id,
    u.username,
    u.email,
    p.mobile
FROM patients p
JOIN users u ON p.user_id = u.user_id
";

$result = mysqli_query($conn, $sql);
$i = 1;

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $i++; ?></td>
    <td><?= $row['patient_id']; ?></td>
    <td><?= $row['username']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['mobile']; ?></td>

    <!-- MEDICAL REPORT VIEW -->
    <td>
        <a href="patient_medical_view.php?id=<?= $row['patient_id']; ?>" 
           class="btn-edit">
            View Report
        </a>
    </td>

    <!-- ACTIONS -->
    <td>
        <a href="patient_edit.php?id=<?= $row['patient_id']; ?>" 
           class="btn-edit">Edit</a>

        <a href="patient_delete.php?id=<?= $row['patient_id']; ?>" 
           class="btn-delete"
           onclick="return confirm('Delete this patient?')">
           Delete
        </a>
    </td>
</tr>
<?php } ?>

        </tbody>
    </table>
</div>

<footer class="footer">
    © 2025 Blood Bank Management System
</footer>

</body>
</html>
