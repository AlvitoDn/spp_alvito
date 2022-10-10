<?php 
namespace App\Controllers;

use App\Models\PetugasModel;
use CodeIgniter\Controller;

class Login extends BaseController{
    protected $petugass;

    public function index()
    {
        return view('tampil_login');
    }

    public function login()
    {
        $petugass = new PetugasModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $dataPetugas = $petugass->where(['username' => $username])->first();
        d($dataPetugas);
        if($dataPetugas){
            if (password_verify($password, $dataPetugas['password'])) {
                session()->set(
                    [
                        'username'=> $dataPetugas['username'],
                        'nama_petugas'=> $dataPetugas['nama_petugas'],
                        'hak_akses'=> $dataPetugas['hak_akses'],
                        'nama_petugas'=> $dataPetugas['nama_petugas'],
                        'id_petugas'=> $dataPetugas['id_petugas'],
                        'logged_in' => true
                    ]
                );
                return redirect('/');
            }else {
                session()->setFlashdata('error','Login Gagal... Username atau Password Salah');
                return redirect('login');
            }
        }else {
            session()->setFlashdata('error','Login Gagal... Username Tidak Ditemukan');
            return redirect('login');
        }    
    }

    public function logout()
    {
        session()->destroy();
        return redirect('login');
    }

}