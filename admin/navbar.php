<div class="navbar">
    <div class="nav-left">
        Blood Bank Management System
    </div>

    <div class="nav-center">
        Name: <?php echo $_SESSION['name']; ?>
        (<?php echo ucfirst($_SESSION['role']); ?>)
    </div>

    <div class="nav-right">
        <a href="dashboard.php">Dashboard</a>
        <a href="donors.php">Donors</a>
        <a href="patients.php">Patients</a>
        <a href="donations.php">Donations</a>
        <a href="requests.php">Requests</a>
        <a href="../logout.php" class="logout">Logout</a>
    </div>
</div>
