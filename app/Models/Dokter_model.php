<?php


namespace App\Models;
use CodeIgniter\Model;
class Dokter_model extends Model
{
    public function getDokter()
    {
        $builder=$this->db->table('dokter');
        return $builder->get();
    }
    
}