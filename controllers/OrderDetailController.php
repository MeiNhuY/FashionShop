<?php
require_once("models/OrderDetail.php");

class OrderDetailController
{
    var $order_detail;

    public function __construct()
    {
        // Khởi tạo model OrderDetail
        $this->order_detail = new OrderDetail();
    }

    function list(){
        // Lấy OrderID từ tham số URL
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $orderID = $_GET['id'];  // Lấy OrderID từ đường dẫn
        } else {
            // Nếu không có id, chuyển hướng về trang khác hoặc hiển thị thông báo lỗi
            header("Location: ?act=history_order"); // Hoặc trang khác
            exit();
        }

        // Lấy chi tiết đơn hàng theo OrderID
        $data = $this->order_detail->getOrderDetail($orderID);

        // Gọi view để hiển thị
        require_once('views/index.php');
    }
}
?>
