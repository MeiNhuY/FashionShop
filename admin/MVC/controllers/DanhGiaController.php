<?php
require_once("MVC/Models/danhgia.php");
class DanhgiaController
{
	var $danhgia_model;
	function __construct()
	{
		$this->danhgia_model = new Danhgia();
	}

	public function list()
	{
		$data = array();
		$data = $this->danhgia_model->All(); 
		require_once("MVC/Views/Admin/index.php");
		//require_once('MVC/views/categories/list.php');
	}
}