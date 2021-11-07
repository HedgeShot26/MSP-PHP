<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Catalogue extends BaseController
{
	public function __construct()
	{
		helper(['url', 'form']);
	}
	function catalogue()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$usersModel = new \App\Models\UsersModel();
		$productModel = new \App\Models\ProductModel();
		$loggedUserID = session()->get('loggedUser');
		$userInfo = $usersModel->find($loggedUserID);
		$items = $productModel->findAll();
		$data = [
			'meta_title' => 'Product Inventory | PHP',
			'title' => 'Product Inventory',
			'userInfo' => $userInfo,
			'items' => $items
		];
		return view('dashboard/catalogue', $data);
	}

	public function itemAdd()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		return view('dashboard/C_store');
	}

	public function itemStore()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$productModel = new \App\Models\ProductModel();
		$file = $this->request->getFile('Product_img');
		if ($file->isValid() && !$file->hasMoved()) {
			$imageName = $file->getRandomName();
			$file->move('uploads/', $imageName);
		}

		$data = [
			'Product_Name' => $this->request->getPost('Product_Name'),
			'Product_Price' => $this->request->getPost('Product_Price'),
			'Product_img' => $imageName,
			'Category' => $this->request->getPost('Product_cat'),
			'Product_Quantity' => $this->request->getPost('Product_Quantity'),
		];
		$productModel->insert($data);
		return redirect()->to(base_url('catalogue'))->with('status', 'Item Added Successfully');
	}

	public function itemEdit($Product_id)
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$productModel = new \App\Models\ProductModel();
		$itemInfo = $productModel->find($Product_id);
		$data = [
			'itemInfo' => $itemInfo,
		];
		return view('dashboard/C_edit', $data);
	}

	public function itemUpdate($Product_id)
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$productModel = new \App\Models\ProductModel();
		$itemInfo = $productModel->find($Product_id);
		$old_img_name = $itemInfo['Product_img'];
		$file = $this->request->getFile('Product_img');
		if ($file->isValid() && !$file->hasMoved()) {
			$old_img_name = $itemInfo['Product_img'];
			if (file_exists("uploads/.$old_img_name")) {
				unlink('uploads/', $imageName);
			}
			$imageName = $file->getRandomName();
			$file->move('uploads/', $imageName);
		} else {
			$imageName = $old_img_name;
		}

		$data = [
			'Product_Name' => $this->request->getPost('Product_Name'),
			'Product_Price' => $this->request->getPost('Product_Price'),
			'Product_img' => $imageName,
			'Category' => $this->request->getPost('Product_cat'),
			'Product_Quantity' => $this->request->getPost('Product_Quantity'),
		];
		$productModel->update($Product_id, $data);
		return redirect()->to(base_url('catalogue'))->with('status', 'Item Added Successfully');
	}

	public function itemDelete($Product_id)
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$productModel = new \App\Models\ProductModel();
		$data = $productModel->find($Product_id);
		$imagefile = $data['Product_img'];
		if (file_exists("uplaods/" . $imagefile)) {
			unlink("uploads/" . $imagefile);
		};
		$productModel->delete($Product_id);
		return redirect()->to(base_url('catalogue'))->with('status', 'Item Deleted Successfully');
	}

	function stock()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$usersModel = new \App\Models\UsersModel();
		$productModel = new \App\Models\ProductModel();
		$loggedUserID = session()->get('loggedUser');
		$userInfo = $usersModel->find($loggedUserID);
		$items = $productModel->findAll();
		$data = [
			'meta_title' => 'Low Stocks Products | PHP',
			'title' => 'Low Stocks Products',
			'userInfo' => $userInfo,
			'items' => $items
		];
		return view('dashboard/stock', $data);
	}
}