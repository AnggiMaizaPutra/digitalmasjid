<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkasmasuk extends Model
{
public function getkasmasuk()
{
    $builder = $this->db->table('tbl_kas_masjid');
    $builder->select('id_kas_masjid,tanggal,nama,ket,kas_masuk,jenis_kas');
    $builder->join('tbl_donatur', 'tbl_kas_masjid.iddonaturmasjid =tbl_donatur.iddonatur');
    
    return $builder->get();
}

public function insertData($data)
{
    $this->db->table('tbl_kas_masjid')->insert($data);
}

public function deletekasmasuk($id)
{
    $query = $this->db->table('tbl_kas_masjid')->delete(array('tanggal' => $id));
    return $query;
}

public function updatekasmasuk($data, $id)
{
    $query = $this->db->table('tbl_kas_masjid')->update($data, array('tanggal' => $id));
}
public function getlaporanUangmasuk()
{

    $builder = $this->db->table('tbl_kas_masjid');
    $builder->select('id_kas_masjid,tanggal,nama,ket,kas_masuk,jenis_kas');
    $builder->join('tbl_donatur', 'tbl_kas_masjid.iddonaturmasjid =tbl_donatur.iddonatur');
    
    return $builder->get();
}
public function getlaporanperperiode($tgla,$tglb)
{
    $b= $this->db->query("select * from tbl_kas_masjid where tanggal>='$tgla'and tanggal'");
    return$b;
}
public function getLaporanperperiodeperjenis($tgla, $tglb, $jenis)

{
    $b = $this->db->query("select * from tbl_kas_masjid where tanggal >= '$tgla' and tanggal <='$tglb' and jenis_kas='$jenis'");
    return $b;
}
public function getDonatur()
{
    $builder = $this->db->table('tbl_donatur');
    return $builder->get();
}

}