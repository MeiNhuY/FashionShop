<?php
require_once("Connection.php");

class Model
{
    var $conn;

    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }

    function limit($start, $limit)
    {
        $query = "SELECT * FROM products WHERE Status = 1 ORDER BY CreatedAt DESC LIMIT $start, $limit";

        require("result.php");

        return $data;
    }

    function getCategories()
    {
        $query = "SELECT * FROM categories";

        require("result.php");

        return $data;
    }

    function getCategoryDetails($id)
    {
        $query = "SELECT c.CategoryName as Name, p.* FROM categories as c, producttypes as p WHERE c.CategoryID = p.CategoryID AND c.CategoryID = $id";

        require("result.php");

        return $data;
    }

    function getProductTypes($id)
    {
        $query = "SELECT c.CategoryName as Name, pt.* FROM categories as c, producttypes as pt WHERE c.CategoryID = pt.CategoryID AND c.CategoryID = $id";

        require("result.php");

        return $data;
    }

    function getRandomProducts($limit)
    {
        $query = "SELECT * FROM products WHERE Status = 1 ORDER BY RAND() LIMIT $limit";
        
        require("result.php");

        return $data;
    }

    function getBanners($start, $limit)
    {
        $query = "SELECT * FROM banner LIMIT $start, $limit";

        require("result.php");

        return $data;
    }

    function getProductsByCategory($start, $limit, $categoryID)
    {
        $query = "SELECT * FROM products WHERE Status = 1 AND CategoryID = $categoryID ORDER BY CreatedAt DESC LIMIT $start, $limit";

        require("result.php");

        return $data;
    }

    // function getUserById($id){

    //     $query = "SELECT * FROM `users` WHERE `UserID` = '$id'";
    //     require("result.php");
    //     return $data;
    // }
    
    
    // function getListOrder($id_customer){
    
    //     $id_customer = $_SESSION['login'];
    //     $query = "SELECT * FROM `orders` WHERE `UserID` = '$id_customer'";
    //     require("result.php");
    //     return $data;
    // }
    
    
    
    // function getListOrderByIDOrder($id){
    
    //    $query = "SELECT * FROM `orderdetails` WHERE `OrderID` = '$id'";
    //    require("result.php");
    //    return $data;
    // }
    
    
    // function getProductByID($id){
    
    //     $query = "SELECT * FROM `products` WHERE `ProductID` = '$id'";
    //     require("result.php");
    //     return $data;
    // }
}
