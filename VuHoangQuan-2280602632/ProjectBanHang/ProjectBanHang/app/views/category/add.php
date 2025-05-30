<?php include 'app/views/shares/header.php'; ?>
<style>
body {
    background-color: #1a1a1a;
    color: #f8f9fa;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.container {
    max-width: 800px;
    margin-top: 40px;
    margin-bottom: 40px;
}

.card {
    border: none;
    border-radius: 20px;
    background: linear-gradient(135deg, #2c2c2c 0%, #3a3a3a 100%);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
    padding: 30px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 32px rgba(0, 196, 180, 0.2);
}

.form-label {
    color: #f8f9fa;
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 8px;
}

.form-control {
    border-radius: 12px;
    border: 2px solid #555;
    background-color: #2e2e2e;
    color: #f8f9fa;
    padding: 12px 15px;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
}

.form-control:focus {
    border-color: #00c4b4;
    box-shadow: 0 0 8px rgba(0, 196, 180, 0.6);
    background-color: #333;
    color: #f8f9fa;
    outline: none;
}

.form-control::placeholder {
    color: #aaa;
    opacity: 1;
}

.btn-primary {
    background: linear-gradient(90deg, #00c4b4 0%, #009b8b 100%);
    border: none;
    border-radius: 12px;
    padding: 12px 25px;
    color: #1a1a1a;
    font-weight: 600;
    font-size: 1rem;
    transition: transform 0.3s ease, background 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(90deg, #009b8b 0%, #007c6e 100%);
    transform: translateY(-2px);
}

.btn-primary:active {
    transform: translateY(0);
}

.btn-outline-secondary {
    border: 2px solid #bbb;
    color: #f8f9fa;
    border-radius: 12px;
    padding: 12px 25px;
    font-weight: 600;
    font-size: 1rem;
    background: transparent;
    transition: background 0.3s ease, color 0.3s ease, border-color 0.3s ease;
}

.btn-outline-secondary:hover {
    background: #555;
    border-color: #00c4b4;
    color: #f8f9fa;
}

.alert {
    border-radius: 15px;
    background: linear-gradient(135deg, #ff6b6b 0%, #ff8787 100%);
    color: #1a1a1a;
    padding: 15px;
    margin-bottom: 20px;
    border: none;
}

.alert ul {
    margin-bottom: 0;
    padding-left: 20px;
}

.alert ul li {
    color: #1a1a1a;
    font-size: 0.95rem;
}

h1 {
    font-weight: 800;
    color: #f8f9fa;
    font-size: 2.5rem;
    text-align: center;
    margin-bottom: 30px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.btn-close {
    filter: invert(1) brightness(2);
}

@media (max-width: 768px) {
    .container {
        margin-top: 20px;
        padding: 0 15px;
    }

    h1 {
        font-size: 2rem;
    }

    .card {
        padding: 20px;
    }

    .btn-primary, .btn-outline-secondary {
        padding: 10px 20px;
        font-size: 0.95rem;
    }
}
</style>

<div class="container mt-5">
    <h1 class="text-center mb-4">Thêm danh mục mới</h1>
    
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
        <form method="POST" action="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Category/add" onsubmit="return validateForm();">
            <div class="mb-4">
                <label for="name" class="form-label fw-bold">Tên danh mục:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="description" class="form-label fw-bold">Mô tả:</label>
                <textarea id="description" name="description" class="form-control" rows="4"></textarea>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary px-4">Lưu danh mục</button>
                <a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Category/list" class="btn btn-outline-secondary px-4">Quay lại danh sách danh mục</a>
            </div>
        </form>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>