<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTahun_ajaran;
use App\Models\ModelSiswa;

class Ppdb extends BaseController
{
	public function __construct()
	{
		$this->ModelTahun_ajaran = new ModelTahun_ajaran();
		$this->ModelSiswa = new ModelSiswa();
		helper('form', 'url');
	}

	public function pendaftaran()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Pendaftaran',
			'ta' => $this->ModelTahun_ajaran->statusTa(),
			'validation' => \Config\Services::validation()
		];
		return view('v_pendaftaran', $data);
	}

	public function simpanPendaftaran()
	{
		helper('form', 'url');
		if ($this->validate([
			'nisn' => [
				'label' => 'NISN',
				'rules' => 'required|max_length[10]|is_unique[tbl_siswa.nisn]',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'max_length' => '{field} Max 10 Karakter !',
					'is_unique' => '{field} NISN Sudah Terdaftar !'
				   ]
                ],
			'nama_lengkap' => [
				'label' => 'Nama Lengkap',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'nama_panggilan' => [
				'label' => 'Nama Panggilan',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'tempat_lahir' => [
				'label' => 'Tempat Lahir',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'tanggal' => [
				'label' => 'Tanggal',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'bulan' => [
				'label' => 'Bulan',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'tahun' => [
				'label' => 'Tahun',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
		 ])) {
			// jika tidak ada validasi maka simpan data
			$tahun = $this->request->getPost('tahun');
			$bulan = $this->request->getPost('bulan');
			$tanggal = $this->request->getPost('tanggal');
			$nisn = $this->request->getPost('nisn');

			$data = [
				'nisn' => $this->request->getPost('nisn'),
				'nama_lengkap' => $this->request->getPost('nama_lengkap'),
				'nama_panggilan' => $this->request->getPost('nama_panggilan'),
				'tempat_lahir' => $this->request->getPost('tempat_lahir'),
				'tgl_lahir' => $tahun.'-'.$bulan.'-'.$tanggal,
				'password' => $nisn,
			];
			$this->ModelSiswa->insertData($data);
			session()->setFlashdata('pesan', 'Pendaftaran Berhasil, Silahkan Login Untuk Melengkapi Data!!');
			return redirect()->to('/ppdb/pendaftaran');
		} else {

			$validation = \Config\Services::validation();
			return redirect()->to('/ppdb/pendaftaran')->withInput()->with('validation',$validation);
		 }
	}
}
