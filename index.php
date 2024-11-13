<?php
session_start();
$mod = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($mod) {
    case 'home':
        require_once('controllers/HomeController.php');
        $controller_obj = new homeController();
        $controller_obj->list();
        break;
    case 'taikhoan':
        $act = isset($_GET['xuli']) ? $_GET['xuli'] : "taikhoan";
        require_once('controllers/LoginController.php');
        $controller_obj = new loginController();
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
