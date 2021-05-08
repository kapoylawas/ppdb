<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelauth;

class Auth extends BaseController
{
	public function __construct()
	{
		$this->ModelAuth = new ModelAuth();
		helper('form');
	}

	public function index()
	{
		
	}

	public function login()
	{
		return view('v_login-user');
	}

	public function cek_login_user()
	{
		if ($this->validate([
			'email' => [
				'label' => 'E-Mail',
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => '{field} Wajib Diisi !!',
					'valid_email' => 'Harus Format Email !'
				]
			],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!',
				],
			]
		])) {
			//jika 
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');
			$cek_login = $this->ModelAuth->login_user($email, $password);
			if ($cek_login) {
				session()->set('nama_user', $cek_login['nama_user']);
				session()->set('email', $cek_login['email']);
				session()->set('foto', $cek_login['foto']);
				session()->set('level', 'admin');
				return redirect()->to(base_url('admin'));
			}else {
				session()->setFlashdata('pesan', 'Email Atau Password Salah');
			    return redirect()->to(base_url('auth/login'));
			}
		}else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('auth/login'));
		}
	}

	public function logout()
	{
		session()->remove('nama_user');
		session()->remove('email');
		session()->remove('foto');
		session()->remove('level');
		session()->setFlashdata('pesan', 'Logout Success');
		return redirect()->to(base_url('auth/login'));
	}

	// login peserta
	public function loginSiswa()
	{
		$data = [
			'title' => 'PPDB Online',
			'subtitle' => 'Login',
			'validation' => \Config\Services::validation()
		];
		return view('v_login-siswa', $data);
	}

	public function cek_login_siswa()
	{
		if ($this->validate([
			'nisn' => [
				'label' => 'NISN',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!',
				]
			],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !!',
				],
			]
		])) {
			//jika 
			$nisn = $this->request->getPost('nisn');
			$password = $this->request->getPost('password');
			$cek_login = $this->ModelAuth->login_siswa($nisn, $password);
			if ($cek_login) {
				session()->set('id_siswa', $cek_login['id_siswa']);
				session()->set('nisn', $cek_login['nisn']);
				session()->set('nama_lengkap', $cek_login['nama_lengkap']);
				session()->set('level', 'siswa');
				return redirect()->to('/siswa');
			}else {
				session()->setFlashdata('pesan', 'NISN Atau Password Salah');
			    return redirect()->to('/auth/loginSiswa');
			}
		}else {
			
			$validation = \Config\Services::validation();
			return redirect()->to('/auth/loginSiswa')->withInput()->with('validation',$validation);
		}
	}

	public function logout_siswa()
	{
		session()->remove('nisn');
		session()->remove('nama_lengkap');
		session()->remove('level');
		session()->setFlashdata('pesan', 'Logout Success');
		return redirect()->to('/auth/loginSiswa');
	}
}
