<?php
require_once("Model.php");

class History extends Model
{
    // Phương thức để lấy tất cả đơn hàng của người dùng
    function getHistory($id)
    {
        // Câu truy vấn SQL để lấy tất cả đơn hàng của người dùng và sắp xếp theo OrderDate từ mới nhất đến cũ nhất
        $query = "SELECT * FROM orders WHERE UserID = $id ORDER BY OrderDate DESC";
        
        // Thực thi câu truy vấn và trả về kết quả
        $result = $this->conn->query($query);

        // Trả về tất cả kết quả dưới dạng mảng
        return $result->fetch_all(MYSQLI_ASSOC); // Dùng fetch_all để lấy tất cả đơn hàng
    }
}
?>
