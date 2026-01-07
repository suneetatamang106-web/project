<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Donors</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="admin-body">

<?php include("navbar.php"); ?>

<div class="main-wrapper">

    <h2 class="page-title">Manage Donors</h2>

    <table class="data-table">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Donor ID</th>
                <th>Donor Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Blood Group</th>
                <th>Medical Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

<?php
$sql = "
SELECT 
    d.donor_id,
    d.medical_status,
    d.mobile,
    d.blood_group,
    u.username,
    u.email
FROM donors d
JOIN users u ON d.user_id = u.user_id
ORDER BY d.donor_id DESC
";

$result = mysqli_query($conn, $sql);
$sn = 1;

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $sn++; ?></td>
    <td><?= $row['donor_id']; ?></td>
    <td><?= $row['username']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['mobile']; ?></td>
    <td><?= $row['blood_group']; ?></td>

    <td class="<?= $row['medical_status'] == 'fit' ? 'status-fit' : 'status-unfit'; ?>">
        <?= ucfirst($row['medical_status']); ?>
    </td>

    <td>
        <div class="action-btns">
            <a href="donor_medical_report.php?id=<?= $row['donor_id']; ?>" class="btn-view">
                View
            </a>
            <a href="edit_donor.php?id=<?= $row['donor_id']; ?>" class="btn-edit">
                Edit
            </a>
            <a href="delete_donor.php?id=<?= $row['donor_id']; ?>" 
               class="btn-delete"
               onclick="return confirm('Delete this donor?');">
                Delete
            </a>
        </div>
    </td>
</tr>
<?php } ?>

        </tbody>
    </table>

</div>

<div class="footer">
    © 2025 Blood Bank Management System
</div>

</body>
</html>
