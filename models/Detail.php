<?php
require_once("Model.php");
class Detail extends Model
{
    function detail_sp($id)
    {
        $query =  "SELECT * from products where ProductID = $id ";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
   
}