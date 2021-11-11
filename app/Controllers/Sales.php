<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\SalesModel;

class Sales extends BaseController
{
	public function __construct()
	{
		helper(['url', 'form']);
	}

    function sales()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$usersModel = new \App\Models\UsersModel();
		$loggedUserID = session()->get('loggedUser');

		$db = db_connect();
		$salesModel = new SalesModel($db);
		$sales = $salesModel->select_all();

		$userInfo = $usersModel->find($loggedUserID);
		$data = [
			'meta_title' => 'Sales Record | PHP',
			'title' => 'Sales Record',
			'userInfo' => $userInfo,
			'sales' => $sales
		];

		// print_r($sales);
		// die;
		return view('sales/sales', $data);
	}

	public function salesAdd()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}

		$usersModel = new \App\Models\UsersModel();
		$loggedUserID = session()->get('loggedUser');
		$userInfo = $usersModel->find($loggedUserID);

		$productModel = new \App\Models\ProductModel();
		$items = $productModel->findAll();

		$db = db_connect();
		$salesModel = new SalesModel($db);
		$category = $salesModel->select_product_category();

		$data = [
			'title' => 'Sales Record',
			'userInfo' => $userInfo,
			'items' => $items,
			'category' => $category
		];

		return view('sales/sales_add', $data);
	}

	function fetch_product()
	{
		$db = db_connect();
		$salesModel = new SalesModel($db);
		$product_data = $salesModel->fetch_product($this->request->getVar('category'));

		$output = '';
		foreach($product_data as $row){
			$output .= '<option data-name="'.$row['Product_Name'].'"   data-quantity="'.$row['Product_Quantity'].'"  data-price="'.$row['Product_Price'].'"  data-category="'.$row['Category'].'"   value = "'.$row['Product_id'].'">'.$row['Product_Name'].'</option>';
		}

		echo json_encode($output);
	}

	function confirm_sale_items()
	{

	}

}
