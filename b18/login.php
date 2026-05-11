<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username == "" || $password == "") {

        $message = "Vui lòng nhập đầy đủ thông tin";

    } else {

        if (!isset($_SESSION["users"])) {
            $_SESSION["users"] = [];
        }

        $found = false;

        foreach ($_SESSION["users"] as $user) {

            if ($user["username"] == $username) {

                if (password_verify($password, $user["password"])) {

                    $_SESSION["login_user"] = $username;

                    header("Location: home.php");
                    exit();

                } else {

                    $message = "Sai mật khẩu";
                }

                $found = true;
                break;
            }
        }

        if (!$found) {
            $message = "Tài khoản không tồn tại";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="overlay"></div>

<div class="container">

    <h2>Login</h2>

    <div class="message">
        <?php echo $message; ?>
    </div>

    <form method="POST">

        <div class="input-box">
            <label>Username</label>
            <input type="text" name="username">
        </div>

        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <button type="submit">Login</button>

    </form>

    <div class="link">
        <a href="register.php">Create new account</a>
    </div>

</div>

</body>
</html>