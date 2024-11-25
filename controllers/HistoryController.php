<?php
require_once("models/History.php");

class HistoryController
{
    var $history_order_model;

    public function __construct()
    {
        // Khởi tạo model History
        $this->history_order_model = new History();
    }

    // Phương thức để hiển thị lịch sử đơn hàng
    function list()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (isset($_SESSION['login']['UserID'])) {
            $id = $_SESSION['login']['UserID']; // Lấy UserID từ session
        } else {
            echo "<script>
                    if (confirm('Bạn cần đăng nhập để xem lịch sử đơn hàng!')) {
                        window.location.href = '?act=taikhoan'; // Chuyển hướng đến trang đăng nhập
                    } else {
                        window.location.href = 'index.php'; // Chuyển hướng đến trang chủ
                    }
                  </script>";
            // Nếu không có UserID trong session, có thể chuyển hướng về trang đăng nhập
            exit();
        }
        // Lấy lịch sử đơn hàng của người dùng
        $data = $this->history_order_model->getHistory($id);

        // Kiểm tra nếu có dữ liệu


        // Gọi view để hiển thị
        require_once('views/index.php');
    }
}
?>
