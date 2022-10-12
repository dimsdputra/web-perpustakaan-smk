-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 06:23 AM
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
(1131, 'Matematika', 'Widya', 2010, 'Kompas'),
(1132, 'Bahasa Indonesia', 'Andini', 2011, 'Kompas'),
(1231, 'Filosofi Teras', 'Henry Manampiring', 2018, 'Kompas');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_peminjaman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_buku`
--

INSERT INTO `peminjaman_buku` (`id`, `id_siswa`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`) VALUES
(8, 21, 1231, '2022-10-11', '2022-10-18', 'Dipinjam'),
(9, 14, 1131, '2022-10-11', '2022-10-11', 'Dipinjam');

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
(13, 112444122, 'Kiki', 'XI RPL', 'perempuan', 'jl. Keabadian bersamamu'),
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
(30, 123134, 'Budi', 'Kiki', 'laki-laki', 'kkkk'),
(32, 112442123, 'Ardi ', 'X RPL', 'laki-laki', 'jl. Kesini'),
(33, 112312312, 'Kirana', 'XI RPL', 'perempuan', 'jl. keatas'),
(34, 112123212, 'Beni', 'XI RPL', 'laki-laki', 'jl. keabadian');

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
-- Indexes for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_buku` (`id_siswa`),
  ADD UNIQUE KEY `id_siswa` (`id_buku`);

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
-- AUTO_INCREMENT for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD CONSTRAINT `peminjaman_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`kode_buku`),
  ADD CONSTRAINT `peminjaman_buku_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
