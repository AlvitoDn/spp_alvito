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

        $dataPetugass = $petugass->where([
            'username' => $username,
        ])->first();
        d($dataPetugass);
        if($dataPetugass) {
            if(password_verify($password, $dataPetugass['password'])) {
                session()->set(
                    [
                        'username' => $dataPetugass['username'],
                        'nama_petugas' => $dataPetugass['nama_petugas'],
                        'hak_akses'=>$dataPetugass['hak_akses'],
                        'logged_in' => true, 
                        'id_petugas'=>$dataPetugass['id_petugas']
                    ]
                );
                return $this->response->redirect('/dashboard');
            } else {
                session()->setFlashdata('error','Username atau Password salah');
                return $this->response->redirect('/login');
            }
        } else {
            session()->setFlashdata('error','Username tidak ditemukan');
            return $this->response->redirect('/login');
        }
    }
    function logout(){
        session()->destroy();
        return $this->response->redirect('/login');
    }

}