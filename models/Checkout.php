<?php
require_once("Model.php");
class Checkout extends Model
{
  function save($data){
    $f = "";
    $v = "";
    foreach ($data as $key => $value) {
        $f .= $key . ",";
        $v .= "'" . $value . "',";
    }
    $f = trim($f, ",");
    $v = trim($v, ",");
    $query = "INSERT INTO orders($f) VALUES ($v);";
    
    $status = $this->conn->query($query);

    $query_mahd = "select OrderID from orders ORDER BY OrderDate DESC LIMIT 1";
    $data_mahd = $this->conn->query($query_mahd)->fetch_assoc();

    foreach ($_SESSION['product'] as $value) {
        $MaSP =$value['ProductID'];
        $SoLuong = $value['Quantity'];
        $DonGia = $value['Price'];
        $MaHD = $data_mahd['OrderID'];
        $query_ct = "INSERT INTO orderdetails(OrderID,ProductID,Quantity,UnitPrice) VALUES ($MaHD,$MaSP,$SoLuong,$DonGia)";

        $status_ct = $this->conn->query($query_ct);
    }
    
    if ($status == true and $status_ct == true) {
        setcookie('msg', 'Đăng ký thành công', time() + 2);

    } else {
        setcookie('msg', 'Đăng ký không thành công', time() + 2);
        header('location: ?act=checkout');
    }
    
  }
}