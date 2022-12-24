<?php
require_once '../database.php';
$db = new database();

$aksi = $_GET["aksi"];
if ($aksi == "ubahPinjam") {

    // mengambil data pinjam sesuai id yg dikirimkan
    $pinjam = $db->dataPinjamById($_POST['id_pinjam']);

    // kondisi jika peminjaman di update
    if ($_POST['id_buku'] !== $pinjam['id_buku']) {

        // mengambil data buku sesuai id yg di kirimkan
        $dataBuku = $db->dataBukuById($_POST['id_buku']);

        // mengambil stok buku
        $stok = $dataBuku['stok'];

        // dan membuat stok baru
        $stokBaru = $stok - $_POST['jumlah'];

        // dan untuk buku yg telah dipilih di awal stoknya akan kembali lg
        // mengambil data buku lama sesuai id yg di kirimkan
        $bukuLama = $db->dataBukuById($_POST['bukuLama']);

        // mengambil stok
        $stokL = $bukuLama['stok'];

        // membuat stok lama
        $stokLama = $stokL + $_POST['jumlah'];

        // menjalankan function update stok lama
        $db->updateStokLama($stokLama, $_POST['bukuLama']);
    } else {

        // dan ketika buku tidak diupdate 
        // buku diisi dengan data buku yg lama
        $dataBuku = $db->dataBukuById($_POST['bukuLama']);
        $stokBaru = $dataBuku['stok'];
    }

    // jalankan function update
    $db->updatePinjam(
        $_POST['id_pinjam'],
        htmlspecialchars($_POST["kode_pinjam"]),
        htmlspecialchars($_POST["tgl_pinjam"]),
        htmlspecialchars($_POST["id_buku"]),
        htmlspecialchars($_POST["jumlah"]),
        htmlspecialchars($_POST["id_anggota"]),
        htmlspecialchars($_POST["id_petugas"]),
        $stokBaru
    );

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'diubah');
    header('Location: dataTransaksi.php');
} else if ($aksi == "ubahKembali") {

    // jalankan function update
    $db->updateKembali(
        $_POST['id_kembali'],
        htmlspecialchars($_POST["tgl_kembali"]),
        htmlspecialchars($_POST["id_buku"]),
        htmlspecialchars($_POST["id_anggota"]),
        htmlspecialchars($_POST["id_petugas"])

    );

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'diubah');
    header('Location: dataTransaksi.php');
} else if ($aksi == "hapusPinjam") {

    // mengambil data id buku 
    $idBuku = $_GET['buku'];

    // dan menambahkan stok buku jika buku di hapus
    $dataBuku = $db->dataBukuById($idBuku);
    $stok = $dataBuku['stok'] + 1;

    // menangkap id
    $id = $_GET["id"];

    // menjalankan function delete
    $db->deletePinjam($id, $idBuku, $stok);

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'dihapus');
    header('location: dataTransaksi.php');
} else if ($aksi == "hapusKembali") {

    // menangkap id
    $id = $_GET["id"];

    // menjalankan function delete
    $db->deleteKembali($id);

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'dihapus');
    header('location: dataTransaksi.php');
} else {
    echo "Database anda eror, silahkan proses kembali lg <a href='dataProdi.php?'>Klik disini</a>";
}
