<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính tiền tour</title>
</head>
<body>

    <h1>Tính tổng tiền tour</h1>

    <?php

        $tenTour = "Tour Phú Quốc nghỉ dưỡng";
        $giaTour = 4500000;
        $soNguoi = 4;

        echo "<h2>$tenTour</h2>";

        if($soNguoi <= 0){

            echo "<p>Số người không hợp lệ</p>";

        } else {

            $tongTien = $giaTour * $soNguoi;

            echo "<p>Giá tour: " . number_format($giaTour) . " VNĐ</p>";

            echo "<p>Số người: $soNguoi</p>";

            echo "<p>Tổng tiền: " . number_format($tongTien) . " VNĐ</p>";

            if($giaTour < 2000000){

                $phanLoai = "Tour tiết kiệm";

            } elseif($giaTour <= 4000000){

                $phanLoai = "Tour tiêu chuẩn";

            } else {

                $phanLoai = "Tour cao cấp";

            }

            echo "<p>Phân loại tour: $phanLoai</p>";
        }

    ?>

</body>
</html>