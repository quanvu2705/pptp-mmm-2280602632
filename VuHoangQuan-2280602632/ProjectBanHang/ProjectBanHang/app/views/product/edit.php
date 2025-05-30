<?php include 'app/views/shares/header.php'; ?>
<style>
body {
    background-color: #1a1a1a;
    color: #f8f9fa;
}

.container {
    max-width: 700px;
}

.card {
    border: none;
    border-radius: 15px;
    background-color: #2c2c2c;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

.form-label {
    color: #f8f9fa;
    font-weight: 500;
}

.form-control, .form-select {
    border-radius: 10px;
    border: 1px solid #555;
    background-color: #3a3a3a;
    color: #f8f9fa;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #00c4b4;
    box-shadow: 0 0 5px rgba(0, 196, 180, 0.5);
    background-color: #3a3a3a;
    color: #f8f9fa;
}

.form-control::placeholder {
    color: #bbb;
}

.btn-primary {
    background-color: #00c4b4;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    color: #1a1a1a;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #009b8b;
}

.btn-outline-secondary {
    border: 1px solid #bbb;
    color: #f8f9fa;
    border-radius: 10px;
    padding: 10px 20px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-outline-secondary:hover {
    background-color: #555;
    color: #f8f9fa;
}

.alert {
    border-radius: 10px;
    background-color: #ff6b6b;
    color: #1a1a1a;
}

.alert ul li {
    color: #1a1a1a;
}

h1 {
    font-weight: 700;
    color: #f8f9fa;
}

.product-image {
    max-width: 100px;
    border-radius: 10px;
    border: 1px solid #555;
    margin-top: 10px;
    display: block;
}

.image-preview {
    margin-top: 10px;
    text-align: center;
}

.custom-file-upload {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3a3a3a;
    border: 1px solid #555;
    border-radius: 10px;
    color: #f8f9fa;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.custom-file-upload:hover {
    background-color: #555;
}

#image {
    display: none;
}
</style>

<div class="container mt-5">
    <h1 class="text-center mb-4">Sửa sản phẩm</h1>
    
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
    <div class="card shadow-sm p-4">
        <form method="POST" action="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
            <input type="hidden" name="id" value="<?php echo $product->id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Tên sản phẩm:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Mô tả:</label>
                <textarea id="description" name="description" class="form-control" rows="5" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Giá:</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label fw-bold">Danh mục:</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category->id; ?>" <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label fw-bold">Hình ảnh:</label>
                <label for="image" class="custom-file-upload">Chọn tệp</label>
                <input type="file" id="image" name="image" class="form-control">
                <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">
                <div class="image-preview">
                    <?php if ($product->image): ?>
                        <img src="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" alt="Product Image" class="product-image">
                    <?php else: ?>
                        <img src="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/images/no-image.png" alt="No Image" class="product-image">
                    <?php endif; ?>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary px-4">Lưu thay đổi</button>
                <a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product/list" class="btn btn-outline-secondary px-4">Quay lại danh sách sản phẩm</a>
            </div>
        </form>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>