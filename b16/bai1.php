<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form đặt tour cơ bản</title>
</head>
<body>

<h2>FORM ĐẶT TOUR</h2>

<form method="POST">
    Họ tên:
    <input type="text" name="hoten">
    <br><br>

    Điểm đến:
    <input type="text" name="diemden">
    <br><br>

    Số người:
    <input type="number" name="songuoi">
    <br><br>

    <input type="submit" value="Đặt tour">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hoten = $_POST["hoten"];
    $diemden = $_POST["diemden"];
    $songuoi = $_POST["songuoi"];

    echo "<h3>THÔNG TIN ĐẶT TOUR</h3>";
    echo "Họ tên khách hàng: " . $hoten . "<br>";
    echo "Điểm đến: " . $diemden . "<br>";
    echo "Số người: " . $songuoi;
}
?>

</body>
</html>