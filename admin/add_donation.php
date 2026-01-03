<?php
include("../includes/dbconnect.php");
include("../includes/admin_auth.php");

if (isset($_POST['add_donation'])) {

    $donor_id = $_POST['donor_id'];
    $blood    = $_POST['blood_group'];
    $units    = $_POST['units'];

    // Insert donation
    mysqli_query($conn,
        "INSERT INTO donations (donor_id, blood_group, units)
         VALUES ('$donor_id','$blood','$units')"
    );

    // Update blood stock
    mysqli_query($conn,
        "UPDATE blood_stock
         SET units = units + $units
         WHERE blood_group = '$blood'"
    );

    header("Location: donations.php");
}
?>
