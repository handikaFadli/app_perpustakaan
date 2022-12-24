<?php
require_once '../database.php';
$db = new database();

$aksi = $_GET["aksi"];
if ($aksi == "ubah") {

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
        $folder = "../assets/images/petugas/";

        move_uploaded_file($file_tmp, $folder . $fotoBaru);
    }

    // jalankan function update
    $db->updatePetugas(
        $_POST['id_petugas'],
        htmlspecialchars($_POST["nama_petugas"]),
        htmlspecialchars($_POST["jabatan_petugas"]),
        htmlspecialchars($_POST["email"]),
        htmlspecialchars($_POST["no_telp"]),
        $fotoBaru
    );

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'diubah');
    header('Location: dataPetugas.php');
} else if ($aksi == "delete") {

    // menangkap id
    $id = $_GET["id"];

    // jalankan function delete
    $db->deletePetugas($id);

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'dihapus');
    header('location: dataPetugas.php');
} else {
    echo "Database anda eror, silahkan proses kembali lg <a href='dataPetugas.php?'>Klik disini</a>";
}
