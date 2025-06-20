<h2>Thông Tin Học Phần Đã Lưu</h2>

<table border="1" cellpadding="10">
    <tr><th>Mã học phần</th><th>Tên học phần</th><th>Số tín chỉ</th></tr>
    <?php foreach ($ds as $hp): ?>
        <tr>
            <td><?= $hp['MaHP'] ?></td>
            <td><?= $hp['TenHP'] ?></td>
            <td><?= $hp['SoTinChi'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<p><a href="index.php">Quay lại trang chính</a></p>