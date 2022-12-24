<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

    <div class="container">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-lg-8">
                <div class="shadow">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="bg-register h-100"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5 ps-4 text-dark">
                                <h3 class="mb-1 fw-bold">
                                    Register
                                </h3>
                                <p class="mb-4 text-muted">Perpustakaan - Universitas CIC</p>
                                <form action="<?= 'prosesLogin.php?aksi=register'; ?>" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="nama_petugas" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="jabatan_petugas" placeholder="Jabatan">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="no_telp" placeholder="No Telepon">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="password" class="form-control" name="password" placeholder="Password" aria-label="password">
                                        </div>
                                        <div class="col">
                                            <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" aria-label="password2">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <select name="role" class="form-select">
                                                <option value="0" selected disabled>- Pilih Role -</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Petugas">Petugas</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <input type="file" class="form-control" name="foto">
                                        </div>
                                    </div>
                                    <div class="d-grid mb-3">
                                        <button type="submit" class="btn py-2">Register</button>
                                    </div>
                                </form>
                                <p class="text-muted fz-13 text-center">Already have an account? <a href="index.php">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>