<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJalur extends Model
{
	public function getAllData()
	{
		return $this->db->table('tbl_jalur_masuk')
		 ->orderBy('id_jalur_masuk', 'ASC')
		 ->get()
		 ->getResultArray();
	}

	public function insertData($data)
	{
		$this->db->table('tbl_jalur_masuk')->insert($data);
	}

	public function editData($data)
	{
		$this->db->table('tbl_jalur_masuk')
		     ->where('id_jalur_masuk', $data['id_jalur_masuk'])
			 ->update($data);
	}

	public function deleteData($data)
	{
		$this->db->table('tbl_jalur_masuk')
		     ->where('id_jalur_masuk', $data['id_jalur_masuk'])
			 ->delete($data);
	}
}
