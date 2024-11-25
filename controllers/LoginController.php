<?php
require_once("models/Login.php");
class LoginController
{
    var $login_model;
    public function __construct()
    {
        $this->login_model = new Login();
    }
    function login()
    {
        $category_data = $this->login_model->getCategories();
        $data_banner = $this->login_model->getBanners(0,2);
        $category_details = array();

        for ($i = 1; $i <= count($category_data); $i++) {
            $category_details[$i] = $this->login_model->getCategoryDetails($i);
        }

        require_once('views/index.php');
    }

    function login_action()
    {
        $username = $_POST['taikhoan'];
        $password = md5($_POST['matkhau']);
        if (strpos($username, "'") != false) {
            $username = str_replace("'", "\'", $username);
        }
        $data = array(
            'taikhoan' => $username,
            'matkhau' => $password,
        );
        $this->login_model->login_action($data);
        $data_banner = $this->login_model->getBanners(0,2);

    }
    function register_action()
    {
        $check1 = 0;
        $check2 = 0;
        $data_check = $this->login_model->check_account();
        foreach ($data_check as $value) {
            if ($value['Email'] == $_POST['email'] || $value['Username'] == $_POST['taiKhoan']) {
                $check1 = 1;
            }
        }

        if ($_POST['matkhau'] != $_POST['checkmatkhau']) {
            $check2 = 1;
        }

        $data = array(
            'FirstName' =>    $_POST['ho'],
            'LastName'  =>   $_POST['ten'],
            'Gender' => "",
            'PhoneNumber' => $_POST['sdt'],
            'Email' =>    $_POST['email'],
            'Address'  =>  $_POST['diachi'],
            'Username' => $_POST['taikhoan'],
            'Password' => md5($_POST['matkhau']),
            'RoleID' =>  '2',
            'Status'  =>  '1',
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }

        $this->login_model->register_action($data, $check1, $check2);
        $data_banner = $this->login_model->getBanners(0,2);

    }
    function dangxuat()
    {
        $this->login_model->logout();
    }
    function account()
    {
        $data_danhmuc = $this->login_model->getCategories();

        $data_chitietDM = array();

        for ($i = 1; $i <= count($data_danhmuc); $i++) {
            $data_chitietDM[$i] = $this->login_model->getCategoryDetails($i);
        }
        $data = $this->login_model->account();

        require_once('views/index.php');
    }
    function update()
    {

        if (isset($_POST['Ho'])) {
            $data = array(
                'FirstName' =>    $_POST['Ho'],
                'LastName'  =>   $_POST['Ten'],
                'Username' => $_POST['TaiKhoan'],
                'PhoneNumber' => $_POST['SĐT'],
                'Email' =>    $_POST['Email'],
                'Address'  =>   $_POST['DiaChi'],
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $this->login_model->update_account($data);
            
        } else {
            if ($_POST['MatKhauMoi'] == $_POST['MatKhauXN']) {
                if (md5($_POST['MatKhau']) == $_SESSION['login']['Password']) {
                    $data = array(
                        'Password' => md5($_POST['MatKhauMoi']),
                    );
                    $this->login_model->update_account($data);
                } else {
                    setcookie('doimk', 'Mật khẩu không đúng', time() + 2);
                }
            } else {
                setcookie('doimk', 'Mật khẩu mới không trùng nhau', time() + 2);
            }
        }
        header('location: ?act=taikhoan&xuli=account#doitk');
    }
}
