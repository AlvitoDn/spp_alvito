<?php 
namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model{
    protected $table      = 'tbsiswa';
    protected $primaryKey = 'id_siswa';
    protected $AutoIncrement = true;
    protected $allowedFields = ['nama_siswa','nis','kelas','tahun_masuk','no_rek','jk'];
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
}