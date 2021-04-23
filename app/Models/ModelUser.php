<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
	public function getAllData()
	{
		return $this->db->table('tbl_user')
		 ->orderBy('id_user', 'ASC')
		 ->get()
		 ->getResultArray();
	}

	public function insertData($data)
	{
		$this->db->table('tbl_user')->insert($data);
	}

	public function editData($data)
	{
		$this->db->table('tbl_user')
		     ->where('id_user', $data['id_user'])
			 ->update($data);
	}

	public function deleteData($data)
	{
		$this->db->table('tbl_user')
		     ->where('id_user', $data['id_user'])
			 ->delete($data);
	}

	public function detailData($id_user)
	{
		return $this->db->table('tbl_user')
		 ->where('id_user', $id_user)
		 ->get()
		 ->getRowArray();
	}
}
