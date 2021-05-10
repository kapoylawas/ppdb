<?php

namespace App\Controllers;
use App\Models\ModelBanner;

class Home extends BaseController
{
	public function __construct()
	{
		$this->ModelBanner = new ModelBanner();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB',
			'subtitle' => 'Home',
			'banner' => $this->ModelBanner->getAllData(),
		];
		return view('v_home', $data);
	}
}
