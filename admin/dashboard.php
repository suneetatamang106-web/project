<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");
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

    <div class="dashboard">
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
                <h3><?php echo $row['blood_group']; ?></h3>
                <p>Blood Available</p>
                <strong>Total: <?php echo $row['total_units']; ?> Units</strong>
            </div>
        <?php } ?>
    </div>
</div>

<footer class="footer">
    © 2025 Blood Bank Management System
</footer>

</body>
</html>
