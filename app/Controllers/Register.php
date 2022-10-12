<?php 
namespace App\Controllers;

use App\Models\PetugasModel;
use CodeIgniter\Controller;

class Register extends BaseController{

    function __construct()
    {
        $this->registers = new PetugasModel();
    }
    public function index()
    {
        return view('tampil_register');
    }

    public function save()
    {
        $this->registers->insert([
            'nama_petugas'=>$this->request->getPost('nama_petugas'),
            'username'=>$this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'no_hp'=>$this->request->getPost('no_hp'),
            'jabatan'=>$this->request->getPost('jabatan'),
            'hak_akses'=>$this->request->getPost('hak_akses'),
        ]);

        return redirect('login');
    }
}