-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 08:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simperpus_vsga2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `pengarang` varchar(20) NOT NULL,
  `penerbit` varchar(20) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul_buku`, `isbn`, `pengarang`, `penerbit`, `tahun`) VALUES
(1, 'Kisah 25 Nabi', '978-602-391-470-8', 'Thifa', 'CV Marja', '2018'),
(11, 'Buku Keren', '978-2-12-345680-4', '978-2-12-345680-4', 'Vinar', '2023'),
(12, 'dasdsa', '1215asdas', '1215asdas', 'sadasdasas', '2134');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id` int(11) NOT NULL,
  `id_anggota` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id`, `id_anggota`, `nama`, `jenis_kelamin`, `alamat`, `foto`) VALUES
(1, 'A1001', 'Kevin edit', 'L', 'Kos Tirta Martha', 'Group 1.png'),
(2, 'A1002', 'Saipul', 'L', 'Jetis Lor', 'smanpa redaction3.jpg'),
(10, 'A1003', 'Rico Sum', 'L', 'Kos Tirta Martha', 'WhatsApp Image 2023-01-11 at 20.43.50.jpg'),
(11, 'A1004', 'Yoona', 'P', 'Korea Selatan', 'IMG20220825052702_BURST001.jpg'),
(12, 'A1005', 'Mahmud', 'L', 'Belakang Amikom', 'Untitled Session00034.JPG'),
(13, 'A1006', 'Kisonli', 'L', 'Pogung Lor', 'Screenshot 2023-01-21 215314.png'),
(23, 'A1007', 'Vivi', 'P', 'asddas', 'IMG20220913090026.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `anggota` int(11) NOT NULL,
  `buku` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `status` enum('pinjam','kembali') NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `anggota`, `buku`, `tanggal_pinjam`, `status`, `tanggal_kembali`) VALUES
(3, 1, 1, '2019-07-17', 'pinjam', '2023-07-20'),
(4, 23, 1, '2023-07-27', 'kembali', '2023-07-28'),
(5, 13, 12, '2023-07-27', 'pinjam', '2023-08-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
