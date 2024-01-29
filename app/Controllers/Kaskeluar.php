<?php

namespace App\Controllers;

use App\Models\Modelkaskeluar;
use CodeIgniter\Model;

class Kaskeluar extends BaseController
{
    public function index()
    {
        $model = new Modelkaskeluar();
        $data['kaskeluar'] = $model->getkaskeluar()->getResultArray();
        $data['data_agenda']=$model->getAgenda()->getResult();
        $data['anakyatim']=$model->getTotalkasanakyatim()->getResult();
        echo view('kaskeluar/view_kaskeluar', $data);
    }
    public function save()
    {
        $model = new Modelkaskeluar();
        $jumlah = $this ->request->getPost('jumlah');
        $data ['anakyatim']=$model->getTotalkasanakyatim();
        $totalsemua = $data['anakyatim']->getRow()->totalsemua??0;
        if ($jumlah > $totalsemua){
            echo "<script>alert('Dana Kurang');window.location.href='/Kaskeluar';</script>";
        }else{

        $data = array(

            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => 0,
            'kas_keluar' => $this->request->getPost('jumlah'),
            'jenis_kas' => 'Anak Yatim',
            'status' => 'keluar',
        );



        $model->insertData($data);
        return redirect()->to('/Kaskeluar');
    }
    }
    public function delete()
    {
        $model = new Modelkaskeluar();
        $id = $this->request->getPost('id');
        $model->deletekaskeluar($id);
        return redirect()->to('/Kaskeluar/index');
    }
    public function laporankaskeluar()
    {
        $model= new Modelkaskeluar();
        $data['data']=$model->getlaporanUangkeluar()->getResultArray();
        echo view ('kaskeluar/cetak_laporan',$data);
    }
    public function laporanperperiode()
    {
        echo view('Kaskeluar/vlaporankaskeluar');
    }

    public function cetaklaporanperperiode()
    {
        $model= new Modelkaskeluar();
        $tgla= $this->request->getPost('tanggal_awal');
        $tglb= $this->request->getPost('tanggal_akhir');
        $query = $model->getlaporanperperiode($tgla,$tglb)->getResultArray();
        $data=[
            'tgla'=>$tgla,
            'tglb'=>$tglb,
            'data'=>$query
        ];
        echo view('kaskeluar/vcetaklaporanperperiode',$data);
    }
    public function laporanperperiodeperjenis()
{
    echo view ('kaskeluar/vlaporanperjeniskas');
}
public function cetaklaporanperperiodeperjenis()

    {
        $model = new Modelkaskeluar();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $jenis = $this->request->getPost('jenis_kas');
        $query = $model->getLaporanperperiodeperjenis($tgla, $tglb, $jenis)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'jenis' => $jenis,
            'data' => $query,

        ];
        echo view('kaskeluar/cetaklaporanperperiodeperjeniskas', $data);
    }
    public function update()
    { {
            $model = new Modelkaskeluar();
            $id = $this->request->getPost('tanggal');
            $data = array(
                'tanggal' => $this->request->getPost('tanggal'),
                'ket' => $this->request->getPost('ket'),
                'kas_keluar' => $this->request->getPost('kas_keluar'),
                'jenis_kas' => $this->request->getPost('jenis_kas'),
            );
            $model->updatekaskeluar($data, $id);
            return redirect()->to('/Kaskeluar/index');
        }
    }
  }