<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPendidikan;

class Pendidikan extends BaseController
{
	public function __construct()
	{
		$this->ModelPendidikan = new ModelPendidikan();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB',
			'subtitle' => 'Pendidikan',
			'pendidikan' => $this->ModelPendidikan->getAllData(),
		];
		return view('admin/v_pendidikan', $data);
	}

	public function insertData()
	{
		$data = [
           'pendidikan' => $this->request->getPost(),
		];
		$this->ModelPendidikan->insertData($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Tambah !!');
		return redirect()->to('index');
	}

	public function editData($id_pendidikan)
	{
		$data = [
		   'id_pendidikan' => $id_pendidikan,
           'pendidikan' => $this->request->getPost(),
		];
		$this->ModelPendidikan->editData($data);
		session()->setFlashdata('pesan_edit', 'Data Berhasil di Edit !!');
		return redirect()->to('/pendidikan');
	}

	public function deleteData($id_pendidikan)
	{
		$data = [
		   'id_pendidikan' => $id_pendidikan,
		];
		$this->ModelPendidikan->deleteData($data);
		session()->setFlashdata('pesan_delete', 'Data Berhasil di Hapus !!');
		return redirect()->to('/pendidikan');
	}
}
