<?php include 'app/views/shares/header.php'; ?>

<h1 class="text-light">Thanh toán</h1>

<form method="POST" action="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product/processCheckout">
    <div class="form-group">
        <label class="text-light" for="name">Họ tên:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label class="text-light" for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" class="form-control" required>
    </div>
    <div class="form-group">
        <label class="text-light" for="address">Địa chỉ:</label>
        <textarea id="address" name="address" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thanh toán</button>
</form>
<a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product/cart" class="btn btn-secondary mt-2">Quay lại giỏ hàng</a>

<?php include 'app/views/shares/footer.php'; ?>