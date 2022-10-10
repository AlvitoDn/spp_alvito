<?php 
namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model{
    protected $table      = 'jenis_pembayaran';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_jenis_pembayaran';
    protected $allowedFields = ['nama_transaksi','nominal','tahun_ajaran'];
}