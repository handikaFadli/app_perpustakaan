-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 02:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nim_anggota` varchar(20) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nim_anggota`, `nama_anggota`, `jenis_kelamin`, `id_prodi`, `semester`, `email`, `no_hp`, `alamat`, `foto`) VALUES
(6, '20210120064', 'M Handika N', 'Laki-laki', 1, '2', 'handikafadli23@gmail.com', '085722784526', 'Jl Kh Agus Salim', '4594 20210120064 - M Handika N - Teknik Informatika.jpg'),
(12, '20210120065', 'Ega Permana', 'Laki-laki', 6, '2', 'ega@gmail.com', '089768972902', 'Jl Pemuda', '7254-20210120068 - Ega Permana - Teknik Informatika.jpg'),
(19, '20210120066', 'Agis Maulaya', 'Perempuan', 2, '2', 'agis123@gmail.com', '089768972902', 'Jl Pahlawan', '9597-20210120069 - Aghitsni Maulaya P - Teknik Informatika.png'),
(25, '20210120067', 'Wyola S', 'Perempuan', 3, '2', 'wyola@gmail.com', '089768972908', 'Jl M Toha', '4122-20210120075 - Wyola Sutanto - Teknik Informatika.JPG'),
(26, '20210120068', 'Amanda Nabila', 'Perempuan', 7, '2', 'manda@gmail.com', '089768972901', 'Jl Tengah Tani', '5039-20210120058 - Amanda Putri Nabila - Teknik Informatika.JPG'),
(30, '20210120069', 'Fia Hamasyatus S', 'Perempuan', 3, '2', 'fia@gmail.com', '085722784526', 'Jl Kartini', '7263-20210120059 - Fia Hamasyatus Syahadah - Teknik Informatika.jpg'),
(31, '20210120070', 'Dina Aaliyah', 'Perempuan', 8, '2', 'dina@gmail.com', '085722784526', 'Jl Tuparev', '169-20210120061 - Dina Aaliyah - Teknik Informatika.jpg'),
(32, '20210120071', 'Muhammad Reno', 'Laki-laki', 7, '2', 'reno@gmail.com', '089768972900', 'Jl Kesambi', '250-20210120063 - Muhammad Reno - Teknik Informatika.png'),
(33, '20210120072', 'Royfansyah', 'Laki-laki', 2, '2', 'roy@gmail.com', '085722784525', 'Jl Tuparev', '2775-20210120071 - Royfansyah M Razafi - Teknik Informatika.jpg'),
(34, '20210120073', 'Diar Putri Y', 'Perempuan', 5, '2', 'diarr123@gmail.com', '089768972902', 'Jl Kh Agus Salim', '7608-20210120062-Diar Putri Yani-Teknik Informatika.jpg'),
(35, '20210120074', 'Fikry D', 'Laki-laki', 2, '2', 'fikry@gmail.com', '089768972900', 'Jl Kesambi', '1327-20210120056 - Fikry Destryanto - Teknik Informatika.jpg'),
(36, '20210120075', 'A Restu', 'Laki-laki', 1, '2', 'stvn@gmail.com', '089768972902', 'Jl Pemuda', '3005-20210120072 - Achmad Restu Fauzi - Teknik Informatika.png'),
(37, '20210120076', 'Ageng S', 'Laki-laki', 3, '2', 'agng@gmail.com', '085722784525', 'Jl Pemuda', '8056-20210120054 = AGENG SATYANUGRAHA - Teknik informatika.png');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` char(5) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `penulis_buku` varchar(50) NOT NULL,
  `penerbit_buku` varchar(50) NOT NULL,
  `tahun_terbit` char(4) NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `id_kategori`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tahun_terbit`, `stok`) VALUES
(1, 'AA001', 1, 'Naruto', 'Masashi Kishimoto', 'MCU', '1990', 199),
(3, 'AA002', 1, 'Tokyo Revengers', 'Ken Wakui', 'MCU', '1984', 200),
(4, 'AA003', 1, 'Hai Miiko 34', 'Endo Tetsuya', 'MCU', '2001', 200),
(7, 'AA004', 1, 'SPY X Family 01', 'Endo Tetsuya', 'MCU', '1990', 100),
(8, 'AA005', 1, 'Jujutsu Kaisen 05', 'Gage Akutami', 'MCU', '1999', 200),
(9, 'AA009', 2, 'Himpunan', 'Citra Saras', 'MCU', '2001', 200),
(10, 'AA010', 2, 'Dikta & Hukum', 'Dhia\'an Farah', 'MCU', '2008', 99),
(11, 'AA011', 2, 'Janji', 'Tere Liye', 'MCU', '2007', 100),
(12, 'AA012', 2, 'Maria Beetle', 'Kotaro Isaka', 'MCU', '2009', 100),
(13, 'AA013', 2, 'Hilmy Milan', 'Nadia Ristivani', 'MCU', '2007', 100),
(14, 'AA014', 3, 'Filosofi Teras', 'Henry Manampiring', 'MCU', '2009', 100),
(15, 'AA015', 3, 'Atomic Habits', 'James Clear', 'MCU', '2000', 100),
(16, 'AA016', 3, 'Range', 'David Epstein', 'MCU', '1999', 100),
(17, 'AA017', 3, 'Bukan Maksud Tak Menghargai', 'Jun Meekyung', 'MCU', '1998', 100),
(18, 'AA018', 3, 'Journal Of Gratitude', 'Sarah Amijo', 'MCU', '2007', 100),
(19, 'AA019', 4, 'Soekarno Arsitek Bangsa', 'Bob Hering', 'MCU', '1991', 100),
(20, 'AA020', 4, 'Fidel Castro: 60 Tahun Menentang Amerika', 'A. Pembudi', 'MCU', '1997', 100),
(21, 'AA021', 4, 'Mandele: The Authorised Biography', 'Anthony Sampson', 'MCU', '2002', 100),
(22, 'AA022', 4, 'Steve Jobs', 'Walter Issac', 'MCU', '1999', 100);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Komik'),
(2, 'Novel'),
(3, 'Self Improvement'),
(4, 'Biografi'),
(5, 'Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `kode_pinjam` varchar(15) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `kode_pinjam`, `tgl_pinjam`, `id_buku`, `jumlah`, `id_anggota`, `id_petugas`) VALUES
(40, 'PNJM040', '2022-07-17', 1, 1, 35, 17),
(41, 'PNJM041', '2022-07-17', 10, 1, 34, 17);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `tgl_kembali`, `id_buku`, `id_anggota`, `id_petugas`) VALUES
(7, '2022-07-17', 8, 33, 17),
(8, '2022-07-17', 7, 32, 17),
(9, '2022-07-18', 17, 6, 17),
(10, '2022-07-18', 3, 19, 17),
(11, '2022-08-08', 1, 6, 17),
(12, '2022-08-08', 19, 6, 17),
(13, '2022-12-16', 3, 36, 17),
(14, '2022-12-16', 4, 19, 17);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `password` varchar(333) NOT NULL,
  `jabatan_petugas` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `password`, `jabatan_petugas`, `email`, `no_telp`, `role`, `foto`) VALUES
(15, 'Pa Ilwan', '$2y$10$4c1z7oBx.VuNp7DJZb8i.OhspGlZUArmkaL4zspiLfqnCC/r7m5L.', 'Kaprodi SI', 'pailwan@gmail.com', '082839911322', 'Petugas', '2159-20210120079 - Rahmat Pajar - Teknik Informatika.jpeg'),
(16, 'Pa Chai', '$2y$10$MceXDBa9J3r25D/EpbSJuO3gK8/weuVRjvmPqoLlJXpxA6JAJqVPS', 'Kaprodi DKV', 'pachai@gmail.com', '08283991133', 'Admin', '4815-20210120054 = AGENG SATYANUGRAHA - Teknik informatika.png'),
(17, 'Pa Kusnadi', '$2y$10$TYIDIN2Gh2SWhI/AWXG2euQdJ9ml/d53zktZkMJ2Krall869OZu26', 'Kaprodi MI', 'pakusnadi@gmail.com', '082839911336', 'Petugas', '6308-20210120068 - Ega Permana - Teknik Informatika.jpg'),
(18, '', '$2y$10$nGGgMBcLhXXJzwdkPJP.Luz2j5ysb9vO3XHAdjl2YZphLvPz.7Dy2', '', '', '', '', '6032-'),
(19, 'Ega Permana', '$2y$10$jsRpb6nBrnT2y9y6mU8TWeX2MLsLqgs6Sy.kCdO.YjY/.YFN6C.ka', 'Rektor', 'permanaega677@gmail.com', '085794912280', 'Admin', '2753-20210120061 - Dina Aaliyah - Teknik Informatika.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kaprodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama`, `kaprodi`) VALUES
(1, 'Teknik Informatika', 'Pa Kusnadi'),
(2, 'Desain Komunikasi Visual', 'Pa Chai'),
(3, 'Manajemen', 'Pa Ridho'),
(4, 'Sistem Informasi', 'Bu Viar'),
(5, 'Akutansi', 'Pa Amroni'),
(6, 'Komputerisasi Akutansi', 'Pa Ilwan'),
(7, 'Manajemen Bisnis', 'Bu Linda'),
(8, 'Manajemen Informatika', 'Pa Victor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengembalian_ibfk_4` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
