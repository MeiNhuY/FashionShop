<?php
require_once("Model.php");

class OrderDetail extends Model
{
    // Phương thức để lấy tất cả đơn hàng của người dùng
    function getOrderDetail($id)
    {
        $query = 
            "SELECT od.OrderID, od.ProductID, od.Quantity, od.UnitPrice, p.ProductName, p.Image 
            FROM orderdetails od
            INNER JOIN products p ON od.ProductID = p.ProductID
            WHERE od.OrderID = $id";
        
        // Thực thi câu truy vấn và trả về kết quả
        $result = $this->conn->query($query);

        // Trả về tất cả kết quả dưới dạng mảng
        return $result->fetch_all(MYSQLI_ASSOC); // Dùng fetch_all để lấy tất cả đơn hàng
    }
}
?>
