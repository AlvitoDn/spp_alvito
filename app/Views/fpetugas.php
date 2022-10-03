<?=$this->extend('layouts/admin')?>
<?=$this->section('title')?>
Form Petugas
<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="card">
    <form action="/spetugas" method="post">
        <div class="card-header bg-primary">
            <h4 style="color: white; justify-content: center; align-items: center; display: flex;">Form Pengisian Data Petugas</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama_petugas" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control">
            </div>
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="no_hp" class="form-label">Nomor Hp</label>
                <input type="number" name="no_hp" id="no_hp" class="form-control">
            </div>
            <div class="form-group">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select name="jabatan" id="jabatan" class="form-control">
                    <option value="">Pilih Jabatan</option>
                    <option value="KEPALA SEKOLAH">Kepala Sekolah</option>
                    <option value="WALI KELAS">Wali Kelas</option>
                    <option value="TELLER">Teller</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hak_akses" class="form-label">Hak Akses</label>
                <select name="hak_akses" id="hak_akses" class="form-control">
                    <option value="">Pilih Hak Akses Anda</option>
                    <option value="ADMIN">ADMIN</option>
                    <option value="KASIR">KASIR</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-primary">
            <input type="reset" class="btn btn-secondary">
            <a href="/petugas" class="btn btn-warning">Kembali</a>
        </div>
    </form>
</div>
<?=$this->endSection()?>