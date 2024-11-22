<?php
require_once("models/Checkout.php");
class CheckoutController
{
    var $checkout_model;
    public function __construct()
    {
        $this->checkout_model = new Checkout();
    }
    function list()
    {
        if (isset($_SESSION['login'])) {
            $data_danhmuc = $this->checkout_model->getCategories();

            $data_chitietDM = array();

            for ($i = 1; $i <= count($data_danhmuc); $i++) {
                $data_chitietDM[$i] = $this->checkout_model->getCategoryDetails($i);
            }

           // Tính tổng giỏ hàng
           $totalPrice = 0;
           if (isset($_SESSION['product'])) {
               foreach ($_SESSION['product'] as $value) {
                   $totalPrice += $value['TotalPrice'];
               }
           }

           $shippingFee = 25000;
           $promotion = isset($_SESSION['promotion']) ? $_SESSION['promotion'] : 0;
           $finalTotal = $totalPrice + $shippingFee - $promotion;

            require_once('views/index.php');
        } else {
            header('location: ?act=taikhoan');
        }
    }
    function  save()
    {

          // Kiểm tra xem người dùng đã đăng nhập chưa
          // Kiểm tra đăng nhập
        if (!isset($_SESSION['login'])) {
            echo "<script>
                if (confirm('Bạn cần phải đăng nhập để thêm sản phẩm vào giỏ hàng. Bạn có muốn đăng nhập không?')) {
                    window.location.href = '?act=taikhoan'; // Chuyển hướng đến trang đăng nhập
                } else {
                    window.location.href = '?act=cart'; // Quay lại trang giỏ hàng
                }
            </script>";
            exit(); // Kết thúc hàm để không thực hiện tiếp phần còn lại
        }

          // Kiểm tra giỏ hàng
            if (!isset($_SESSION['product']) || empty($_SESSION['product'])) {
                echo "<script>
                    if (confirm('Giỏ hàng của bạn đang trống! Bạn có muốn quay lại trang mua sắm không?')) {
                        window.location.href = '?act=shop'; // Chuyển hướng đến trang chủ hoặc trang sản phẩm
                    } else {
                        window.history.back(); // Quay lại trang trước đó
                    }
                </script>";
                exit(); // Ngăn thực thi tiếp tục
            }

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');

       // Tính tổng giỏ hàng
       $totalPrice = 0;
       if (isset($_SESSION['product'])) {
           foreach ($_SESSION['product'] as $value) {
               $totalPrice += $value['TotalPrice'];
           }
       }

       $shippingFee = 25000;
       $promotion = isset($_SESSION['promotion']) ? $_SESSION['promotion'] : 0;
       $finalTotal = $totalPrice + $shippingFee - $promotion;

        $data = array(
            'UserID' => $_SESSION['login']['UserID'],
            'OrderDate' => $ThoiGian,
            'RecipientName' =>    $_POST['NguoiNhan'],
            'PhoneNumber' => $_POST['SDT'],
            'Address' => $_POST['DiaChi'],
            'TotalAmount' => $finalTotal,
            'Status'  =>  '0',
        );
        $this->checkout_model->save($data);

         // Xóa giỏ hàng sau khi thanh toán thành công
        unset($_SESSION['product']);  // Xóa giỏ hàng khỏi session

        // Có thể chuyển hướng người dùng đến trang hoàn tất đơn hàng
        header('Location: ?act=history_order');
        exit(); // Dừng chương trình để tránh việc chạy tiếp mã phía dưới
        }
    function order_complete()
    {
        $data_danhmuc = $this->checkout_model->getCategories();

        $data_chitietDM = array();

        for ($i = 1; $i <= count($data_danhmuc); $i++) {
            $data_chitietDM[$i] = $this->checkout_model->getCategoryDetails($i);
        }
        $count = 0;
        if (isset($_SESSION['product'])) {
            foreach ($_SESSION['product'] as $value) {
                $count += $value['TotalPrice'];
            }
        }
        require_once('views/index.php');
    }
    }
