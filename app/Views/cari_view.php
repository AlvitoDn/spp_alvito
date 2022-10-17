<?=$this->extend("layouts/admin")?>
<?=$this->section("title")?>
<i class="fas fa-solid fa-search"></i> Cari Transaksi
<?=$this->endSection()?>
<?=$this->section("content")?>
<div class="row">
    <div class="col">
        <div class="card border-primary">
            <div class="card-header bg-primary">

            </div>
            <div class="card-body">
                Nama Siswa = <?=$siswa['nama_siswa']?><br>
                Kelas = <?=$siswa['kelas']?>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Status</th>
                    </tr>
                    <?php
                        $no=0;
                        foreach ($spp as $id => $val) {
                            $no++;
                            ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$id?></td>
                                <td><?=$val==1?"<p class='text-success'>Lunas</p>":"<a href='/bayar/$id/$siswa[id_siswa]' class='btn btn-info'>Bayar Sekarang</a>"?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>