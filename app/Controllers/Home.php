<?php


namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    
    public function ee()
    {
        return view('viewspp');
    }
    public function hitungbiaya()
    {
        $kode = $this->request->getpost('kode');
        $agenda = $this->request->getpost('agenda');
        $transportasi = $this->request->getpost('transportasi');
        $penginapan = $this->request->getpost('penginapan');
        $pokok = $this->request->getpost('pokok');
        echo "<center><b>Kode : $kode </b></center><br>";
        echo "<center><b>Agenda : $agenda </b></center><br>";
        echo "<center><b>Transportasi : $transportasi </b></center><br>";
        echo "<center><b>Penginapan : $penginapan </b></center><br>";
        echo "<center><b>Pokok : $pokok </b></center><br>";
        $hasil = ($transportasi) + ($penginapan) + ($pokok);
        echo "<u><center><b>TOTAL : $hasil </u></b><br></center>";
    }
    public function proses()
    {
        $nobp = $this->request->getpost('nobp');
        $nama = $this->request->getpost('nama');
        $uts = $this->request->getpost('uts');
        $uas = $this->request->getpost('uas');
        $tugas = $this->request->getpost('tugas');
        echo "<center><b>Nobp : $nobp </b></center><br>";
        echo "<center><b>Nama : $nama </b></center><br>";
        echo "<center><b>UTS : $uts </b></center><br>";
        echo "<center><b>UAS : $uas </b></center><br>";
        echo "<center><b>Tugas : $tugas </b></center><br>";
        $hasil = (0.3 * $uas) + (0.4 * $uts) + (0.3 * $tugas);
        echo "<u><center><b>HASIL : $hasil </u></b><br></center>";
    }
    public function simpan()
    {
        $db = \Config\Database::connect();
        $data = [
            'kode' => $this->request->getPost('kode'),
            'agenda' => $this->request->getPost('agenda'),
            'btransportasi' => $this->request->getPost('transportasi'),
            'bpenginapan' => $this->request->getPost('penginapan'),
            'bpokok' => $this->request->getPost('pokok'),
            'total' => $this->request->getPost('total'),
        ];
        $simpan = $db->table('sppd')->insert($data);
        if ($simpan = TRUE) {
            echo "<script>
            alert('data berhasil disimpan'); 
            window.location='/Home/tampil';
            </script>";
        } else {
            echo "<script>
            alert('data gagal disimpan'); 
            window.location='/Home/sppd';
            </script>";
        }
    }
    function tampil()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sppd');
        $query = $builder->get();
        $data['sppdok'] = $query->getResultArray();
        return view('tampilsppd', $data);
    }
}