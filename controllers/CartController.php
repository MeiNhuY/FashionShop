<?php
require_once("models/Cart.php");
class CartController
{
    var $cart_model;
    public function __construct()
    {
        $this->cart_model = new Cart();
    }
    function list_cart()
    {
        $data_danhmuc = $this->cart_model->getCategories();

        $data_chitietDM = array();

        for ($i = 1; $i <= count($data_danhmuc); $i++) {
            $data_chitietDM[$i] = $this->cart_model->getCategoryDetails($i);
        }

        $count = 0;
        if (isset($_SESSION['product'])) {
            foreach ($_SESSION['product'] as $value) {
                $count += $value['TotalPrice'];
            }
        }
        require_once('views/index.php');
    }
    function add_cart()
    {
        $id = $_GET['id'];
        $data = $this->cart_model->detail_sp($id);
        $count = 0;
        if (isset($_SESSION['product'][$id])) {
            $arr = $_SESSION['product'][$id];
            $arr['Quantity'] = $arr['Quantity'] + 1;
            $arr['TotalPrice'] = $arr['Quantity'] * $arr["Price"];
            $_SESSION['product'][$id] = $arr;
        } else {
            $arr['ProductID'] = $data['ProductID'];
            $arr['ProductName'] = $data['ProductName'];
            $arr['Price'] = $data['Price'];
            $arr['Quantity'] = 1;
            $arr['TotalPrice'] = $data['Price'];
            $arr['Image'] = $data['Image'];
            $_SESSION['product'][$id] = $arr;
        }

        foreach ($_SESSION['product'] as $value) {
            $count += $value['TotalPrice'];
        }

        header('Location:?act=cart#dxd');
    }
    function update_cart()
    {
        $arr = $_SESSION['product'][$_GET['id']];
        $arr['Quantity'] = $arr['Quantity'] + 1;
        $arr['TotalPrice'] = $arr['Quantity'] * $arr["Price"];
        $_SESSION['product'][$_GET['id']] = $arr;
        header('Location: ?act=cart#dxd');
    }
    function delete_cart()
    {
        $arr = $_SESSION['product'][$_GET['id']];
        if ($arr['Quantity'] == 1) {
            unset($_SESSION['product'][$_GET['id']]);
        } else {
            $arr = $_SESSION['product'][$_GET['id']];
            $arr['Quantity'] = $arr['Quantity'] - 1;
            $arr['TotalPrice'] = $arr['Quantity'] * $arr["Price"];
            $_SESSION['product'][$_GET['id']] = $arr;
        }
        header('Location: ?act=cart#dxd');
    }
    function deleteall_cart()
    {
        unset($_SESSION['product'][$_GET['id']]);
        header('Location: ?act=cart#dxd');
    }
}
