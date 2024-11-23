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
        $a = "'%".$a."%'";
        $query = "SELECT * FROM products WHERE  ProductName LIKE $a LIMIT 0,9";

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
        $query = "SELECT * FROM products WHERE  ProductTypeID = '$id' and CategoryID = $sp";

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

    function getLatestProducts($limit) {
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