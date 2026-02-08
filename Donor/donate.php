<!DOCTYPE html>
<html>
<head>
    <title>Donate Blood</title>
    <link rel="stylesheet" href="../assets/css/donor.css">
</head>
<body>

<?php include("navbar.php"); ?>

<div class="main">

<div class="donate-wrapper">

    <div class="form-box">
        <h3>Blood Donation Form</h3>

        <label>Blood Group</label>
        <select>
            <option>-Select-</option>
            <option>A+</option>
            <option>A-</option>
            <option>B+</option>
            <option>O+</option>
        </select>

        <label>No of Units (ml)</label>
        <input type="number">

        <label>Disease (if any)</label>
        <textarea placeholder="Mention disease if any (Optional)"></textarea>

        <button>Submit</button>
    </div>

    <div class="donate-img">
        <img src="../images/donate.jpg" alt="Donate Blood">
    </div>

</div>

</div>

<div class="footer">
© 2025 Blood Bank Management System
</div>

</body>
</html>
