<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTahun_ajaran;

class Ppdb extends BaseController
{
	public function __construct()
	{
		$this->ModelTahun_ajaran = new ModelTahun_ajaran();
		helper('form');
	}

	public function pendaftaran()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Pendaftaran',
			'ta' => $this->ModelTahun_ajaran->statusTa(),
		];
		return view('v_pendaftaran', $data);
	}

}
