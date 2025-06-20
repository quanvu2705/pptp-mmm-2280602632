<?php if (session_status() == PHP_SESSION_NONE) session_start(); ?>


<div style="background: #333; padding: 10px;">
    <a href="index.php" style="color: white; margin-right: 15px;">Sinh Viên</a>
    <a href="index.php?action=hocphan" style="color: white; margin-right: 15px;">Học Phần</a>
    <?php if (isset($_SESSION['user'])): ?>
        <span style="color: white; margin-right: 15px;">Xin chào <?= $_SESSION['user']['HoTen'] ?>!</span>
        <a href="index.php?action=logout" style="color: white;">Đăng xuất</a>
    <?php else: ?>
        <a href="index.php?action=login" style="color: white;">Đăng nhập</a>
    <?php endif; ?>
</div>