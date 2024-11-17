<?php
require_once("MVC/Models/khuyenmai.php");
class KhuyenmaiController
{
	var $khuyenmai_model;
	function __construct()
	{
		$this->khuyenmai_model = new khuyenmai();
	}

	public function list()
	{
		$data = array();
		$data = $this->khuyenmai_model->All(); 
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/list.php');
	}
	public function add()
	{
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/add.php');
	}
	public function store()
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$NgayBD =  date('Y-m-d H:i:s');
		$data = array(
			'PromotionName' => $_POST['TenKM'],
			'PromotionType' => $_POST['LoaiKM'],
			'PromotionValue' => $_POST['GiaTriKM'],
			'StartDate' => $NgayBD,
			'Status' => '1'
		);
		foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
		$this->khuyenmai_model ->store($data);
	}
	public function detail()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 5;
		$data = $this->khuyenmai_model->find($id);
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/detail.php');
	}
	public function delete()
	{
		if (isset($_GET['id'])) {
			$this->khuyenmai_model ->delete($_GET['id']);
		}
	}
	public function edit()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : 5;
		$data = $this->khuyenmai_model ->find($id);
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/edit.php');
	}
	public function update()
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$NgayBD =  date('Y-m-d H:i:s');
		$data = array(
			'PromotionID' => $_POST['MaKM'],
			'PromotionName' => $_POST['TenKM'],
			'PromotionType' => $_POST['LoaiKM'],
			'PromotionValue' => $_POST['GiaTriKM'],
			'StartDate' => $NgayBD,
			'Status' => $_POST['TrangThai']
		);
		foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
		$this->khuyenmai_model ->update($data);
	}
}
