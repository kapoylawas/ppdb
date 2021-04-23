<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAgama;

class Agama extends BaseController
{
	public function __construct()
	{
		$this->ModelAgama = new ModelAgama();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB',
			'subtitle' => 'Agama',
			'agama' => $this->ModelAgama->getAllData(),
		];
		return view('admin/v_agama', $data);
	}

	public function insertData()
	{
		$data = [
           'agama' => $this->request->getPost(),
		];
		$this->ModelAgama->insertData($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Tambah !!');
		return redirect()->to('index');
	}

	public function editData($id_agama)
	{
		$data = [
		   'id_agama' => $id_agama,
           'agama' => $this->request->getPost(),
		];
		$this->ModelAgama->editData($data);
		session()->setFlashdata('pesan_edit', 'Data Berhasil di Edit !!');
		return redirect()->to('/agama');
	}

	public function deleteData($id_agama)
	{
		$data = [
		   'id_agama' => $id_agama,
		];
		$this->ModelAgama->deleteData($data);
		session()->setFlashdata('pesan_delete', 'Data Berhasil di Hapus !!');
		return redirect()->to('/agama');
	}
}
