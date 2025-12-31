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
<body>

<?php include("navbar.php"); ?>

<div class="container">
    <h2 class="page-title">Dashboard</h2>

    <div class="dashboard">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM blood_stock");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <div class="card">
                <h3><?php echo $row['blood_group']; ?></h3>
                <p>Blood Available</p>
                <strong>Total: <?php echo $row['units']; ?> Units</strong>
            </div>
        <?php } ?>
    </div>
</div>

<footer class="footer">
    © 2025 Blood Bank Management System
</footer>

</body>
</html>
