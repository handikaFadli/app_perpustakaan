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
                    <i class="fas fa-fw fa-table-columns"></i>
                    Transaksi
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
                                            <a href="<?= "formUbah.php?aksi=pinjam&&id=$row[id_pinjam]"; ?>" class="badge bg-primary"><i class="fa-solid fa-fw fa-pencil"></i></a>
                                            <a href="<?= "prosesTransaksi.php?&&aksi=hapusPinjam&&id=$row[id_pinjam]&&buku=$row[id_buku]"; ?>" class="badge bg-danger" onclick="javascript: return confirm('Apakah anda yakin ingin dihapus?')"><i class="fa-solid fa-fw fa-trash"></i></a>
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
                                    <th>Action</th>
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
                                        <td>
                                            <a href="<?= "formUbah.php?aksi=kembali&&id=$row[id_kembali]"; ?>" class="badge bg-primary"><i class="fa-solid fa-fw fa-pencil"></i></a>
                                            <a href="<?= "prosesTransaksi.php?&&aksi=hapusKembali&&id=$row[id_kembali]"; ?>" class="badge bg-danger" onclick="javascript: return confirm('Apakah anda yakin ingin dihapus?')"><i class="fa-solid fa-fw fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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