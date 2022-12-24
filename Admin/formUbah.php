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
        <?php
        function Anggota()
        {
            $db = new database;
            $id = $_GET['id'];
            $data = $db->dataAnggotaById($id);
            $dataProdi = $db->dataProdi();
        ?>
            <!-- cotent -->
            <div class="main-content container-fluid">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height mt-0">
                        <div class="col-md-12 col-12">
                            <h1 class="mb-4">
                                <i class="fa-solid fa-fw fa-pen-to-square"></i>
                                Ubah Anggota
                            </h1>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body px-5 pt-5">
                                        <form method="POST" action="<?= 'prosesAnggota.php?aksi=ubah'; ?>" class="form form-horizontal" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    <input type="hidden" name="id_anggota" value="<?= $data['id_anggota']; ?>">
                                                    <input type="hidden" name="fotoLama" value="<?= $data['foto']; ?>">
                                                    <div class="col-md-2">
                                                        <label for="nim">
                                                            <h5>Nim</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="nim" name="nim_anggota" value="<?= $data['nim_anggota']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="nama">
                                                            <h5>Nama Lengkap</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="nama" name="nama_anggota" value="<?= $data['nama_anggota']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="jk">
                                                            <h5>Jenis Kelamin</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select class="form-select" id="jk" name="jenis_kelamin">
                                                            <option value="Laki-laki" <?php if ($data['jenis_kelamin'] == "Laki-laki") {
                                                                                            echo 'selected';
                                                                                        } ?>>Laki-laki</option>
                                                            <option value="Perempuan" <?php if ($data['jenis_kelamin'] == "Perempuan") {
                                                                                            echo 'selected';
                                                                                        } ?>>Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="prodi">
                                                            <h5>Prodi</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <select class="form-select" id="prodi" name="id_prodi">
                                                            <?php
                                                            $prd = $db->dataProdiById($data['id_prodi']);
                                                            ?>
                                                            <option value="<?= $prd['id_prodi']; ?>"><?= $prd['nama']; ?></option>
                                                            <?php foreach ($dataProdi as $row) : ?>
                                                                <option value="<?= $row['id_prodi']; ?>"><?= $row['nama']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="semester">
                                                            <h5>Semester</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <input type="semester" class="form-control" id="semester" name="semester" value="<?= $data['semester']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="email">
                                                            <h5>Email</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="email" class="form-control" id="email" name="email" value="<?= $data['email']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="no_hp">
                                                            <h5>No Telepon</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="no_hp" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="alamat">
                                                            <h5>Alamat</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <textarea class="form-control" id="alamat" name="alamat"><?= $data['alamat']; ?></textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="foto">
                                                            <h5>Foto</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <img src="img/<?= $data['foto']; ?>" width="60">
                                                        <input type="file" class="form-control mt-2" id="foto" name="foto">
                                                    </div>
                                                    <div class="d-grid gap-2 col-7 mt-2 mx-auto">
                                                        <button class="btn btn-success float-end" type="submit">Save</button>
                                                        <a href="dataAnggota.php" class="btn btn-primary">Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php } ?>
        <!-- end content -->

        <?php function Buku()
        {
            $db = new database;
            $id = $_GET['id'];
            $data = $db->dataBukuById($id);
            $dataKategori = $db->dataKategori();
        ?>
            <!-- cotent -->
            <div class="main-content container-fluid">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height mt-0">
                        <div class="col-md-12 col-12">
                            <h1 class="mb-4">
                                <i class="fa-solid fa-fw fa-pen-to-square"></i>
                                Ubah Buku
                            </h1>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body px-5 pt-5">
                                        <form method="POST" action="<?= 'prosesBuku.php?aksi=ubah'; ?>" class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <input type="hidden" name="id_buku" value="<?= $data['id_buku']; ?>">
                                                    <div class="col-md-2">
                                                        <label for="kode">
                                                            <h5>Kode Buku</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="kode" name="kode_buku" value="<?= $data['kode_buku']; ?>" readonly>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="kategori">
                                                            <h5>Jenis Buku</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select class="form-select" id="kategori" name="id_kategori">
                                                            <?php
                                                            $ktgr = $db->dataKategoriById($data['id_kategori']);
                                                            ?>
                                                            <option value="<?= $ktgr['id_kategori']; ?>"><?= $ktgr['nama_kategori']; ?></option>
                                                            <?php foreach ($dataKategori as $row) : ?>
                                                                <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="judul">
                                                            <h5>Judul Buku</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="judul" name="judul_buku" value="<?= $data['judul_buku']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="penulis">
                                                            <h5>Penulis Buku</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="penulis" name="penulis_buku" value="<?= $data['penulis_buku']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="penerbit">
                                                            <h5>Penerbit Buku</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="penerbit" name="penerbit_buku" value="<?= $data['penerbit_buku']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="tahun">
                                                            <h5>Tahun Terbit</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="tahun" class="form-control" id="tahun" name="tahun_terbit" value="<?= $data['tahun_terbit']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="stok">
                                                            <h5>Jumlah Stok</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="stok" class="form-control" id="stok" name="stok" value="<?= $data['stok']; ?>">
                                                    </div>
                                                    <div class="d-grid gap-2 col-7 mt-2 mx-auto">
                                                        <button class="btn btn-success float-end" type="submit">Save</button>
                                                        <a href="dataBuku.php" class="btn btn-primary">Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php } ?>
        <!-- end content -->

        <?php function Petugas()
        {
            $db = new database;
            $id = $_GET['id'];
            $data = $db->dataPetugasById($id);
        ?>
            <!-- cotent -->
            <div class="main-content container-fluid">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height mt-0">
                        <div class="col-md-12 col-12">
                            <h1 class="mb-4">
                                <i class="fa-solid fa-fw fa-pen-to-square"></i>
                                Ubah Petugas
                            </h1>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body px-5 pt-5">
                                        <form method="POST" action="<?= 'prosesPetugas.php?aksi=ubah'; ?>" class="form form-horizontal" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    <input type="hidden" name="id_petugas" value="<?= $data['id_petugas']; ?>">
                                                    <input type="hidden" name="fotoLama" value="<?= $data['foto']; ?>">
                                                    <div class="col-md-2">
                                                        <label for="nama">
                                                            <h5>Nama Lengkap</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="nama" name="nama_petugas" value="<?= $data['nama_petugas']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="jabatan">
                                                            <h5>Jabatan</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="jabatan" name="jabatan_petugas" value="<?= $data['jabatan_petugas']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="email">
                                                            <h5>Email</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="email" class="form-control" id="email" name="email" value="<?= $data['email']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="no_telp">
                                                            <h5>No Telepon</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="no_telp" class="form-control" id="no_telp" name="no_telp" value="<?= $data['no_telp']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="foto">
                                                            <h5>Foto</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <img src="../assets/images/petugas/<?= $data['foto']; ?>" width="60">
                                                        <input type="file" class="form-control mt-2" id="foto" name="foto">
                                                    </div>
                                                    <div class="d-grid gap-2 col-7 mt-2 mx-auto">
                                                        <button class="btn btn-success float-end" type="submit">Save</button>
                                                        <a href="dataPetugas.php" class="btn btn-primary">Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php } ?>
        <!-- end content -->

        <?php function Kategori()
        {
            $db = new database;
            $id = $_GET['id'];
            $data = $db->dataKategoriById($id);
        ?>
            <!-- cotent -->
            <div class="main-content container-fluid">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height mt-0">
                        <div class="col-md-12 col-12">
                            <h1 class="mb-4">
                                <i class="fa-solid fa-fw fa-pen-to-square"></i>
                                Ubah Kategori
                            </h1>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body px-5 pt-5">
                                        <form method="POST" action="<?= 'prosesKategori.php?aksi=ubah'; ?>" class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <input type="hidden" name="id_kategori" value="<?= $data['id_kategori']; ?>">
                                                    <div class="col-md-2">
                                                        <label for="kategori">
                                                            <h5>Kategori Buku</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="kategori" name="nama_kategori" value="<?= $data['nama_kategori']; ?>">
                                                    </div>
                                                    <div class="d-grid gap-2 col-7 mt-2 mx-auto">
                                                        <button class="btn btn-success float-end" type="submit">Save</button>
                                                        <a href="dataKategori.php" class="btn btn-primary">Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php } ?>
        <!-- end content -->


        <?php function Prodi()
        {
            $db = new database;
            $id = $_GET['id'];
            $data = $db->dataProdiById($id);
        ?>
            <!-- cotent -->
            <div class="main-content container-fluid">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height mt-0">
                        <div class="col-md-12 col-12">
                            <h1 class="mb-4">
                                <i class="fa-solid fa-fw fa-pen-to-square"></i>
                                Ubah Prodi
                            </h1>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body px-5 pt-5">
                                        <form method="POST" action="<?= 'prosesProdi.php?aksi=ubah'; ?>" class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <input type="hidden" name="id_prodi" value="<?= $data['id_prodi']; ?>">
                                                    <div class="col-md-2">
                                                        <label for="nama">
                                                            <h5>Prodi</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="kaprodi">
                                                            <h5>Nama Ketua</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="kaprodi" name="kaprodi" value="<?= $data['kaprodi']; ?>">
                                                    </div>
                                                    <div class="d-grid gap-2 col-7 mt-2 mx-auto">
                                                        <button class="btn btn-success float-end" type="submit">Save</button>
                                                        <a href="dataProdi.php" class="btn btn-primary">Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php } ?>
        <!-- end content -->


        <?php function Pinjam()
        {
            $db = new database;
            $id = $_GET['id'];
            $data = $db->dataPinjamById($id);
            $dataAnggota = $db->dataAnggota();
            $dataBuku = $db->dataBuku();
            $dataPetugas = $db->dataPetugas();
        ?>
            <!-- cotent -->
            <div class="main-content container-fluid">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height mt-0">
                        <div class="col-md-12 col-12">
                            <h1 class="mb-4">
                                <i class="fa-solid fa-fw fa-pen-to-square"></i>
                                Ubah Data
                            </h1>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body px-5 pt-5">
                                        <form method="POST" action="<?= 'prosesTransaksi.php?aksi=ubahPinjam'; ?>" class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <input type="hidden" name="id_pinjam" value="<?= $data['id_pinjam']; ?>">
                                                    <div class="col-md-2">
                                                        <label for="kode_pinjam">
                                                            <h5>Kode Pinjam</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="kode_pinjam" name="kode_pinjam" value="<?= $data['kode_pinjam']; ?>" readonly>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="nama">
                                                            <h5>Anggota</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select class="form-select" id="nama" name="id_anggota">
                                                            <?php
                                                            $aggt = $db->dataAnggotaById($data['id_anggota']);
                                                            ?>
                                                            <option value="<?= $aggt['id_anggota']; ?>"><?= $aggt['nama_anggota']; ?></option>
                                                            <?php foreach ($dataAnggota as $row) : ?>
                                                                <option value="<?= $row['id_anggota']; ?>"><?= $row['nama_anggota']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="buku">
                                                            <h5>Buku</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <input type="text" class="form-control" name="bukuLama" value="<?= $data['id_buku']; ?>" readonly>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select class="form-select" id="buku" name="id_buku">
                                                            <option value="0" disabled selected>- Pilih Buku Baru -</option>
                                                            <?php foreach ($dataBuku as $row) : ?>
                                                                <option value="<?= $row['id_buku']; ?>"><?= $row['judul_buku']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="petugas">
                                                            <h5>Petugas</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select class="form-select" id="petugas" name="id_petugas">
                                                            <?php
                                                            $ptgs = $db->dataPetugasById($data['id_petugas']);
                                                            ?>
                                                            <option value="<?= $ptgs['id_petugas']; ?>"><?= $ptgs['nama_petugas']; ?></option>
                                                            <?php foreach ($dataPetugas as $row) : ?>
                                                                <option value="<?= $row['id_petugas']; ?>"><?= $row['nama_petugas']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="tgl">
                                                            <h5>Tanggal Pinjam</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="date" class="form-control" id="tgl" name="tgl_pinjam" value="<?= $data['tgl_pinjam']; ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="jumlah">
                                                            <h5>Jumlah Buku</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $data['jumlah']; ?>" readonly>
                                                    </div>
                                                    <div class="d-grid gap-2 col-7 mt-2 mx-auto">
                                                        <button class="btn btn-success float-end" type="submit">Save</button>
                                                        <a href="dataTransaksi.php" class="btn btn-primary">Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php } ?>
        <!-- end content -->

        <?php function Kembali()
        {
            $db = new database;
            $id = $_GET['id'];
            $data = $db->dataKembaliById($id);
            $dataAnggota = $db->dataAnggota();
            $dataBuku = $db->dataBuku();
            $dataPetugas = $db->dataPetugas();
        ?>
            <!-- cotent -->
            <div class="main-content container-fluid">
                <section id="basic-horizontal-layouts">
                    <div class="row match-height mt-0">
                        <div class="col-md-12 col-12">
                            <h1 class="mb-4">
                                <i class="fa-solid fa-fw fa-pen-to-square"></i>
                                Ubah Data
                            </h1>
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body px-5 pt-5">
                                        <form method="POST" action="<?= 'prosesTransaksi.php?aksi=ubahKembali'; ?>" class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <input type="hidden" name="id_kembali" value="<?= $data['id_kembali']; ?>">
                                                    <div class="col-md-2">
                                                        <label for="nama">
                                                            <h5>Anggota</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select class="form-select" id="nama" name="id_anggota">
                                                            <?php
                                                            $aggt = $db->dataAnggotaById($data['id_anggota']);
                                                            ?>
                                                            <option value="<?= $aggt['id_anggota']; ?>"><?= $aggt['nama_anggota']; ?></option>
                                                            <?php foreach ($dataAnggota as $row) : ?>
                                                                <option value="<?= $row['id_anggota']; ?>"><?= $row['nama_anggota']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="buku">
                                                            <h5>Buku</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <select class="form-select" id="buku" name="id_buku">
                                                            <?php
                                                            $buku = $db->dataBukuById($data['id_buku']);
                                                            ?>
                                                            <option value="<?= $buku['id_buku']; ?>"><?= $buku['judul_buku']; ?></option>
                                                            <?php foreach ($dataBuku as $row) : ?>
                                                                <option value="<?= $row['id_buku']; ?>"><?= $row['judul_buku']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="petugas">
                                                            <h5>Petugas</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <?php
                                                        $ptgs = $db->dataPetugasById($data['id_petugas']);
                                                        ?>
                                                        <select class="form-select" id="petugas" name="id_petugas">
                                                            <option value="<?= $ptgs['id_petugas']; ?>"><?= $ptgs['nama_petugas']; ?></option>
                                                            <?php foreach ($dataPetugas as $row) : ?>
                                                                <option value="<?= $row['id_petugas']; ?>"><?= $row['nama_petugas']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="tgl">
                                                            <h5>Tanggal Kembali</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-10 form-group">
                                                        <input type="date" class="form-control" id="tgl" name="tgl_kembali" value="<?= $data['tgl_kembali']; ?>">
                                                    </div>
                                                    <div class="d-grid gap-2 col-7 mt-2 mx-auto">
                                                        <button class="btn btn-success float-end" type="submit">Save</button>
                                                        <a href="dataTransaksi.php" class="btn btn-primary">Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php } ?>
        <!-- end content -->

        <?php
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $aksi = $_GET['aksi'];
        if ($aksi == "anggota") {
            Anggota();
        } elseif ($aksi == "buku") {
            Buku();
        } elseif ($aksi == "petugas") {
            Petugas();
        } elseif ($aksi == "kategori") {
            Kategori();
        } elseif ($aksi == "prodi") {
            Prodi();
        } elseif ($aksi == "pinjam") {
            Pinjam();
        } elseif ($aksi == "kembali") {
            Kembali();
        } else {
            echo "Error!";
        }
        ?>

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