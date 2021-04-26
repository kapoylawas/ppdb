<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'PPDB',
			'subtitle' => 'Home',
		];
		return view('v_home', $data);
	}
}
