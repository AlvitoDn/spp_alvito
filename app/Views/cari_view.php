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
                            <th>Detail</th>
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
                                    <td><?= $val == 0 ? "<h6 class='text-success'>Lunas</h6>" : "<a href='/bayar/$id/$siswa[id_siswa]/$val' class='btn btn-warning'>Bayar Sekarang</a>" ?></td>
                                    <td><?= $val == 0 ? "<a href='/bill/$trans[$id]' class='btn btn-primary'>Cetak</a>" : "" ?></td>
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