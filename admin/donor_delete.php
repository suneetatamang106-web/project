<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM donors WHERE donor_id=$id");
}

header("Location: donors.php");
exit();
