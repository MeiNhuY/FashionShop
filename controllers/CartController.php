<?php require_once("models/Cart.php");

class CartController
{
    var $cart_model;

    public function __construct()
    {
        $this->cart_model = new Cart();
    }

    // Hiển thị giỏ hàng
    function list_cart()
    {
        $data_danhmuc = $this->cart_model->getCategories();
        $data_chitietDM = array();

        for ($i = 1; $i <= count($data_danhmuc); $i++) {
            $data_chitietDM[$i] = $this->cart_model->getCategoryDetails($i);
        }

        $totalPrice = 0; 
        $shippingFee = 25000; // Phí vận chuyển cố định

        // Kiểm tra và tính tổng giỏ hàng
        if (isset($_SESSION['product'])) {
            foreach ($_SESSION['product'] as $value) {
                $totalPrice += $value['TotalPrice']; // Cộng giá từng sản phẩm vào tổng
            }
        }

        // Áp dụng khuyến mãi (nếu có)
        $promotion = isset($_SESSION['promotion']) ? $_SESSION['promotion'] : 0;
        // Tính tổng thanh toán cuối cùng
        $finalTotal = $totalPrice + $shippingFee - $promotion;

        // Truyền dữ liệu tới view
        require_once('views/index.php');
    }

    // Thêm sản phẩm vào giỏ hàng
    function add_cart()
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


        $id = $_GET['id'];
        $data = $this->cart_model->detail_sp($id);

        // Kiểm tra sản phẩm có trong giỏ hàng chưa
        if (isset($_SESSION['product'][$id])) {
            $arr = $_SESSION['product'][$id];
            $arr['Quantity'] += 1; // Tăng số lượng
            $arr['TotalPrice'] = $arr['Quantity'] * $arr["Price"]; // Cập nhật tổng tiền sản phẩm
            $_SESSION['product'][$id] = $arr;
        } else {
            // Nếu sản phẩm chưa có trong giỏ, thêm mới
            $arr = [
                'ProductID' => $data['ProductID'],
                'PromotionID' => $data['PromotionID'],
                'ProductName' => $data['ProductName'],
                'Price' => $data['Price'],
                'Quantity' => 1,
                'TotalPrice' => $data['Price'],
                'Image' => $data['Image']
            ];
            $_SESSION['product'][$id] = $arr;
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

        // Điều hướng lại tới giỏ hàng
        header('Location:?act=cart#dxd');
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    function update_cart()
    {
        $arr = $_SESSION['product'][$_GET['id']];
        $arr['Quantity'] = $arr['Quantity'] + 1; // Tăng số lượng
        $arr['TotalPrice'] = $arr['Quantity'] * $arr["Price"]; // Cập nhật tổng tiền sản phẩm
        $_SESSION['product'][$_GET['id']] = $arr;

        // Quay lại giỏ hàng
        header('Location: ?act=cart#dxd');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    function delete_cart()
    {
        $arr = $_SESSION['product'][$_GET['id']];
        if ($arr['Quantity'] == 1) {
            unset($_SESSION['product'][$_GET['id']]); // Nếu số lượng còn 1 thì xóa sản phẩm khỏi giỏ
            unset($_SESSION['promotion'][$_GET['id']]);
        } else {
            $arr['Quantity'] -= 1; // Giảm số lượng sản phẩm
            $arr['TotalPrice'] = $arr['Quantity'] * $arr["Price"]; // Cập nhật lại tổng tiền sản phẩm
            $_SESSION['product'][$_GET['id']] = $arr;
        }


        // Quay lại giỏ hàng
        header('Location: ?act=cart#dxd');
    }

    function deleteall_cart()
    {
        unset($_SESSION['product'][$_GET['id']]);
        header('Location: ?act=cart#dxd');
    }


}

?>
