<?php
require_once '../database.php';
$db = new database();

$aksi = $_GET["aksi"];
if ($aksi == "tambah") {

    // upload foto
    $foto = $_FILES["foto"]["name"];
    $file_tmp = $_FILES["foto"]["tmp_name"];
    $rand = rand(1, 9999);
    $fotoBaru = $rand . "-" . $foto;
    $folder = "img/";

    move_uploaded_file($file_tmp, $folder . $fotoBaru);

    // jalankan function insert
    $db->insertAnggota(
        htmlspecialchars($_POST["nim_anggota"]),
        htmlspecialchars($_POST["nama_anggota"]),
        htmlspecialchars($_POST["jenis_kelamin"]),
        htmlspecialchars($_POST["id_prodi"]),
        htmlspecialchars($_POST["semester"]),
        htmlspecialchars($_POST["email"]),
        htmlspecialchars($_POST["no_hp"]),
        htmlspecialchars($_POST["alamat"]),
        $fotoBaru
    );

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'ditambahkan');
    header('Location: dataAnggota.php');
} else if ($aksi == "ubah") {

    // kondisi update foto
    if ($_FILES['foto']['error'] === 4) {

        // jika foto tidak di ubah maka menggunakan foto yg lama
        $fotoBaru = $_POST['fotoLama'];
    } else {

        // jika foto diupdate maka upload foto lg
        $foto = $_FILES["foto"]["name"];
        $file_tmp = $_FILES["foto"]["tmp_name"];
        $rand = rand(1, 9999);
        $fotoBaru = $rand . "-" . $foto;
        $folder = "img/";

        move_uploaded_file($file_tmp, $folder . $fotoBaru);
    }

    // jalankan function update
    $db->updateAnggota(
        $_POST['id_anggota'],
        htmlspecialchars($_POST["nim_anggota"]),
        htmlspecialchars($_POST["nama_anggota"]),
        htmlspecialchars($_POST["jenis_kelamin"]),
        htmlspecialchars($_POST["id_prodi"]),
        htmlspecialchars($_POST["semester"]),
        htmlspecialchars($_POST["email"]),
        htmlspecialchars($_POST["no_hp"]),
        htmlspecialchars($_POST["alamat"]),
        $fotoBaru
    );

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'diubah');
    header('Location: dataAnggota.php');
} else if ($aksi == "hapus") {

    // menangkap id
    $id = $_GET["id"];

    // jalankan function delete
    $db->deleteAnggota($id);

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'dihapus');
    header('location: dataAnggota.php');
} else {
    echo "Database anda eror, silahkan proses kembali lg <a href='dataAnggota.php?'>Klik disini</a>";
}
