<?php
require_once("Model.php");
class Login extends Model
{
    var $conn;
    function __construct()
    {
        $conn_obj = new Connection();
        $this->conn = $conn_obj->conn;
    }
    function login_action($data)
    {
        $query = "SELECT * from users WHERE Username = '" . $data['taikhoan'] . "' AND Password = '" . $data['matkhau'] . "' AND Status = 1";

        $login = $this->conn->query($query)->fetch_assoc();
        if ($login !== NULL) {
            if($login['RoleID'] == 1){
                $_SESSION['isLogin_Admin'] = true;
                $_SESSION['login'] = $login;
            }else{
                $_SESSION['isLogin'] = true;
                $_SESSION['login'] = $login;
                }
                
            header('Location: ?mod=login');
        } else {
            setcookie('msg1', 'Đăng nhập không thành công', time() + 5);
            header('Location: ?act=taikhoan#dangnhap');
        }
        
    }
    function logout()
    {
        if(isset($_SESSION['isLogin_Admin'])){
            unset($_SESSION['isLogin_Admin']);
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['isLogin'])){
            unset($_SESSION['isLogin']);
            unset($_SESSION['login']);
        }
        header('location: ?act=home');
    }
    function check_account()
    {
        $query =  "SELECT * from users";

        require("result.php");

        return $data;
    }
    function register_action($data, $check1, $check2) {
        if ($check1 == 0) {
            if ($check2 == 0) {
                $f = "";
                $v = "";
                foreach ($data as $key => $value) {
                    $f .= $key . ",";
                    $v .= "'" . $value . "',";
                }
                $f = trim($f, ",");
                $v = trim($v, ",");
                $query = "INSERT INTO users($f) VALUES ($v);";
    
                $status = $this->conn->query($query);
                if ($status == true) {
                    setcookie('msg', 'Đăng ký thành công', time() + 1);
                    header('Location: ?act=taikhoan');
                } else {
                    setcookie('msg', 'Đăng ký không thành công', time() + 2);
                }
            } else {
                setcookie('msg', 'Mật khẩu không trùng nhau', time() + 2);
            }
        } else {
            setcookie('msg', 'Tên tài khoản hoặc Email đã tồn tại', time() + 2);
        }
    
        // Không chuyển hướng ngay lập tức, mà để hiển thị thông báo trên cùng trang đăng ký
        header('Location: ?act=taikhoan&xuli#dangky'); 
        exit();
    }
    
    function account()
    {
        $id = $_SESSION['login']['UserID'];
        return $this->conn->query("SELECT * from users where UserID = $id")->fetch_assoc();
    }
    function update_account($data)
    {
        $v = "";
        foreach ($data as $key => $value) {
            $v .= $key . "='" . $value . "',";
        }
        $v = trim($v, ",");

        $query = "UPDATE users SET  $v   WHERE  UserID = " . $_SESSION['login']['UserID'];

        $result = $this->conn->query($query);
        
        if ($result == true) {
            setcookie('doimk', 'Cập nhật tài khoản thành công', time() + 2);
            header('Location: ?act=taikhoan&xuli=account#doitk');
        } else {
            setcookie('doimk', 'Mật khẩu xác nhận không đúng', time() + 2);
            header('Location: ?act=taikhoan&xuli=account#doitk');
        }
    }
    function error()
    {
        header('location: ?act=errors');
    }
}
