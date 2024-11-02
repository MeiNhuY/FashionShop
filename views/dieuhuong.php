<?php
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case "home":
        require_once("home/home.php");
        break;
    case "shop":
        require_once("shop/shop.php");
        break;
    case "page":
        require_once("page/intro.php");
        break;
    case "checkout":
        require_once("page/checkout.php");
        break;
    case "contact":
        require_once("page/contact.php");
        break;
    case "cart":
        require_once("cart/cart.php");
        break;
    case "sale":
        require_once("page/sale.php");
        break;
    case "intro":
        require_once("page/intro.php");
        break;   

    case "login":
        require_once("login/login.php");
        break;  
        
    default:
        require_once("error-404.php");
        break;
}
