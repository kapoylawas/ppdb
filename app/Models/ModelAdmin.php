<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
	public function detailSetting()
	{
		return $this->db->table('tbl_setting')
					->where('id', '1')
					->get()->getRowArray();
	}

	public function saveSetting($data)
	{
		$this->db->table('tbl_setting')
				 ->where('id', '1')
				 ->update($data);
	}

}
