<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JenisModel;
class Jenis extends BaseController{
    protected $jeniss;

    function __construct()
    {
        $this->jeniss = new JenisModel();
    }

    public function index()
    {
        $data['jenis'] = $this->jeniss->findAll();
        return view('tampil_jenis', $data);
    }

    public function save()
    {
        $this->jeniss->insert([
            'nama_transaksi'=>$this->request->getPost('nama_transaksi'),
            'nominal'=>$this->request->getPost('nominal'),
            'tahun_ajaran'=>$this->request->getPost('tahun_ajaran')
        ]);

        return redirect('jenis');
    }

    public function edit($id)
    {
        $data = array('nama_transaksi'=>$this->request->getPost('nama_transaksi'),
        'nominal'=>$this->request->getPost('nominal'),
        'tahun_ajaran'=>$this->request->getPost('tahun_ajaran')
    );
        $this->jeniss->update($id, $data);
        session()->setFlashdata('message','Data Jenis berhasil di edit');
        return redirect('jenis')->with('Sukses nihh!!!','update berhasil');
        
    }
    public function delete($id)
    {
        $this->jeniss->delete($id);
        session()->setFlashdata('message','Data Jenis Berhasil Dihapus');
        return redirect('jenis');
    }
}