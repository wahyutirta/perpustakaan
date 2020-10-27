-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 06:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `pengarang_buku` varchar(30) NOT NULL,
  `edisi_buku` varchar(5) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahun_terbit` int(5) NOT NULL,
  `no_rak` varchar(5) NOT NULL,
  `stock_buku` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pengarang_buku`, `edisi_buku`, `penerbit`, `tahun_terbit`, `no_rak`, `stock_buku`) VALUES
(1, 'Pemrograman Microsoft Visual Basic 6', 'Kurniadi Adi', '5', 'Elex Media Computindo', 2008, 'A01', 3),
(2, 'Pengenalan Teknologi Informasi', 'Kadir Abdul', '2', 'Andi Offset', 2005, 'A01', 2),
(3, 'Basis Data', 'Fathansyah', '1', 'Informatika Bandung', 2007, 'A01', 1),
(4, 'Etika Komputer', 'Wahyono Teguh', '2', 'Andi Offset', 2009, 'A02', 4),
(5, 'Sistem Operasi', 'Hariyanto Bambang', '4', 'Informatika bandung', 2009, 'B01', 2),
(6, 'Sistem Operasi', 'Hariyanto Bambang', '3', 'Informatika Bandung', 2007, 'A03', 3),
(7, 'Pengenalan Komputer', 'Hartono Jogiyanto', '5', 'Andi Offset', 2005, 'A02', 2),
(8, 'Arsitektur Komputer', 'Hartanto Sri', '1', 'Bsi Press', 2006, 'A03', 1),
(9, 'Pengantar Logika dan Algoritma', 'Yulikuspartono', '1', 'Andi Offset', 2004, 'B01', 3),
(10, 'Sistem Operasi', 'Binanto Iwan', '1', 'Andi Offset', 2005, 'B02', 1),
(11, 'Memahami Sistem Informasi', 'Witarto', '1', 'Informatika Bandung', 2004, 'A02', 4),
(12, 'Jaringan Komputer', 'Sukmaaji Anjik', '1', 'Andi Offset', 2008, 'B02', 5),
(13, 'Teknik Digital', 'Santosa P.Insap', '3', 'Andi Offset', 1996, 'B01', 3),
(14, 'Pemrograman Database Visual Basic.Net', 'Yuswanto', '1', 'Prestasi Pustaka', 2007, 'A03', 1),
(16, 'Teknik Digitalisasi', 'wahyu tirta', '3', 'Airlangga', 2020, 'A08', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_buku`
--

CREATE TABLE `pinjam_buku` (
  `id_pinjamn` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam_buku`
--

INSERT INTO `pinjam_buku` (`id_pinjamn`, `id_user`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status_pinjam`) VALUES
(6, 3, 2, '2020-05-28', '2020-05-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jenis_kelamin`, `no_hp`, `alamat`, `username`, `password`, `status`) VALUES
(1, 'Titik Cahyadi', 'Perempuan', '2147483647', 'Jalan Pratama Nusa Dua', 'admin', 'admin', 'admin'),
(2, 'Budi Santoso', 'Laki-Laki', '085127569276', 'Jalan Pratama', 'budi', 'budi', 'user'),
(3, 'Joko Cahya', 'Laki-Laki', '083116258447', 'Jalan Kelapa', 'joko', 'joko', 'user'),
(4, 'Eka Budi', 'Laki-Laki', '081235874622', 'Jalan Kota', 'superadmin', 'superadmin', 'superadmin'),
(5, 'Eka Cahya Utama', 'Laki-Laki', '089123876554', 'Jalan Luar Negeri Blok AUUU', 'admin2', 'admin2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  ADD PRIMARY KEY (`id_pinjamn`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  MODIFY `id_pinjamn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pinjam_buku`
--
ALTER TABLE `pinjam_buku`
  ADD CONSTRAINT `pinjam_buku_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pinjam_buku_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
