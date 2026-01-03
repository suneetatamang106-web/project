<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");

if (!isset($_GET['id'])) {
    header("Location: patients.php");
    exit();
}

$id = $_GET['id'];

$q = mysqli_query($conn, "
SELECT p.*, u.username 
FROM patients p
JOIN users u ON p.user_id=u.user_id
WHERE p.patient_id=$id
");

$patient = mysqli_fetch_assoc($q);

if (isset($_POST['update'])) {
    $mobile = $_POST['mobile'];
    $blood  = $_POST['blood_group'];

    mysqli_query($conn, "
    UPDATE patients SET
        mobile='$mobile',
        blood_group='$blood'
    WHERE patient_id=$id
    ");

    header("Location: patients.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Patient</title>
<link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<?php include("navbar.php"); ?>

<div class="container">
<h2>Edit Patient</h2>

<form method="post" class="form-box">

<label>Name</label>
<input type="text" value="<?= $patient['username']; ?>" disabled>

<label>Mobile</label>
<input type="text" name="mobile" value="<?= $patient['mobile']; ?>" required>

<label>Blood Group</label>
<input type="text" name="blood_group" value="<?= $patient['blood_group']; ?>" required>

<button type="submit" name="update">Update Patient</button>

</form>
</div>

</body>
</html>
