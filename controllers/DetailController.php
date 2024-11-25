<?php
require_once("models/Detail.php");
class DetailController
{
    var $detail_model;
    public function __construct()
    {
       $this->detail_model = new Detail();
    }
    
    function list()
    {

        $data_danhmuc = $this->detail_model->getCategories();

        $data_chitietDM = array();

        for($i=1; $i <=count($data_danhmuc);$i++){
            $data_chitietDM[$i] = $this->detail_model->getCategoryDetails($i);
        }

        $id = $_GET['id'];

        $data = $this->detail_model->detail_sp($id);
        $reviews = $this->detail_model->getReviewsByProductId($id);


        if($data!=null){
        $data_lq = $this->detail_model->getProductsByCategory(0,4,$data['CategoryID']);
        }

        require_once('views/index.php');
     }


             
     function review(){

        $data_danhmuc = $this->detail_model->getCategories();


        $data_chitietDM = array();

        for($i=1; $i <=count($data_danhmuc);$i++){
            $data_chitietDM[$i] = $this->detail_model->getCategoryDetails($i);
        }

        $id = $_GET['id'];

        $data = $this->detail_model->detail_sp($id);
        $reviews = $this->detail_model->getReviewsByProductId($id);


        if($data!=null){
        $data_lq = $this->detail_model->getProductsByCategory(0,4,$data['CategoryID']);
        }



        if(!isset($_SESSION['login']))
        {
                echo "<script type='text/javascript'>
                alert('Vui lòng đăng nhập để gửi đánh giá!');
                window.location.href = '?act=taikhoan'; // Chuyển hướng người dùng đến trang đăng nhập
            </script>";
        } 

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['DanhGia'], $_POST['BinhLuan']) && isset($_SESSION['login']['UserID'])) {
                $user_id = $_SESSION['login']['UserID'] ?? 0; // Giả sử user_id được lấy từ session
                $rating = $_POST['DanhGia'];
                $comment = $_POST['BinhLuan'];
                
                if($existingReview = $this->detail_model->checkUserReviewExists($user_id, $id))
                {
                    echo "<script type='text/javascript'>
                    alert('Bạn đã gửi đánh giá cho sản phẩm này rồi!');
                    </script>";
                
                }else{
                    if ($this->detail_model->addReview($id, $user_id, $rating, $comment)) {
                        echo "<script type='text/javascript'>
                        alert('Thêm đánh giá thành công!');
                        </script>";
                        header("Location: ?act=detail&id=$id&success=1");
                        exit();
                    } else {
                        echo "<script type='text/javascript'>
                        alert('Thêm đánh giá thất bại!');
                        </script>";                    
                        header("Location: ?act=detail&id=$id&error=1");
                        exit();
                        }
                 

                }
            }


            require_once('views/index.php');


    }




}