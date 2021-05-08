<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelauth extends Model
{
	public function login_user($email, $password)
	{
		return $this->db->table('tbl_user')
					->where(
						[
							'email' => $email,
							'password' => $password
					    ]
					)->get()->getRowArray();
	}

	public function login_siswa($nisn, $password)
	{
		return $this->db->table('tbl_siswa')
					->where(
						[
							'nisn' => $nisn,
							'password' => $password
					    ]
					)->get()->getRowArray();
	}
	
}
