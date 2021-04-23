<?php 
namespace App\Models;
use CodeIgniter\Model;

class ModelPekerjaanAjax extends Model
{
    protected $table      = 'tbl_pekerjaan';
    protected $primaryKey = 'id_pekerjaan';    

    protected $allowedFields = ['pekerjaan'];
}
