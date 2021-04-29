<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Admin extends BaseController
{
	public function __construct()
	{
		$this->ModelAdmin = new ModelAdmin();
		helper('form');
	}

	public function index()
	{
		$data = [
			'subtitle' => 'Home',
		];
		return view('admin/v_dashboard', $data);
	}

	public function setting()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Setting',
			'setting' => $this->ModelAdmin->detailSetting(),
		];
		return view('admin/setting/v_setting', $data);
	}

	public function saveSetting()
	{
		$file = $this->request->getfile('logo');
		// jika gambar tidak di ganti
		if ($file->getError() == 4) {
			$data = [
				'nama_sekolah' => $this->request->getPost('nama_sekolah'),
				'alamat' => $this->request->getPost('alamat'),
				'kecamatan' => $this->request->getPost('kecamatan'),
				'kabupaten' => $this->request->getPost('kabupaten'),
				'provinsi' => $this->request->getPost('provinsi'),
				'no_telpon' => $this->request->getPost('no_telpon'),
				'email' => $this->request->getPost('email'),
				'web' => $this->request->getPost('web'),
				'deskripsi' => $this->request->getPost('deskripsi'),
			];
			$this->ModelAdmin->saveSetting($data);
		}else {
			// jika gambar di ganti
			$setting = $this->ModelAdmin->detailSetting();
			if ($setting ['logo'] != "") {
				unlink('./logo/' . $setting['logo']);
			}
			$nama_file = $file->getRandomName();
			$data = [
				'nama_sekolah' => $this->request->getPost('nama_sekolah'),
				'alamat' => $this->request->getPost('alamat'),
				'kecamatan' => $this->request->getPost('kecamatan'),
				'kabupaten' => $this->request->getPost('kabupaten'),
				'provinsi' => $this->request->getPost('provinsi'),
				'no_telpon' => $this->request->getPost('no_telpon'),
				'email' => $this->request->getPost('email'),
				'web' => $this->request->getPost('web'),
				'deskripsi' => $this->request->getPost('deskripsi'),
				'logo' => $nama_file,
			];
			$file->move('logo/', $nama_file);
			$this->ModelAdmin->saveSetting($data);
		}
		session()->setFlashdata('pesan', 'Data identitas sekolah berhasil di update !');
		return redirect()->to('/admin/setting');
	}
}
