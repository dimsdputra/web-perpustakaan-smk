-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 02:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` int(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `tahun_terbit` int(10) NOT NULL,
  `penerbit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `penulis`, `tahun_terbit`, `penerbit`) VALUES
(1123, 'Sebuah Seni Untuk Bersikap Bodo Amat', 'Mark Manson', 2016, 'Grasindo'),
(1231, 'Filosofi Teras', 'Henry Manampiring', 2018, 'Kompas');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `NIS` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `NIS`, `nama`, `kelas`, `jenis_kelamin`, `alamat`) VALUES
(1, 12313, 'Dadang', 'X RPL', 'laki-laki', 'lalla'),
(2, 112355634, 'Rahmat Sandi', 'XI RPL', 'laki-laki', 'jl. sudirman no.5'),
(3, 112345664, 'Rahma Tika', 'X RPL', 'perempuan', 'jl. Bung Karno no.1'),
(4, 112345512, 'Cantika Tika', 'XII RPL', 'perempuan', 'jl. Panglima Sudirman '),
(5, 112345233, 'Andika Kangen Band', 'XII RPL', 'laki-laki', 'jl. Menuju Pelaminan'),
(6, 112344234, 'Dandi Ahmad', 'XI RPL', 'laki-laki', 'jl. Kita Bersama'),
(8, 112441232, 'Mamad', 'X RPL', 'laki-laki', 'jl. Bersama-sama'),
(9, 112313211, 'bambang', 'XI RPL', 'laki-laki', 'jl. kemana-mana'),
(10, 113341552, 'Adi Rahmat', 'XII RPL', 'laki-laki', 'jl. hayukk'),
(11, 112412444, 'hana Larasati', 'X RPL', 'perempuan', 'jl. Madanian'),
(12, 112451254, 'Amel', 'XII RPL', 'perempuan', 'jl. kesemutan'),
(13, 112444122, 'Kiki', 'XI RPL', 'perempuan', 'jl. Keabadian'),
(14, 112441241, 'Andika', 'XI RPL', 'laki-laki', 'jl. kangen '),
(16, 112412523, 'Danang', 'XI RPL', 'laki-laki', 'jl. Ke malang'),
(17, 112341433, 'Brian', 'X RPL', 'laki-laki', 'jl. Ke Jombang'),
(18, 112662342, 'Fatah', 'X RPL', 'laki-laki', 'jl. ke mana lagi'),
(19, 112441213, 'Bambam', 'XII RPL', 'laki-laki', 'jl. ke jepang'),
(20, 123414322, 'Kiki', 'X RPL', 'perempuan', 'jl. ke kampus'),
(21, 114512331, 'Fahri', 'XII RPL', 'laki-laki', 'jl. jalan lagi'),
(22, 113512121, 'Rahmat', 'X RPL', 'laki-laki', 'jl. ketenangan'),
(23, 112451231, 'Rahmawati', 'XII RPL', 'perempuan', 'jl. insan'),
(24, 112412412, 'Jordi', 'XI RPL', 'laki-laki', 'jl. kenikmatan'),
(25, 112431221, 'Heru', 'XI RPL', 'laki-laki', 'jl. Miagan'),
(26, 123124122, 'dimas', 'X RPL', 'laki-laki', 'jl. jalan '),
(30, 123134, 'Budi', 'Kiki', 'laki-laki', 'kkkk');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$64OnKzF.hhIf9dZc2j51DOp.Ld/7s/XlWcz8dvzOIegQXLshWsqJG'),
(2, 'admin2', '$2y$10$0MA1f1s96WEnC4.2KX91BuoY8tosVOa3t4lOYOMhLPiKxDbQ074v2'),
(5, 'dimas', '$2y$10$DWCdyoyKhI4t77OlEwz5Vu92kBJj7EG.ZjrOIapF1bAhFBdiwhaP.'),
(6, 'bagus', '$2y$10$g/SiiYq5dxZKSf9o1c2sb.dy0gCDwrdjPrs06tJsr5JE0u28XBQJa'),
(7, 'naufal', '$2y$10$H.0J09Zmkc.s.YzCU.29NeCi88Cw4LIkDRmhEPw3asWK0yQYyWoq6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NIS` (`NIS`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
