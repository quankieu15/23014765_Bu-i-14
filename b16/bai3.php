<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách tour</title>
</head>
<body>

<h2>DANH SÁCH TOUR DU LỊCH</h2>

<?php

$tours = [
    [
        "matour" => "T01",
        "tentour" => "Tour Đà Lạt",
        "diemden" => "Đà Lạt",
        "gia" => 3000000,
        "songay" => 3
    ],

    [
        "matour" => "T02",
        "tentour" => "Tour Phú Quốc",
        "diemden" => "Phú Quốc",
        "gia" => 5000000,
        "songay" => 4
    ],

    [
        "matour" => "T03",
        "tentour" => "Tour Hà Nội",
        "diemden" => "Hà Nội",
        "gia" => 2500000,
        "songay" => 2
    ],

    [
        "matour" => "T04",
        "tentour" => "Tour Nha Trang",
        "diemden" => "Nha Trang",
        "gia" => 4000000,
        "songay" => 3
    ]
];

foreach ($tours as $tour) {

    echo "Mã tour: " . $tour["matour"] . "<br>";
    echo "Tên tour: " . $tour["tentour"] . "<br>";
    echo "Điểm đến: " . $tour["diemden"] . "<br>";
    echo "Giá tour: " . number_format($tour["gia"]) . " VNĐ<br>";
    echo "Số ngày: " . $tour["songay"] . " ngày<br>";

    echo "<hr>";
}
?>

<h2>FORM ĐẶT TOUR</h2>

<form method="POST">

    Họ tên:
    <input type="text" name="hoten">
    <br><br>

    Chọn mã tour:
    <select name="matour">
        <option value="">-- Chọn tour --</option>

        <?php
        foreach ($tours as $tour) {
            echo "<option value='" . $tour["matour"] . "'>";
            echo $tour["matour"] . " - " . $tour["tentour"];
            echo "</option>";
        }
        ?>

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
    $matour = $_POST["matour"];
    $songuoi = $_POST["songuoi"];

    $loi = "";

    if ($hoten == "") {
        $loi .= "Họ tên không được rỗng<br>";
    }

    if ($matour == "") {
        $loi .= "Phải chọn mã tour<br>";
    }

    if (!is_numeric($songuoi) || $songuoi <= 0) {
        $loi .= "Số người phải lớn hơn 0<br>";
    }

    if ($loi != "") {

        echo "<h3>LỖI:</h3>";
        echo $loi;

    } else {

        $tourchon = null;

        foreach ($tours as $tour) {

            if ($tour["matour"] == $matour) {
                $tourchon = $tour;
            }
        }

        if ($tourchon != null) {

            $tongtien = $tourchon["gia"] * $songuoi;

            echo "<h3>THÔNG TIN ĐẶT TOUR</h3>";

            echo "Họ tên: " . $hoten . "<br>";
            echo "Tên tour: " . $tourchon["tentour"] . "<br>";
            echo "Điểm đến: " . $tourchon["diemden"] . "<br>";
            echo "Số người: " . $songuoi . "<br>";
            echo "Tổng tiền: " . number_format($tongtien) . " VNĐ";
        }
    }
}
?>

</body>
</html>