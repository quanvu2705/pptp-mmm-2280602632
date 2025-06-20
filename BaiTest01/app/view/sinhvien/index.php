<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f9fb;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        a.btn-create {
            background: #28a745;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .action-links a {
            margin: 0 5px;
            text-decoration: none;
            padding: 6px 10px;
            color: white;
            border-radius: 4px;
            font-size: 14px;
        }

        .action-links .xem { background: #007bff; }
        .action-links .sua { background: #ffc107; color: black; }
        .action-links .xoa { background: #dc3545; }

        .pagination {
            text-align: center;
            margin-top: 10px;
        }

        .pagination a {
            padding: 6px 10px;
            margin: 0 4px;
            background: #ddd;
            text-decoration: none;
            border-radius: 4px;
            color: black;
        }

        .pagination a.active {
            background: #007bff;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php include "app/view/partials/header.php"; ?>

<div class="container">
    <h1>TRANG SINH VIÊN</h1>

    <a href="?action=create" class="btn-create">+ Thêm sinh viên</a>

    <table>
        <tr>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Hình</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($sinhviens as $sv): ?>
        <tr>
            <td><?= $sv['MaSV'] ?></td>
            <td><?= $sv['HoTen'] ?></td>
            <td><?= $sv['GioiTinh'] ?></td>
            <td><?= $sv['NgaySinh'] ?></td>
            <td><img src="images/<?= $sv['Hinh'] ?>" alt="Ảnh sinh viên"></td>
            <td class="action-links">
                <a href="?action=detail&id=<?= $sv['MaSV'] ?>" class="xem">Xem</a>
                <a href="?action=edit&id=<?= $sv['MaSV'] ?>" class="sua">Sửa</a>
                <a href="?action=delete&id=<?= $sv['MaSV'] ?>" class="xoa" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- PHÂN TRANG -->
    <?php if (isset($totalPages) && $totalPages > 1): ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
