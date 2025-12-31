<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        * {margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif;}
        body {
            background: url('images/main.jpg') no-repeat center center/cover;
            height: 100vh;
            color: white;
            overflow: hidden;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.7);
            padding: 15px 60px;
        }
        .logo {
            display: flex;
            align-items: center;
        }
        .logo img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .logo h2 {
            color: #f44336;
            font-weight: 600;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: 500;
        }

        nav a:hover {
            color: #f44336;
        }

        .hero {
            height: calc(100vh - 80px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: rgba(0, 0, 0, 0.4);
        }

        .hero h1 {
            font-size: 48px;
            color: #fff;
        }

        .hero p {
            font-size: 18px;
            margin: 15px 0;
            color: #f0f0f0;
        }

        .hero a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 25px;
            background-color: #f44336;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
        }

        .hero a:hover {
            background-color: #ff6b6b;
        }

        footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            color: #ccc;
            font-size: 14px;
        }

        footer a {
            color: #f44336;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">
            <img src="images/logo.jpg" alt="Blood Bank Logo">
            <h2>Blood Bank</h2>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
            <a href="contact.php">Contact</a>
            <a href="about.php">About Us</a>
        </nav>
    </header>

    <div class="hero">
        <h1>Donate Blood, Save Lives</h1>
        <p>Be a hero today — your donation can give someone another chance at life.</p>
        <a href="register.php">Get Started</a>
    </div>

    <footer>
        <p>&copy; 2025 Blood Bank Management System</p>
    </footer>

</body>
</html>
