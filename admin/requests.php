<!DOCTYPE html>
<html>
<head>
    <title>Manage Blood Requests</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<?php include("navbar.php"); ?>

<div class="main-wrapper">
    <h2 class="page-title">Manage Blood Requests</h2>

    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Request ID</th>
                    <th>Patient Name</th>
                    <th>Mobile No</th>
                    <th>Blood Group</th>
                    <th>Units (ml)</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>1</td>
                    <td>REQ001</td>
                    <td>Ram Bahadur</td>
                    <td>9800000000</td>
                    <td>O+</td>
                    <td>450</td>
                    <td>Accident</td>
                    <td>Pending</td>
                    <td>
                        <a href="#" class="btn btn-edit">Approve</a>
                        <a href="#" class="btn btn-delete">Reject</a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

<div class="footer">© 2025 Blood Bank Management System</div>

</body>
</html>
