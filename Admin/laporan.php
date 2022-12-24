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
$dataAnggota = $db->dataAnggota();
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
            <div class="col-md-12">
                <h1 class="mb-4">
                    <i class="fa-solid fa-fw fa-calendar-check"></i>
                    Laporan
                </h1>
            </div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-anggota-tab" data-bs-toggle="tab" data-bs-target="#nav-anggota" type="button" role="tab" aria-controls="nav-anggota" aria-selected="true">Data Anggota</button>
                    <button class="nav-link" id="nav-petugas-tab" data-bs-toggle="tab" data-bs-target="#nav-petugas" type="button" role="tab" aria-controls="nav-petugas" aria-selected="false">Data Petugas</button>
                    <button class="nav-link" id="nav-buku-tab" data-bs-toggle="tab" data-bs-target="#nav-buku" type="button" role="tab" aria-controls="nav-buku" aria-selected="false">Data Buku</button>
                    <button class="nav-link" id="nav-transaksi-tab" data-bs-toggle="tab" data-bs-target="#nav-transaksi" type="button" role="tab" aria-controls="nav-peminjaman" aria-selected="false">Transaksi</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-anggota" role="tabpanel" aria-labelledby="nav-anggota-tab">
                    <div class="card">
                        <h5 class="card-title mt-3 mx-4">Cetak Semua Data Anggota</h5>
                        <div class="card-body">
                            <div class="col-md mb-3">
                                <a href="lapAnggota.php" target="_blank" class="btn btn-warning"><i class="fa-solid fa-fw fa-print"></i> Cetak Laporan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-petugas" role="tabpanel" aria-labelledby="nav-petugas-tab">

                    <div class="card">
                        <h5 class="card-title mt-3 mx-4">Cetak Semua Data Petugas</h5>
                        <div class="card-body">
                            <div class="col-md mb-3">
                                <a href="lapPetugas.php" target="_blank" class="btn btn-warning"><i class="fa-solid fa-fw fa-print"></i> Cetak Laporan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-buku" role="tabpanel" aria-labelledby="nav-buku-tab">
                    <div class="card">
                        <h5 class="card-title mt-3 mx-4">Cetak Semua Data Buku</h5>
                        <div class="card-body">
                            <div class="col-md mb-3">
                                <a href="lapBuku.php" target="_blank" class="btn btn-warning"><i class="fa-solid fa-fw fa-print"></i> Cetak Laporan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-transaksi" role="tabpanel" aria-labelledby="nav-transaksi-tab">
                    <div class="card">
                        <h5 class="card-title mt-3 mx-4">Data Peminjaman</h5>
                        <div class="card-body">
                            <div class="row mt-2">
                                <form action="lapPeminjaman.php" method="post">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" name="dari">
                                            </div>
                                            <p class="fw-bold col-md-1 mt-2">S/D</p>
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" name="sampai">
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" name="cari" class="btn btn-warning"><i class="fa-solid fa-fw fa-print"></i> Cetak Laporan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-title mt-3 mx-4">Data Pengembalian</h5>
                        <div class="card-body">
                            <div class="row mt-2">
                                <form action="lapPengembalian.php" method="post">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" name="dari">
                                            </div>
                                            <p class="fw-bold col-md-1 mt-2">S/D</p>
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" name="sampai">
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" name="cari" class="btn btn-warning"><i class="fa-solid fa-fw fa-print"></i> Cetak Laporan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->


    <script src="../assets/js/feather-icons/feather.min.js"></script>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>