<?php
require_once '../database.php';
class menu
{
    function __construct()
    {
        require_once 'menu.php';
    }
}
$menu = new menu;
$db = new database();
$id = $_GET['id'];
$data = $db->dataAnggotaById($id);
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
            <div class="card border-primary mb-3" style="max-width: 640px;">
                <div class="card-header">
                    <h2><i class="fa-solid fa-fw fa-id-badge"></i> Profile Anggota</h2>
                </div>
                <div class="row g-0">
                    <div class="col-md-4 mb-3">
                        <img src="img/<?= $data['foto']; ?>" class="img-thumbnail mx-3">
                    </div>
                    <div class="col-md-8 mb-3">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $data['nama_anggota'] . ' | ' . $data['nim_anggota']; ?></h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Jenis Kelamin : <?= $data["jenis_kelamin"]; ?></li>
                                <li class="list-group-item">Email : <?= $data["email"]; ?></li>
                                <li class="list-group-item">No Handphone : <?= $data["no_hp"]; ?></li>
                                <li class="list-group-item">Alamat : <?= $data["alamat"]; ?></li>
                                <?php if ($data['id_prodi'] == '1') : ?>
                                    <li class="list-group-item">Prodi : Teknik Informatika Semester <?= $data["semester"]; ?></li>
                                <?php elseif ($data['id_prodi'] == '2') : ?>
                                    <li class="list-group-item">Prodi : Desain Komunikasi Visual Semester <?= $data["semester"]; ?></li>
                                <?php elseif ($data['id_prodi'] == '3') : ?>
                                    <li class="list-group-item">Prodi : Manajemen Semester <?= $data["semester"]; ?></li>
                                <?php elseif ($data['id_prodi'] == '4') : ?>
                                    <li class="list-group-item">Prodi : Sistem Informasi Semester <?= $data["semester"]; ?></li>
                                <?php elseif ($data['id_prodi'] == '5') : ?>
                                    <li class="list-group-item">Prodi : Akutansi Semester <?= $data["semester"]; ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="card-body">
                            <a href="dataAnggota.php" class="card-link text-decoration-none text-black-50">Back</a>
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