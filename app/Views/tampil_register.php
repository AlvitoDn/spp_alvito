
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    body{
        height: 100%;
        background-image: url('mountain.jpg');
        background-size: cover;
    }
</style>
<body>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="pregister" method="POST">
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama_petuagas" name="nama_petugas" placeholder="Your Full Name....">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username"
                                        placeholder="username.... ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="no_hp" name="no_hp"
                                        placeholder="Your Phone Number.... ">
                                </div>
                                <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                </div>
                                <hr>
                                <p class="text-dark text-center">Required!</p>
                                <div class="form-group">
                                <select name="jabatan" id="jabatan" class="form-control" required>
                                    <option value="">Pilih Jabatan</option>
                                    <option value="KEPALA SEKOLAH">Kepala Sekolah</option>
                                    <option value="WALI KELAS">Wali Kelas</option>
                                    <option value="TELLER">Teller</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="hak_akses" id="hak_akses" class="form-control" required>
                                    <option value="">Pilih Hak Akses Anda</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="KASIR">KASIR</option>
                                </select>
                            </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>/js/sb-admin-2.min.js"></script>

</body>

</html>