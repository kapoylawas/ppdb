<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenghasilan extends Model
{
	public function getAllData()
	{
		return $this->db->table('tbl_penghasilan')
		 ->orderBy('id_penghasilan', 'ASC')
		 ->get()
		 ->getResultArray();
	}

	public function insertData($data)
	{
		$this->db->table('tbl_penghasilan')->insert($data);
	}

	public function editData($data)
	{
		$this->db->table('tbl_penghasilan')
		     ->where('id_penghasilan', $data['id_penghasilan'])
			 ->update($data);
	}

	public function deleteData($data)
	{
		$this->db->table('tbl_penghasilan')
		     ->where('id_penghasilan', $data['id_penghasilan'])
			 ->delete($data);
	}
}
