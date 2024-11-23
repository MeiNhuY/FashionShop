<?php
require_once("models/Shop.php");
class ShopController
{
    var $shop_model;
    public function __construct()
    {
        $this->shop_model = new Shop();
    }
    function list()
    {

        $data_danhmuc = $this->shop_model->getCategories();

        $data_loaisp = $this->shop_model->loaisp(0, 8);

        $data_chitietDM = array();

        for ($i = 1; $i <= count($data_danhmuc); $i++) {
            $data_chitietDM[$i] = $this->shop_model->getCategoryDetails($i);
        }


        // if (isset($_GET['trang'])) {
        //     $id = $_GET['trang'];
        //     $limit = 9;
        //     $start = ($id - 1) * $limit;
        //     $data = $this->shop_model->limit($start, $limit);
        //     $data_noibat = $this->shop_model->sanpham_noibat();
        //     $data_tong = 9;
        // } else {
        if (isset($_GET['sp']) and isset($_GET['loai'])) {
            $data_loai = $this->shop_model->chitiet_loai($_GET['loai'], $_GET['sp']);
            if ($data_loai != null) {
                $data = $this->shop_model->chitiet($data_loai[0]['ProductTypeID'], $_GET['sp']);
                $data_noibat = $this->shop_model->sanpham_noibat();
                $data_count = $this->shop_model->count_sp_ctdm($_GET['sp'], $data_loai[0]['ProductTypeID']);
                $data_tong = $data_count['tong'];
                $data_sanpham1 = $this->shop_model->getLatestProducts(10);
                $data_sp_best_seller= $this->shop_model->getBestSellingProducts(6);

            }
        } else {
            if (isset($_GET['sp'])) {
                $data = $this->shop_model->getProductsByCategory(0, 9, $_GET['sp']);
                $data_noibat = $this->shop_model->sanpham_noibat();
                $data_sanpham1 = $this->shop_model->getLatestProducts(10);
                $data_sp_best_seller= $this->shop_model->getBestSellingProducts(6);
                $data_count = $this->shop_model->count_sp_dm($_GET['sp']);
                $data_tong = $data_count['tong'];
            } else {
                if (isset($_POST['shop'])) {
                    $chuoi = $_POST['shop'];
                    $arr = explode("-", $chuoi);
                    $data = $this->shop_model->dongia($arr['0'], $arr['1']);
                    $data_tong = count($data);
                } else {
                    if (isset($_POST['keyword'])) {
                        $data = $this->shop_model->keywork($_POST['keyword']);
                        $data_noibat = $this->shop_model->sanpham_noibat();
                        $data_sanpham1 = $this->shop_model->getLatestProducts(10);
                        $data_sp_best_seller= $this->shop_model->getBestSellingProducts(6);
                        $data_tong = count($data);
                    } else {
                        $id = isset($_GET['trang']) ? $_GET['trang'] : 1;
                        $limit = 9;
                        $start = ($id - 1) * $limit;
                        $data = $this->shop_model->limit($start, $limit);
                        $data_noibat = $this->shop_model->sanpham_noibat();
                        $data_sanpham1 = $this->shop_model->getLatestProducts(10);
                        $data_sp_best_seller= $this->shop_model->getBestSellingProducts(6);
                        //$data_tong = 9;
                        // $data = $this->shop_model->limit(0, 9);
                        // $data_noibat = $this->shop_model->sanpham_noibat();
                         $data_count = $this->shop_model->count_sp();
                         $data_tong = $data_count['tong'];
                         $test = 0;
                    }
                }
            }
        }

        require_once('views/index.php');
    }
}
