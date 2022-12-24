<?php
class database
{

    private $host = "localhost";
    private $user = "root";
    private $pas = "";
    private $db = "perpustakaan";
    private $koneksi = "";

    public function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pas, $this->db);
    }


    //--------------------------------Register--------------------------------
    public function register($nama_petugas, $password, $jabatan_petugas, $email, $no_telp, $role, $fotoBaru)
    {
        $result = mysqli_query($this->koneksi, "SELECT email FROM petugas WHERE email='$email'");

        if (mysqli_fetch_assoc($result)) {
            echo "gagal!";
            header('Location: register.php');
        } else {
            mysqli_query($this->koneksi, "INSERT INTO petugas VALUES ('', '$nama_petugas', '$password', '$jabatan_petugas', '$email', '$no_telp', '$role', '$fotoBaru')");
        }
    }

    //--------------------------------Login--------------------------------
    public function login($username, $password)
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM petugas WHERE email='$username'");
        $row = mysqli_num_rows($data);

        if ($row > 0) {
            $login = mysqli_fetch_assoc($data);
            if (password_verify($password, $login['password'])) {
                if ($login['role'] == "Admin") {
                    session_start();
                    $_SESSION['role'] = $login['role'];
                    $_SESSION['id'] = $login['id_petugas'];
                    $_SESSION['nama'] = $login['nama_petugas'];
                    $_SESSION['jabatan'] = $login['jabatan_petugas'];
                    $_SESSION['no_telp'] = $login['no_telp'];
                    $_SESSION['email'] = $login['email'];
                    $_SESSION['foto'] = $login['foto'];

                    echo "<script language = 'JavaScript'>
                    confirm('Login Berhasil');
                    document.location = 'Admin/index.php';
                    </script>";
                } elseif ($login['role'] == "Petugas") {
                    session_start();
                    $_SESSION['role'] = $login['role'];
                    $_SESSION['id'] = $login['id_petugas'];
                    $_SESSION['nama'] = $login['nama_petugas'];
                    $_SESSION['jabatan'] = $login['jabatan_petugas'];
                    $_SESSION['no_telp'] = $login['no_telp'];
                    $_SESSION['email'] = $login['email'];
                    $_SESSION['foto'] = $login['foto'];

                    echo "<script language = 'JavaScript'>
                    confirm('Login Berhasil');
                    document.location = 'Petugas/index.php';
                    </script>";
                } else {
                    echo "data tidak ditemukan";
                }
            } else {
                echo "password salah!";
            }
        } else {
            echo "<script language = 'JavaScript'>
            document.location = 'index.php?pesan=gagal';
            </script>";
        }
    }

    // Flash

    public function setFlash($pesan, $aksi)
    {
        session_start();
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi
        ];
    }

    // Kode Otomatis

    public function kodeOtomatis($id, $tabel)
    {
        $query = mysqli_query($this->koneksi, "SELECT max($id) as kodeTerbesar FROM $tabel");
        return $query->fetch_array();
    }

    // Cetak
    public function cetakPinjam($awal, $akhir)
    {
        $query = mysqli_query($this->koneksi, "SELECT peminjaman.*, buku.*, anggota.*, petugas.* FROM peminjaman JOIN buku ON peminjaman.id_buku = buku.id_buku JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas WHERE peminjaman.tgl_pinjam BETWEEN '$awal' AND '$akhir'");
        while ($row = mysqli_fetch_array($query)) {
            $data[] = $row;
        }

        return $data;
    }

    public function cetakKembali($awal, $akhir)
    {
        $query = mysqli_query($this->koneksi, "SELECT pengembalian.*, buku.*, anggota.*, petugas.* FROM pengembalian JOIN buku ON pengembalian.id_buku = buku.id_buku JOIN anggota ON pengembalian.id_anggota = anggota.id_anggota JOIN petugas ON pengembalian.id_petugas = petugas.id_petugas WHERE pengembalian.tgl_kembali BETWEEN '$awal' AND '$akhir'");
        while ($row = mysqli_fetch_array($query)) {
            $data[] = $row;
        }

        return $data;
    }

    // menghitung data
    public function jumlahData($tabel)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM $tabel");

        return mysqli_num_rows($query);
    }


    //--------------------------------Anggota--------------------------------

    public function dataAnggota()
    {
        if (isset($_POST['cari'])) {
            $cari = $_POST['cari'];
            $query = mysqli_query($this->koneksi, "SELECT anggota.*, prodi.* FROM anggota JOIN prodi ON anggota.id_prodi = prodi.id_prodi WHERE anggota.nama_anggota LIKE '%$cari%' OR anggota.nim_anggota LIKE '%$cari%'");
            while ($row = mysqli_fetch_array($query)) {
                $data[] = $row;
            }

            return $data;
        } else {
            $query = mysqli_query($this->koneksi, "SELECT anggota.*, prodi.* FROM anggota JOIN prodi ON anggota.id_prodi = prodi.id_prodi");
            while ($row = mysqli_fetch_array($query)) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function insertAnggota($nim_anggota, $nama_anggota, $jenis_kelamin, $id_prodi, $semester, $email, $no_hp, $alamat, $fotoBaru)
    {
        mysqli_query($this->koneksi, "INSERT INTO anggota VALUES ('', '$nim_anggota', '$nama_anggota', '$jenis_kelamin', '$id_prodi', '$semester', '$email', '$no_hp', '$alamat', '$fotoBaru')");
    }

    public function dataAnggotaById($id_anggota)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM anggota WHERE id_anggota = '$id_anggota'");

        return $query->fetch_array();
    }

    public function updateAnggota($id_anggota, $nim_anggota, $nama_anggota, $jenis_kelamin, $id_prodi, $semester, $email, $no_hp, $alamat, $foto)
    {
        $query = mysqli_query($this->koneksi, "UPDATE anggota SET nim_anggota='$nim_anggota', nama_anggota='$nama_anggota', jenis_kelamin='$jenis_kelamin', id_prodi='$id_prodi', semester='$semester', email='$email', no_hp='$no_hp', alamat='$alamat', foto='$foto' WHERE id_anggota='$id_anggota'");
    }

    public function deleteAnggota($id_anggota)
    {
        $dataFile = $this->dataAnggotaById($id_anggota);
        unlink('img/' . $dataFile['foto']);

        $query = mysqli_query($this->koneksi, "DELETE FROM anggota WHERE id_anggota = '$id_anggota'");
    }


    //--------------------------------Buku--------------------------------

    public function dataBuku()
    {
        if (isset($_POST['cari'])) {
            $cari = $_POST['cari'];
            $query = mysqli_query($this->koneksi, "SELECT buku.*, kategori.* FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE buku.kode_buku LIKE '%$cari%' OR buku.judul_buku LIKE '%$cari%' OR kategori.nama_kategori LIKE '%$cari%'");
            while ($row = mysqli_fetch_array($query)) {
                $data[] = $row;
            }

            return $data;
        } else {
            $query = mysqli_query($this->koneksi, "SELECT buku.*, kategori.* FROM buku JOIN kategori ON buku.id_kategori = kategori.id_kategori");
            while ($row = mysqli_fetch_array($query)) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function insertBuku($kode_buku, $id_kategori, $judul_buku, $penulis_buku, $penerbit_buku, $tahun_terbit, $stok)
    {
        mysqli_query($this->koneksi, "INSERT INTO buku VALUES ('', '$kode_buku', '$id_kategori', '$judul_buku', '$penulis_buku', '$penerbit_buku', '$tahun_terbit', '$stok')");
    }

    public function dataBukuById($id_buku)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM buku WHERE id_buku = '$id_buku'");

        return $query->fetch_array();
    }

    public function updateBuku($id_buku, $kode_buku, $id_kategori, $judul_buku, $penulis_buku, $penerbit_buku, $tahun_terbit, $stok)
    {
        $query = mysqli_query($this->koneksi, "UPDATE buku SET kode_buku='$kode_buku', id_kategori='$id_kategori', judul_buku='$judul_buku', penulis_buku='$penulis_buku', penerbit_buku='$penerbit_buku', tahun_terbit='$tahun_terbit', stok='$stok' WHERE id_buku='$id_buku'");
    }

    public function deleteBuku($id_buku)
    {
        $query = mysqli_query($this->koneksi, "DELETE FROM buku WHERE id_buku = '$id_buku'");
    }


    //--------------------------------Petugas--------------------------------

    public function dataPetugas()
    {
        if (isset($_POST['cari'])) {
            $cari = $_POST['cari'];
            $query = mysqli_query($this->koneksi, "SELECT * FROM petugas WHERE petugas.nama_petugas LIKE '%$cari%' OR petugas.role LIKE '%$cari%'");
            while ($row = mysqli_fetch_array($query)) {
                $data[] = $row;
            }

            return $data;
        } else {
            $query = mysqli_query($this->koneksi, "SELECT * FROM petugas");
            while ($row = mysqli_fetch_array($query)) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function insertPetugas($nama_petugas, $password, $jabatan_petugas, $email, $no_telp, $role, $fotoBaru)
    {
        mysqli_query($this->koneksi, "INSERT INTO petugas VALUES ('', '$nama_petugas', '$password', '$jabatan_petugas', '$email', '$no_telp', '$role', '$fotoBaru')");
    }

    public function dataPetugasById($id_petugas)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'");

        return $query->fetch_array();
    }

    public function updatePetugas($id_petugas, $nama_petugas, $jabatan_petugas, $email, $no_telp, $fotoBaru)
    {
        $query = mysqli_query($this->koneksi, "UPDATE petugas SET nama_petugas='$nama_petugas', jabatan_petugas='$jabatan_petugas', email='$email', no_telp='$no_telp', foto='$fotoBaru' WHERE id_petugas='$id_petugas'");
    }

    public function deletePetugas($id_petugas)
    {
        $dataFile = $this->dataPetugasById($id_petugas);
        unlink('assets/images/petugas/' . $dataFile['foto']);

        $query = mysqli_query($this->koneksi, "DELETE FROM petugas WHERE id_petugas = '$id_petugas'");
    }


    //--------------------------------Kategori--------------------------------
    public function dataKategori()
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM kategori");
        while ($row = mysqli_fetch_array($query)) {
            $data[] = $row;
        }

        return $data;
    }

    public function insertKategori($nama_kategori)
    {
        mysqli_query($this->koneksi, "INSERT INTO kategori VALUES ('', '$nama_kategori')");
    }

    public function dataKategoriById($id_kategori)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");

        return $query->fetch_array();
    }

    public function updateKategori($id_kategori, $nama_kategori)
    {
        $query = mysqli_query($this->koneksi, "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'");
    }

    public function deleteKategori($id_kategori)
    {
        $query = mysqli_query($this->koneksi, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");
    }


    //--------------------------------Prodi--------------------------------

    public function dataProdi()
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM prodi");
        while ($row = mysqli_fetch_array($query)) {
            $data[] = $row;
        }

        return $data;
    }

    public function insertProdi($nama, $kaprodi)
    {
        mysqli_query($this->koneksi, "INSERT INTO prodi VALUES ('', '$nama', '$kaprodi')");
    }

    public function dataProdiById($id_prodi)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM prodi WHERE id_prodi = '$id_prodi'");

        return $query->fetch_array();
    }

    public function updateProdi($id_prodi, $nama, $kaprodi)
    {
        $query = mysqli_query($this->koneksi, "UPDATE prodi SET nama='$nama', kaprodi='$kaprodi' WHERE id_prodi='$id_prodi'");
    }

    public function deleteProdi($id_prodi)
    {
        $query = mysqli_query($this->koneksi, "DELETE FROM prodi WHERE id_prodi = '$id_prodi'");
    }

    //--------------------------------Peminjaman--------------------------------

    public function dataPinjam()
    {
        $query = mysqli_query($this->koneksi, "SELECT peminjaman.*, buku.*, anggota.*, petugas.* FROM peminjaman JOIN buku ON peminjaman.id_buku = buku.id_buku JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas");
        while ($row = mysqli_fetch_array($query)) {
            $data[] = $row;
        }

        return $data;
    }

    public function insertPinjam($kode_pinjam, $tgl_pinjam, $id_buku, $jumlah, $id_anggota, $id_petugas, $jumlahStok)
    {
        mysqli_query($this->koneksi, "INSERT INTO peminjaman VALUES ('', '$kode_pinjam', '$tgl_pinjam', '$id_buku', '$jumlah', '$id_anggota', '$id_petugas')");

        $updateStok = mysqli_query($this->koneksi, "UPDATE buku SET stok='$jumlahStok' WHERE id_buku = '$id_buku'");
    }

    public function dataPinjamById($id_pinjam)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM peminjaman WHERE id_pinjam = '$id_pinjam'");

        return $query->fetch_array();
    }

    public function updateStokLama($stokLama, $bukuLama)
    {

        mysqli_query($this->koneksi, "UPDATE buku SET stok='$stokLama' WHERE id_buku = '$bukuLama'");
    }

    public function updatePinjam($id_pinjam, $kode_pinjam, $tgl_pinjam, $id_buku, $jumlah, $id_anggota, $id_petugas, $stokBaru)
    {
        $query = mysqli_query($this->koneksi, "UPDATE peminjaman SET kode_pinjam='$kode_pinjam', tgl_pinjam='$tgl_pinjam', id_buku='$id_buku', jumlah='$jumlah', id_anggota='$id_anggota', id_petugas='$id_petugas' WHERE id_pinjam='$id_pinjam'");

        $updateStok = mysqli_query($this->koneksi, "UPDATE buku SET stok='$stokBaru' WHERE id_buku = '$id_buku'");
    }

    public function deletePinjam($id_pinjam, $idBuku, $stok)
    {
        $query = mysqli_query($this->koneksi, "DELETE FROM peminjaman WHERE id_pinjam = '$id_pinjam'");

        $updateStok = mysqli_query($this->koneksi, "UPDATE buku SET stok='$stok' WHERE id_buku = '$idBuku'");
    }


    //--------------------------------Pengembalian--------------------------------

    public function dataKembali()
    {
        $query = mysqli_query($this->koneksi,  "SELECT pengembalian.*, buku.*, anggota.*, petugas.* FROM pengembalian JOIN buku ON pengembalian.id_buku = buku.id_buku JOIN anggota ON pengembalian.id_anggota = anggota.id_anggota JOIN petugas ON pengembalian.id_petugas = petugas.id_petugas");
        while ($row = mysqli_fetch_array($query)) {
            $data[] = $row;
        }

        return $data;
    }

    public function insertKembali($tgl_kembali, $id_buku, $id_anggota, $id_petugas)
    {
        mysqli_query($this->koneksi, "INSERT INTO pengembalian VALUES ('', '$tgl_kembali', '$id_buku', '$id_anggota', '$id_petugas')");
    }

    public function dataKembaliById($id_kembali)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM pengembalian WHERE id_kembali = '$id_kembali'");

        return $query->fetch_array();
    }

    public function updateKembali($id_kembali, $tgl_kembali, $id_buku, $id_anggota, $id_petugas)
    {
        $query = mysqli_query($this->koneksi, "UPDATE pengembalian SET tgl_kembali='$tgl_kembali', id_buku='$id_buku', id_anggota='$id_anggota', id_petugas='$id_petugas' WHERE id_kembali='$id_kembali'");
    }

    public function deleteKembali($id_kembali)
    {
        $query = mysqli_query($this->koneksi, "DELETE FROM pengembalian WHERE id_kembali = '$id_kembali'");
    }
}
