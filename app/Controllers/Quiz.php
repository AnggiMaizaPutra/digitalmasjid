<?php


namespace App\Controllers;

class Quiz extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    
    public function entriquiz()
    {
        return view('entriquiz');
    }
    public function hitungbiaya()
    {
        $kodesepeda = $this->request->getpost('kode');
        $jenis = $this->request->getpost('jenis');
        $hargasemua = $this->request->getpost('harga');
        $jumlahbeli = $this->request->getpost('jumlah');
        $hargasatuan = $this->request->getpost('hargasatuan');
        echo "<center><b>Kode : $kodesepeda </b></center><br>";
        echo "<center><b>jenis : $jenis </b></center><br>";
        echo "<center><b>harga : $hargasemua </b></center><br>";
        echo "<center><b>jumlah : $jumlahbeli </b></center><br>";
        $hasil = ($hargasemua) / ($jumlahbeli) ;
        echo "<u><center><b>Hargasatuan : $hasil </u></b><br></center>";
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
            'kodesepeda' => $this->request->getPost('kodesepeda'),
            'jenis' => $this->request->getPost('jenis'),
            'hargasemua' => $this->request->getPost('hargasemua'),
            'jumlahbeli' => $this->request->getPost('jumlahbeli'),
            'hargasatuan' => $this->request->getPost('hargasatuan'),
        ];
        $simpan = $db->table('sepeda')->insert($data);
        if ($simpan = TRUE) {
            echo "<script>
            alert('data berhasil disimpan'); 
            window.location='/Quiz/tampil';
            </script>";
        } else {
            echo "<script>
            alert('data gagal disimpan'); 
            window.location='/Quiz/sepeda';
            </script>";
        }
    }
    function tampil()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sepeda');
        $query = $builder->get();
        $data['sepedaok'] = $query->getResultArray();
        return view('tampilquiz', $data);
    }
}