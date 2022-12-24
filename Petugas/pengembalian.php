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
$dataPinjam = $db->dataPinjam();
$dataKembali = $db->dataKembali();
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
                <?php if (isset($_SESSION['flash'])) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data<strong><?= $_SESSION['flash']['pesan']; ?></strong><?= $_SESSION['flash']['aksi']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['flash']); ?>
                <?php endif; ?>
                <h1 class="mb-4">
                    <i class="fa-solid fa-fw fa-arrow-down"></i>
                    Peminjaman
                </h1>
            </div>
            <div class="card">
                <h5 class="card-header bg-info text-white mb-2">
                    Peminjaman
                </h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Buku</th>
                                    <th>Petugas</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dataPinjam as $row) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['kode_pinjam']; ?></td>
                                        <td><?= $row['nama_anggota']; ?></td>
                                        <td><?= $row['judul_buku']; ?></td>
                                        <td><?= $row['nama_petugas']; ?></td>
                                        <td><?= $row['tgl_pinjam']; ?></td>
                                        <td><?= $row['jumlah']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#pengembalian<?= $row['id_pinjam']; ?>">
                                                Dikembalikan
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <h5 class="card-header bg-secondary text-white mb-2">
                    Pengembalian
                </h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Buku</th>
                                    <th>Petugas</th>
                                    <th>Tgl Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dataKembali as $row) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama_anggota']; ?></td>
                                        <td><?= $row['judul_buku']; ?></td>
                                        <td><?= $row['nama_petugas']; ?></td>
                                        <td><?= $row['tgl_kembali']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->

        <!-- Modal Form Pengembalian -->
        <?php foreach ($dataPinjam as $row) : ?>
            <div class="modal fade" id="pengembalian<?= $row['id_pinjam']; ?>" tabindex="-1" aria-labelledby="pengembalian" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title fs-4 fw-bold text-white" id="pengembalian">Detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= 'proses.php?aksi=kembali'; ?>" class="form form-vertical">
                                <div class="form-body">
                                    <input type="hidden" class="form-control" name="id_pinjam" value="<?= $row['id_pinjam']; ?>">
                                    <input type="hidden" class="form-control" name="id_buku" value="<?= $row['id_buku']; ?>">
                                    <input type="hidden" class="form-control" name="id_anggota" value="<?= $row['id_anggota']; ?>">
                                    <input type="hidden" class="form-control" name="id_petugas" value="<?= $row['id_petugas']; ?>">
                                    <input type="hidden" class="form-control" name="tgl_kembali" value="<?= date('Y-m-d'); ?>">
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <div class="form-group">
                                                <label class="fs-6 fw-bold" for="kode_pinjam">Kode Pinjam</label>
                                                <input type="text" id="kode_pinjam" class="form-control" value="<?= $row['kode_pinjam']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div class="form-group">
                                                <label class="fs-6 fw-bold" for="nama_anggota">Anggota</label>
                                                <input type="text" id="nama_anggota" class="form-control" value="<?= $row['nama_anggota']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <div class="form-group">
                                                <label class="fs-6 fw-bold" for="nama_petugas">Petugas</label>
                                                <input type="text" id="nama_petugas" class="form-control" value="<?= $row['nama_petugas']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div class="form-group">
                                                <label class="fs-6 fw-bold" for="tgl_pinjam">Tanggal Pinjam</label>
                                                <input type="text" id="tgl_pinjam" class="form-control" value="<?= $row['tgl_pinjam']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5 mb-2">
                                            <div class="form-group">
                                                <label class="fs-6 fw-bold" for="kode_buku">Kode Buku</label>
                                                <input type="text" id="kode_buku" class="form-control" value="<?= $row['kode_buku']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <div class="form-group">
                                                <label class="fs-6 fw-bold" for="judul_buku">Judul Buku</label>
                                                <input type="text" id="judul_buku" class="form-control" value="<?= $row['judul_buku']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-2 mb-2">
                                            <div class="form-group">
                                                <label class="fs-6 fw-bold" for="jumlah">Jumlah</label>
                                                <input type="text" id="jumlah" name="jumlah" class="form-control" value="<?= $row['jumlah']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-success">Kembalikan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- End Modal Form Pengembalian -->

    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/feather-icons/feather.min.js"></script>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>