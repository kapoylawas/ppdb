<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLampiran;

class Lampiran extends BaseController
{
	public function __construct()
	{
		$this->ModelLampiran = new ModelLampiran();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB',
			'subtitle' => 'Lampiran',
			'lampiran' => $this->ModelLampiran->getAllData(),
		];
		return view('admin/lampiran/v_lampiran', $data);
	}

	public function insertData()
	{
		$data = [
           'lampiran' => $this->request->getPost(),
		];
		$this->ModelLampiran->insertData($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Tambah !!');
		return redirect()->to('index');
	}

	public function editData($id_lampiran)
	{
		$data = [
		   'id_lampiran' => $id_lampiran,
           'lampiran' => $this->request->getPost(),
		];
		$this->ModelLampiran->editData($data);
		session()->setFlashdata('pesan_edit', 'Data Berhasil di Edit !!');
		return redirect()->to('/lampiran');
	}

	public function deleteData($id_lampiran)
	{
		$data = [
		   'id_lampiran' => $id_lampiran,
		];
		$this->ModelLampiran->deleteData($data);
		session()->setFlashdata('pesan_delete', 'Data Berhasil di Hapus !!');
		return redirect()->to('/lampiran');
	}
}
