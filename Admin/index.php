<?php
require_once '../database.php';
class menu
{
    function __construct()
    {
        require_once "menu.php";
    }
}
$menu = new menu;
$db = new database;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">

        <!-- cotent -->
        <div class="main-content container-fluid">
            <h1 class="mb-4">
                <i class="fas fa-fw fa-home"></i>
                Dashboard
            </h1>
            <div class="row">
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <i class="fa-solid fa-fw fa-users fa-5x"></i>
                                <h3 class="card-title">Anggota</h3>
                                <p class="card-text">
                                    <?php
                                    global $db;
                                    $jmlh = $db->jumlahData('anggota');
                                    ?>
                                    <?= $jmlh . ' Orang';  ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <i class="fas fa-fw fa-user-tie fa-5x"></i>
                                <h3 class="card-title">Petugas</h3>
                                <p class="card-text">
                                    <?php
                                    global $db;
                                    $jmlh = $db->jumlahData('petugas');
                                    ?>
                                    <?= $jmlh . ' Orang';  ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <i class="fas fa-fw fa-book fa-5x"></i>
                                <h3 class="card-title">Buku</h3>
                                <p class="card-text">
                                    <?php
                                    global $db;
                                    $jmlh = $db->jumlahData('buku');
                                    ?>
                                    <?= $jmlh . ' Buku';  ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <i class="fa-solid fa-fw fa-arrow-up fa-5x"></i>
                                <h3 class="card-title">Peminjaman</h3>
                                <p class="card-text">
                                    <?php
                                    global $db;
                                    $jmlh = $db->jumlahData('peminjaman');
                                    ?>
                                    <?= $jmlh . ' Buku';  ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <i class="fa-solid fa-fw fa-arrow-down fa-5x"></i>
                                <h3 class="card-title">Pengembalian</h3>
                                <p class="card-text">
                                    <?php
                                    global $db;
                                    $jmlh = $db->jumlahData('pengembalian');
                                    ?>
                                    <?= $jmlh . ' Buku';  ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->

    </div>

    <script src="../assets/js/feather-icons/feather.min.js"></script>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>