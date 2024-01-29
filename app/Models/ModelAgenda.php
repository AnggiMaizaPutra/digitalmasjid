<?php


namespace App\Models;

use CodeIgniter\Model;

class ModelAgenda extends Model
{
    public function getagenda()
    {
        $builder = $this->db->table('tbl_agenda');
        return $builder->get();
    }
    public function saveagenda($data)
    {
            $query= $this->db->table('tbl_agenda')->insert($data);
            return $query;
    }

    public function deleteagenda($id)
    {
            $query= $this->db->table('tbl_agenda')->delete(array('id_agenda' =>$id));
            return $query;
    }
    public function updateagenda($data,$id)
    {
            $query= $this->db->table('tbl_agenda')->update($data,array('id_agenda' =>$id));
            return $query;
    }


    
}