<!DOCTYPE html>
<html>
<head>
    <title>Danh sách học phần</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 16px;
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 8px 12px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            transition: background-color 0.2s ease;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #218838;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }
    </style>
</head>
<body>
<?php include "app/view/partials/header.php"; ?>

<div class="container">
    <h2>DANH SÁCH HỌC PHẦN</h2>

    <table>
        <tr>
            <th>Mã học phần</th>
            <th>Tên học phần</th>
            <th>Số tín chỉ</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach ($ds as $hp): ?>
            <tr>
                <td><?= $hp['MaHP'] ?></td>
                <td><?= $hp['TenHP'] ?></td>
                <td><?= $hp['SoTinChi'] ?></td>
                <td>
                    <a href="?action=dangky&mahp=<?= $hp['MaHP'] ?>">
                        <button class="btn">Đăng ký</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
