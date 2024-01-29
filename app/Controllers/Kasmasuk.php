<?php

namespace App\Controllers;

use App\Models\Modelkasmasuk;
use CodeIgniter\Model;

class Kasmasuk extends BaseController
{
    public function index()
    {
        if(session()->get('masuk')==true){
            if (session()->get('level')==1){
         
            $model = new Modelkasmasuk();
            $data['kasmasuk'] = $model->getkasmasuk()->getResultArray();
            $data['data_donatur'] = $model->getDonatur()->getResult();
            echo view('kasmasuk/view_kasmasuk', $data);
        } else {
            echo "<script>alert('Anda Tidak Berhak Mengakses'); window.location.href='/Layout';</script>";
        }
    } else {
        echo "<script>alert('Anda Harus Login'); window.location.href='/login';</script>";
    }
}
    
    public function save()
    {
        $model = new Modelkasmasuk();
        $data = array(

            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
            
            'jenis_kas' => $this->request->getPost('jenis_kas'),
            'iddonaturmasjid'=> $this->request->getPost('iddonatur')
        );



        $model->insertData($data);
        return redirect()->to('/Kasmasuk');
    }
    public function delete()
    {
        $model = new Modelkasmasuk();
        $id = $this->request->getPost('id');
        $model->deletekasmasuk($id);
        return redirect()->to('/Kasmasuk/index');
    }
    public function laporankasmasuk()
    {
        $model= new Modelkasmasuk();
        $data['data']=$model->getlaporanUangmasuk()->getResultArray();
        echo view ('kasmasuk/cetak_laporan',$data);
    }
    public function laporanperperiode()
    {
        echo view('Kasmasuk/vlaporankasmasuk');
    }

    public function cetaklaporanperperiode()
    {
        $model= new Modelkasmasuk();
        $tgla= $this->request->getPost('tanggal_awal');
        $tglb= $this->request->getPost('tanggal_akhir');
        $query = $model->getlaporanperperiode($tgla,$tglb)->getResultArray();
        $data=[
            'tgla'=>$tgla,
            'tglb'=>$tglb,
            'data'=>$query
        ];
        echo view('kasmasuk/vcetaklaporanperperiode',$data);
    }
    public function laporanperperiodeperjenis()
{
    echo view ('kasmasuk/vlaporanperjeniskas');
}
public function cetaklaporanperperiodeperjenis()

    {
        $model = new Modelkasmasuk();
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
        echo view('kasmasuk/cetaklaporanperperiodeperjeniskas', $data);
    }
    public function update()
    { {
            $model = new Modelkasmasuk();
            $id = $this->request->getPost('tanggal');
            $data = array(
                'tanggal' => $this->request->getPost('tanggal'),
                'ket' => $this->request->getPost('ket'),
                'kas_masuk' => $this->request->getPost('kas_masuk'),
                'jenis_kas' => $this->request->getPost('jenis_kas'),
            );
            $model->updatekasmasuk($data, $id);
            return redirect()->to('/Kasmasuk/index');
        }
    }
    
}