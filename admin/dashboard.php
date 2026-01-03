<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");

$donors = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM donors")
);

$patients = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM patients")
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="admin-body">

<?php include("navbar.php"); ?>

<div class="main-wrapper">

    <h2 class="page-title">Dashboard</h2>

    <!-- SUMMARY -->
    <div class="summary-dashboard">
        <div class="card">
            <h3><?= $donors['total']; ?></h3>
            <p>Total Donors</p>
        </div>

        <div class="card">
            <h3><?= $patients['total']; ?></h3>
            <p>Total Patients</p>
        </div>
    </div>

    <!-- BLOOD STOCK -->
    <div class="stock-dashboard">
        <?php
        $sql = "
            SELECT blood_group, SUM(units) AS total_units
            FROM blood_stock
            GROUP BY blood_group
            ORDER BY blood_group
        ";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <div class="card">
                <h3><?= $row['blood_group']; ?></h3>
                <p>Blood Available</p>
                <strong>Total: <?= $row['total_units']; ?> Units</strong>
            </div>
        <?php } ?>
    </div>

</div>

<footer class="footer">
    © 2025 Blood Bank Management System
</footer>

</body>
</html>
