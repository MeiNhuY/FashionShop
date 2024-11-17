<?php
require_once("model.php");
class loaisanpham extends Model
{
    var $table = "producttypes";
    var $contens = "ProductTypeID";
    function danhmuc(){
        $query = "select * from categories ";
        require("result.php");
        return $data;
    }
}