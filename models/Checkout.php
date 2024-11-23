<?php
require_once("Model.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Checkout extends Model
{
    function save($data){
        $f = "";
        $v = "";
        foreach ($data as $key => $value) {
            $f .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $f = trim($f, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO orders($f) VALUES ($v);";
        
        $status = $this->conn->query($query);

        // Lấy OrderID mới nhất
        $query_mahd = "SELECT OrderID FROM orders ORDER BY OrderDate DESC LIMIT 1";
        $data_mahd = $this->conn->query($query_mahd)->fetch_assoc();

        foreach ($_SESSION['product'] as $value) {
            $MaSP = $value['ProductID'];
            $SoLuong = $value['Quantity'];
            $DonGia = $value['Price'];
            $MaHD = $data_mahd['OrderID'];
            $query_ct = "INSERT INTO orderdetails(OrderID, ProductID, Quantity, UnitPrice) VALUES ($MaHD, $MaSP, $SoLuong, $DonGia)";
            $status_ct = $this->conn->query($query_ct);
        }

          // Lấy tổng thanh toán từ form
          $finalTotal = isset($_POST['finalTotal']) ? $_POST['finalTotal'] : 0;

        // Nếu lưu thành công, gửi email
        if ($status == true && $status_ct == true) {
            // Thông tin người dùng
            $recipientName = $_SESSION['login']['FirstName'] . ' ' . $_SESSION['login']['LastName'];
            $recipientEmail = $_SESSION['login']['Email'];
            $recipientPhone = $_SESSION['login']['PhoneNumber'];

            // Nội dung hóa đơn
            $emailContent = "<h3>Thông tin đơn hàng của bạn</h3>";
            $emailContent .= "<p><strong>Tên người nhận:</strong> $recipientName</p>";
            $emailContent .= "<p><strong>Số điện thoại:</strong> $recipientPhone</p>";
            $emailContent .= "<p><strong>Email:</strong> $recipientEmail</p>";
            $emailContent .= "<table border='1' cellpadding='5' cellspacing='0'>";
            $emailContent .= "<thead><tr><th>Tên sản phẩm</th><th>Số lượng</th><th>Đơn giá</th></tr></thead><tbody>";

            foreach ($_SESSION['product'] as $item) {
                $emailContent .= "<tr>
                    <td>{$item['ProductName']}</td>
                    <td>{$item['Quantity']}</td>
                    <td>" . number_format($item['Price'], 0, ',', '.') . " VNĐ</td>
                </tr>";
            }

            $emailContent .= "</tbody></table>";
            $emailContent .= "<p><strong>Tổng thanh toán:</strong> " . number_format($finalTotal, 0, ',', '.') . " VNĐ</p>";
            

            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Máy chủ SMTP (ví dụ: Gmail)
                $mail->SMTPAuth = true;
                $mail->Username = 'aurafashionshop0@gmail.com'; // Email 
                $mail->Password = 'h d q p y l m e p u e h s j j y'; // Mật khẩu email
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                // Thông tin người gửi
                $mail->setFrom('aurafashionshop0@gmail.com', 'AuraFashion');
                // Thông tin người nhận
                $mail->addAddress($recipientEmail, $recipientName);

                // Nội dung email
                $mail->isHTML(true);
                $mail->Subject = mb_encode_mimeheader('Xác nhận đơn hàng từ AuraFashion', 'UTF-8');
                $mail->Body = $emailContent;

                // Gửi email
                $mail->send();
                setcookie('msg', 'Đặt hàng thành công và email xác nhận đã được gửi.', time() + 2);
            } catch (Exception $e) {
                setcookie('msg', 'Đặt hàng thành công nhưng không thể gửi email xác nhận.', time() + 2);
            }

            // Điều hướng người dùng sau khi đặt hàng thành công
            header('Location: ?act=thankyou.php');
        } else {
            setcookie('msg', 'Đặt hàng không thành công.', time() + 2);
            header('Location: ?act=checkout');
        }
    }
}
