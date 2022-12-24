<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['nama'])) {
    header('Location: ../index.php');
}
?>
<!-- sidebar -->
<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header text-center align-items-center justify-content-center">
            <i class="fa-solid fa-fw fa-book-open-reader"></i>
            <h2>Perpustakaan</h2>
            <h6>Universitas CIC</h6>
        </div>

        <!-- sidebar menu -->
        <div class="sidebar-menu">
            <ul class="menu">

                <li class='sidebar-title'>Dashboard</li>

                <li class="sidebar-item">

                    <a href="index.php" class='sidebar-link'>
                        <i class="fas fa-fw fa-home"></i>
                        <span>Dashboard</span>
                    </a>

                </li>

                <li class='sidebar-title'>Profile</li>

                <li class="sidebar-item">

                    <a href="profile.php" class='sidebar-link'>
                        <i class="fa-solid fa-fw fa-id-badge"></i>
                        <span>MyProfile</span>
                    </a>

                </li>


                <li class='sidebar-title'><?= $_SESSION['role']; ?></li>

                <li class="sidebar-item has-sub">

                    <a href="" class='sidebar-link'>
                        <i class="fa-solid fa-fw fa-database"></i>
                        <span>Data Master</span>
                    </a>

                    <ul class="submenu">

                        <li>
                            <a href="dataAnggota.php"><i class="fas fa-fw fa-users"></i> Anggota</a>
                        </li>

                        <li>
                            <a href="dataPetugas.php"><i class="fas fa-fw fa-user-tie"></i> Petugas</a>
                        </li>

                        <li>
                            <a href="dataProdi.php"><i class="fas fa-fw fa-book-open-reader"></i> Prodi</a>
                        </li>

                    </ul>

                </li>

                <li class="sidebar-item has-sub">

                    <a href="" class='sidebar-link'>
                        <i class="fa-solid fa-fw fa-book-open"></i>
                        <span>Katalog Buku</span>
                    </a>

                    <ul class="submenu">

                        <li>
                            <a href="dataBuku.php"><i class="fas fa-fw fa-book"></i> Data Buku</a>
                        </li>

                        <li>
                            <a href="dataKategori.php"><i class="fa-solid fa-fw fa-book-open"></i> Kategori</a>
                        </li>

                    </ul>

                </li>

                <li class="sidebar-item">

                    <a href="dataTransaksi.php" class='sidebar-link'>
                        <i class="fas fa-fw fa-table-columns"></i>
                        <span>Transaksi</span>
                    </a>

                </li>

                <li class="sidebar-item">

                    <a href="laporan.php" class='sidebar-link'>
                        <i class="fa-regular fa-fw fa-file-lines"></i>
                        <span>Laporan</span>
                    </a>

                </li>

            </ul>
        </div>
        <!-- end sidebar menu -->

        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
<!-- end sidebar -->

<div id="main">

    <!-- navbar -->
    <nav class="navbar navbar-header navbar-expand navbar-light">
        <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
        <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                <li class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <div class="avatar me-1">
                            <img src="../assets/images/petugas/<?= $_SESSION['foto']; ?>">
                        </div>
                        <div class="d-none d-md-block d-lg-inline-block"><?= $_SESSION['nama']; ?> | <?= $_SESSION['role']; ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="../prosesLogin.php?aksi=logout"><i data-feather="log-out"></i> Logout</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end navbar -->