<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\DetailModel;
use App\Models\SiswaModel;
use App\Models\JenisModel;
use App\Models\PetugasModel;
use CodeIgniter\Controller;

class TransaksiController extends BaseController
{
    protected $transaksi, $jenis, $siswa, $detail, $db;

    function __construct()
    {
        $this->transaksi = new TransaksiModel();
        $this->siswa = new SiswaModel();
        $this->jenis = new JenisModel();
        $this->detail = new DetailModel();
        $this->petugas = new PetugasModel();
        $this->session = session();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('tampil_transaksi');
    }

    public function cari()
    {
        $bulan = array();
        $trans = array();
        if ($this->request->getVar('no_rek') != null) {
            $no_rek = $this->request->getVar('no_rek');
            $data_siswa = $this->siswa->where('no_rek', $no_rek)->first();
            $sel = $this->db->table('tbsiswa a, jenis_pembayaran b');
            if ($data_siswa != null) {
                $where = "a.tahun_masuk = b.tahun_ajaran AND a.id_siswa = " . $data_siswa['id_siswa'];
                $sel->where($where);
                $query = $sel->get();
                foreach ($query->getResult() as $row) {
                    $seltrans = $this->db->table('tbtransaksi a, detail_transaksi b');
                    $wheretrans = "a.id_transaksi = b.id_transaksi AND a.id_siswa=".$row->id_siswa." and b.id_jenis_pembayaran=".$row->id_jenis_pembayaran;
                    $seltrans->where($wheretrans);
                    $hasil = $seltrans->countAllResults();
                    if ($hasil >  0) {
                        $seltrans = $this->db->table('tbtransaksi a, detail_transaksi b');
                        $wheretrans = "a.id_transaksi = b.id_transaksi AND a.id_siswa=".$row->id_siswa." and b.id_jenis_pembayaran=".$row->id_jenis_pembayaran;
                        $seltrans->where($wheretrans);
                        $hTrans = $seltrans->get();
                        foreach($hTrans->getResult() as $row1) {
                            if ($row->id_jenis_pembayaran == $row1->id_jenis_pembayaran) {
                                $trans[$row->nama_transaksi] = $row1->id_transaksi;
                            }
                        }
                        $bulan[$row->nama_transaksi] = 0;
                    } else {
                        $bulan[$row->nama_transaksi] = $row->id_jenis_pembayaran;
                    }
                }
            }
            $data["trans"] = $trans;
            $data["spp"] = $bulan;
            $data["siswa"] = $data_siswa;
            return view('cari_view', $data);
        } else {
            return view("tampil_transaksi");
        }
    }
    public function bayar($bulan, $id, $id_jenis_pembayaran)
    {
        $tanggal = Date("Y-m-d");
        $idtrans = $this->transaksi->insert([
            "id_siswa" => $id,
            "id_petugas" =>$this->session->get("id_petugas"),
            "tanggal_bayar" => $tanggal,
        ]);
        $siswas = $this->siswa->find($id);
        $this->detail->insert([
            "id_transaksi" => $idtrans,
            "bulan_dibayar" => $bulan,
            "id_jenis_pembayaran" => $id_jenis_pembayaran,
        ]);
        return redirect()->to("/caritagihan?no_rek=".$siswas['no_rek']);
    }

    public function bill($id)
    {
        $seltrans = $this->db->table("tbtransaksi a, detail_transaksi b, tbsiswa c, tbpetugas d, jenis_pembayaran e");
        $wheretrans = "a.id_transaksi = b.id_transaksi and a.id_siswa = c.id_siswa and d.id_petugas = a.id_petugas and a.id_transaksi = '$id' and b.id_jenis_pembayaran = e.id_jenis_pembayaran";

        $seltrans->where($wheretrans);
        $q = $seltrans->get();
        foreach ($q->getResult() as $row) {
            $kelas = $row->kelas;
            $nama_siswa = $row->nama_siswa;
            $petugas = $row->nama_petugas;
            $nominal = $row->nominal;
            $nama_jenis = $row->nama_transaksi;
        }
        $data["kelas"] = $kelas;
        $data["nama_siswa"] = $nama_siswa;
        $data["petugas"] = $petugas;
        $data["nominal"] = $nominal;
        $data["jenis"] = $nama_jenis;
        
        return view("bill",$data);
    }
}