<?php 
    require_once("MVC/Models/login.php");
    class LoginController {
        var $login_model;
        public function __construct()
        {
            $this->login_model = new login();
        }
   
        public function admin()
        {
            $data_tksp1 = $this->login_model->tk_sanpham(1);//áo
            $data_tksp2 = $this->login_model->tk_sanpham(2);//quần
            $data_tksp3 = $this->login_model->tk_sanpham(3);//váy

            $data_hd = $this->login_model->tk_thongbao();

            $m = date("m");

            $data_countM = $this->login_model->tk_dtthang($m);

            $y = "20".date("y");

            $data_countY = $this->login_model->tk_dtnam($y);

            $data_nguoidung = $this->login_model->tk_nguoidung(2);

            require_once("MVC/Views/Admin/index.php");
        }
      
    }
?>