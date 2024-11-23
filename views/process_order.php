<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ form
    $nguoiNhan = $_POST['NguoiNhan'];
    $email = $_POST['Email'];
    $sdt = $_POST['SDT'];
    $diaChi = $_POST['DiaChi'];
    $chuY = $_POST['ChuY'];
    $orderDetails = $_SESSION['product'] ?? []; // Danh sách sản phẩm
    $finalTotal = $_POST['finalTotal'];

    // Lưu thông tin đơn hàng vào session (hoặc lưu cơ sở dữ liệu)
    $_SESSION['order'] = [
        'NguoiNhan' => $nguoiNhan,
        'Email' => $email,
        'SDT' => $sdt,
        'DiaChi' => $diaChi,
        'ChuY' => $chuY,
        'ProductList' => $orderDetails,
        'Total' => $finalTotal,
    ];

    // Chuyển hướng sang file gửi email
    header('Location: send_mail.php');
    exit();
} else {
    echo "Phương thức không hợp lệ.";
}
