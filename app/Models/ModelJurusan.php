<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJurusan extends Model
{
	public function getAllData()
	{
		return $this->db->table('tbl_jurusan')
		 ->orderBy('id_jurusan', 'ASC')
		 ->get()
		 ->getResultArray();
	}

	public function insertData($data)
	{
		$this->db->table('tbl_jurusan')->insert($data);
	}

	public function editData($data)
	{
		$this->db->table('tbl_jurusan')
		     ->where('id_jurusan', $data['id_jurusan'])
			 ->update($data);
	}

	public function deleteData($data)
	{
		$this->db->table('tbl_jurusan')
		     ->where('id_jurusan', $data['id_jurusan'])
			 ->delete($data);
	}
}
