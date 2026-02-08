<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donors - Admin</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="admin-body">

<?php include("navbar.php"); ?>

<div class="main-wrapper">
    <h2 class="page-title">Donors List</h2>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width:60px">S.No</th>
                <th style="width:90px">Donor ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Blood Group</th>
                <th style="width:120px">Medical Status</th>
                <th style="width:220px">Action</th>
            </tr>
        </thead>
        <tbody>

<?php
$sn = 1;
$sql = "SELECT d.donor_id, d.mobile, d.blood_group, d.medical_status, u.username
        FROM donors d
        JOIN users u ON d.user_id = u.user_id";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $sn++; ?></td>
    <td><?= $row['donor_id']; ?></td>
    <td><?= $row['username']; ?></td>
    <td><?= $row['mobile']; ?></td>
    <td><?= $row['blood_group']; ?></td>

    <td>
        <?= ucfirst($row['medical_status']); ?>
    </td>

    <td>
        <a href="donor_medical_view.php?id=<?= $row['donor_id']; ?>" 
           class="btn-edit">View</a>

        <a href="edit_donor.php?id=<?= $row['donor_id']; ?>" 
           class="btn-edit">Edit</a>

        <a href="delete_donor.php?id=<?= $row['donor_id']; ?>" 
           class="btn-delete"
           onclick="return confirm('Delete this donor?')">Delete</a>
    </td>
</tr>
<?php } ?>

        </tbody>
    </table>
</div>

</body>
</html>
