<?php
require("model.php");
class sanpham extends model
{
    var $table = "products";
    var $contens = "ProductID";
    function khuyenmai(){
        $query = "select * from promotions ";
        require("result.php");
        return $data;
    }
    function loaisp(){
        $query = "select * from producttypes ";
        require("result.php");
        return $data;
    }
    function danhmuc(){
        $query = "select * from categories ";
        require("result.php");
        return $data;
    }
}
