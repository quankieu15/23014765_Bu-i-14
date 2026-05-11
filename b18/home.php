<?php
session_start();

if (!isset($_SESSION["login_user"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="overlay"></div>

<div class="container welcome">

    <h1>
        Welcome
        <?php echo $_SESSION["login_user"]; ?>
    </h1>

    <a href="logout.php" class="logout-btn">
        Logout
    </a>

</div>

</body>
</html>