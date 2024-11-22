<?php
require_once("models/Promotion.php"); 

class PromotionController
{
    var $promotion_model;

    public function __construct()
    {
        $this->promotion_model = new Promotion();
    }

    function apply_discount()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id']; 

            
            $data = $this->promotion_model->detail_promotion($id);
            
            if ($data) {
                $promotion_value = $data['PromotionValue'];

                $_SESSION['promotion'] = $promotion_value;
                $_SESSION['message'] = "Mã giảm giá áp dụng thành công!";


                header("Location: ?act=cart"); 
                exit();
            } else {
                $_SESSION['error'] = "Mã giảm giá không hợp lệ!";
                unset($_SESSION['promotion']);
                header("Location: ?act=cart");
                exit();
            }
        }
    }
}
