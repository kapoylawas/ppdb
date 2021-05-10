<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBanner;

class Banner extends BaseController
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
			'subtitle' => 'Banner',
			'banner' => $this->ModelBanner->getAllData(),
		];
		return view('admin/banner/v_banner', $data);
	}

	public function insertData()
	{
		$data = [
           'agama' => $this->request->getPost(),
		];
		$this->ModelBanner->insertData($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Tambah !!');
		return redirect()->to('index');
	}

	public function editData($id_agama)
	{
		$data = [
		   'id_agama' => $id_agama,
           'agama' => $this->request->getPost(),
		];
		$this->ModelBanner->editData($data);
		session()->setFlashdata('pesan_edit', 'Data Berhasil di Edit !!');
		return redirect()->to('/agama');
	}

	public function deleteData($id_agama)
	{
		$data = [
		   'id_agama' => $id_agama,
		];
		$this->ModelBanner->deleteData($data);
		session()->setFlashdata('pesan_delete', 'Data Berhasil di Hapus !!');
		return redirect()->to('/agama');
	}
}
