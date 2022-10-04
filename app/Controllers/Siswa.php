<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiswaModel;
class Siswa extends BaseController{
    protected $siswas;

    function __construct()
    {
        $this->siswas = new SiswaModel();
    }

    public function index()
    {
        $data['siswa'] = $this->siswas->findAll();
        return view('tampil_siswa', $data);
    }

    public function save()
    {
        $this->siswas->insert([
            'nama_siswa'=>$this->request->getPost('nama_siswa'),
            'nis'=>$this->request->getPost('nis'),
            'kelas'=>$this->request->getPost('kelas'),
            'tahun_masuk'=>$this->request->getPost('tahun_masuk'),
            'no_rek'=>$this->request->getPost('no_rek'),
            'jk'=>$this->request->getPost('jk')
        ]);

        return redirect('siswa');
    }

    public function edit($id)
    {
        $data = array('nama_siswa'=>$this->request->getPost('nama_siswa'),
        'nis'=>$this->request->getPost('nis'),
        'kelas'=>$this->request->getPost('kelas'),
        'tahun_masuk'=>$this->request->getPost('tahun_masuk'),
        'no_rek'=>$this->request->getPost('no_rek'),
        'jk'=>$this->request->getPost('jk')
    );
        $this->siswas->update($id, $data);
        session()->setFlashdata('message','Data Siswa berhasil di edit');
        return redirect('siswa')->with('Sukses nihh!!!','update berhasil');
        
    }
    public function delete($id)
    {
        $this->siswas->delete($id);
        session()->setFlashdata('message','Data Siswa Berhasil Dihapus');
        return redirect('siswa');
    }

}