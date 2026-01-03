<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM patients WHERE patient_id=$id");
}

header("Location: patients.php");
exit();
