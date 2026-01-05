<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");

/* Validate ID */
if (!isset($_GET['id'])) {
    header("Location: donations.php");
    exit();
}

$id = (int) $_GET['id'];

/* Reject only if still pending */
mysqli_query($conn, "
    UPDATE donation_requests
    SET status = 'rejected'
    WHERE donation_id = $id AND status = 'pending'
");

header("Location: donations.php");
exit();
