<?php include 'app/views/shares/header.php'; ?>
<style>
body {
    background-color: #1a1a1a;
    color: #f8f9fa;
}

.container {
    max-width: 900px;
}

.card {
    border: none;
    border-radius: 15px;
    background-color: #2c2c2c;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

.card-header {
    background-color: #00c4b4;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    padding: 1.5rem;
}

.card-header h2 {
    color: #1a1a1a;
    font-weight: 700;
    margin-bottom: 0;
}

.card-body {
    padding: 2rem;
}

.product-image {
    width: 100%;
    max-width: 300px;
    border-radius: 10px;
    border: 1px solid #555;
    margin: 0 auto;
    display: block;
}

.card-title {
    color: #f8f9fa;
    font-weight: 700;
    margin-bottom: 1.5rem;
}

.card-text {
    color: #d1d1d1;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.text-danger {
    color: #ff6b6b !important;
    font-weight: 700;
    margin-bottom: 1.5rem;
}

.badge {
    background-color: #00c4b4;
    color: #1a1a1a;
    font-size: 1rem;
    padding: 0.5rem 1rem;
    border-radius: 10px;
}

strong {
    color: #f8f9fa;
}

.btn-success {
    background-color: #28a745;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    color: #fff;
    transition: background-color 0.3s ease;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-secondary {
    border: 1px solid #bbb;
    color: #f8f9fa;
    background-color: #3a3a3a;
    border-radius: 10px;
    padding: 10px 20px;
    transition: background-color 0.3s ease;
}

.btn-secondary:hover {
    background-color: #555;
}

.alert {
    border-radius: 10px;
    background-color: #ff6b6b;
    color: #1a1a1a;
}

.alert h4 {
    margin-bottom: 0;
    font-weight: 700;
}

@media (max-width: 767px) {
    .product-image {
        margin-bottom: 1.5rem;
    }
}
</style>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h2 class="mb-0">Chi tiết sản phẩm</h2>
        </div>
        <div class="card-body">
            <?php if ($product): ?>
                <div class="row align-items-center">
                    <div class="col-md-6 text-center">
                        <?php if ($product->image): ?>
                            <img src="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                                 class="product-image" alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php else: ?>
                            <img src="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/images/no-image.png"
                                 class="product-image" alt="Không có ảnh">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <h3 class="card-title">
                            <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                        </h3>
                        <p class="card-text">
                            <?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?>
                        </p>
                        <p class="text-danger h4">
                            💰 <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                        </p>
                        <p><strong>Danh mục:</strong>
                            <span class="badge">
                                <?php echo !empty($product->category_name) ?
                                    htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Chưa có danh mục';
                                ?>
                            </span>
                        </p>
                        <div class="mt-4 d-flex gap-2">
                            <a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product/addToCart/<?php echo $product->id; ?>"
                               class="btn btn-success px-4">➕ Thêm vào giỏ hàng</a>
                            <a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product/list" class="btn btn-secondary px-4">Quay lại danh sách</a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-danger text-center">
                    <h4>Không tìm thấy sản phẩm!</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>