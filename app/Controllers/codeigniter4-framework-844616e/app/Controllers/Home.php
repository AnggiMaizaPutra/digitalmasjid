<?php
    

namespace App\Controllers;

class Home extends BaseController  
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function baru()
    {
        echo ('elza afrianita');
    }
    public function baru1()
    {
        echo ('saya cewe');
    }
    public function proses()
    {
        $nobp =$this->request->getpost('nobp');
        $nama =$this->request->getpost('nama');
        $uts =$this->request->getpost('uts');
        $uas =$this->request->getpost('uas');
        $tugas =$this->request->getpost('tugas');
        echo "<center><b>Nobp : $nobp </b></center><br>";
        echo "<center><b>Nama : $nama </b></center><br>";
        echo "<center><b>UTS : $uts </b></center><br>";
        echo "<center><b>UAS : $uas </b></center><br>";
        echo "<center><b>Tugas : $tugas </b></center><br>";
        $hasil = (0.3 * $uas) +( 0.4 * $uts) + (0.3 * $tugas );
        echo "<u><center><b>HASIL : $hasil </u></b><br></center>";
    }

}


