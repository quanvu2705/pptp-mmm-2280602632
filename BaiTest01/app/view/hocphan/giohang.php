<?php include "app/view/partials/header.php"; ?>

<h2>Đăng Kí Học Phần</h2>
<table border="1">
    <tr>
        <th>Mã HP</th>
        <th>Tên Học Phần</th>
        <th>Số Tín Chỉ</th>
        <th></th>
    </tr>
    <?php foreach ($ds as $hp): ?>
        <tr>
            <td><?= $hp['MaHP'] ?></td>
            <td><?= $hp['TenHP'] ?></td>
            <td><?= $hp['SoTinChi'] ?></td>
            <td><a href="index.php?action=xoaHocPhan&mahp=<?= $hp['MaHP'] ?>">Xóa</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<p><strong>Tổng số tín chỉ:</strong> <?= $tongTinChi ?? 0 ?></p>

<a href="index.php?action=xoaTatCa">Xóa đăng ký</a>

<h2>Thông tin sinh viên</h2>
<ul>
    <li><strong>Mã sinh viên:</strong> <?= $sinhvien['MaSV'] ?></li>
    <li><strong>Họ tên:</strong> <?= $sinhvien['HoTen'] ?></li>
    <li><strong>Giới tính:</strong> <?= $sinhvien['GioiTinh'] ?></li>
    <li><strong>Ngày sinh:</strong> <?= $sinhvien['NgaySinh'] ?></li>
    <li><strong>Ngành học:</strong> <?= $sinhvien['MaNganh'] ?></li>
</ul>

<form action="index.php?action=luudangky" method="post">
    <button type="submit" style="padding: 8px 16px; background: green; color: white; border: none;">Lưu đăng ký</button>
</form>