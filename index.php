<?php
session_start();
$mod = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($mod) {
    case 'home':
        require_once('controllers/HomeController.php');
        $controller_obj = new HomeController();
        $controller_obj->list();
        break;
    case 'shop':
        require_once('controllers/ShopController.php');
        $controller_obj = new ShopController();
        $controller_obj->list();
        break;
    case 'detail':
        require_once('controllers/DetailController.php');
        $controller_obj = new DetailController();
        $controller_obj->list();
        break;
    
    case 'promotion':
        require_once('controllers/PromotionController.php');
        $controller_obj = new PromotionController();
        $controller_obj->apply_discount();
        break;
    case 'history_order':
        require_once('controllers/HistoryController.php');
        $controller_obj = new HistoryController();
        $controller_obj->list();
        break;
    case 'order_detail':
        require_once('controllers/OrderDetailController.php');
        $controller_obj = new OrderDetailController();
        $controller_obj->list();
        break;

    case 'checkout':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "list";
        require_once('controllers/CheckoutController.php');
        $controller_obj = new CheckoutController();
        switch ($act) {
            case 'list':
                $controller_obj->list();
                break;
            case 'save':
                $controller_obj->save();
                break;
            case 'order_complete':
                $controller_obj->order_complete();
                break;
            default:
                $controller_obj->list();
                break;
        }
        break;
    case 'cart':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "list";
        require_once('controllers/CartController.php');
        $controller_obj = new CartController();
        switch ($act) {
            
            case 'list':
                $controller_obj->list_cart();
                break;
            case 'update':
                $controller_obj->update_cart();
                break;
            case 'add':
                $controller_obj->add_cart();
                break;
            case 'delete':
                $controller_obj->delete_cart();
                break;
            case 'deleteall':
                $controller_obj->deleteall_cart();
                break;
            default:
                $controller_obj->list_cart();
                break;
        }
        break;
    case 'taikhoan':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "taikhoan";
        require_once('controllers/LoginController.php');
        $controller_obj = new LoginController();
        if ((isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true)) {
            switch ($act) {
                case 'dangxuat':
                    $controller_obj->dangxuat();
                    break;
                case 'account':
                    $controller_obj->account();
                    break;
                case 'update':
                    $controller_obj->update();
                    break;
                case 'dangky_action':
                    $controller_obj->register_action();
                    break;
                default:
                    header('location: ?act=error');
                    break;
            }
            break;
        }else{  
            if ((isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true)) {
                switch ($act) {
                    case 'dangxuat':
                        $controller_obj->dangxuat();
                        break;
                    case 'account':
                        $controller_obj->account();
                        break;
                    case 'update':
                        $controller_obj->update();
                        break;
                    default:
                        header('location: ?act=error');
                        break;
                }
                break;
                } else {
                    switch ($act) {
                        case 'login':
                            $controller_obj->login();
                            break;
                        case 'dangnhap':
                            $controller_obj->login_action();
                            break;
                        case 'dangky_action':
                            $controller_obj->register_action();
                            break;
                        default:
                            $controller_obj->login();
                            break;
                    }
                    break;
                }
        }
    default:
        require_once('controllers/HomeController.php');
        $controller_obj = new Homecontroller();
        $controller_obj->list();
        break;
}
