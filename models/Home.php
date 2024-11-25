<?php
require_once("Model.php");

class Home extends Model
{
    public function getLatestProducts($limit)
    {
        // Câu lệnh SQL để lấy các sản phẩm mới nhất với prepared statement
        $sql = "SELECT * FROM products ORDER BY CreatedAt DESC LIMIT ?";
        
        // Chuẩn bị câu lệnh SQL
        $stmt = $this->conn->prepare($sql);
        // Liên kết tham số với giá trị của limit (kiểu integer)
        $stmt->bind_param("i", $limit); // 'i' là kiểu integer
        $stmt->execute(); // Thực thi câu lệnh SQL
        
        // Lấy kết quả trả về
        $result = $stmt->get_result();
        
        // Trả về kết quả
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    

    public function getBestSellingProducts($limit)
        {
            // Câu lệnh SQL để lấy sản phẩm bán chạy với prepared statement
            $sql = "SELECT orderdetails.ProductID, products.ProductName, products.Image, products.Price, products.PromotionID, SUM(orderdetails.Quantity) AS Quantity
                    FROM orderdetails
                    JOIN products ON products.ProductID = orderdetails.ProductID
                    GROUP BY orderdetails.ProductID
                    ORDER BY Quantity DESC
                    LIMIT ?"; // Thêm dấu hỏi để sử dụng prepared statement
            
            // Chuẩn bị câu lệnh SQL
            $stmt = $this->conn->prepare($sql);
            // Liên kết tham số với giá trị của limit (kiểu integer)
            $stmt->bind_param("i", $limit); // 'i' là kiểu integer
            $stmt->execute(); // Thực thi câu lệnh SQL
            $result = $stmt->get_result(); // Lấy kết quả trả về

            // Trả về danh sách sản phẩm bán chạy
            return $result->fetch_all(MYSQLI_ASSOC);
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

    public function getAverageRating($product_id) {
        // Sử dụng prepared statement để tránh SQL injection
        $query = "SELECT AVG(Rating) AS AverageRating FROM reviews WHERE ProductID = ?";
        if ($stmt = $this->conn->prepare($query)) {
            // Ràng buộc tham số và thực thi câu truy vấn
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            
            // Lấy kết quả
            $stmt->bind_result($averageRating);
            $stmt->fetch();
            
            // Đóng statement
            $stmt->close();
            
            // Trả về kết quả, nếu không có đánh giá thì trả về 0
            return $averageRating ? $averageRating : 0;
        }
        return 0; // Trả về 0 nếu không thực hiện được câu truy vấn
    }
}

?>
