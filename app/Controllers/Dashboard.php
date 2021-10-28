<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Dashboard extends BaseController
{
	public function __construct()
	{
		helper(['url', 'form']);
	}

	public function index()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$usersModel = new \App\Models\UsersModel();
		$loggedUserID = session()->get('loggedUser');
		$userInfo = $usersModel->find($loggedUserID);
		$data = [
			'meta_title' => 'User Profile | PHP Admin',
			'title' => 'User Profile',
			'userInfo' => $userInfo
		];
		return view('dashboard/index', $data);
	}

	function contacts()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$usersModel = new \App\Models\UsersModel();
		$contactModel = new \App\Models\ContactModel();
		$loggedUserID = session()->get('loggedUser');
		$userInfo = $usersModel->find($loggedUserID);
		$contacts = $contactModel->findAll();
		$data = [
			'meta_title' => 'Messages List | PHP Admin',
			'title' => 'Messages List',
			'userInfo' => $userInfo,
			'contacts' => $contacts,
		];

		return view('dashboard/contacts', $data);
	}

	function users()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$usersModel = new \App\Models\UsersModel();
		$loggedUserID = session()->get('loggedUser');
		$userInfo = $usersModel->find($loggedUserID);
		$users = $usersModel->findAll();
		$data = [
			'meta_title' => 'Users | PHP Admin',
			'title' => 'Users',
			'userInfo' => $userInfo,
			'users' => $users
		];
		return view('dashboard/users', $data);
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
			'Product_cat' => $this->request->getPost('Product_cat'),
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
		$data = ['itemInfo' => $itemInfo];
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
			'Product_cat' => $this->request->getPost('Product_cat'),
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

	public function edit()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$usersModel = new \App\Models\UsersModel();
		$loggedUserID = session()->get('loggedUser');
		$userInfo = $usersModel->find($loggedUserID);
		$data = [
			'title' => 'Edit Profile',
			'userInfo' => $userInfo
		];
		return view('dashboard/edit', $data);
	}

	public function update()
	{
		$validation = $this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Your full name is required'
				]
			],
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Email is required',
					'valid_email' => 'You must enter a valid email',
				]
			],
			'password' => [
				'rules' => 'required|min_length[5]|max_length[12]',
				'errors' => [
					'required' => 'Password is required',
					'min_length' => 'Password must have atleast 5 characters in length',
					'max_length' => 'Password must not have characters more than 12 in length'
				]
			],
		]);
		$usersModel = new \App\Models\UsersModel();
		$loggedUserID = session()->get('loggedUser');
		$userInfo = $usersModel->find($loggedUserID);
		$data = [
			'userInfo' => $userInfo,
			'validation' => $this->validator
		];

		if (!$validation) {
			return view('dashboard/edit', $data);
		} else {
		$name = $this->request->getPost('name');
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');

		$values = [
			'name' => $name,
			'email' => $email,
			'password' => $password,
		];

		$query = $usersModel->update($userInfo, $values);
			if (!$query) {
				return redirect()->back()->with('fail', 'Something went wrong');
			} else {
				return redirect()->to(base_url('profile'))->with('status', 'You sucessfully updated your account');
			}
	}
    }

	public function delete($id)
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$usersModel = new \App\Models\UsersModel();
		$usersModel->delete($id);
		return redirect()->to(base_url('users'))->with('status', 'User Deleted Sucessfully');
	}


}
