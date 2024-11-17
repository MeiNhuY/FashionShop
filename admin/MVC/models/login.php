<?php
require_once("connection.php");
class login
{
    var $conn;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
    function tk_sanpham($id){
        $query = "SELECT count(ProductID) as Count FROM products WHERE CategoryID = $id";

        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_thongbao(){
        $query = "SELECT count(OrderID) as Count FROM orders WHERE Status = 0";

        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_dtthang($m){
        $query = "SELECT SUM(TotalAmount) as Count FROM orders WHERE MONTH(OrderDate) = $m And Status = 1";

        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_dtnam($y){
        $query = "SELECT SUM(TotalAmount) as Count FROM orders WHERE YEAR(OrderDate) = $y And Status = 1";

        return $this->conn->query($query)->fetch_assoc();
    }
    function tk_nguoidung($id){
        $query = "SELECT count(UserID) as Count FROM users WHERE RoleID = $id";
        
        return $this->conn->query($query)->fetch_assoc();
    }
}
