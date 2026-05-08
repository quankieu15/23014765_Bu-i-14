<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kiểm tra form đặt tour</title>
</head>
<body>

<h2>ĐẶT TOUR DU LỊCH</h2>

<form method="POST">

    Họ tên:
    <input type="text" name="hoten">
    <br><br>

    Số điện thoại:
    <input type="text" name="sdt">
    <br><br>

    Email:
    <input type="text" name="email">
    <br><br>

    Điểm đến:
    <select name="diemden">
        <option value="">-- Chọn điểm đến --</option>
        <option value="Đà Lạt">Đà Lạt</option>
        <option value="Phú Quốc">Phú Quốc</option>
        <option value="Hà Nội">Hà Nội</option>
    </select>

    <br><br>

    Số người:
    <input type="number" name="songuoi">
    <br><br>

    <input type="submit" value="Đặt tour">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $hoten = $_POST["hoten"];
    $sdt = $_POST["sdt"];
    $email = $_POST["email"];
    $diemden = $_POST["diemden"];
    $songuoi = $_POST["songuoi"];

    $loi = "";

    if ($hoten == "") {
        $loi .= "Họ tên không được rỗng<br>";
    }

    if ($sdt == "") {
        $loi .= "Số điện thoại không được rỗng<br>";
    }

    if ($email == "") {
        $loi .= "Email không được rỗng<br>";
    }

    if ($diemden == "") {
        $loi .= "Phải chọn điểm đến<br>";
    }

    if (!is_numeric($songuoi) || $songuoi <= 0) {
        $loi .= "Số người phải lớn hơn 0<br>";
    }

    if ($loi != "") {
        echo "<h3>LỖI:</h3>";
        echo $loi;
    } else {
        echo "<h3>Đặt tour thành công</h3>";
    }
}
?>

</body>
</html>