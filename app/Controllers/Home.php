<?php

namespace App\Controllers;
use App\Models\ModelBanner;
use App\Models\ModelAdmin;

class Home extends BaseController
{
	public function __construct()
	{
		$this->ModelBanner = new ModelBanner();
		$this->ModelAdmin = new ModelAdmin();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB',
			'subtitle' => 'Home',
			'banner' => $this->ModelBanner->getAllData(),
			'beranda' => $this->ModelAdmin->detailSetting(),
		];
		return view('v_home', $data);
	}
}
