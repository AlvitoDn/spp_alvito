<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PetugasModel;
class Petugas extends BaseController{
    protected $petugas;

    function __construct()
    {
        $this->petugas = new PetugasModel();
    }

    public function index ()
    {
        $data['petugas'] = $this->petugas->findAll();
        return view('tampil_petugas',$data);
    }

    public function fpetugas()
    {
        return view('fpetugas');
    }

    public function save()
    {
        $this->petugas->insert([
            'nama_petugas'=>$this->request->getPost('nama_petugas'),
            'username'=>$this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'no_hp'=>$this->request->getPost('no_hp'),
            'jabatan'=>$this->request->getPost('jabatan'),
            'hak_akses'=>$this->request->getPost('hak_akses'),
        ]);

        return redirect('petugas');
    }
    public function delete($id)
    {
        $this->petugas->delete($id);
        session()->setFlashdata('message','Data Petugas Berhasil Dihapus');
        return redirect('petugas');
    }

}