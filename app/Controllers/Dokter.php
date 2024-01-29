<?php


namespace App\Controllers;
use App\Models\Dokter_model;
class Dokter extends BaseController
{
    public function index()
    {
      $model=new Dokter_model();
      $data['dokter']=$model->getDokter()->getResultArray();
      echo view('dokter/view_dokter',$data);
    }
}