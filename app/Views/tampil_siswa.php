<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
<b><i class="fas fa-solid fa-user-graduate"></i>  Siswa</b>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card border-primary">
            <div class="card-header bg-primary">
                <a href="#" class="btn btn-outline-light" data-siswa="" data-target="#ModalSiswa" data-toggle="modal"><i class="fas fa-solid fa-user-plus"></i> Tambah Data Siswa</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>NO.</th>
                        <th>Nama Siswa</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Tahun Masuk</th>
                        <th>No. Rekening</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 0;
                    foreach ($siswa as $row) {
                        $data = $row['nama_siswa'] . "," . $row['nis'] . "," . $row['kelas'] . "," . $row['tahun_masuk'] . "," . $row['no_rek'] . "," . $row['jk'] . "," . base_url('siswa/edit/' . $row['id_siswa']);
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nama_siswa'] ?></td>
                            <td><?= $row['nis'] ?></td>
                            <td><?= $row['kelas'] ?></td>
                            <td><?= $row['tahun_masuk'] ?></td>
                            <td><?= $row['no_rek'] ?></td>
                            <td><?= $row['jk'] ?></td>
                            <td>
                                <a href="#" class="btn btn-warning" data-siswa="<?= $data ?>" data-toggle="modal" data-target="#ModalSiswa"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('siswa/delete/' . $row['id_siswa']) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="modal fade" id="ModalSiswa" tab-index="-1" aria-hidden="true" aria-labelledby="ModalSiswaLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Data Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        <span aria-hidden="true">&times;</span>
                    </div>
                    <form id="form" action="" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" name="nis" id="nis" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select name="kelas" id="kelas" class="form-control" required>
                                    <option value="">==> Pilih Kelas Anda</option>
                                    <option value="XII RPL 1">XII RPL 1</option>
                                    <option value="XII RPL 2">XII RPL 2</option>
                                    <option value="XII MM 1">XII MM 1</option>
                                    <option value="XII MM 2">XII MM 2</option>
                                    <option value="XII AKL 1">XII AKL 1</option>
                                    <option value="XII AKL 2">XII AKL 2</option>
                                    <option value="XII AKL 3">XII AKL 3</option>
                                    <option value="XII AKL 4">XII AKL 4</option>
                                    <option value="XII AKL 5">XII AKL 5</option>
                                    <option value="XII OTKP 1">XII OTKP 1</option>
                                    <option value="XII OTKP 2">XII OTKP 2</option>
                                    <option value="XII OTKP 3">XII OTKP 3</option>
                                    <option value="XII BDP 1">XII BDP 1</option>
                                    <option value="XII BDP 2">XII BDP 2</option>
                                    <option value="XII BDP 3">XII BDP 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                                <input type="text" name="tahun_masuk" id="tahun_masuk" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="no_rek" class="form-label">Nomor Rekening</label>
                                <input type="text" id="no_rek" name="no_rek" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control" required>
                                    <option value="">==> Pilih Jenis Kelamin Anda</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-solid fa-arrow-left"></i></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if (!empty(session()->getFlashdata('message'))) : ?>
    <div class="alert alert-success">
        <?php echo session()->getFlashdata('message'); ?>
    </div>
<?php endif ?>
</div>
<?= $this->endSection() ?>
<?= $this->section("script") ?>
<script>
    $(document).ready(function() {
        $("#ModalSiswa").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var data = button.data('siswa');
            if (data != "") {
                const barisdata = data.split(",");
                $("#nama_siswa").val(barisdata[0]);
                $("#nis").val(barisdata[1]);
                $("#kelas").val(barisdata[2]).change();
                $("#tahun_masuk").val(barisdata[3]);
                $("#no_rek").val(barisdata[4]);
                $("#jk").val(barisdata[5]).change();
                $("#form").attr('action', barisdata[6]);
            } else {
                $("#nama_siswa").val('');
                $("#nis").val('');
                $("#kelas").val('').change();
                $("#tahun_masuk").val('');
                $("#no_rek").val('');
                $("#jk").val('').change();
                $("#form").attr('action', '/ssiswa');
            }
        });
    })
</script>
<?= $this->endSection() ?>