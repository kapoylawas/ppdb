<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPendidikan extends Model
{
	public function getAllData()
	{
		return $this->db->table('tbl_pendidikan')
		 ->orderBy('id_pendidikan', 'ASC')
		 ->get()
		 ->getResultArray();
	}

	public function insertData($data)
	{
		$this->db->table('tbl_pendidikan')->insert($data);
	}

	public function editData($data)
	{
		$this->db->table('tbl_pendidikan')
		     ->where('id_pendidikan', $data['id_pendidikan'])
			 ->update($data);
	}

	public function deleteData($data)
	{
		$this->db->table('tbl_pendidikan')
		     ->where('id_pendidikan', $data['id_pendidikan'])
			 ->delete($data);
	}
}
