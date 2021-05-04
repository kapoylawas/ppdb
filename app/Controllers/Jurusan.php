<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJurusan;

class Jurusan extends BaseController
{
	public function __construct()
	{
		$this->ModelJurusan = new ModelJurusan();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB',
			'subtitle' => 'Jurusan',
			'jurusan' => $this->ModelJurusan->getAllData(),
		];
		return view('admin/jurusan/v_jurusan', $data);
	}

	public function insertData()
	{
		$data = [
           'jurusan' => $this->request->getPost(),
		];
		$this->ModelJurusan->insertData($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Tambah !!');
		return redirect()->to('index');
	}

	public function editData($id_jurusan)
	{
		$data = [
		   'id_jurusan' => $id_jurusan,
           'jurusan' => $this->request->getPost(),
		];
		$this->ModelJurusan->editData($data);
		session()->setFlashdata('pesan_edit', 'Data Berhasil di Edit !!');
		return redirect()->to('/jurusan');
	}

	public function deleteData($id_jurusan)
	{
		$data = [
		   'id_jurusan' => $id_jurusan,
		];
		$this->ModelJurusan->deleteData($data);
		session()->setFlashdata('pesan_delete', 'Data Berhasil di Hapus !!');
		return redirect()->to('/jurusan');
	}
}
