<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenghasilan;

class Penghasilan extends BaseController
{
	public function __construct()
	{
		$this->ModelPenghasilan = new ModelPenghasilan();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB',
			'subtitle' => 'Penghasilan',
			'penghasilan' => $this->ModelPenghasilan->getAllData(),
		];
		return view('admin/v_penghasilan', $data);
	}

	public function insertData()
	{
		$data = [
           'penghasilan' => $this->request->getPost(),
		];
		$this->ModelPenghasilan->insertData($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Tambah !!');
		return redirect()->to('index');
	}

	public function editData($id_penghasilan)
	{
		$data = [
		   'id_penghasilan' => $id_penghasilan,
           'penghasilan' => $this->request->getPost(),
		];
		$this->ModelPenghasilan->editData($data);
		session()->setFlashdata('pesan_edit', 'Data Berhasil di Edit !!');
		return redirect()->to('/penghasilan');
	}

	public function deleteData($id_penghasilan)
	{
		$data = [
		   'id_penghasilan' => $id_penghasilan,
		];
		$this->ModelPenghasilan->deleteData($data);
		session()->setFlashdata('pesan_delete', 'Data Berhasil di Hapus !!');
		return redirect()->to('/penghasilan');
	}
}
