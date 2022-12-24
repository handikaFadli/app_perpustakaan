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
$dataBuku = $db->dataBuku();
$dataPetugas = $db->dataPetugas();
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
            </div>
            <h1 class="mb-4">
                <i class="fa-solid fa-fw fa-arrow-up"></i>
                Peminjaman
            </h1>
            <div class="card">
                <h5 class="card-header mb-2">
                    Masukkan Data Peminjaman
                </h5>
                <div class="card-body">
                    <form method="post" action="<?= 'proses.php?aksi=pinjam'; ?>">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <?php
                                $data = $db->kodeOtomatis('id_pinjam', 'peminjaman');
                                $kode = $data['kodeTerbesar'];
                                $kode++;
                                $kodePinjam = 'PNJM' . sprintf("%03s", $kode);
                                ?>
                                <label for="kode" class="form-label">Kode Peminjaman</label>
                                <input type="text" id="kode" name="kode_pinjam" class="form-control" value="<?= $kodePinjam; ?>" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="nama" class="form-label">Nama Anggota</label>
                                <select id="nama" name="id_anggota" class="form-control">
                                    <option value="0" selected disabled>- Pilih Anggota -</option>
                                    <?php foreach ($dataAnggota as $row) : ?>
                                        <option value="<?= $row['id_anggota']; ?>"><?= $row['nama_anggota']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6 mb-3">
                                <label for="petugas" class="form-label">Nama Petugas</label>
                                <select id="petugas" name="id_petugas" class="form-control">
                                    <option value="<?= $_SESSION['id']; ?>"><?= $_SESSION['nama']; ?></option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="tanggal" class="form-label">Tanggal Peminjaman</label>
                                <input type="text" id="tanggal" name="tgl_pinjam" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
                            </div>
                        </div>

                        <hr>

                        <div class="row mt-4">
                            <div class="col-3 mb-3">
                                <label class="form-label">Kode Buku</label>
                                <select id="id_buku" name="id_buku" class="form-control" onchange="changeValue(this.value)">
                                    <option value="0" disabled selected>Pilih</option>
                                    <?php
                                    $jsArray = "var prdName = new Array();\n";
                                    foreach ($dataBuku as $row) {
                                    ?>
                                        <option value="<?= $row["id_buku"]; ?>"><?= $row["kode_buku"]; ?></option>
                                    <?php
                                        $jsArray .= "prdName['" . $row['id_buku'] . "'] = {
                                    judul_buku : '" . addslashes($row['judul_buku']) . "',
                                    penulis_buku : '" . addslashes($row['penulis_buku']) . "'
                                    };\n";
                                    } ?>
                                </select>
                            </div>
                            <div class="col-3 mb-3">
                                <label for="judul_buku" class="form-label">Judul Buku</label>
                                <input type="text" id="judul_buku" class="form-control" readonly>
                            </div>
                            <div class="col-3 mb-3">
                                <label for="penulis_buku" class="form-label">Penulis Buku</label>
                                <input type="text" id="penulis_buku" class="form-control" readonly>
                            </div>
                            <div class="col-3 mb-3">
                                <label for="jumlah" class="form-label">Jumlah Buku</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control" value="1" readonly>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-5 mt-3 mx-auto">
                            <button class="btn btn-success" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- end content -->

    </div>


    <script type="text/javascript">
        <?= $jsArray; ?>

        function changeValue(x) {
            document.getElementById('judul_buku').value = prdName[x].judul_buku;
            document.getElementById('penulis_buku').value = prdName[x].penulis_buku;
        }
    </script>
    <script src="../assets/js/feather-icons/feather.min.js"></script>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>