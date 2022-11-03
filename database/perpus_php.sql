-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 04:22 AM
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
-- Database: `perpus_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '$2y$10$PDrxSqjDhBiXHOj4jGJ77u651BXNfD9y3RoMrMrV2y7zTav/Ts7Ty', 'Super Admin'),
(10, 'mattar', '$2y$10$eOiOhXat2Umzw2FzUJoBLeQAXc5JtKjm/MOGlKFjUjepoMr1xpBeq', ' M Attar Annaufal F N'),
(13, 'creep', '$2y$10$46tllsDB5Xl0yUIeXD5hMeVOHpwkeZW5nKVpb4KDcLAz2j66Ir7UO', 'Creeper'),
(14, 'olivsarcas', '$2y$10$zUDrxRBu1Tc4ZfU7CTFl0O.eNrKUwi3pMsZGoA9FxqT0iN7XRvvYO', 'Olivia Casandra'),
(15, 'budir77', '$2y$10$D9XhWW/NtOThwdZLivJfh.yobTjFidDv/EIfHBVG6M4/7mUu7Ao96', 'Budi Rahadjo'),
(16, 'slamet', '$2y$10$q9HEyHZLGGeoHWEGifONbuUm7PslpCcnMvI2cC1fl8iHoWnIAu5gi', 'Slamet Kopling'),
(17, 'qwerty', '$2y$10$5.7JfsxEhkMvsh8qv2HfSeph4PrqRzOg/0WFi6nZOuU4NyZrE.w6u', 'QWERTY'),
(18, 'yami', '$2y$10$Vn56n8C26ET1aUZAWi2CQuGz69pg8/ZEJyIpPgq3O06b8cqXwfs1a', 'Admin Yami'),
(19, 'neko', '$2y$10$E7bTXdWE2JBg4SpJJmygRuD1Rq4GgHP9Y5D6IDSqqh2/NEs7UZ/RG', 'Nekooo');

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
(1231, 'Filosofi Teras', 'Henry Manampiring', 2018, 'Kompas'),
(1239, 'JavaScript Side', 'Attar', 2022, 'Attar'),
(2017, 'Freelance Guide&#039;s', 'Robert', 2021, '-'),
(2038, 'Effective JavaScript', 'Attar', 2019, '-'),
(2938, 'Google it', 'Google', 2019, '-'),
(2947, 'CSS Master', 'Kevin Powell', 2020, '-'),
(3824, 'Clean Code', 'Mr. Cleaner', 2021, '-'),
(9373, 'React: Zero to Hero', 'Attar', 2022, '-');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_peminjaman` text NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_buku`
--

INSERT INTO `peminjaman_buku` (`id`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`, `id_siswa`, `id_buku`) VALUES
(40, '2022-11-02', '2022-11-02', 'Dikembalikan', 24, 2947),
(43, '2022-10-31', '2022-11-01', 'Dikembalikan', 26, 1231),
(44, '2022-11-02', '2022-11-07', 'Dipinjam', 30, 1239),
(46, '2022-11-03', '2022-11-04', 'Dipinjam', 24, 1231);

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
(23, 1238963, 'Rahmawati', 'XI RPL', 'perempuan', 'jl. insan'),
(24, 112412412, 'Jordi', 'XI RPL', 'laki-laki', 'jl. kenikmatan'),
(25, 112431221, 'Heru', 'XII RPL', 'laki-laki', 'jl. Miagan'),
(26, 123124122, 'dimas', 'X RPL', 'laki-laki', 'jl. jalan '),
(30, 123134, 'Budi', 'X RPL', 'laki-laki', 'Jl.Budiman'),
(32, 112442123, 'Ardi ', 'X RPL', 'laki-laki', 'jl. Kesini'),
(33, 112312312, 'Kirana', 'XI RPL', 'perempuan', 'jl. keatas'),
(34, 112123212, 'Beni', 'XI RPL', 'laki-laki', 'jl. keabadian'),
(56, 823472348, 'Irwana', 'XI RPL', 'perempuan', 'wkwkLand');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `id_siswa_peminjaman_buku` (`id_siswa`),
  ADD KEY `id_buku_peminjaman_buku` (`id_buku`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NIS` (`NIS`),
  ADD UNIQUE KEY `UNIQUE_NAME` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD CONSTRAINT `id_buku_peminjaman_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_siswa_peminjaman_buku` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
