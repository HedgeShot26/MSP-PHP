<?php

namespace App\Controllers;

use App\Libraries\Hash;

class Dashboard extends BaseController
{
	public function __construct()
	{
		helper(['url', 'form']);
	}

    
}