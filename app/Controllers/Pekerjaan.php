<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPekerjaan;

class Pekerjaan extends BaseController
{
	public function __construct()
	{
		$this->ModelPekerjaan = new ModelPekerjaan();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB',
			'subtitle' => 'Pekerjaan',
			'pekerjaan' => $this->ModelPekerjaan->getAllData(),
		];
		return view('admin/pekerjaan/v_pekerjaan', $data);
	}

	public function insertData()
	{
		$data = [
           'pekerjaan' => $this->request->getPost(),
		];
		$this->ModelPekerjaan->insertData($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Tambah !!');
		return redirect()->to('index');
	}

	public function editData($id_pekerjaan)
	{
		$data = [
		   'id_pekerjaan' => $id_pekerjaan,
           'pekerjaan' => $this->request->getPost(),
		];
		$this->ModelPekerjaan->editData($data);
		session()->setFlashdata('pesan_edit', 'Data Berhasil di Edit !!');
		return redirect()->to('/pekerjaan');
	}

	public function deleteData($id_pekerjaan)
	{
		$data = [
		   'id_pekerjaan' => $id_pekerjaan,
		];
		$this->ModelPekerjaan->deleteData($data);
		session()->setFlashdata('pesan_delete', 'Data Berhasil di Hapus !!');
		return redirect()->to('/pekerjaan');
	}
}
