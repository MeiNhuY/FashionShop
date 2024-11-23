<?php
require_once("Model.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Contact extends Model
{
    public function gui($data)
    {
        $name = htmlspecialchars($data['NguoiNhan']);
        $email = htmlspecialchars($data['Email']);
        $subject = htmlspecialchars($data['subject']);
        $message = htmlspecialchars($data['message']);

        // Kiểm tra dữ liệu hợp lệ
        if (!empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            try {
                // Khởi tạo đối tượng PHPMailer
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 2; // Hiển thị toàn bộ lỗi chi tiết
                $mail->Debugoutput = 'html'; // Xuất thông báo lỗi dưới dạng HTML

                // Cấu hình SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'aurafashionshop0@gmail.com'; // Email hệ thống
                $mail->Password = 'h d q p y l m e p u e h s j j y'; // Mật khẩu ứng dụng (App Password)
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                // Thiết lập thông tin email
                $mail->setFrom('aurafashionshop0@gmail.com', "Liên hệ từ $name"); // Gửi từ hệ thống
                $mail->addReplyTo($email, $name); // Email của khách hàng (reply-to)
                $mail->addAddress('Maithinhuy11.2@gmail.com', 'Admin Aura Fashion'); // Gửi tới admin

                // Nội dung email
                $mail->isHTML(true);
                $mail->Subject = "Liên hệ: $subject";
                $mail->Body = "
                    <h3>Thông tin liên hệ từ khách hàng:</h3>
                    <p><strong>Họ và tên:</strong> $name</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Tiêu đề:</strong> $subject</p>
                    <p><strong>Nội dung:</strong><br>" . nl2br($message) . "</p>
                ";

                // Gửi email
                if ($mail->send()) {
                    echo "<p style='color: green;'>Gửi liên hệ thành công! Cảm ơn bạn đã liên hệ với chúng tôi.</p>";
                }
            } catch (Exception $e) {
                echo "<p style='color: red;'>Không thể gửi email. Vui lòng thử lại sau.</p>";
                error_log("Lỗi gửi email: " . $mail->ErrorInfo); // Lưu log lỗi nếu có
            }
        } else {
            echo "<p style='color: red;'>Thông tin không hợp lệ. Vui lòng kiểm tra lại.</p>";
        }
    }
}
