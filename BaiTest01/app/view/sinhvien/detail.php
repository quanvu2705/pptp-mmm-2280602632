<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        .info-item {
            margin: 15px 0;
            font-size: 16px;
        }

        .info-item strong {
            display: inline-block;
            width: 130px;
            color: #555;
        }

        img {
            max-width: 100px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .back-button {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<?php include "app/view/partials/header.php"; ?>

<div class="container">
    <h2>Chi tiết sinh viên</h2>

    <div class="info-item"><strong>Mã SV:</strong> <?= $sv['MaSV'] ?></div>
    <div class="info-item"><strong>Họ tên:</strong> <?= $sv['HoTen'] ?></div>
    <div class="info-item"><strong>Giới tính:</strong> <?= $sv['GioiTinh'] ?></div>
    <div class="info-item"><strong>Ngày sinh:</strong> <?= $sv['NgaySinh'] ?></div>
    <div class="info-item">
        <strong>Hình:</strong><br>
        <img src="images/<?= $sv['Hinh'] ?>" alt="Ảnh sinh viên">
    </div>
    <div class="info-item"><strong>Mã ngành:</strong> <?= $sv['MaNganh'] ?></div>

    <a href="index.php" class="back-button">← Quay lại danh sách</a>
</div>

</body>
</html>
