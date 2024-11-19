<?php
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case "home":
        require_once("home/home.php");
        break;
    case "shop":
        require_once("shop/shop.php");
        break;
    case "detail":
        require_once("shop/product_detail.php");
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
    case "promotion":
        require_once("page/promotion.php");
        break;
    case "intro":
        require_once("page/intro.php");
        break;  

    case "taikhoan":
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "login";
        if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
            switch ($act) {
                case 'login':
                    require_once("login/login.php");
                    break;
                case 'account':
                    require_once("login/my-account.php");
                    break;
                default:
                    require_once("login/login.php");
                    break;
            }
        } else {
            if ((isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true)) {
                switch ($act) {
                    case 'login':
                        require_once("login/login.php");
                        break;
                    case 'account':
                        require_once("login/my-account.php");
                        break;
                    default:
                        require_once("login/login.php");
                        break;
                }
            } else {
                switch ($act) {
                    case 'login':
                        require_once("login/login.php");
                        break;
                    case 'dangky': 
                        require_once("login/register.php");
                        break;
                    default:
                        require_once("login/login.php");
                        break;
                }
            }
            break;
        }
            
    default:
        require_once("error-404.php");
        break;
    }
    