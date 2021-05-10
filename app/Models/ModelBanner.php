<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBanner extends Model
{
	public function getAllData()
	{
		return $this->db->table('tbl_banner')
		 ->orderBy('id_banner', 'ASC')
		 ->get()
		 ->getResultArray();
	}

	public function insertData($data)
	{
		$this->db->table('tbl_banner')->insert($data);
	}

	public function editData($data)
	{
		$this->db->table('tbl_banner')
		     ->where('id_banner', $data['id_banner'])
			 ->update($data);
	}

	public function deleteData($data)
	{
		$this->db->table('tbl_banner')
		     ->where('id_banner', $data['id_banner'])
			 ->delete($data);
	}
}
