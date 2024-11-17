<?php
require_once("model.php");
class Hoadon extends Model
{
    var $table = "orders";
    var $contens = "OrderID";
    function trangthai($id){
        $query = "select * from orders where Status = $id  ORDER BY OrderID DESC";

        require("result.php");

        return $data;
    }
    function chitiethoadon($id){
        $query = "select ct.*, s.ProductName as Name from orderdetails as ct, products as s where ct.ProductID = s.ProductID and ct.OrderID = $id ";

        require("result.php");
        
        return $data;
    }
}