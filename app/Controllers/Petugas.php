<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PetugasModel;
class Petugas extends BaseController{
    protected $petugass;

    function __construct()
    {
        $this->petugass = new PetugasModel();
    }

    public function index ()
    {
        $data['petugas'] = $this->petugass->findAll();
        return view('tampil_petugas',$data);
    }

    public function save()
    {
        $this->petugass->insert([
            'nama_petugas'=>$this->request->getPost('nama_petugas'),
            'username'=>$this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'no_hp'=>$this->request->getPost('no_hp'),
            'jabatan'=>$this->request->getPost('jabatan'),
            'hak_akses'=>$this->request->getPost('hak_akses'),
        ]);

        return redirect('petugas');
    }

    public function edit($id)
    {
        if ($this->request->getPost('ubahpassword')) {
            $data = array('nama_petugas'=>$this->request->getPost('nama_petugas'),
            'username'=>$this->request->getPost('username'),
            'no_hp'=>$this->request->getPost('no_hp'),
            'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'jabatan'=>$this->request->getPost('jabatan'),
            'hak_akses'=>$this->request->getPost('hak_akses')
            );
        }else {
            $data = array('nama_petugas'=>$this->request->getPost('nama_petugas'),
            'username'=>$this->request->getPost('username'),
            'no_hp'=>$this->request->getPost('no_hp'),
            'jabatan'=>$this->request->getPost('jabatan'),
            'hak_akses'=>$this->request->getPost('hak_akses')
            );
        }
        $this->petugass->update($id, $data);
        session()->setFlashdata('message','Data user berhasil di edit');
        return redirect('petugas')->with('Sukses nihh!!!','update berhasil');
        
    }
    public function delete($id)
    {
        $this->petugass->delete($id);
        session()->setFlashdata('message','Data Petugas Berhasil Dihapus');
        return redirect('petugas');
    }

    public function register()
    {
        return view('tampil_register');
    }
}