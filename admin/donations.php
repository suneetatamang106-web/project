<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donations</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="admin-body">

<?php include("navbar.php"); ?>

<div class="main-wrapper">

    <h2 class="page-title">Blood Donations</h2>

    <table class="data-table">
        <tr>
            <th>S.No</th>
            <th>Donor ID</th>
            <th>Blood Group</th>
            <th>Units</th>
            <th>Date</th>
        </tr>

        <?php
        $sql = "SELECT * FROM donations ORDER BY donation_id DESC";
        $query = mysqli_query($conn, $sql);
        $sn = 1;

        while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $sn++; ?></td>
            <td><?= $row['donor_id']; ?></td>
            <td><?= $row['blood_group']; ?></td>
            <td><?= $row['units']; ?></td>
            <td><?= $row['donation_date']; ?></td>
        </tr>
        <?php } ?>
    </table>

</div>

<footer class="footer">
    © 2025 Blood Bank Management System
</footer>

</body>
</html>
