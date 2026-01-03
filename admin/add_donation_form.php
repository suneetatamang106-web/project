<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Donation</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body class="admin-body">

<?php include("navbar.php"); ?>

<div class="main-wrapper">

<h2 class="page-title">Add Donation</h2>

<form method="POST" action="add_donation.php" class="form-box">

    <input type="number" name="donor_id" placeholder="Donor ID" required>

    <select name="blood_group" required>
        <option value="">Select Blood Group</option>
        <option>A+</option><option>A-</option>
        <option>B+</option><option>B-</option>
        <option>AB+</option><option>AB-</option>
        <option>O+</option><option>O-</option>
    </select>

    <input type="number" name="units" placeholder="Units" required>

    <button type="submit" name="add_donation">Save Donation</button>
</form>

</div>

</body>
</html>
