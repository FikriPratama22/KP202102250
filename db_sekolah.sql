-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 04:28 PM
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
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `siswa_ditolak`
--

CREATE TABLE `siswa_ditolak` (
  `id_user` int(10) NOT NULL,
  `nisn` varchar(30) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa_ditolak`
--

INSERT INTO `siswa_ditolak` (`id_user`, `nisn`, `nik`, `namalengkap`, `email`, `telepon`) VALUES
(1, '091271987127', '000000000000', 'Ramli', 'ramli@gmail.com', '-'),
(2, '111222333', '222111333', 'Muklis Faridho Novianto', 'muklisfaridhonovianto@gmail.com', '087234562716'),
(3, '3202016098', '255361655278', 'Vizhianto Wahyu ', 'vizhiwx@gmail.com', '089623245148'),
(4, '99987654321', '88898765432', 'Farhan', 'fikrimpw100@gmail.com', '087654321'),
(5, '091271987127', '000000000001', 'Ramli', 'ramli@gmail.com', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_siswa`
--

CREATE TABLE `tabel_siswa` (
  `id_user` int(10) NOT NULL,
  `nisn` varchar(12) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jeniskelamin` varchar(1) NOT NULL,
  `tempatlahir` varchar(20) NOT NULL,
  `tanggallahir` date NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(10) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `ayahnik` varchar(16) NOT NULL,
  `ayahnama` varchar(50) NOT NULL,
  `ayahpendidikan` varchar(5) NOT NULL,
  `ayahpekerjaan` varchar(15) NOT NULL,
  `ayahpenghasilan` varchar(25) NOT NULL,
  `ayahtelepon` varchar(15) NOT NULL,
  `ibunik` varchar(16) NOT NULL,
  `ibunama` varchar(50) NOT NULL,
  `ibupendidikan` varchar(5) NOT NULL,
  `ibupekerjaan` varchar(15) NOT NULL,
  `ibupenghasilan` varchar(25) NOT NULL,
  `ibutelepon` varchar(15) NOT NULL,
  `walinik` varchar(16) NOT NULL DEFAULT 'NULL',
  `walinama` varchar(50) NOT NULL DEFAULT 'NULL',
  `walipekerjaan` varchar(15) NOT NULL DEFAULT 'NULL',
  `walitelepon` varchar(15) NOT NULL DEFAULT 'NULL',
  `sekolahnpsn` varchar(10) NOT NULL,
  `sekolahnama` varchar(30) NOT NULL,
  `foto` varchar(99) NOT NULL,
  `scanijazahdepan` varchar(99) NOT NULL,
  `scanijazahbelakang` varchar(99) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_siswa`
--

INSERT INTO `tabel_siswa` (`id_user`, `nisn`, `nik`, `namalengkap`, `email`, `jeniskelamin`, `tempatlahir`, `tanggallahir`, `alamat`, `agama`, `telepon`, `ayahnik`, `ayahnama`, `ayahpendidikan`, `ayahpekerjaan`, `ayahpenghasilan`, `ayahtelepon`, `ibunik`, `ibunama`, `ibupendidikan`, `ibupekerjaan`, `ibupenghasilan`, `ibutelepon`, `walinik`, `walinama`, `walipekerjaan`, `walitelepon`, `sekolahnpsn`, `sekolahnama`, `foto`, `scanijazahdepan`, `scanijazahbelakang`, `status`) VALUES
(1, '091271987127', '000000000001', 'Ramli', 'ramli@gmail.com', 'L', 'Bima, NTB', '2007-01-01', 'Bima Nusa Tenggara Barat', 'Islam', '-', '111111111111111', 'Abidin', 'SD', 'Tidak Bekerja', '<500.000', '-', '222222222', 'Aminah', 'SD', 'Tidak Bekerja', '<500.000', '-', '', '', '', '', '36256616', 'SDN 01 Bima', 'fahrurazi.jpg', 'mtsdepan.jpeg', 'budak.jpg', 'Ditolak'),
(2, '111222333', '222111333', 'Muklis Faridho Novianto', 'muklisfaridhonovianto@gmail.com', 'L', 'Sekadau', '2000-03-14', 'Sekadau Hilir', 'Islam', '087234562716', '44556677', 'Mlis', 'S1', 'PNS', '5.000.000-10.000.000', '089856564343', '556677', 'Mlas', 'S1', 'PNS', '5.000.000-10.000.000', '085656434321', '', '', '', '', '0982109181', 'SD 01 Sekadau', 'Logo Pemkot.png', 'logo industri 4.0.png', 'motor listrik.png', 'Diterima'),
(3, '3202016098', '255361655278', 'Vizhianto Wahyu ', 'vizhiwx@gmail.com', 'L', 'Pontianak', '2000-11-18', 'Tanray 2', 'Islam', '089623245148', '871261751357153', 'Vhaza', 'S1', 'Pegawai Swasta', '10.000.000-20.000.000', '0726535551', '9999928137138718', 'Vhus', 'S1', 'PNS', '10.000.000-20.000.000', '0273562612', '', '', '', '', '9871281286', 'SDN 04 Pontianak', 'download-removebg-preview.png', '2.jpg', 'Logo Pemkot.png', 'Ditolak'),
(4, '99987654321', '88898765432', 'Farhan', 'farhan@gmail.com', 'L', 'Mempawah', '2007-01-19', 'Jl.Reformasi', 'Islam', '087654321', '777654321', 'Johny', 'SMA', 'PNS', '1.500.000-3.500.000', '0987654321', '666754321', 'Scream', 'SMA', 'PNS', '3.000.000-5.000.000', '087654321', '', '', '', '', '555674321', 'SDN 02 Mempawah Hilir', 'hewaneksotis.png', 'image0.jpeg', 'pngwing.com.png', 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `foto_guru` varchar(500) NOT NULL,
  `pelajaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `foto_guru`, `pelajaran`) VALUES
(6, '197007281994032004', 'Emy Hayati, S.Pd.Ing', 'Perempuan', 'emy.jpg', 'Bahasa Inggriss'),
(7, '198109142005011003', 'Fahrurrazi, S.Pd', 'Laki-Laki', 'fahrurazi.jpg', 'IPS Terpadu'),
(8, '197706242005012006', 'Nurbaiti, S.Pd', 'Perempuan', 'nurbaiti.jpg', 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tu`
--

CREATE TABLE `tb_tu` (
  `id_tu` int(100) NOT NULL,
  `nip` int(100) NOT NULL,
  `nama_tu` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `foto_tu` varchar(100) NOT NULL,
  `tugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tu`
--

INSERT INTO `tb_tu` (`id_tu`, `nip`, `nama_tu`, `jenis_kelamin`, `foto_tu`, `tugas`) VALUES
(5, 2147483647, 'Neni Windyarti, S.Pd', 'Perempuan', 'neni.jpg', 'Kepala Tata Usaha'),
(6, 2147483647, 'Hj. Yusnani, A.Ma', 'Perempuan', 'yusnani.jpg', 'Fungsional Umum'),
(7, 6, 'Ridho Adha Tiyandi, BCF', 'Laki-Laki', 'ridho.jpg', 'Tenaga Honor'),
(12, 9, 'sartono', 'Laki-Laki', 'sartono.jpg', 'Satpam');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id_user` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id_user`, `email`, `password`, `level`) VALUES
(18, 'aaa@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin'),
(19, 'mtsn1@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(20, 'siswa@gmail.com', '7a24156a1971d85acf2ae64d9dbdf5322566636f', 'siswa'),
(21, 'fikrimpw100@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'siswa'),
(23, 'siswabaru@gmail.com', '7a24156a1971d85acf2ae64d9dbdf5322566636f', 'siswa'),
(24, 'muklisfaridho@gmail.com', '7a24156a1971d85acf2ae64d9dbdf5322566636f', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa_ditolak`
--
ALTER TABLE `siswa_ditolak`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_tu`
--
ALTER TABLE `tb_tu`
  ADD PRIMARY KEY (`id_tu`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa_ditolak`
--
ALTER TABLE `siswa_ditolak`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_tu`
--
ALTER TABLE `tb_tu`
  MODIFY `id_tu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
