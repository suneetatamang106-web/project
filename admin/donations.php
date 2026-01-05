<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Donation Request</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="admin-body">

<?php include("navbar.php"); ?>

<div class="main-wrapper">

<h2 class="page-title">Manage Donation Request</h2>

<table class="data-table">
<tr>
    <th>S.No</th>
    <th>Donation ID</th>
    <th>Donor Name</th>
    <th>Mobile No</th>
    <th>Blood Group</th>
    <th>Units (ml)</th>
    <th>Disease</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
$sql = "
SELECT 
    dr.donation_id,
    u.username AS donor_name,
    d.mobile,
    dr.blood_group,
    dr.units,
    dr.disease,
    dr.status
FROM donation_requests dr
JOIN donors d ON dr.donor_id = d.donor_id
JOIN users u ON d.user_id = u.user_id
ORDER BY dr.donation_date DESC
";


$query = mysqli_query($conn, $sql);
$sn = 1;

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
?>
<tr>
    <td><?= $sn++; ?></td>
    <td><?= $row['donation_id']; ?></td>
    <td><?= $row['donor_name']; ?></td>
    <td><?= $row['mobile']; ?></td>
    <td><?= $row['blood_group']; ?></td>
    <td><?= $row['units']; ?></td>
    <td><?= $row['disease']; ?></td>
    <td><strong><?= ucfirst($row['status']); ?></strong></td>
    <td>
        <?php if ($row['status'] == 'pending') { ?>
            <a href="approve_donation.php?id=<?= $row['donation_id']; ?>" class="btn-edit">Approve</a>
            <a href="reject_donation.php?id=<?= $row['donation_id']; ?>" class="btn-delete">Reject</a>
        <?php } else { echo "-"; } ?>
    </td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='9'>No donation requests found</td></tr>";
}
?>

</table>

</div>

<footer class="footer">
© 2025 Blood Bank Management System
</footer>

</body>
</html>
