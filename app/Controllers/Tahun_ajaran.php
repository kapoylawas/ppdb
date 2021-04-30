<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTahun_ajaran;

class Tahun_ajaran extends BaseController
{
	public function __construct()
	{
		$this->ModelTahun_ajaran = new ModelTahun_ajaran();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB',
			'subtitle' => 'Tahun Ajaran',
			'tahun_ajaran' => $this->ModelTahun_ajaran->getAllData(),
		];
		return view('admin/tahun_ajaran/v_tahunAjaran', $data);
	}

	public function insertData()
	{
		$data = [
           'ta' => $this->request->getPost('ta'),
           'tahun' => $this->request->getPost('tahun'),
		];
		$this->ModelTahun_ajaran->insertData($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Tambah !!');
		return redirect()->to('/tahun_ajaran');
	}

	public function editData($id_ta)
	{
		$data = [
		   'id_ta' => $id_ta,
           'ta' => $this->request->getPost('ta'),
           'tahun' => $this->request->getPost('tahun'),
		];
		$this->ModelTahun_ajaran->editData($data);
		session()->setFlashdata('pesan_edit', 'Data Berhasil di Edit !!');
		return redirect()->to('/tahun_ajaran');
	}

	public function deleteData($id_ta)
	{
		$data = [
		   'id_ta' => $id_ta,
		];
		$this->ModelTahun_ajaran->deleteData($data);
		session()->setFlashdata('pesan_delete', 'Data Berhasil di Hapus !!');
		return redirect()->to('/tahun_ajaran');
	}

	public function statusAktif($id_ta)
	{
		$data = [
		   'id_ta' => $id_ta,
		   'status' => 1
		];
		$this->ModelTahun_ajaran->resetStatus();
		$this->ModelTahun_ajaran->editData($data);
		session()->setFlashdata('pesan', 'Status Tahun Ajaran Berhasil di Ganti  !!');
		return redirect()->to('/tahun_ajaran');
	}

	public function statusNonaktif($id_ta)
	{
		$data = [
		   'id_ta' => $id_ta,
		   'status' => 0
		];
		$this->ModelTahun_ajaran->editData($data);
		session()->setFlashdata('pesan', 'Status Tahun Ajaran Berhasil di Ganti  !!');
		return redirect()->to('/tahun_ajaran');
	}
}
