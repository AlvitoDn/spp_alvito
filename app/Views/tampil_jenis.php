<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
<i class="fas fa-solid fa-notebook"></i> Jenis Pembayaran
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card border-primary">
            <div class="card-header bg-primary">
                <a href="#" class="btn btn-outline-light" data-jenis="" data-target="#ModalJenis" data-toggle="modal"><i class="fas fa-solid fa-user-plus"></i> Tambah Data Jenis Pembayaran</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="jenis">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Nama Transaksi</th>
                            <th>Nominal</th>
                            <th>Tahun Ajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($jenis as $row) {
                            $data =  $row['nama_transaksi'] . "," . $row['nominal'] . "," . $row['tahun_ajaran'] . "," . base_url('jenis/edit/' . $row['id_jenis_pembayaran']);
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row['nama_transaksi'] ?></td>
                                <td><?= $row['nominal'] ?></td>
                                <td><?= $row['tahun_ajaran'] ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#ModalJenis" data-jenis="<?= $data ?>"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('jenis/delete/' . $row['id_jenis_pembayaran']) ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini')" class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="ModalJenis" tab-index="-1" aria-hidden="true" aria-labelledby="ModalJenisLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Input Data Jenis</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        <span aria-hidden="true">&times;</span>
                    </div>
                    <form id="form" action="" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_transaksi" class="form-label">Nama Transaksi</label>
                                <input type="text" name="nama_transaksi" id="nama_transaksi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nominal" class="form-label">Nominal</label>
                                <input type="number" name="nominal" id="nominal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                                <input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-solid fa-arrow-left"></i></button>
                        </div>
                    </form>
                </div>
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
        $("#ModalJenis").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var data = button.data('jenis');
            if (data != "") {
                const barisdata = data.split(",");
                $("#nama_transaksi").val(barisdata[0]);
                $("#nominal").val(barisdata[1]);
                $("#tahun_ajaran").val(barisdata[2]);
                $("#form").attr('action', barisdata[3]);
            } else {
                $("#nama_transaksi").val('');
                $("#nominal").val('');
                $("#tahun_ajaran").val('');
                $("#form").attr('action', '/sjenis');
            }
        });
        $("#jenis").DataTable();
    })
</script>
<?= $this->endSection() ?>