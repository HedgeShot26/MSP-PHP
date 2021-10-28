<?php

namespace App\Controllers;

use App\Libraries\Hash;

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
		$salesModel = new \App\Models\SalesModel();
		$loggedUserID = session()->get('loggedUser');
		$userInfo = $usersModel->find($loggedUserID);
		$sales = $salesModel->findAll();
		$data = [
			'meta_title' => 'Sales Record | PHP',
			'title' => 'Sales Record',
			'userInfo' => $userInfo,
			'sales' => $sales
		];
		return view('sales/sales', $data);
	}
}