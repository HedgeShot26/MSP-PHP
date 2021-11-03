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
