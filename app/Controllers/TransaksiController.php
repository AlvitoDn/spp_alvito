<?php 
namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\DetailModel;
use App\Models\SiswaModel;
use App\Models\JenisModel;
use CodeIgniter\Controller;

class TransaksiController extends Controller{
    protected $transaksi,$jenis,$siswa,$detail;

    function __construct()
    {
        $this->transaksi = new TransaksiModel();
        $this->siswa = new SiswaModel();
        $this->jenis = new JenisModel();
        $this->detail = new DetailModel();
    }

    public function index()
    {
        return view('tampil_transaksi');
    }
}