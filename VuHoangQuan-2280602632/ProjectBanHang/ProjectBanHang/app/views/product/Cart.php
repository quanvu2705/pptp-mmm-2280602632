<?php include 'app/views/shares/header.php'; ?>

<h1>Giỏ hàng</h1>

<?php if (empty($cart)): ?>
    <p class="text-light">Giỏ hàng của bạn đang trống.</p>
<?php else: ?>
    <ul class="list-group">
        <?php foreach ($cart as $id => $item): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h2><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <img src="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/<?php echo $item['image']; ?>" alt="<?php echo $item['image']; ?>" style="max-width:100px;">
                    <p>Giá: <?php echo htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8'); ?> VNĐ</p>
                    <p>Số lượng: <?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div>
                    <!-- Nút xóa -->
                    <form action="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product/removeFromCart" method="post" onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?');">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product" class="btn btn-secondary mt-2">Tiếp tục mua sắm</a>
<a href="/pptp-mmm-2280602632/VuHoangQuan-2280602632/ProjectBanHang/ProjectBanHang/Product/checkout" class="btn btn-secondary mt-2">Thanh Toán</a>

<?php include 'app/views/shares/footer.php'; ?>