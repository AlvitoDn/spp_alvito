<?php 
namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model{
    protected $table      = 'tbtransaksi';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_transaksi';
    protected $useAutoIncrement = true ;
    protected $allowedFields = ['id_siswa','id_petugas','tanggal_bayar'];
}