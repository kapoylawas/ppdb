<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPekerjaan extends Model
{

	public function getAllData()
	{
		return $this->db->table('tbl_pekerjaan')
		 ->orderBy('id_pekerjaan', 'ASC')
		 ->get()
		 ->getResultArray();
	}

	public function insertData($data)
	{
		$this->db->table('tbl_pekerjaan')->insert($data);
	}

	public function editData($data)
	{
		$this->db->table('tbl_pekerjaan')
		     ->where('id_pekerjaan', $data['id_pekerjaan'])
			 ->update($data);
	}

	public function deleteData($data)
	{
		$this->db->table('tbl_pekerjaan')
		     ->where('id_pekerjaan', $data['id_pekerjaan'])
			 ->delete($data);
	}
}
