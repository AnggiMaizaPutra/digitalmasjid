<?php

namespace App\Controllers;

use App\Models\ModelKaskeluarmasjid;


class Kaskeluarmasjid extends BaseController
{
    public function index()
    {
        $model = new ModelKaskeluarmasjid();
        $data['kaskeluarmasjid'] = $model->getKaskeluarmasjid()->getResultArray();
        $data['data_agenda'] = $model->getAgenda()->getResult();
        $data['masjid'] = $model->getTotalkasmasjid()->getResult();
        echo view('kaskeluarmasjid/vkaskeluarmasjid', $data);
    }

    public function save()
    {
        $model = new ModelKaskeluarmasjid();
        $jumlah = $this->request->getPost('jumlah');
        $data['masjid'] = $model->getTotalkasmasjid();
        $totalsemua = $data['masjid']->getRow()->totalsemua ?? 0;
        if ($jumlah > $totalsemua) {
            echo "<script>alert('Dana Kurang'); window.location.href='/Kaskeluarmasjid';</script>";
        } else {
            $data = array(
                'tanggal' => $this->request->getpost('tanggal'),
                'ket' => $this->request->getpost('ketmasuk'),
                'kas_masuk' => 0,
                'kas_keluar' => $this->request->getpost('jumlah'),
                'jenis_kas' => 'Masjid',
                'status' => 'Keluar',

            );
        }

        $model->insertData($data);
        return redirect()->to('/Kaskeluarmasjid');
    }

    public function delete()
    {
        $model = new ModelKaskeluarmasjid();
        $id = $this->request->getPost('id');
        $model->deletekaskeluarmasjid($id);
        return redirect()->to('/Kaskeluarmasjid/index');
    }

    public function update()
    { {
            $model = new ModelKaskeluarmasjid();
            $id = $this->request->getPost('tanggal');
            $data = array(
                'tanggal' => $this->request->getPost('tanggal'),
                'ket' => $this->request->getPost('ket'),
                'kas_keluar' => $this->request->getPost('kas_keluar'),
                'jenis_kas' => $this->request->getPost('jenis_kas'),
            );
            $model->updatekaskeluarmasjid($data, $id);
            return redirect()->to('/Kaskeluarmasjid/index');
        }
    }

    public function laporankaskeluarmasjid()
    {
        $model = new ModelKaskeluarmasjid();
        $data['data'] = $model->getLaporanuangkeluarmasjid()->getResultArray();
        echo view('kaskeluarmasjid/cetak_laporan', $data);
    }

    public function laporanperperiode()
    {
        echo view('kaskeluarmasjid/vlaporankaskeluarmasjid');
    }

    public function cetaklaporanperperiodeperjeniskas()
    {
        $model = new ModelKaskeluarmasjid();

        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $jenis = $this->request->getPost('jenis_kas');
        $query = $model->getLaporanperperiodeperjeniskas($tgla, $tglb, $jenis)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'jenis' => $jenis,
            'data' => $query
        ];
        echo view('kaskeluarmasjid/vcetaklaporanperperiodeperjeniskas', $data);
    }

    public function laporanperperiodeperjeniskas()
    {
        echo view('kaskeluarmasjid/vlaporanperjeniskas');
    }


    public function cetaklaporanperperiode()
    {

        $model = new ModelKaskeluarmasjid();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query = $model->getLaporanperperiode($tgla, $tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query
        ];
        echo view('kaskeluarmasjid/vcetaklaporanperperiode', $data);
    }
}
