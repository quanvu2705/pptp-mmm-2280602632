<?php include 'app/views/shares/header.php'; ?>
<style>
body {
    background-color: rgb(0, 0, 0);
    color: #ffffff; /* đổi màu chữ body thành trắng */
}

.container {
    max-width: 1200px;
}

h1 {
    font-weight: 700;
    color: #ffffff; /* đổi màu chữ tiêu đề thành trắng */
    text-align: center;
    margin-bottom: 2rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.product-card {
    border: none;
    box-shadow: 0 2px 10px rgba(236, 231, 231, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    color:rgb(27, 25, 25); /* đảm bảo chữ trong thẻ sản phẩm cũng trắng */
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
}

.product-img {
    height: 160px;
    object-fit: contain;
    padding: 1rem;
    background-color: #f8f9fa; /* Nếu muốn tối hoàn toàn thì chỉnh thành màu tối luôn */
}

.badge.bg-danger {
    font-size: 0.75rem;
    padding: 0.4rem 0.6rem;
    border-radius: 0;
    font-weight: bold;
}

.card-title {
    font-size: 1.1rem;
    color:rgb(21, 21, 21); /* màu trắng cho tên sản phẩm */
}

.card-footer a {
    font-size: 0.8rem;
    color: #ffffff; /* màu trắng cho liên kết hoặc nút */
}
</style>


<div class="container mt-5">
    <h1>Danh sách sản phẩm</h1>
    <div class="text-center mb-4">
        <a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product/add" class="btn btn-success">Thêm sản phẩm mới</a>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php foreach ($products as $product): ?>
            <div class="col">
                <div class="card h-100 product-card">
                    <div class="position-relative">
                        <?php if (!empty($product->is_new)): ?>
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2">MỚI</span>
                        <?php endif; ?>
                        <img src="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/<?php echo $product->image ? htmlspecialchars($product->image) : 'images/no-image.png'; ?>"
                             class="card-img-top product-img" alt="Hình sản phẩm">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">
                            <?php echo htmlspecialchars($product->name); ?>
                        </h5>
                        <p class="card-text">Giá từ: <strong><?php echo number_format($product->price, 0, ',', '.'); ?> VNĐ</strong></p>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex gap-2 flex-wrap">
                        <?php if (SessionHelper::isAdmin()): ?>
                            <a href="/pptp-mmm-2280602632\VuHoangQuan-2280602632\ProjectBanHang\ProjectBanHang/Product/edit/<?php echo $product->id; ?>"
                                class="btn btn-warning btn-sm w-100 fw-bold text-white rounded-pill transition-all hover-btn">
                                <i class="fas fa-edit me-1"></i> Sửa
                            </a>
                            <a href="/pptp-mmm-2280602632\VuHoangQuan-2280602632\ProjectBanHang\ProjectBanHang/Product/delete/<?php echo $product->id; ?>"
                                class="btn btn-danger btn-sm w-100 fw-bold rounded-pill transition-all hover-btn delete-btn">
                                <i class="fas fa-trash me-1"></i> Xóa
                            </a>
                        <?php endif; ?>
                            <a href="/pptp-mmm-2280602632\VuHoangQuan-2280602632\ProjectBanHang\ProjectBanHang/Product/addToCart/<?php echo $product->id; ?>"
                                class="btn btn-primary btn-sm w-100 fw-bold rounded-pill transition-all hover-btn">
                                <i class="fas fa-cart-plus me-1"></i> Thêm vào giỏ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
