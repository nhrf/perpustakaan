-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2024 at 08:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(8, 'admin4', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `anggota_id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tgl_bergabung` date NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`anggota_id`, `nama`, `email`, `tgl_bergabung`, `password`) VALUES
(20, 'farhan', 'farhan@gmail.com', '2024-10-17', '$2y$10$zBFa299gSn7gbAPALaLCy.5WN5qC4FCqMfGNqDgR7X0LcyNFXecrm'),
(21, 'habibi', 'habibi@gmail.com', '2024-10-17', '$2y$10$eok.uZxzeKX87aN4Yo9/buQqNBNLyQtVpqh5xjyBtH5hlOakjMjP.'),
(22, 'hasibuan', 'hasibuan@gmail.com', '2024-10-17', '$2y$10$peKhkuXiHIfOPG0Wkp4xrOqnloGHqPmzT10McERpUMQ1v.IVNG09C'),
(23, 'farhanhabibi', 'farhanhabibi@gmail.com', '2024-10-17', '$2y$10$ulMp/E4OxTPDj6D1khape.HZ2wT499anRzJzbutPDVn14doPVd3IG'),
(24, 'asep', 'asep@gmail.com', '2024-10-20', '$2y$10$r/8OWiSsEf5lgEZSwNNHDeE08WM6U4.a8tKxcsqkuUmQImJuR6Xau'),
(25, 'stev', 'stev@gmail.com', '2024-10-20', '$2y$10$tY94.o4M/eatYPesBrNxzOtfxXXdRqKPGNuj95HpvFpB/qvkF5WdG');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `judul`, `penulis`, `tahun_terbit`) VALUES
(1, 'dilan', 'pidi baiq', 1970),
(2, 'bahasa indonesia', 'tere liye', 1980),
(3, 'matematika dasar', 'jerome polin', 2020),
(4, 'ipa', 'thomas', 2000),
(6, 'fullstack', 'binus', 2022),
(7, 'fisika', 'james', 2005);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`) VALUES
(22, 20, 3, '2024-10-17', '2024-10-17'),
(23, 20, 2, '2024-10-17', '2024-10-17'),
(24, 20, 3, '2024-10-17', '2024-10-17'),
(25, 20, 1, '2024-10-17', '2024-10-17'),
(26, 21, 4, '2024-10-17', '2024-10-17'),
(27, 20, 2, '2024-10-17', '2024-10-17'),
(28, 20, 2, '2024-10-17', '2024-10-17'),
(29, 23, 2, '2024-10-17', '2024-10-17'),
(30, 25, 2, '2024-10-20', '2024-10-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`anggota_id`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`buku_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
