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
</style>

<h1>Thêm sản phẩm mới</h1>
<form id="add-product-form">
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <!-- Các danh mục sẽ được tải từ API và hiển thị tại đây -->
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>

<a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product/list" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>

<?php include 'app/views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/api/category')
        .then(response => response.json())
        .then(data => {
            const categorySelect = document.getElementById('category_id');
            data.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;
                categorySelect.appendChild(option);
            });
        });

    document.getElementById('add-product-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        const jsonData = {};
        formData.forEach((value, key) => {
jsonData[key] = value;
        });

        fetch('/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/api/product', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(text => {
        console.log('Raw response:', text); // Log the raw response text
        try {
            const data = text;
            if (data.message === 'Product created successfully') {
                location.href = '/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product';
            } else {
                alert('Thêm sản phẩm thất bại');
            }
        } catch (error) {
            console.error('Error parsing JSON:', error);
            alert('Lỗi: Không thể phân tích JSON từ phản hồi của máy chủ.');
        }
    });
    });
});
</script>


<?php include 'app/views/shares/footer.php'; ?>