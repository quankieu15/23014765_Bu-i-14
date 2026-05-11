<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($username == "" || $email == "" || $password == "") {

        $message = "Vui lòng nhập đầy đủ thông tin";

    } else {

        if (!isset($_SESSION["users"])) {
            $_SESSION["users"] = array();
        }

        $exists = false;
                foreach ($_SESSION["users"] as $user) {

            if (
                $user["username"] == $username ||
                $user["email"] == $email
            ) {
                $exists = true;
                break;
            }
        }

        if ($exists) {

            $message = "Tên đăng nhập hoặc email đã tồn tại";

        } else {

            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $_SESSION["users"][] = array(
                "username" => $username,
                "email" => $email,
                "password" => $hashed_password
            );

            $message = "Đăng ký thành công";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="overlay"></div>

<div class="container">

    <h2>Register</h2>

    <div class="message">
        <?php echo $message; ?>
    </div>

    <form method="POST" action="">

        <div class="input-box">
            <label>Username</label>
            <input type="text" name="username">
        </div>

        <div class="input-box">
            <label>Email</label>
            <input type="email" name="email">
        </div>

        <div class="input-box">
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <button type="submit">Create Account</button>

    </form>

    <div class="link">
        <a href="login.php">Already have account?</a>
    </div>

</div>

</body>
</html>