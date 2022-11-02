<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <img src="<?=base_url()?>/img/smk.jpg" alt="SMKN 1 Ponorogo" height="100px" width="100px">
                    </div>
                    <div class="col-md-4">
                        <h5><b>SMKN 1 PONOROGO</b></h5>
                        <h6>Jl Jendral Sudirman No. 10</h6>
                        <h6>Ponorogo, Jawa Timur</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?=$nama_siswa?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?=$kelas?></td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>No.</th>
                            <th>Nama Transaksi</th>
                            <th>Nominal</th>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td><?=$jenis?></td>
                            <td>Rp <?=number_format($nominal,0,",",".")?></td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        Petugas
                        <br>
                        <br>
                        <br>
                        <br>
                        <?=$petugas?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>
    <script>
        window.print();
    </script>

</body>

</html>