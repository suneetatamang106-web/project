<?php
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login - Blood Bank</title>

<link rel="stylesheet" href="assets/css/login.css">

</head>
<body>

<div class="login-box">

    <h2>Login</h2>

    <?php if($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="login_process.php" method="POST">

        <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-group">
            <input type="password" id="password" name="password" placeholder="Password" required>
            <span class="toggle-pass" onclick="togglePassword()">👁️</span>
        </div>

        <div class="input-box">
            <select name="role" required>
                <option value="">Select Role</option>
                <option value="ADMIN">Admin</option>
                <option value="DONOR">Donor</option>
                <option value="PATIENT">Patient</option>
            </select>
        </div>

        <button type="submit" name="login">Login</button>
    </form>

</div>

<script>
function togglePassword() {
    const pwd = document.getElementById("password");
    pwd.type = pwd.type === "password" ? "text" : "password";
}
</script>

</body>
</html>
