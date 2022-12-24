<?php
require_once '../database.php';
$db = new database();

$aksi = $_GET["aksi"];
if ($aksi == "tambah") {

    // jalankan function insert
    $db->insertKategori(
        htmlspecialchars($_POST["nama_kategori"])
    );

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'ditambahkan');
    header('Location: dataKategori.php');
} else if ($aksi == "ubah") {

    // jalankan function update
    $db->updateKategori(
        $_POST['id_kategori'],
        htmlspecialchars($_POST["nama_kategori"])
    );

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'diubah');
    header('Location: dataKategori.php');
} else if ($aksi == "delete") {

    // menangkap id
    $id = $_GET["id"];

    // jalankan function delete
    $db->deleteKategori($id);

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'dihapus');
    header('location: dataKategori.php');
} else {
    echo "Database anda eror, silahkan proses kembali lg <a href='dataKategori.php?'>Klik disini</a>";
}
