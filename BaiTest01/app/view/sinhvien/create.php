<!DOCTYPE html>
<html>
<head>
    <title>Thêm sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fb;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        a.back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #007bff;
        }

        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php include "app/view/partials/header.php"; ?>

<div class="container">
    <h2>Thêm sinh viên</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="MaSV">Mã sinh viên</label>
        <input type="text" name="MaSV" id="MaSV" required>

        <label for="HoTen">Họ tên</label>
        <input type="text" name="HoTen" id="HoTen" required>

        <label for="GioiTinh">Giới tính</label>
        <select name="GioiTinh" id="GioiTinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>

        <label for="NgaySinh">Ngày sinh</label>
        <input type="date" name="NgaySinh" id="NgaySinh" required>

        <label for="Hinh">Ảnh đại diện</label>
        <input type="file" name="Hinh" id="Hinh" accept="image/*">

        <label for="MaNganh">Mã ngành</label>
        <input type="text" name="MaNganh" id="MaNganh" required>

        <button type="submit">Thêm sinh viên</button>
    </form>

    <a class="back-link" href="index.php">← Quay lại danh sách</a>
</div>

</body>
</html>
