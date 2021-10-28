<?php

namespace App\Controllers;

use \App\Models\UsersModel;
use App\Libraries\Hash;

class Auth extends BaseController
{
	public function __construct()
	{
		helper(['url', 'form']);
	}

	public function index()
	{
		if (session()->has('loggedUser')) {
			return redirect()->back();
		}
		$data = [
			'meta_title' => 'Login | PHP',
		];
		return view('auth/login', $data);
	}

	public function register()
	{
		if (!session()->has('loggedUser')) {
			return redirect()->to('/auth')->with('fail', 'You must logged in !!!');
		}
		$data = [
			'meta_title' => 'Register | PHP',
		];

		return view('auth/register', $data);
	}

	public function save()
	{

		$validation = $this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Your full name is required'
				]
			],
			'email' => [
				'rules' => 'required|valid_email|is_unique[users.email]',
				'errors' => [
					'required' => 'Email is required',
					'valid_email' => 'You must enter a valid email',
					'is_unique' => 'Email already taken'
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
			'cpassword' => [
				'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
				'errors' => [
					'required' => 'Confirm Password is required',
					'min_length' => 'Confirm Password must have atleast 5 characters in length',
					'max_length' => 'Confirm Password must not have characters more than 12 in length',
					'matches' => 'Confirm Password not matches to password'
				]
			],
		]);

		$data = [
            'meta_title' => 'Register | PHP',
            'validation' => $this->validator
        ];

		if (!$validation) {
			return view('auth/register', $data);
		} else {
			// Let's Register user into db
			$name = $this->request->getPost('name');
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');

			$values = [
				'name' => $name,
				'email' => $email,
				'password' => $password,
			];

			$usersModel = new UsersModel();
			$query = $usersModel->insert($values);
			if (!$query) {
				return redirect()->back()->with('fail', 'Something went wrong');
			} else {
				return redirect()->to('register')->with('success', 'You are now registered sucessfully');
			}
		}
	}

	public function check()
	{

		$validation = $this->validate([
			'email' => [
				'rules' => 'required|valid_email|is_not_unique[users.email]',
				'errors' => [
					'required' => 'Email is required',
					'valid_email' => 'Enter a valid email address',
					'is_not_unique' => 'This email is not registered on our service'

				]
			],
			'password' => [
				'rules' => 'required|min_length[5]|max_length[12]',
				'errors' => [
					'required' => 'Password is required',
					'min_length' => 'Password must have atleast 5 characters in length',
					'max_length' => 'Password must not have characters more than 12 in length'
				]
			]
		]);

		$data = [
            'meta_title' => 'Login | PHP ',
            'validation' => $this->validator
        ];

		if (!$validation) {
			return view('auth/login', $data);
		} else {

			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			
			$usersModel = new UsersModel();
			$user_info = $usersModel->where('email', $email)->first();

			if ($user_info['password'] == $password) {
				$user_id = $user_info['id'];
				session()->set('loggedUser', $user_id);
				return redirect()->to('/dashboard');
			} else {

				session()->setFlashdata('fail', 'Incorrect password');
				return redirect()->to('/auth')->withInput();
			}
		}
	}

	function logout()
	{
		if (session()->has('loggedUser')) {
			session()->remove('loggedUser');
			session()->remove('UserRole');
			return redirect()->to('auth?access=out')->with('fail', 'You are logged out!');
		}
	}
	
}
