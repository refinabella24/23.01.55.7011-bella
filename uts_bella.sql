-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2025 at 11:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_bella`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katholik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `arsip`
--

CREATE TABLE `arsip` (
  `id` int NOT NULL,
  `id_pegawai` int NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tahun` int NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arsip`
--

INSERT INTO `arsip` (`id`, `id_pegawai`, `nama`, `tahun`, `link`) VALUES
(1, 4, 'SKP', 2024, 'https://drive.google.com/file/d/13ZxUQQWJpz7B_uiWAgesHbKvF_iUvOCT/view?usp=sharing'),
(2, 4, 'Ijazah D3', 2020, 'https://drive.google.com/file/d/13ZxUQQWJpz7B_uiWAgesHbKvF_iUvOCT/view?usp=sharing');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id` int NOT NULL,
  `isi` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id`, `isi`, `waktu`) VALUES
(1, 'Contoh catatan 1', '2025-11-06 09:46:50'),
(2, 'Contoh catatan 2', '2025-11-06 09:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id` int NOT NULL,
  `nama` varchar(5) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `nama`, `ket`) VALUES
(1, 'I a', 'Juru Muda'),
(2, 'I b', 'Juru Muda Tingkat I'),
(3, 'I c', 'Juru'),
(4, 'I d', 'Juru Tingkat I'),
(5, 'II a', 'Pengatur Muda'),
(6, 'II b', 'Pengatur Muda Tingkat I'),
(7, 'II c', 'Pengatur'),
(8, 'II d', 'Pegatur Tingkat I'),
(9, 'III a', 'Penata Muda'),
(10, 'III b', 'Penata Muda Tingkat I'),
(11, 'III c', 'Penata'),
(12, 'III d', 'Penata Tingkat I'),
(13, 'IV a', 'Pembina'),
(14, 'IV b', 'Pembina Tingkat I'),
(15, 'IV c', 'Pembina Utama Muda'),
(16, 'IV d', 'Pembina Utama Madya'),
(17, 'IV e', 'Pembina Utama');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(1, 'Pengadministrasi Umum'),
(2, 'Pengelola Kepegawaian'),
(3, 'Pranata Kearsipan'),
(4, 'Pengelola Keuangan'),
(5, 'Pengolah Informasi dan Komunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `kgb`
--

CREATE TABLE `kgb` (
  `id` int NOT NULL,
  `id_pegawai` int NOT NULL,
  `tgl_sk` date NOT NULL,
  `no_sk` varchar(50) NOT NULL,
  `gaji` int NOT NULL,
  `tgl_berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kgb`
--

INSERT INTO `kgb` (`id`, `id_pegawai`, `tgl_sk`, `no_sk`, `gaji`, `tgl_berlaku`) VALUES
(2, 4, '2025-11-06', '800.1.3.2/101/KP/IV/2023', 3000000, '2025-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `telp`, `alamat`, `email`) VALUES
(1, '(0285) 381000', 'Jl. Alun Alun Utara No.1, Tambor, Nyamok, Kec. Kajen, Kabupaten Pekalongan', 'setda@pekalongankab.go.id');

-- --------------------------------------------------------

--
-- Table structure for table `kp`
--

CREATE TABLE `kp` (
  `id` int NOT NULL,
  `id_pegawai` int NOT NULL,
  `id_golongan` int NOT NULL,
  `tgl_sk` date NOT NULL,
  `no_sk` varchar(50) NOT NULL,
  `tmt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kp`
--

INSERT INTO `kp` (`id`, `id_pegawai`, `id_golongan`, `tgl_sk`, `no_sk`, `tmt`) VALUES
(1, 4, 9, '2023-02-21', '800.1.3.2/101/KP/IV/2023', '2023-04-01'),
(2, 1, 10, '2022-03-04', '823/91/KP/IV/2022', '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int NOT NULL,
  `id_jabatan` int DEFAULT NULL,
  `id_golongan` int DEFAULT NULL,
  `id_agama` int DEFAULT NULL,
  `id_pendidikan` int DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `id_jabatan`, `id_golongan`, `id_agama`, `id_pendidikan`, `nama`, `nip`, `tgl_lahir`) VALUES
(1, 2, 9, 1, 7, 'ROZALINAL HIKMAH', '197511162010012006', '1975-11-16'),
(2, 3, 12, 1, 7, 'LUCY KRISTIANASARI', '197609172009012003', '1976-09-17'),
(3, 4, 9, 1, 7, 'AGUS SUPRANOTO', '197605152010011008', '1976-05-15'),
(4, 5, 9, 1, 6, 'REFINA BELLA ALDILASA', '199110232015022002', '1991-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nama`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA/SMK'),
(4, 'D1'),
(5, 'D2'),
(6, 'D3'),
(7, 'S1'),
(8, 'S2'),
(9, 'S3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kgb`
--
ALTER TABLE `kgb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kp`
--
ALTER TABLE `kp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kgb`
--
ALTER TABLE `kgb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kp`
--
ALTER TABLE `kp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
