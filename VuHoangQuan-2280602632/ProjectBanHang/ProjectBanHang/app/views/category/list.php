<?php include 'app/views/shares/header.php'; ?>
<style>
body {
    background-color: #1a1a1a;
    color: #f8f9fa; /* Màu chữ mặc định cho toàn bộ body */
}

.container {
    max-width: 700px;
}

.card {
    border: none;
    border-radius: 15px;
    background-color: #2c2c2c;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0);
    margin-bottom: 20px;
    padding: 20px;
}

.card h5 {
    font-weight: 600;
    color: #ffffff; /* Đổi màu chữ của tên danh mục thành trắng để sáng hơn */
}

.card p {
    color: #e9ecef; /* Đổi màu chữ của mô tả thành xám sáng để dễ đọc */
}

.btn-primary {
    background-color: #00c4b4;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    color: #ffffff; /* Đổi màu chữ của nút "Thêm danh mục mới" và "Sửa" thành trắng */
}

.btn-primary:hover {
    background-color: #009b8b;
    color: #ffffff; /* Đảm bảo màu chữ vẫn trắng khi hover */
}

.btn-danger {
    background-color: #ff6b6b;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    color: #ffffff; /* Đổi màu chữ của nút "Xóa" thành trắng */
}

.btn-danger:hover {
    background-color: #ff8787;
    color: #ffffff; /* Đảm bảo màu chữ vẫn trắng khi hover */
}

h1 {
    font-weight: 700;
    color: #f8f9fa; /* Giữ màu chữ của tiêu đề */
}

.text-center {
    color: #e9ecef; /* Đảm bảo thông báo "Không có danh mục nào" cũng có màu sáng */
}
</style>

<div class="container mt-5">
    <h1 class="text-center mb-4">Danh sách danh mục</h1>
    
    <a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Category/add" class="btn btn-primary mb-4">Thêm danh mục mới</a>
    
    <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $category): ?>
            <div class="card">
                <h5><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></h5>
                <p><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></p>
                <div class="d-flex justify-content-end gap-2">
                    <a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Category/edit/<?php echo $category->id; ?>" class="btn btn-primary btn-sm">Sửa</a>
                    <a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Category/delete/<?php echo $category->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center">Không có danh mục nào.</p>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>