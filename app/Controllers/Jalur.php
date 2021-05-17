<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJalur;

class Jalur extends BaseController
{
	public function __construct()
	{
		$this->ModelJalur = new ModelJalur();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Jalur Masuk',
			'jalurmasuk' => $this->ModelJalur->getAllData(),
		];
		return view('admin/jalur/v_jalur', $data);
	}

	public function insertData()
	{
		$data = [
           'jalur_masuk' => $this->request->getPost('jalur_masuk'),
           'kuota' => $this->request->getPost('kuota'),
		];
		$this->ModelJalur->insertData($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Tambah !!');
		return redirect()->to('index');
	}

	public function editData($id_jalur_masuk)
	{
		$data = [
		   'id_jalur_masuk' => $id_jalur_masuk,
           'jalur_masuk' => $this->request->getPost('jalur_masuk'),
		   'kuota' => $this->request->getPost('kuota'),
		];
		$this->ModelJalur->editData($data);
		session()->setFlashdata('pesan_edit', 'Data Berhasil di Edit !!');
		return redirect()->to('/jalur');
	}

	public function deleteData($id_jalur_masuk)
	{
		$data = [
		   'id_jalur_masuk' => $id_jalur_masuk,
		];
		$this->ModelJalur->deleteData($data);
		session()->setFlashdata('pesan_delete', 'Data Berhasil di Hapus !!');
		return redirect()->to('/jalur');
	}
}
