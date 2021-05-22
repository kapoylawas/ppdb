<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSiswa;
use App\Models\ModelJalur;


class Siswa extends BaseController
{
	public function __construct()
	{
		$this->ModelSiswa = new ModelSiswa();
		$this->ModelJalur = new ModelJalur();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Siswa',
			'siswa' => $this->ModelSiswa->getBiodataSiswa(),
			'jalur' => $this->ModelJalur->getAllData(),
			'validation' => \Config\Services::validation(),
		];
		return view('siswa/v_siswa', $data);
	}

	public function updatePendaftaran($id_siswa)
	{
		$data = [
			'id_siswa' => $id_siswa,
			'id_jalur_masuk' =>  $this->request->getPost('id_jalur_masuk'),
		];
		$this->ModelSiswa->editData($data);
		session()->setFlashdata('pesan_edit', 'Data Pendaftaran Berhasil di Update !!');
		return redirect()->to('/siswa');
	}

	public function updateFoto($id_siswa)
	{
		
		if ($this->validate([
			'foto' => [
				'label' => 'Foto',
				'rules' => 'max_size[foto, 1024]',
				'errors' => [
					'max_size' => 'Ukuran {field} Max 1mb !!',
				]
			]
		])) {	

			// hapus foto lama
			$siswa = $this->ModelSiswa->detailData($id_siswa);
			if ($siswa['foto'] != "" or $siswa['foto'] != null) {
				unlink('foto/' . $siswa['foto']);
			}

			$file = $this->request->getFile('foto');
			$nama_file = $file->getRandomName();
			$data = [
				'id_siswa' => $id_siswa,
				'foto' => $nama_file,
			];
			$file->move('foto', $nama_file);
			$this->ModelSiswa->editData($data);
			session()->setFlashdata('pesan_edit', 'Foto Pendaftaran Berhasil di Update !!');
			return redirect()->to('/siswa');
		}else {
			
			$validation = \Config\Services::validation();
			return redirect()->to('/siswa')->withInput()->with('validation',$validation);
		}
	}
}
