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

                <li class='sidebar-title'>Profile</li>

                <li class="sidebar-item">

                    <a href="index.php" class='sidebar-link'>
                        <i class="fa-solid fa-fw fa-id-badge"></i>
                        <span>MyProfile</span>
                    </a>

                </li>

                <li class='sidebar-title'>Data Master</li>


                <li class="sidebar-item">

                    <a href="dataAnggota.php" class='sidebar-link'>
                        <i class="fas fa-fw fa-users"></i>
                        <span>Anggota</span>
                    </a>

                </li>

                <li class="sidebar-item">

                    <a href="dataBuku.php" class='sidebar-link'>
                        <i class="fas fa-fw fa-book"></i>
                        <span>Buku</span>
                    </a>

                </li>

                <li class='sidebar-title'>Transaksi</li>

                <li class="sidebar-item">

                    <a href="peminjaman.php" class='sidebar-link'>
                        <i class="fa-solid fa-fw fa-arrow-up"></i>
                        <span>Peminjaman</span>
                    </a>

                </li>

                <li class="sidebar-item">

                    <a href="pengembalian.php" class='sidebar-link'>
                        <i class="fa-solid fa-fw fa-arrow-down"></i>
                        <span>Pengembalian</span>
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
                            <img src="../assets/images/petugas/<?= $_SESSION['foto']; ?>" alt="" srcset="">
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