<?php


namespace App\Controllers;
use App\Models\ModelUser;
class User extends BaseController
{
    public function index()
    {
      if ((session()->get('masuk') == true)
            and (session()->get('level') == 1)
            or (session()->get('level') == 3)
        ) 
      $model= new ModelUser();
      $data['user']= $model->getUser()->getResultArray();
      echo view('user/view_user', $data);
      
    }
    public function save()
    {
      $model =new ModelUser();
      $data =array(
        'id_user'=> $this->request->getVar('id_user'),
        'nama_user'=> $this->request->getVar('nama_user'),
        'email'=> $this->request->getVar('email'),
        'password'=>password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
        'level'=> $this->request->getVar('level'),
      );
      if(!$this->validate([
        'id_user' => [
            'rules' => 'required|is_unique[tbl_user.id_user]',
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
      $model->saveUser($data);
      return redirect()->to('/User');
    }
    
    public function delete()
    {
      $model= new ModelUser();
      $id = $this->request->getPost('id');
      $model->deleteuser($id);
      return redirect()->to('/user/index');
    }
    public function update()
    {
      $model= new ModelUser();
      $id = $this->request->getPost('id');
      $data=array(
      'namauser' => $this->request->getPost('nama'),
      'email' => $this->request->getPost('email'),
      'password' => $this->request->getPost('password'),
      'level' => $this->request->getPost('level'),
      );
      $model->updateUser($data,$id);
      return redirect()->to('/user/index');
    
    
  }
    
}