<?php

include 'database.php';
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == 'login') {
    $db->login($_POST['email'], $_POST['password']);
} elseif ($aksi == "logout") {
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
    echo "<script language = 'JavaScript'>
        alert('Anda Telah Keluar Dari Sistem');
        document.location = 'index.php';
        </script>";
} elseif ($aksi == "register") {
    if ($_POST['password'] !== $_POST['password2']) {
        echo "<script>
					alert('konfirmasi password tidak sesuai')
			</script>";
    } else {
        $foto = $_FILES["foto"]["name"];
        $file_tmp = $_FILES["foto"]["tmp_name"];
        $rand = rand(1, 9999);
        $fotoBaru = $rand . "-" . $foto;
        $folder = "assets/images/petugas/";

        move_uploaded_file($file_tmp, $folder . $fotoBaru);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $db->register(
            htmlspecialchars($_POST["nama_petugas"]),
            $password,
            htmlspecialchars($_POST["jabatan_petugas"]),
            htmlspecialchars($_POST["email"]),
            htmlspecialchars($_POST["no_telp"]),
            htmlspecialchars($_POST["role"]),
            $fotoBaru
        );
        $db->setFlash(' berhasil ', 'ditambahkan');
        header('Location: index.php');
    }
} else {
    echo "Database anda eror, silahkan proses kembali lg <a href='index.php?'>Klik disini</a>";
}
