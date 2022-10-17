<?php 
namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\DetailModel;
use App\Models\SiswaModel;
use App\Models\JenisModel;
use CodeIgniter\Controller;

class TransaksiController extends BaseController{
    protected $transaksi,$jenis,$siswa,$detail,$db;

    function __construct()
    {
        $this->transaksi = new TransaksiModel();
        $this->siswa = new SiswaModel();
        $this->jenis = new JenisModel();
        $this->detail = new DetailModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('tampil_transaksi');
    }

    public function cari()
    {
        $bulan = array(
            'Juli'=>'',
            'Agustus'=>'',
            'September'=>'',
            'Oktober'=>'',
            'November'=>'',
            'Desember'=>'',
            'Januari'=>'',
            'Februari'=>'',
            'Maret'=>'',
            'April'=>'',
            'Mei'=>'',
            'Juni'=>''
        );
        $no_rek = $this->request->getPost('no_rek');
        $data_siswa = $this->siswa->where('no_rek',$no_rek)->first();
        $sel = $this->db->table('tbsiswa a, jenis_pembayaran b, tbtransaksi c, detail_transaksi d');
        $where = "a.tahun_masuk = b.tahun_ajaran AND a.id_siswa = c.id_siswa AND b.id_jenis_pembayaran = d.id_jenis_pembayaran AND c.id_transaksi = d.id_transaksi AND a.id_siswa = ".$data_siswa['id_siswa'];
        $sel->where($where);
        $query = $sel->get();
        foreach($query->getResult() as $row){
            foreach ($bulan as $id => $val) {
                if ($id == $row->bulan_dibayar) {
                    $bulan[$id] = 1;
                }
            }
        }
        $data["spp"] = $bulan;
        $data["siswa"] = $data_siswa;
        return view('cari_view',$data);

    }
}