<?php
session_start();
require __DIR__ . "/PHPMailer/src/PHPMailer.php";
require __DIR__ . "/PHPMailer/src/SMTP.php";
require __DIR__ . "/PHPMailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

// Kiểm tra thông tin đơn hàng
if (!isset($_SESSION['order'])) {
    echo "Không có thông tin đơn hàng.";
    exit();
}

$order = $_SESSION['order'];
$nguoiNhan = htmlspecialchars($order['NguoiNhan']);
$email = htmlspecialchars($order['Email']);
$sdt = htmlspecialchars($order['SDT']);
$diaChi = htmlspecialchars($order['DiaChi']);
$chuY = htmlspecialchars($order['ChuY']);
$total = number_format($order['Total'], 0, ',', '.');
$productList = $order['ProductList'];

// Chuẩn bị nội dung email
$mail = new PHPMailer(true);

try {
    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'maithinhuy11.2@gmail.com'; // Email của bạn
    $mail->Password = 'oiqe gacb lqrt upqc'; // Mật khẩu ứng dụng
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->setFrom('maithinhuy11.2@gmail.com', 'Cửa hàng AuraFashion');

    $mail->addAddress($email, $nguoiNhan);

    // Nội dung email
    $mail->isHTML(true);
    $mail->Subject = "Xác nhận thanh toán đơn hàng từ Cửa hàng AuraFashion";
    
    // Chi tiết sản phẩm
    $productDetails = '';
    foreach ($productList as $product) {
        $productDetails .= '<li>' . htmlspecialchars($product['ProductName']) . ' - Số lượng: ' . $product['Quantity'] . '</li>';
    }

    // Nội dung email
    $mail->Body = '
        <div style="font-family: Arial, sans-serif; line-height: 1.6;">
            <h2>Xin chào ' . $nguoiNhan . '</h2>
            <p>Cảm ơn bạn đã đặt hàng tại AuraFashion. Dưới đây là thông tin đơn hàng của bạn:</p>
            <ul>
                ' . $productDetails . '
                <li><b>Địa chỉ:</b> ' . $diaChi . '</li>
                <li><b>Số điện thoại:</b> ' . $sdt . '</li>
                <li><b>Ghi chú:</b> ' . $chuY . '</li>
                <li><b>Tổng tiền:</b> ' . $total . ' VND</li>
            </ul>
            <p>Nếu có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi qua email hoặc hotline.</p>
            <p>Trân trọng,</p>
            <p>Đội ngũ cửa hàng AuraFashion</p>
        </div>
    ';

    // Gửi email
    if ($mail->send()) {
        echo "Email xác nhận đã được gửi thành công.";
    } else {
        echo "Không thể gửi email xác nhận.";
    }
} catch (Exception $e) {
    echo "Lỗi khi gửi email: " . $mail->ErrorInfo;
}
