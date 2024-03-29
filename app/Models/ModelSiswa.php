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

	public function detailData($id_siswa)
	{
		return $this->db->table('tbl_siswa')
		 ->where('id_siswa', $id_siswa)
		 ->get()
		 ->getRowArray();
	}

	public function insertData($data)
	{
		$this->db->table('tbl_siswa')->insert($data);
	}

	public function getBiodataSiswa()
	{
		return $this->db->table('tbl_siswa')
		 ->join('tbl_jalur_masuk', 'tbl_jalur_masuk.id_jalur_masuk = tbl_siswa.id_jalur_masuk', 'left')
		 ->join('tbl_agama', 'tbl_agama.id_agama = tbl_siswa.id_agama', 'left')
		 ->where('id_siswa', session()->get('id_siswa'))
		 ->get()
		 ->getRowArray();
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

	public function noPendaftaran ()
	{
		$kode = $this->db->table('tbl_siswa')
		             ->select('RIGHT(no_pendaftaran,4) as no_pendaftaran', false)
		             ->select('LEFT(no_pendaftaran,8) as tanggal', false)
					 ->orderBy('no_pendaftaran', 'DESC')
					 ->limit(1)
					 ->get()->getRowArray();
		if ($kode['no_pendaftaran'] == null) {
			$no = 1;
		}else {
			if ($kode['tanggal'] == date('Ymd')) {
				$no = intval($kode['no_pendaftaran']) + 1;
			}else {
				$no = 1;
			}
		}
		$tgl = date('Ymd');
		$batas = str_pad($no,4,"0", STR_PAD_LEFT);
		$no_pendaftaran = $tgl . $batas;
		return $no_pendaftaran;
	}
	
}
