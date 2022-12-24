<?php
require_once '../database.php';
$db = new database();

$aksi = $_GET["aksi"];
if ($aksi == "tambah") {

    // jalankan function insert
    $db->insertProdi(
        htmlspecialchars($_POST["nama"]),
        htmlspecialchars($_POST["kaprodi"])
    );

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'ditambahkan');
    header('Location: dataProdi.php');
} else if ($aksi == "ubah") {

    // jalankan function update
    $db->updateProdi(
        $_POST['id_prodi'],
        htmlspecialchars($_POST["nama"]),
        htmlspecialchars($_POST["kaprodi"])
    );

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'diubah');
    header('Location: dataProdi.php');
} else if ($aksi == "delete") {

    // menangkap id
    $id = $_GET["id"];

    // jalankan function delete
    $db->deleteProdi($id);

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'dihapus');
    header('location: dataProdi.php');
} else {
    echo "Database anda eror, silahkan proses kembali lg <a href='dataProdi.php?'>Klik disini</a>";
}
