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
<body>

<?php include("navbar.php"); ?>

<div class="container">
    <h2 class="page-title">Donors List</h2>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Blood Group</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

<?php
$sql = "
SELECT 
    d.donor_id,
    u.username,
    u.email,
    d.mobile,
    d.blood_group
FROM donors d
JOIN users u ON d.user_id = u.user_id
";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $row['donor_id']; ?></td>
    <td><?= $row['username']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['mobile']; ?></td>
    <td><?= $row['blood_group']; ?></td>
    <td>
        <a href="donor_edit.php?id=<?= $row['donor_id']; ?>" class="btn-edit">Edit</a>
        <a href="donor_delete.php?id=<?= $row['donor_id']; ?>"
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
