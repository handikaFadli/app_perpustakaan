<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <?php if (isset($_SESSION['flash'])) : ?>
        <div class="alert alert-success alert-dismissible fade show position-absolute" role="alert">
            Data<strong><?= $_SESSION['flash']['pesan']; ?></strong><?= $_SESSION['flash']['aksi']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <div class="container">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-lg-7">
                <div class="shadow">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="bg-register h-100"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5 ps-4 text-dark">
                                <h3 class="mb-1 fw-bold">
                                    Login System
                                </h3>
                                <p class="mb-4 text-muted">Perpustakaan - Universitas CIC</p>
                                <form action="<?= 'prosesLogin.php?aksi=login'; ?>" method="post">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                                    </div>
                                    <div class="d-grid mb-3">
                                        <button type="submit" class="btn py-2">Sign In</button>
                                    </div>
                                </form>
                                <p class="text-muted fz-13 text-center">Don't have an account? <a href="register.php">Sign up for free</a></p>
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