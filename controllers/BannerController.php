<?php require_once("models/Cart.php");

class CartController
{
    var $cart_model;

    public function __construct()
    {
        $this->cart_model = new Cart();
    }

}