
<div class="page-heading bg-light" style="background-image: url('public/images/banner/banner5.png'); background-size: cover; height: 400px;">
    <div class="container">
        <div class="row align-items-end text-center">
            <div class="col-lg-7 mx-auto">
                <h1>Chi Tiết Đơn Hàng</h1>
                <p class="mb-4"><a href="index.php">Trang chủ</a> / <strong>Chi Tiết Đơn Hàng</strong></p>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    <div class="container">
    <div class="row mb-5">
            <div class="col-md-12">
                <div class="border p-4 rounded" role="alert">
                    <a href="?act=history_order">
                        <i class="fas fa-arrow-left"></i> Quay lại lịch sử đơn hàng
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="p-3 p-lg-5 border">
                    <h3 class="text-black h4 text-uppercase">Chi tiết đơn hàng</h3>
                    <table class="table site-block-order-table mb-5">
                        <thead>
                            <tr>
                                <th>Mã Đơn Hàng</th>
                                <th>Mã sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data)): ?>
                                <?php foreach ($data as $order): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($order['OrderID']) ?></td>
                                        <td><?= htmlspecialchars($order['ProductID']) ?></td>
                                        <td>
                                            <img style="width: 70%; height: 100px;" src="public/<?=$order['Image']?>" alt="" >
                                        </td>
                                        <td><?= htmlspecialchars($order['ProductName']) ?></td>
                                        <td><?= number_format($order['UnitPrice'], 0, ',', '.') ?> VND</td>
                                        <td><?= htmlspecialchars($order['Quantity']) ?></td>
                                        <td><?= number_format($order['UnitPrice'] * $order['Quantity'], 0, ',', '.') ?> VND</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Không có chi tiết đơn hàng</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
