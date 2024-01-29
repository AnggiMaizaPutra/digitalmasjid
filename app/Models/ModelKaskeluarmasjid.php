<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkaskeluarmasjid extends Model
{
    public function getkaskeluarmasjid()
    {
        $builder = $this->db->table('tbl_kas_masjid')
            ->where('jenis_kas="Masjid"');
        return $builder->get();
    }

    public function getTotalkasmasjid()
    {
        $builder = $this->db->query('SELECT SUM(kas_masuk) AS totalmasuk, SUM(kas_keluar) 
        AS totalkeluar, SUM(kas_masuk) - SUM(kas_keluar) AS totalsemua From tbl_kas_masjid
        WHERE jenis_kas = "Masjid"');
        return $builder;
    }

    public function insertData($data)
    {
        $this->db->table('tbl_kas_masjid')->insert($data);
    }

    public function saveKaskeluarmasjid($data)
    {
        $query = $this->db->table('tbl_kas_masjid')->insert($data);
        return $query;
    }

    public function deletekaskeluarmasjid($id)
    {
        $query = $this->db->table('tbl_kas_masjid')->delete(array('tanggal' => $id));
        return $query;
    }

    public function updatekaskeluarmasjid($data, $id)
    {
        $query = $this->db->table('tbl_kas_masjid')->update($data, array('tanggal' => $id));
    }

    public function getLaporanuangkeluarmasjid()
    {
        $builder = $this->db->table('tbl_kas_masjid');
        return $builder->get();
    }

    public function getLaporanperperiode($tgla, $tglb)
    {
        $b = $this->db->query("select * from tbl_kas_masjid where tanggal >= '$tgla' and tanggal <= '$tglb'");
        return $b;
    }

    public function getLaporanperperiodeperjeniskas($tgla, $tglb, $jenis)
    {
        $b = $this->db->query("select * from tbl_kas_masjid where tanggal >= '$tgla' and tanggal <= '$tglb' and jenis_kas ='$jenis'");
        return $b;
    }

    public function getAgenda()
    {
        $builder = $this->db->query('select * from tbl_agenda where jeniskegiatan="Masjid"');
        return $builder;
    }
}
