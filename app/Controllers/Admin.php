<<<<<<< HEAD
<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
	public function index()
	{
		$data = [
			'subtitle' => 'Home',
		];
		return view('admin/v_dashboard', $data);
	}
=======
<?php 
namespace App\Controllers;
use App\Models\Model_admin;

class Admin extends BaseController
{
	public function __construct ()
    {
		$this->Model_admin = new Model_admin();
	}
	
	public function index()
	{
		$data= [
			'title' => 'Dashboard',
			'jml_gedung' => $this->Model_admin->jml_gedung(),
			'jml_ruangan' => $this->Model_admin->jml_ruangan(),
			'jml_prodi' => $this->Model_admin->jml_prodi(),
			'jml_fakultas' => $this->Model_admin->jml_fakultas(),
			'jml_dosen' => $this->Model_admin->jml_dosen(),
			'jml_mhs' => $this->Model_admin->jml_mhs(),
			'jml_user' => $this->Model_admin->jml_user(),
			'jml_matkul' => $this->Model_admin->jml_matkul(),
			'isi' => 'v_admin'
		];
		return view('layout/v_wrapper', $data);
	}

	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
