<?php
require_once("models/Home.php");
class HomeController
{
    var $home_model;
    public function __construct()
    {
       $this->home_model = new Home();
    }
    
    function list()
    {
        $data_danhmuc = $this->home_model->getCategories();

        $data_chitietDM = array();

        for($i=1; $i <=count($data_danhmuc);$i++){
            $data_chitietDM[$i] = $this->home_model->getCategoryDetails($i);
        }

        $data_limit1 = $this->home_model->limit(0,4);
        $data_limit2 = $this->home_model->limit(4,4);
        $data_limit3 = $this->home_model->limit(8,4);
        $data_limit4 = $this->home_model->limit(12,4);
        $data_arr = array($data_limit1,$data_limit2,$data_limit3,$data_limit4);
        $data_random = $this->home_model->getProductTypes(2);

        $data_banner = $this->home_model->getBanners(0,2);

        $data_sanpham1 = $this->home_model->getProductsByCategory(0,8,1);
        $data_sanpham2 = $this->home_model->getProductsByCategory(0,8,2);
        $data_sanpham3 = $this->home_model->getProductsByCategory(0,8,3);

        require_once('views/index.php');
    }
}