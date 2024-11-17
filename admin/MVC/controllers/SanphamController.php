<?php
require_once("MVC/Models/sanpham.php");
class SanphamController
{
    var $sanpham_model;
    public function __construct()
    {
        $this->sanpham_model = new sanpham();
    }
    public function list()
    {
        $data = $this->sanpham_model->All();
        require_once("MVC/Views/Admin/index.php");
        // require_once("MVC/Views/posts/list.php");
    }
    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->sanpham_model->find($id);
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/posts/detail.php");
    }
    public function add()
    {
        $data_km = $this->sanpham_model->khuyenmai();
        $data_lsp = $this->sanpham_model->loaisp();
        $data_dm = $this->sanpham_model->danhmuc();
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/posts/add.php");
    }
    public function store()
    {
        $target_dir = "../public/images/products/";  // thư mục chứa file upload

        $HinhAnh = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh"]["name"]); // link sẽ upload file lên

        $status_upload = move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $target_file);

        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh =  "images/products/" . basename($_FILES["HinhAnh"]["name"]);
        }

        // $HinhAnh2 = "";
        // $target_file = $target_dir . basename($_FILES["HinhAnh2"]["name"]); // link sẽ upload file lên
        // $status_upload = move_uploaded_file($_FILES["HinhAnh2"]["tmp_name"], $target_file);
        // if ($status_upload) { // nếu upload file không có lỗi 
        //     $HinhAnh2 =  "/img/products/" . basename($_FILES["HinhAnh2"]["name"]);
        // }

        // $HinhAnh3 = "";
        // $target_file = $target_dir . basename($_FILES["HinhAnh3"]["name"]); // link sẽ upload file lên
        // $status_upload = move_uploaded_file($_FILES["HinhAnh3"]["tmp_name"], $target_file);
        // if ($status_upload) { // nếu upload file không có lỗi 
        //     $HinhAnh3 =  "/img/products/" . basename($_FILES["HinhAnh3"]["name"]);
        // }

        $TrangThai = 0;
        if (isset($_POST['TrangThai'])) {
            $TrangThai = $_POST['TrangThai'];
        }

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');
        $data = array(
			'ProductTypeID' => $_POST['MaLSP'],
            'ProductName'  =>   $_POST['TenSP'],
            'CategoryID' => $_POST['MaDM'],
            'Price' => $_POST['DonGia'],
            'Quantity' => $_POST['SoLuong'],
            'Image' => $HinhAnh,
            'Gender' => $_POST['GioiTinh'],
            'PromotionID' =>  $_POST['MaKM'],
            'Origin' => $_POST['XuatXu'],
            'Material' =>  $_POST['ChatLieu'],
            'Description' =>  $_POST['MoTa'],
            'Rating' =>  0,
            'ReviewsCount' => 0,
            'Status' => $TrangThai,
            'CreatedAt' => $ThoiGian
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }

        $this->sanpham_model->store($data);
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->sanpham_model->delete($id);
    }
    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data_km = $this->sanpham_model->khuyenmai();
        $data_lsp = $this->sanpham_model->loaisp();
        $data_dm = $this->sanpham_model->danhmuc();
        $data = $this->sanpham_model->find($id);
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/posts/edit.php");
    }
    public function update()
    {

        $target_dir = "../public/images/products/";  // thư mục chứa file upload

        $HinhAnh = "";
        $target_file = $target_dir . basename($_FILES["HinhAnh"]["name"]); // link sẽ upload file lên
        $status_upload = move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $target_file);
        var_dump(basename($_FILES["HinhAnh"]["name"]));
        if ($status_upload) { // nếu upload file không có lỗi 
            $HinhAnh = "images/products/" .basename($_FILES["HinhAnh"]["name"]);
        }

        $TrangThai = 0;
        if (isset($_POST['TrangThai'])) {
            $TrangThai = $_POST['TrangThai'];
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');
        $data = array(
            'ProductID' => $_POST['MaSP'],
            'ProductTypeID' => $_POST['MaLSP'],
            'ProductName'  =>   $_POST['TenSP'],
            'CategoryID' => $_POST['MaDM'],
            'Price' => $_POST['DonGia'],
            'Quantity' => $_POST['SoLuong'],
            'Image' => $HinhAnh,
            'Gender' => $_POST['GioiTinh'],
            'PromotionID' =>  $_POST['MaKM'],
            'Origin' => $_POST['XuatXu'],
            'Material' =>  $_POST['ChatLieu'],
            'Description' =>  $_POST['MoTa'],
            'Rating' =>  0,
            'ReviewsCount' => 0,
            'Status' => $TrangThai,
            'CreatedAt' => $ThoiGian
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        if ($HinhAnh == "") {
            unset($data['Image']);
        }

        $this->sanpham_model->update($data);
    }
}
