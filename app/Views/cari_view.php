<?= $this->extend("layouts/admin") ?>
<?= $this->section("title") ?>
<i class="fas fa-solid fa-search"></i> Cari Transaksi
<?= $this->endSection() ?>
<?= $this->section("content") ?>
<div class="row">
    <div class="col">
        <div class="card border-primary">
            <div class="card-header bg-primary">

            </div>
            <div class="card-body">
                <?php
                if ($siswa != null) {

                ?>
                    Nama Siswa = <?= $siswa['nama_siswa'] ?><br>
                    Kelas = <?= $siswa['kelas'] ?>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        $no = 0;
                        if (($siswa != null) && ($spp != null)) {
                            foreach ($spp as $id => $val) {
                                $no++;
                        ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $id ?></td>
                                    <td><?= $val == 0 ? "<p class='text-success'>Lunas</p>" : "<a href='/bayar/$id/$siswa[id_siswa]/$val' class='btn btn-info'>Bayar Sekarang</a>" ?></td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="3">Tidak Ada Data</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                <?php
                } else {
                    echo "Data Siswa Tidak Ditemukan";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>