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
			'meta_title' => 'User Profile | MFD Admin',
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
			'meta_title' => 'Messages List | MFD Admin',
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
			'meta_title' => 'Users | MFD Admin',
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
		$shopModel = new \App\Models\ShopModel();
		$loggedUserID = session()->get('loggedUser');
		$userInfo = $usersModel->find($loggedUserID);
		$items = $shopModel->findAll();
		$data = [
			'meta_title' => 'Book Catalogue | MFD Admin',
			'title' => 'Books Catalogue',
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
		$shopModel = new \App\Models\ShopModel();
		$file = $this->request->getFile('item_image');
		if ($file->isValid() && !$file->hasMoved()) {
			$imageName = $file->getRandomName();
			$file->move('uploads/', $imageName);
		}

		$data = [
			'item_name' => $this->request->getPost('item_name'),
			'item_price' => $this->request->getPost('item_price'),
			'item_img' => $imageName,
		];
		$shopModel->insert($data);
		return redirect()->to(base_url('catalogue'))->with('status', 'Item Added Successfully');
	}

	public function itemEdit($item_id)
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$shopModel = new \App\Models\ShopModel();
		$itemInfo = $shopModel->find($item_id);
		$data = ['itemInfo' => $itemInfo];
		return view('dashboard/C_edit', $data);
	}

	public function itemUpdate($item_id)
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$shopModel = new \App\Models\ShopModel();
		$itemInfo = $shopModel->find($item_id);
		$old_img_name = $itemInfo['item_img'];
		$file = $this->request->getFile('item_image');
		if ($file->isValid() && !$file->hasMoved()) {
			$old_img_name = $itemInfo['item_img'];
			if (file_exists("uploads/.$old_img_name")) {
				unlink('uploads/', $imageName);
			}
			$imageName = $file->getRandomName();
			$file->move('uploads/', $imageName);
		} else {
			$imageName = $old_img_name;
		}

		$data = [
			'item_name' => $this->request->getPost('item_name'),
			'item_price' => $this->request->getPost('item_price'),
			'item_img' => $imageName,
		];
		$shopModel->update($item_id, $data);
		return redirect()->to(base_url('catalogue'))->with('status', 'Item Added Successfully');
	}

	public function itemDelete($item_id)
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$shopModel = new \App\Models\ShopModel();
		$data = $shopModel->find($item_id);
		$imagefile = $data['item_img'];
		if (file_exists("uplaods/" . $imagefile)) {
			unlink("uploads/" . $imagefile);
		};
		$shopModel->delete($item_id);
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

	public function status($msg_id)
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/')->with('fail', 'You must logged in !!!');
		}
		$contactModel = new \App\Models\ContactModel();
		$msgInfo = $contactModel->find($msg_id);
		$old_status = $msgInfo['status'];
		if ($old_status == 0) {
			$newStatus = 1;
		} else {
			$newStatus = 0;
		}

		$data = [
			'status' => $newStatus,
		];
		$contactModel->update($msg_id, $data);
		return redirect()->to(base_url('contacts'));
	}

}