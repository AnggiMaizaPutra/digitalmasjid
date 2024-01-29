<?php


namespace App\Controllers;
use App\Models\ModelPengurus;
use CodeIgniter\Model;

class Pengurus extends BaseController
{
    public function index()
    {
      $model= new ModelPengurus();
      $data['pengurus']= $model->getPengurus()->getResultArray();
      echo view('pengurus/view_pengurus', $data);
    }
    public function save()
    {
      $model =new ModelPengurus();
      $data =array(
        'id_pengurus'=> $this->request->getPost('id_pengurus'),
        'nama_pengurus'=> $this->request->getPost('nama_pengurus'),
        'jabatan'=> $this->request->getPost('jabatan'),
        'alamat'=> $this->request->getPost('alamat'),
        'no_hp'=> $this->request->getPost('no_hp'),
      );
      if(!$this->validate([
        'id_pengurus' => [
            'rules' => 'required|is_unique[tbl_pengurus.id_pengurus]',
            'errors' => [
                'required'=> '{field} Harus diisi',
                'is_unique'=> '{field} Sudah Ada'
            ]
        ]
    ])) {
        session()->setFlashdata('error',$this->validator->listErrors());
        return redirect()->back()->withInput();
    }else{
        print_r($this->request->getVar());
    }
      $model->savePengurus($data);
      return redirect()->to('/Pengurus');
    }
    public function delete()
    {
      $model= new ModelPengurus();
      $id = $this->request->getPost('id');
      $model->deletepengurus($id);
      return redirect()->to('/pengurus/index');
    }
    
    public function update()
    {
      $model= new ModelPengurus();
      $id = $this->request->getPost('id');
      $data=array(
      'nama_pengurus' => $this->request->getPost('nama'),
      'jabatan' => $this->request->getPost('jab'),
      'alamat' => $this->request->getPost('al'),
      'no_hp' => $this->request->getPost('no'),
      );
      $model->updatePengurus($data,$id);
      return redirect()->to('/pengurus/index');
    
    
  }

} 