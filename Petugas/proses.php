<?php
require_once '../database.php';
$db = new database();

$aksi = $_GET["aksi"];
if ($aksi == "pinjam") {

    // mengambil data buku sesuai dengan id yg di kirimkan
    $dataBuku = $db->dataBukuById($_POST['id_buku']);

    // dan perbarui stok
    $stok = $dataBuku['stok'];
    $jumlahStok = $stok - $_POST['jumlah'];

    // menjalankan function insert
    $db->insertPinjam(
        htmlspecialchars($_POST['kode_pinjam']),
        htmlspecialchars($_POST['tgl_pinjam']),
        htmlspecialchars($_POST['id_buku']),
        htmlspecialchars($_POST['jumlah']),
        htmlspecialchars($_POST['id_anggota']),
        htmlspecialchars($_POST['id_petugas']),
        $jumlahStok
    );

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'ditambahkan');
    header('Location: peminjaman.php');
} elseif ($aksi == "kembali") {

    // jalankan function insert
    $db->insertKembali(
        htmlspecialchars($_POST['tgl_kembali']),
        htmlspecialchars($_POST['id_buku']),
        htmlspecialchars($_POST['id_anggota']),
        htmlspecialchars($_POST['id_petugas'])
    );

    // perbarui stok
    $dataBuku = $db->dataBukuById($_POST['id_buku']);
    $stok = $dataBuku['stok'];
    $jumlahStok = $stok + $_POST['jumlah'];

    // jalankan function delete
    $db->deletePinjam($_POST['id_pinjam'], $_POST['id_buku'], $jumlahStok);

    // jalankan function untuk menampilkan alert
    $db->setFlash(' berhasil ', 'dikemablikan');
    header('Location: pengembalian.php');
} else {
    echo "Database anda eror, silahkan proses kembali lg <a href='dataPetugas.php?'>Klik disini</a>";
}
