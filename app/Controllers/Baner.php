<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBanner;

class Baner extends BaseController
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
		return view('admin/baner/v_baner', $data);
	}

	public function insertData()
	{
		$file = $this->request->getfile('banner');
		$nama_file = $file->getRandomName();
		$data = [
				'ket' => $this->request->getPost('ket'),
				'banner' => $nama_file
			];
		$file->move('ppdb_banner/', $nama_file);
		$this->ModelBanner->insertData($data);
		session()->setFlashdata('pesan', 'Data Banner berhasil di Tambah !');
		return redirect()->to('/baner');
	}

	public function editData($id_banner)
	{
		$file = $this->request->getfile('banner');
		// jika gambar tidak di ganti
		if ($file->getError() == 4) {
			$data = [
                'id_banner' => $id_banner,
				'ket' => $this->request->getPost('ket'),
			];
			$this->ModelBanner->editData($data);
		}else {
			// jika gambar di ganti
			$banner = $this->ModelBanner->detailBanner($id_banner);
			if ($banner ['banner'] != "") {
				unlink('./ppdb_banner/' . $banner['banner']);
			}
			$nama_file = $file->getRandomName();
			$data = [
                'id_banner' => $id_banner,
                'ket' => $this->request->getPost('ket'),
				'banner' => $nama_file
			];
			$file->move('ppdb_banner/', $nama_file);
			$this->ModelBanner->editData($data);
		}
		session()->setFlashdata('pesan_edit', 'Data Banner berhasil di Update !');
		return redirect()->to('/baner');
	}

	public function deleteData($id_banner)
	{
        $banner = $this->ModelBanner->detailBanner($id_banner);
			if ($banner ['banner'] != "") {
				unlink('./ppdb_banner/' . $banner['banner']);
			}
            
		$data = [
		   'id_banner' => $id_banner,
		];
		$this->ModelBanner->deleteData($data);
		session()->setFlashdata('pesan_delete', 'Data Berhasil di Hapus !!');
		return redirect()->to('/baner');
	}
}
