<!DOCTYPE html>
<html>
<head>
    <title>Xóa sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            color: #dc3545;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }

        img {
            border-radius: 6px;
            margin: 10px 0;
            max-height: 120px;
        }

        .buttons {
            margin-top: 30px;
        }

        button {
            background-color: #dc3545;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }

        button:hover {
            background-color: #c82333;
        }

        a.back-link {
            padding: 12px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
        }

        a.back-link:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<?php include "app/view/partials/header.php"; ?>

<div class="container">
    <h2>XÁC NHẬN XÓA SINH VIÊN</h2>
    <p>Bạn có chắc chắn muốn xóa sinh viên này?</p>

    <p><strong>Mã SV:</strong> <?= $sv['MaSV'] ?></p>
    <p><strong>Họ tên:</strong> <?= $sv['HoTen'] ?></p>
    <p><strong>Giới tính:</strong> <?= $sv['GioiTinh'] ?></p>
    <p><strong>Ngày sinh:</strong> <?= $sv['NgaySinh'] ?></p>
    <p><strong>Mã ngành:</strong> <?= $sv['MaNganh'] ?></p>
    <img src="images/<?= $sv['Hinh'] ?>" alt="Ảnh sinh viên">

    <form method="POST" action="index.php?action=delete&id=<?= $sv['MaSV'] ?>" class="buttons">
        <button type="submit">Xác nhận xóa</button>
        <a href="index.php" class="back-link">Quay lại danh sách</a>
    </form>
</div>

</body>
</html>
