
<div class="page-heading bg-light" style="background-image: url('public/images/banner/banner5.png'); background-size: cover; height: 400px;">
    <div class="container">
        <div class="row align-items-end text-center">
            <div class="col-lg-7 mx-auto">
                <h1>Lịch Sử Đơn Hàng</h1>
                <p class="mb-4"><a href="index.php">Trang chủ</a> / <strong>Lịch Sử Đơn Hàng</strong></p>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="border p-4 rounded" role="alert">
                    <a href="?act=cart">
                        <i class="fas fa-arrow-left"></i> Quay lại trang giỏ hàng
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="p-3 p-lg-5 border">
                    <h3 class="text-black h4 text-uppercase">Lịch Sử Đơn Hàng</h3>
                    <table class="table site-block-order-table mb-5">
                        <thead>
                            <tr>
                                <th>Mã Đơn Hàng</th>
                                <th>Ngày Đặt</th>
                                <th>Tổng Tiền</th>
                                <th>Trạng Thái</th>
                                <th>Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($data) && !empty($data)): ?>
                                <?php foreach ($data as $order): ?>
                                    <tr>
                                        <td><?= $order['OrderID'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($order['OrderDate'])) ?></td>
                                        <td><?= number_format($order['TotalAmount']) ?> VND</td>
                                        <td>
                                            <?php
                                            switch ($order['Status']) {
                                                case '0': echo 'Đang xử lý'; break;
                                                case '1': echo 'Đã giao'; break;
                                                case '2': echo 'Đã hủy'; break;
                                                default: echo 'Chưa xác định';
                                            }
                                            ?>
                                        </td>
                                        <td><a href="?act=order_detail&id=<?= $order['OrderID'] ?>" class="btn btn-primary">Xem chi tiết</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Không có đơn hàng nào</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
