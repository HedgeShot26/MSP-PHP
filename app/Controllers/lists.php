<?php

namespace App\Controllers;

use App\Libraries\Hash;

class lists extends BaseController
{
	public function __construct()
	{
		helper(['url', 'form']);
	}

    public function lists()
	{
		$data['items'] = array_values(session('list'));
		return view('sales/list', $data);
	}

	public function Addlist($Product_id)
	{
		$productModel = new \App\Models\ProductModel();
		$product = $productModel->find($Product_id);
		$item = array(
			'Product_id' => $product['Product_id'],
			'Product_Name' => $product['Product_Name'],
			'Product_Price' => $product['Product_Price'],
			'Product_img' => $product['Product_img'],
			'Category' => $product['Category'],
			'Quantity' => 1
		);
		$session = session();
		if($session->has('list')){

		}else{
			$list = array($item);
			$session->set('list',$list);
		}
		return $this->response->redirect(site_url('lists\lists'));
	}
}