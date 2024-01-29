<?php

namespace App\Controllers;

class Agenda extends BaseController
{
    public function index(): string
    {
        return view('viewspp');
    }
    public function hitungbiaya()
    {
        $nobp =$this->request->getpost('kode');
        $nama =$this->request->getpost('agenda');
        $uts =$this->request->getpost('transportasi');
        $uas =$this->request->getpost('penginapan');
        $tugas =$this->request->getpost('pokok');
        echo "<center><b>Kode : $nobp </b></center><br>";
        echo "<center><b>Agenda : $nama </b></center><br>";
        echo "<center><b>Transportasi : $uts </b></center><br>";
        echo "<center><b>Penginapan : $uas </b></center><br>";
        echo "<center><b>Pokok : $tugas </b></center><br>";
        $hasil = ($uas) +(  $uts) + ( $tugas );
        echo "<u><center><b>HASIL : $hasil </u></b><br></center>";
    }
}