<?php
require_once("RegisterModel.php");

class RegisterController {
    private $model;

    public function __construct() {
        $this->model = new RegisterModel();
    }

    public function handleRegister() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $data = [
                'HoTen' => $_POST['Name'],
                'GioiTinh' => isset($_POST['Gender']) ? $_POST['Gender'] : 'Khác',
                'Diachi' => $_POST['Address'],
                'Email' => $_POST['Email'],
                'MatKhau' => $_POST['Password'],
                'SDT' => $_POST['Phone']
            ];

            // Kiểm tra mật khẩu nhập lại
            if ($data['MatKhau'] !== $_POST['PasswordConfirm']) {
                echo "<script>alert('Mật khẩu không khớp');</script>";
                return;
            }

            // Gọi hàm thêm người dùng
            if ($this->model->registerUser($data)) {
                echo "<script>alert('Đăng ký thành công!'); window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Đăng ký không thành công, vui lòng thử lại.');</script>";
            }
        }
    }
}

// Khởi tạo controller và xử lý đăng ký
$controller = new RegisterController();
$controller->handleRegister();
?>
