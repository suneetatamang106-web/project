<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");

/* Validate ID */
if (!isset($_GET['id'])) {
    header("Location: donations.php");
    exit();
}

$id = (int) $_GET['id'];

/* Fetch donation request */
$q = mysqli_query($conn, "
    SELECT blood_group, units, status, disease_test
    FROM donation_requests
    WHERE donation_id = $id
");

if (mysqli_num_rows($q) == 0) {
    header("Location: donations.php");
    exit();
}

$row = mysqli_fetch_assoc($q);

/* Only approve if pending & disease test is fit */
if ($row['status'] == 'pending' && $row['disease_test'] == 'fit') {

    /* Approve donation */
    mysqli_query($conn, "
        UPDATE donation_requests
        SET status='approved'
        WHERE donation_id = $id
    ");

    /* Update blood stock */
    mysqli_query($conn, "
        UPDATE blood_stock
        SET units = units + {$row['units']}
        WHERE blood_group = '{$row['blood_group']}'
    ");
}

header("Location: donations.php");
exit();
