<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model{
    protected $table      = 'detail_transaksi';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_detail';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_transaksi','id_detail_pemmbayaran','bulan_dibayar'];
}