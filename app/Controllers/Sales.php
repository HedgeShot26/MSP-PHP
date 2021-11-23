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
		foreach ($product_data as $row) {
			$output .= '<option data-name="' . $row['Product_Name'] . '"   data-quantity="' . $row['Product_Quantity'] . '"  data-price="' . $row['Product_Price'] . '"  data-category="' . $row['Category'] . '"   value = "' . $row['Product_id'] . '">' . $row['Product_Name'] . '</option>';
		}

		echo json_encode($output);
	}

	function confirm_sale_items()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}

		if ($this->request->getPost('product_id') != null) {

			$product_id = $this->request->getPost('product_id');
			$product_name = $this->request->getPost('product_name');
			$product_price = $this->request->getPost('product_price');
			$product_quantity = $this->request->getPost('product_quantity');

			$data['product_id'] = $product_id;
			$data['product_name'] = $product_name;
			$data['product_price'] = $product_price;
			$data['product_quantity'] = $product_quantity;

			$db = db_connect();
			$salesModel = new SalesModel($db);

			//get product image
			foreach ($product_id as $index => $product_id) {
				$current_image = $salesModel->select_one_product($product_id);
				$product_image[$index] = $current_image['Product_img'];
			}
			$data['product_image'] = $product_image;

			//calculate grand total price
			$grand_total_price = 0;
			foreach ($product_quantity as $index => $product_quantity) {
				$grand_total_price += round($product_quantity * $product_price[$index], 2);
			}
			$data['grand_total_price'] = round($grand_total_price, 2);

			return view('sales/confirm_sales', $data);
		} else {
			return redirect()->to(base_url('sales/salesAdd'))->with('status', 'Please add items before proceeding !');
		}
	}

	function insert_sales()
	{

		$product_id = $this->request->getPost('product_id');
		$product_quantity = $this->request->getPost('product_quantity');
		$product_total_price = $this->request->getPost('product_total_price');

		$grand_total_price = $this->request->getPost('grand_total_price');

		$db = db_connect();
		$salesModel = new SalesModel($db);

		//insert data into sales record table and return inserted id
		$data =
			[
				'Sales_TotalPrice' => $grand_total_price,
			];

		$builder = $db->table('sales_records');
		$builder->insert($data);
		$sales_id = $db->insertID();

		foreach ($product_id as $index => $product_id) {

			//insert data into sales product table row by row
			$data =
				[
					'Sales_Id' => $sales_id,
					'Product_id' => $product_id,
					'SPro_Quantity' => $product_quantity[$index],
					'SPro_Price' => $product_total_price[$index],
				];

			$builder = $db->table('sales_product');
			$builder->insert($data);

			//deduct quantity from product table
			$builder = $db->table('product');
			$builder->set('Product_Quantity', 'Product_Quantity-' . $product_quantity[$index], false);
			$builder->where('Product_id', $product_id);
			$builder->update();
		}

		return redirect()->to(base_url('sales'));
	}

	function view_sale($sales_id)
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}

		$db = db_connect();
		$salesModel = new SalesModel($db);

		$data['sale_data'] = $salesModel->select_one_sale($sales_id);

		$data['sale_pro_data'] = $salesModel->select_sale_item($sales_id);

		return view('sales/sales_view', $data);
	}

	function edit_sales($sales_id)
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
		$sale_pro_data = $salesModel->select_sale_item($sales_id);

		$data = [
			'title' => 'Sales Record',
			'userInfo' => $userInfo,
			'sales_id' => $sales_id,
			'items' => $items,
			'category' => $category,
			'sale_pro_data' => $sale_pro_data,
		];

		return view('sales/sales_edit', $data);
	}

	function confirm_edit_sale_items($sales_id)
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}

		if ($this->request->getPost('product_id') != null) {

			$product_id = $this->request->getPost('product_id');
			$product_name = $this->request->getPost('product_name');
			$product_price = $this->request->getPost('product_price');
			$product_quantity = $this->request->getPost('product_quantity');

			$data['product_id'] = $product_id;
			$data['product_name'] = $product_name;
			$data['product_price'] = $product_price;
			$data['product_quantity'] = $product_quantity;
			$data['sales_id'] = $sales_id;

			$db = db_connect();
			$salesModel = new SalesModel($db);

			//get product image
			foreach ($product_id as $index => $product_id) {
				$current_image = $salesModel->select_one_product($product_id);
				$product_image[$index] = $current_image['Product_img'];
			}
			$data['product_image'] = $product_image;

			//calculate grand total price
			$grand_total_price = 0;
			foreach ($product_quantity as $index => $product_quantity) {
				$grand_total_price += round($product_quantity * $product_price[$index], 2);
			}
			$data['grand_total_price'] = round($grand_total_price, 2);

			return view('sales/confirm_edit_sales', $data);
		} else {
			return redirect()->to(base_url('sales/edit_sales/' . $sales_id))->with('status', 'Please add items before proceeding !');
		}
	}

	function update_sales($sales_id)
	{

		$product_id = $this->request->getPost('product_id');
		$product_quantity = $this->request->getPost('product_quantity');
		$product_total_price = $this->request->getPost('product_total_price');

		$grand_total_price = $this->request->getPost('grand_total_price');

		$db = db_connect();
		$salesModel = new SalesModel($db);

		//Update total price in sales record table
		$builder = $db->table('sales_records');
		$builder->set('Sales_TotalPrice', $grand_total_price, false);
		$builder->where('Sales_Id', $sales_id);
		$builder->update();

		//return existing quantity of sales product back to product table 
		$db = db_connect();
		$salesModel = new SalesModel($db);
		$sale_pro_data = $salesModel->select_sale_item($sales_id);

		foreach ($sale_pro_data as $row) {
			$builder = $db->table('product');
			$builder->set('Product_Quantity', 'Product_Quantity+' . $row['SPro_Quantity'], false);
			$builder->where('Product_id', $row['Product_id']);
			$builder->update();
		}

		//delete old existing sales product table
		$builder = $db->table('sales_product');
		$builder->where('Sales_Id', $sales_id);
		$builder->delete();

		//insert new sales product into sales product table
		foreach ($product_id as $index => $product_id) {

			//insert data into sales product table row by row
			$data =
				[
					'Sales_Id' => $sales_id,
					'Product_id' => $product_id,
					'SPro_Quantity' => $product_quantity[$index],
					'SPro_Price' => $product_total_price[$index],
				];

			$builder = $db->table('sales_product');
			$builder->insert($data);

			//deduct quantity from product table
			$builder = $db->table('product');
			$builder->set('Product_Quantity', 'Product_Quantity-' . $product_quantity[$index], false);
			$builder->where('Product_id', $product_id);
			$builder->update();
		}

		return redirect()->to(base_url('sales'));
	}

	//------------------------------------------------- Sales Report----------------------------------------------


	function monthly_sales_report()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}

		if($this->request->getPost('filter') != 'filter'){
			$month = date('m');
			$year = date('Y');
		}
		else{
			$month = $this->request->getPost('month');
			$year = $this->request->getPost('year');
		}

		$usersModel = new \App\Models\UsersModel();
		$loggedUserID = session()->get('loggedUser');
		$userInfo = $usersModel->find($loggedUserID);

		$db = db_connect();
		$salesModel = new SalesModel($db);
		$sale_report_data = $salesModel->monthly_sales_report($month, $year);

		$overall_sale_total = 0;
		foreach($sale_report_data as $row){
			$overall_sale_total += $row['pro_total_sale'];
		}
		
		$data = [
			'meta_title' => 'Sales Report | PHP',
			'title' => 'Sales Report',
			'userInfo' => $userInfo,
			'sale_report_data' => $sale_report_data,
			'month' => $month,
			'year' => $year,
			'overall_sale_total' => $overall_sale_total,
		];

		return view('sales/monthly_report', $data);
	}

	function export_monthly_report($month = 0, $year = 0, $month_name = 0)
    {

        header("Content-type: application/csv");
        //set file name
        header("Content-Disposition: attachment; filename=\"Sales Report FOR " . $month_name . " " . $year . ".csv\"");
        header("Content-Description: File Transfer"); 

        $handle = fopen('php://output', 'w');

        //get sales report data
        $db = db_connect();
		$salesModel = new SalesModel($db);
		$sale_report_data = $salesModel->monthly_sales_report($month, $year);

        //insert header row
        $header = array("Product ID", "Product Name", "Category", "Quantity", "Total Sales (RM)");
        fputcsv($handle, $header);

        //insert data row
        foreach ($sale_report_data as $key => $line) {
            fputcsv($handle, $line);
        }

        //get total for total sales
        $total = 0;
        foreach ($sale_report_data as $row) {
            $total += $row['pro_total_sale'];
        }
        $total_sales = array("", "", "", "Total: ", $total);
        fputcsv($handle, $total_sales);

        fclose($handle);
        exit;
    }

	
}
