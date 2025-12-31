<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
<title>Logging Out...</title>
<style>
body {
    background: #000;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.bag {
    width: 70px;
    height: 200px;
    border: 4px solid white;
    border-radius: 10px;
    position: relative;
    overflow: hidden;
}

.fill {
    background: red;
    width: 100%;
    height: 0%;
    position: absolute;
    bottom: 0;
    animation: fill 2.5s forwards;
}

@keyframes fill {
    to { height: 100%; }
}

.text {
    color: white;
    margin-top: 0px;
    font-size: 22px;
}
</style>
</head>
<body>

<div class="bag">
    <div class="fill"></div>
</div>
<div class="text">Logging out...</div>

<script>
setTimeout(() => { window.location.href = "login.php"; }, 2600);
</script>

</body>
</html>
