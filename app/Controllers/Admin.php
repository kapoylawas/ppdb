<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
	public function index()
	{
		$data = [
			'subtitle' => 'Home',
		];
		return view('admin/v_dashboard', $data);
	}
}
