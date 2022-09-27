<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Petugas
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-header bg-success">
        <h3 style="color:white;">Data Petugas</h3>
        <a href="/fpetugas" class="btn btn-primary">Buat Petugas</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>NO.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Passsword</th>
                <th>NO HP</th>
                <th>Jabatan</th>
                <th>Hak Akses</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 0;
            foreach ($petugas as $row) {
                $data = $row['id_petugas'] . "," . $row['nama_petugas'] . "," . $row['username'] . "," . $row['password'] . "," . $row['no_hp'] . "," . $row['jabatan'] . "," . $row['hak_akses'] . base_url('petugas/edit/' . $row['id_petugas']);
                $no++;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['nama_petugas'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['password'] ?></td>
                    <td><?= $row['no_hp'] ?></td>
                    <td><?= $row['jabatan'] ?></td>
                    <td><?= $row['hak_akses'] ?></td>
                    <td>
                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEdit" data-petugas="<?= $data ?>">Edit</a>
                        <a href="<?= base_url('petugas/delete/' . $row['id_petugas']) ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini')" class="btn btn-danger">hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
<div class="modal fade" id="ModalEdit" tab-index="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form" action="" method="post">
                <div class="modal-header">
                    <h5>Edit Petugas</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">PASSWORD</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="no_hp" class="form-label">NO HP</label>
                        <input type="number" name="no_hp" id="no_hp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label for="hak_akses" class="form-label">Hak Akses</label><br>
                        <select name="hak_akses" id="hak_akses">
                            <option value="">Pilih Hak Akses</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="KASIR">KASIR</option>
                        </select>
                    </div>
                </div><br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php if (!empty(session()->getFlashdata('message'))) : ?>

    <div class="alert alert-success">
        <?php echo session()->getFlashdata('message'); ?>
    </div>

<?php endif ?>
<?= $this->endSection() ?>
<?= $this->section("script") ?>
<script>
    $(document).ready(function() {
        $("#ModalEdit").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var data = button.data('petugas');
            if (data != "") {
                const barisdata = data.split(",");
                $("#nama").val(barisdata[1]);
                $("#username").val(barisdata[2]);
                $("#password").val(barisdata[3]);
                $("#no_hp").val(barisdata[4]);
                $("#jabatan").val(barisdata[5]);
                $("#form").attr('action', barisdata[6]);
            }
        });
    })
</script>
<?= $this->endSection() ?>