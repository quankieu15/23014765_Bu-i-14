<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính tiền tour</title>
</head>
<body>

    <h1>Tính tiền tour du lịch</h1>

    <?php
        $tenTour = "Tour Phú Quốc nghỉ dưỡng";
        $giaTour = 4500000;
        $soNguoi = 4;

        if ($soNguoi <= 0) {
            echo "<p>Số người không hợp lệ</p>";
        } else {
            $tongTien = $giaTour * $soNguoi;

            echo "<h2>$tenTour</h2>";
            echo "<p>Giá tour: " . number_format($giaTour) . " VNĐ</p>";
            echo "<p>Số người: $soNguoi</p>";
            echo "<p>Tổng tiền: " . number_format($tongTien) . " VNĐ</p>";

            if ($giaTour < 2000000) {
                echo "<p>Loại tour: Tour tiết kiệm</p>";
            } elseif ($giaTour <= 4000000) {
                echo "<p>Loại tour: Tour tiêu chuẩn</p>";
            } else {
                echo "<p>Loại tour: Tour cao cấp</p>";
            }
        }
    ?>

</body>
</html>