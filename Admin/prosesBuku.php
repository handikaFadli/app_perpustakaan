<?php
require_once '../database.php';
$db = new database();

$aksi = $_GET["aksi"];
if ($aksi == "tambah") {

    // jalankan function insert
    $db->insertBuku(
        htmlspecialchars($_POST["kode_buku"]),
        htmlspecialchars($_POST["id_kategori"]),
        htmlspecialchars($_POST["judul_buku"]),
        htmlspecialchars($_POST["penulis_buku"]),
        htmlspecialchars($_POST["penerbit_buku"]),
        htmlspecialchars($_POST["tahun_terbit"]),
        htmlspecialchars($_POST["stok"])
    );

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'ditambahkan');
    header('Location: dataBuku.php');
} else if ($aksi == "ubah") {

    // jalankan function update
    $db->updateBuku(
        $_POST['id_buku'],
        htmlspecialchars($_POST["kode_buku"]),
        htmlspecialchars($_POST["id_kategori"]),
        htmlspecialchars($_POST["judul_buku"]),
        htmlspecialchars($_POST["penulis_buku"]),
        htmlspecialchars($_POST["penerbit_buku"]),
        htmlspecialchars($_POST["tahun_terbit"]),
        htmlspecialchars($_POST["stok"])
    );

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'diubah');
    header('Location: dataBuku.php');
} else if ($aksi == "delete") {

    // menangkap id
    $id = $_GET["id"];

    // jalankan function delete
    $db->deleteBuku($id);

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'dihapus');
    header('location: dataBuku.php');
} else {
    echo "Database anda eror, silahkan proses kembali lg <a href='dataBuku.php?'>Klik disini</a>";
}
