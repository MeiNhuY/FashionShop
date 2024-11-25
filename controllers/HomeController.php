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

        $data_limit1 = $this->home_model->limit(0,10);

        $data_arr = array($data_limit1);

        $data_random = $this->home_model->getRandomProducts(2);

        $data_banner = $this->home_model->getBanners(0,2);

        $data_sanpham1 = $this->home_model->getLatestProducts(10);

        $data_sp_best_seller= $this->home_model->getBestSellingProducts(6);

        foreach ($data_sp_best_seller as &$product) {
            $product['averageRating'] = $this->home_model->getAverageRating($product['ProductID']) ?: 0;
        }

        foreach ($data_sanpham1 as &$product) {
            $product['averageRating'] = $this->home_model->getAverageRating($product['ProductID']) ?: 0;
        }

        


        require_once('views/index.php');
    }
}