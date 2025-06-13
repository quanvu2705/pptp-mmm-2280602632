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

<a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product/add" class="btn btn-success mb-2">Thêm sản phẩm mới</a>

<ul class="list-group" id="product-list">
    <!-- Danh sách sản phẩm sẽ được tải từ API và hiển thị tại đây -->
</ul>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    fetch('/webbanhang/api/product')
    .then(response => response.json())
    .then(data => {
        const productList = document.getElementById('product-list');
        data.forEach(product => {
            const productItem = document.createElement('li');
            productItem.className = 'list-group-item';
            productItem.innerHTML = `
                <h2><a href="/webbanhang/Product/show/${product.id}">${product.name}</a></h2>
                <p>${product.description}</p>
                <p>Giá: ${product.price} VND</p>
                <p>Danh mục: ${product.category_name}</p>
                <a href="/webbanhang/Product/edit/${product.id}" class="btn btn-warning">Sửa</a>
                <button class="btn btn-danger" onclick="deleteProduct(${product.id})">Xóa</button>
            `;
            productList.appendChild(productItem);
        });
    });
});

function deleteProduct(id) {
    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
        fetch(`/webbanhang/api/product/${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Product deleted successfully') {
                location.reload();
            } else {
                alert('Xóa sản phẩm thất bại');
            }
        });
    }
}
</script>


<?php include 'app/views/shares/footer.php'; ?>
