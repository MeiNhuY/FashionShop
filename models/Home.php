<?php
require_once("Model.php");

class Home extends Model
{
    public function getLatestProducts($limit) {
        $sql = "SELECT * FROM products ORDER BY CreatedAt DESC LIMIT $limit"; // Truyền giá trị trực tiếp
    
        // Thực thi truy vấn
        $result = $this->conn->query($sql);
    
        // Trả về kết quả
        return $result;
    }

    public function getBestSellingProducts($limit)
    {
        // Câu lệnh SQL để lấy sản phẩm bán chạy
        $sql = "SELECT orderdetails.ProductID, products.ProductName, products.Image, products.Price, products.PromotionID, SUM(orderdetails.Quantity) AS Quantity
                FROM orderdetails
                JOIN products ON products.ProductID = orderdetails.ProductID
                GROUP BY orderdetails.ProductID
                ORDER BY Quantity DESC
                LIMIT $limit";

       
        $result = $this->conn->query($sql);

        // Trả về danh sách sản phẩm bán chạy
        return $result;
    }
    
    
    public function limit($offset, $count)
    {
        $sql = "SELECT * FROM products LIMIT ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $offset, $count);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
