<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");

if (!isset($_GET['id'])) {
    header("Location: donors.php");
    exit();
}

$id = $_GET['id'];

$query = mysqli_query($conn, "
SELECT d.*, u.username 
FROM donors d 
JOIN users u ON d.user_id=u.user_id 
WHERE d.donor_id=$id
");
$donor = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $mobile = $_POST['mobile'];
    $blood  = $_POST['blood_group'];

    mysqli_query($conn, "
    UPDATE donors SET
        mobile='$mobile',
        blood_group='$blood'
    WHERE donor_id=$id
    ");

    header("Location: donors.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Donor</title>
<link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<?php include("navbar.php"); ?>

<div class="container">
<h2>Edit Donor</h2>

<form method="post" class="form-box">

<label>Name</label>
<input type="text" value="<?= $donor['username']; ?>" disabled>

<label>Mobile</label>
<input type="text" name="mobile" value="<?= $donor['mobile']; ?>" required>

<label>Blood Group</label>
<input type="text" name="blood_group" value="<?= $donor['blood_group']; ?>" required>

<button type="submit" name="update">Update Donor</button>
</form>
</div>

</body>
</html>
