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
                $data_banner = $this->shop_model->getBanners(0,2);
                $data_sanpham1 = $this->shop_model->getLatestProducts(9);
                $data_sp_best_seller= $this->shop_model->getBestSellingProducts(6);
                foreach ($data as &$product) {
                    $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                }

                foreach ($data_sp_best_seller as &$product) {
                    $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                }

                foreach ($data_sanpham1 as &$product) {
                    $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                }
            }
        } else {
            if (isset($_GET['sp'])) {
                $id = isset($_GET['trang']) ? $_GET['trang'] : 1;
                $limit = 9;
                $start = ($id - 1) * $limit;
                $data = $this->shop_model->getProductsByCategory($start, $limit, $_GET['sp']);
                $data_noibat = $this->shop_model->sanpham_noibat();
                $data_banner = $this->shop_model->getBanners(0,2);
                $data_sanpham1 = $this->shop_model->getLatestProducts(9);
                $data_sp_best_seller= $this->shop_model->getBestSellingProducts(6);
                $data_count = $this->shop_model->count_sp_dm($_GET['sp']);
                $data_tong = $data_count['tong'];
                foreach ($data as &$product) {
                    $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                }

                foreach ($data_sp_best_seller as &$product) {
                    $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                }

                foreach ($data_sanpham1 as &$product) {
                    $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                }
            
            } else {
                if(isset($_GET['gtinh'])){
                    $id = isset($_GET['trang']) ? $_GET['trang'] : 1;
                    $limit = 9;
                    $start = ($id - 1) * $limit;
                    $data = $this->shop_model->getProductsByGender($start, $limit, $_GET['gtinh']);
                    $data_noibat = $this->shop_model->sanpham_noibat();
                    $data_sanpham1 = $this->shop_model->getLatestProducts(9);
                    $data_sp_best_seller= $this->shop_model->getBestSellingProducts(6);
                    $data_banner = $this->shop_model->getBanners(0,2);
                    $data_count = $this->shop_model->count_sp_dm($_GET['gtinh']);
                    $data_tong = $data_count['tong'];
                    $test = 0;
                    foreach ($data as &$product) {
                        $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                    }

                    foreach ($data_sp_best_seller as &$product) {
                        $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                    }

                    foreach ($data_sanpham1 as &$product) {
                        $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                    }
    
        
                }else{
                    if(isset($_GET['sort'])){
                            $sort = $_GET['sort'];
                            switch ($sort) {
                                case 'price_low':
                                    $data = $this->shop_model->getProductsByPrice('<', 300000);
                                    break;
                    
                                case 'price_high':
                                    $data = $this->shop_model->getProductsByPrice('>', 300000);
                                    break;
                    
                                case 'price_asc':
                                    $data = $this->shop_model->getProductsSortedByPrice('ASC');
                                    break;
                    
                                case 'price_desc':
                                    $data = $this->shop_model->getProductsSortedByPrice('DESC');
                                    break;
                    
                                default:
                                    $data = $this->shop_model->getAllProducts();
                                    break;
                            }

                            $data_tong = count($data); // Đếm tổng số sản phẩm sau khi lọc/sắp xếp
                            $test = 0;
                            $data_noibat = $this->shop_model->sanpham_noibat();
                            $data_banner = $this->shop_model->getBanners(0,2);
                            $data_sanpham1 = $this->shop_model->getLatestProducts(9);
                            $data_sp_best_seller = $this->shop_model->getBestSellingProducts(6);
                            foreach ($data as &$product) {
                                $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                            }

                            foreach ($data_sp_best_seller as &$product) {
                                $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                            }

                            foreach ($data_sanpham1 as &$product) {
                                $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                            }
                
                        }else{
                            if (isset($_POST['shop'])) {
                                $chuoi = $_POST['shop'];
                                $arr = explode("-", $chuoi);
                                $data = $this->shop_model->dongia($arr['0'], $arr['1']);
                                $data_sanpham1 = $this->shop_model->getLatestProducts(9);
                                $data_sp_best_seller= $this->shop_model->getBestSellingProducts(6);
                                $data_banner = $this->shop_model->getBanners(0,2);
                                $data_tong = count($data);
                                $test = 0;
                                foreach ($data as &$product) {
                                    $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                                }

                                foreach ($data_sp_best_seller as &$product) {
                                    $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                                }

                                foreach ($data_sanpham1 as &$product) {
                                    $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                                }
                            } else {
                                if (isset($_POST['keyword'])) {
                                    $data = $this->shop_model->keywork($_POST['keyword']);
                                    $data_noibat = $this->shop_model->sanpham_noibat();
                                    $data_banner = $this->shop_model->getBanners(0,2);
                                    $data_sanpham1 = $this->shop_model->getLatestProducts(9);
                                    $data_sp_best_seller= $this->shop_model->getBestSellingProducts(6);
                                    $data_tong = count($data);
                                    foreach ($data as &$product) {
                                        $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                                    }

                                    foreach ($data_sp_best_seller as &$product) {
                                        $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                                    }

                                    foreach ($data_sanpham1 as &$product) {
                                        $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                                    }
                                }else{
            
                                        $id = isset($_GET['trang']) ? $_GET['trang'] : 1;
                                        $limit = 9;
                                        $start = ($id - 1) * $limit;
                                        $data = $this->shop_model->limit($start, $limit);
                                        $data_banner = $this->shop_model->getBanners(0,2);
                                        $data_noibat = $this->shop_model->sanpham_noibat();
                                        $data_sanpham1 = $this->shop_model->getLatestProducts(9);
                                        $data_sp_best_seller= $this->shop_model->getBestSellingProducts(6);
                                        //$data_tong = 9;
                                        // $data = $this->shop_model->limit(0, 9);
                                        // $data_noibat = $this->shop_model->sanpham_noibat();
                                        $data_count = $this->shop_model->count_sp();
                                        $data_tong = $data_count['tong'];
                                        $test = 0;
                                        foreach ($data as &$product) {
                                            $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                                        }

                                        foreach ($data_sp_best_seller as &$product) {
                                            $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                                        }

                                        foreach ($data_sanpham1 as &$product) {
                                            $product['averageRating'] = $this->shop_model->getAverageRating($product['ProductID']) ?: 0;
                                        }

                            } 
                        }
                    }
                }
             }
        }

    
        require_once('views/index.php');
    }

}

