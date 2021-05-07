<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
	public function getAllData()
	{
		return $this->db->table('tbl_siswa')
		 ->orderBy('id_siswa', 'ASC')
		 ->get()
		 ->getResultArray();
	}

	public function insertData($data)
	{
		$this->db->table('tbl_siswa')->insert($data);
	}

	public function editData($data)
	{
		$this->db->table('tbl_siswa')
		     ->where('id_siswa', $data['id_siswa'])
			 ->update($data);
	}

	public function deleteData($data)
	{
		$this->db->table('tbl_siswa')
		     ->where('id_siswa', $data['id_siswa'])
			 ->delete($data);
	}
}
