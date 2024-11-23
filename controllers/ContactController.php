<?php
require_once("models/Checkout.php");
require_once("models/Contact.php"); // Gọi đúng model

class ContactController
{
    var $contact_model;
    public function __construct()
    {
        $this->contact_model = new Contact();
    }

    function gui()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['login'])) {
            echo "<script>
                if (confirm('Bạn cần phải đăng nhập để gửi liên hệ. Bạn có muốn đăng nhập không?')) {
                    window.location.href = '?act=taikhoan'; // Chuyển hướng đến trang đăng nhập
                } else {
                    window.location.href = '?act=home'; // Quay lại trang chủ
                }
            </script>";
            exit(); // Dừng chương trình nếu chưa đăng nhập
        }

        // Gọi model để xử lý gửi email
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->contact_model->gui($_POST);
        }
    }
}
