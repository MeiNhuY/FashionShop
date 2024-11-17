<?php
require_once("models/CartModel.php");

class CartController
{
    var $cart_model;

    public function __construct()
    {
        $this->cart_model = new CartModel();
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
                $count += $value['ThanhTien'];
            }
        }
        require_once('Views/index.php');
    }

    function add_cart()
    {
        $id = $_GET['ProductID']; // Ensure this matches the parameter in your URL
        $data = $this->cart_model->detail_sp($id);
        $count = 0;
        if (isset($_SESSION['product'][$id])) {
            $arr = $_SESSION['product'][$id];
            $arr['Quantity'] = $arr['Quantity'] + 1;
            $arr['ThanhTien'] = $arr['Quantity'] * $arr["Price"];
            $_SESSION['product'][$id] = $arr;
        } else {
            $arr['Image'] = $data['Image'];
            $arr['ProductID'] = $data['ProductID'];
            $arr['ProductName'] = $data['ProductName'];
            $arr['Price'] = $data['Price'];
            $arr['Quantity'] = 1;
            $arr['ThanhTien'] = $data['Price'];
            $_SESSION['product'][$id] = $arr;
        }

        foreach ($_SESSION['product'] as $value) {
            $count += $value['ThanhTien'];
        }

        header('Location:?act=cart#call');
    }

    function update_cart()
    {
        $id = $_GET['ProductID']; // Ensure this matches the parameter in your URL
        $arr = $_SESSION['product'][$id];
        $arr['Quantity'] = $arr['Quantity'] + 1;
        $arr['ThanhTien'] = $arr['Quantity'] * $arr["Price"];
        $_SESSION['product'][$id] = $arr;
        header('Location: ?act=cart#call');
    }

    function delete_cart()
    {
        $id = $_GET['ProductID']; // Ensure this matches the parameter in your URL
        $arr = $_SESSION['product'][$id];
        if ($arr['Quantity'] == 1) {
            unset($_SESSION['product'][$id]);
        } else {
            $arr['Quantity'] = $arr['Quantity'] - 1;
            $arr['ThanhTien'] = $arr['Quantity'] * $arr["Price"];
            $_SESSION['product'][$id] = $arr;
        }
        header('Location: ?act=cart#call');
    }

    function deleteall_cart()
    {
        unset($_SESSION['product']);
        header('Location: ?act=cart#call');
    }
}
?>
