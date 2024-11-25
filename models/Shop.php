<?php
require_once("Model.php");
class Shop extends Model
{
    
    function loaisp($a,$b)
    {
        $query = "SELECT * FROM producttypes WHERE   CategoryID = 1 LIMIT $a, $b";

        require("result.php");
        
        return $data;
    }
    function keywork($a)
    {
        if (is_numeric($a)) {
            // Nếu $a là số, tìm kiếm phần giá trị trong Price (dưới dạng chuỗi)
            $query = "SELECT * FROM products WHERE CAST(Price AS CHAR) LIKE '%$a%' OR Description LIKE '%$a%' LIMIT 0,9";
        } else {
            // Nếu $a là chuỗi, tìm kiếm mờ theo tên sản phẩm và mô tả
            $a = "%$a%";
            $query = "SELECT * FROM products WHERE ProductName LIKE '$a' OR Description LIKE '$a' LIMIT 0,9";
        }
    
        require("result.php");
        
        return $data;
    }
    function dongia($a,$b)
    {
        if($a ==0 ){
            $a = "30000";
        }else{
            $a = $a."000000";
        }
        $b = $b."000000";
        $query = "SELECT * FROM products WHERE  Price > $a AND Price < $b  LIMIT 0, 9";

        require("result.php");
    
        return $data;
    }

    function chitiet_loai($loai,$sp)
    {
        $query = "SELECT * FROM producttypes WHERE  ProductTypeName = '$loai' and CategoryID = $sp";

        require("result.php");
        
        return $data;
    }
    function chitiet($id,$sp)
    {
        $query = "SELECT * FROM products WHERE  ProductTypeID = '$id' and CategoryID = $sp LIMIT 9";

        require("result.php");
        
        return $data;
    }
    function sanpham_noibat()
    {
        $query = "SELECT * FROM products WHERE ProductID = (SELECT ProductID sp FROM orderdetails GROUP BY ProductID ORDER BY COUNT(ProductID) DESC LIMIT 1)";

        return $this->conn->query($query)->fetch_assoc();
    }
    function count_sp()
    {
        $query = "SELECT COUNT(ProductID) as tong FROM products";

        return $this->conn->query($query)->fetch_assoc();
    }
    function count_sp_dm($dm)
    {
        $query = "SELECT COUNT(ProductID) as tong FROM products WHERE CategoryID = $dm";

        return $this->conn->query($query)->fetch_assoc();
    }
    function count_sp_ctdm($dm,$ctdm)
    {
        $query = "SELECT COUNT(ProductID) as tong FROM products WHERE CategoryID = $dm And ProductTypeID = $ctdm";

        return $this->conn->query($query)->fetch_assoc();
    }

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


    function limit($offset, $count)
    {
        $sql = "SELECT * FROM products LIMIT ?, ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $offset, $count);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

     // Lấy danh sách sản phẩm theo điều kiện giá
     public function getProductsByPrice($operator, $price) {
        $query = "SELECT * FROM products WHERE Price $operator ? LIMIT 9";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $price); // 'i' là kiểu integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy danh sách sản phẩm sắp xếp theo giá
    public function getProductsSortedByPrice($order) {
        $order = strtoupper($order); // Chuyển order thành chữ hoa để tránh lỗi
        if ($order !== 'ASC' && $order !== 'DESC') {
            throw new Exception("Order không hợp lệ!");
        }
        $query = "SELECT * FROM products ORDER BY Price $order LIMIT 9";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy tất cả sản phẩm
    public function getAllProducts() {
        $query = "SELECT * FROM products LIMIT 9";
        $result = $this->conn->query($query);
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