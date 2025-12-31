<?php
session_start();
require_once "includes/dbconnect.php";

$msg = "";

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $role     = $_POST['role'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $msg = "❌ Passwords do not match!";
    } else {
        $allowed = ['admin','donor','patient'];
        if (!in_array($role, $allowed)) {
            $msg = "❌ Invalid role selected.";
        } else {
            $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $res = $stmt->get_result();

            if ($res->num_rows > 0) {
                $msg = "❌ Email already exists.";
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $status = 'pending';
                if ($role === 'admin') {
                    $checkAdmin = $conn->query(
                        "SELECT user_id FROM users WHERE role='admin' AND status='approved'"
                    );
                    if ($checkAdmin->num_rows === 0) {
                        $status = 'approved';
                    }
                }

                $stmt = $conn->prepare(
                    "INSERT INTO users (username, email, password, role, status)
                     VALUES (?, ?, ?, ?, ?)"
                );
                $stmt->bind_param("sssss", $username, $email, $hash, $role, $status);

                if ($stmt->execute()) {
                    $msg = "✔ Registration successful. You can now login.";
                } else {
                    $msg = "❌ Registration failed.";
                }
            }
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Register - Blood Bank</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="form-container" style="background-image: url('images/bggggg.jpg');">
  <form method="POST" class="card">

    <h2>Create Account</h2>

    <?php if($msg): ?>
      <p class="msg"><?php echo $msg; ?></p>
    <?php endif; ?>

    <input type="text" name="username" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>

    <select name="role" required>
      <option value="">Select Role</option>
      <option value="admin">Admin</option>
      <option value="donor">Donor</option>
      <option value="patient">Patient</option>
    </select>

    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>

    <button type="submit" name="register">Register</button>

    <div class="form-footer">
      Already registered? <a href="login.php">Login</a>
    </div>

  </form>
</div>

</body>
</html>
