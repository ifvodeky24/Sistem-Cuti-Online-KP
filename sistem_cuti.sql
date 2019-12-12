-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2019 at 04:00 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `id_cuti` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Keterangan` varchar(250) NOT NULL,
  `tanggal_mulai` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_selesai` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('Disetujui','Belum Disetujui') NOT NULL,
  `jumlah_cuti` int(50) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cuti`
--

INSERT INTO `tb_cuti` (`id_cuti`, `id_user`, `Keterangan`, `tanggal_mulai`, `tanggal_selesai`, `status`, `jumlah_cuti`, `tanggal_update`) VALUES
(16, 1, 'Keluar Kota', '2019-11-25 14:59:08', '2019-11-25 14:59:08', 'Disetujui', 1, '2019-11-25 14:59:08'),
(26, 1, 'Melahirkan', '2019-11-25 14:59:21', '2019-11-25 14:59:21', 'Belum Disetujui', 1, '2019-11-25 14:59:21'),
(27, 1, 'Menikah', '2019-11-25 14:59:29', '2019-11-25 14:59:29', 'Belum Disetujui', 1, '2019-11-25 14:59:29'),
(28, 1, 'Liburan', '2019-11-25 14:59:47', '2019-11-25 14:59:47', 'Belum Disetujui', 1, '2019-11-25 14:59:47'),
(29, 1, 'Nikah Das', '2019-11-15 17:00:00', '2019-11-20 17:00:00', 'Belum Disetujui', 1, '2019-11-25 14:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(50) NOT NULL,
  `accesToken` varchar(50) NOT NULL,
  `NIP` int(50) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `divisi` enum('Direksi','Operasional','PPIC','Produksi','HRD','Litbang&QC','Maintenance','Marketing','Purchasing','Accounting&Keuangan') NOT NULL,
  `level` enum('Admin','Manager HRD','Karyawan','Supervisor') NOT NULL,
  `cuti` int(50) NOT NULL DEFAULT 12,
  `foto_profil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `authKey`, `accesToken`, `NIP`, `nama_karyawan`, `jenis_kelamin`, `jabatan`, `divisi`, `level`, `cuti`, `foto_profil`) VALUES
(1, 'nova', '123', '123', 'user', 123, 'Nova Juliana', 'Wanita', 'HRD', 'HRD', 'Karyawan', 3, '1.jpg'),
(2, 'mita', '1234', '1234', '1234', 111111212, 'Sismeita', 'Wanita', 'HRD', 'HRD', 'Admin', 0, '3.jpg'),
(6, 'ade', '123', 'cvdfdfdf', 'dffgfbf', 232324, 'Ade Rahmanti Juna', 'Wanita', 'Manager', 'Direksi', 'Manager HRD', 0, 'hei.jpg'),
(9, 'deky', '123', 'ksdks', 'dfdf', 12131, 'Deky', 'Pria', 'HRD', 'HRD', 'Supervisor', 0, '3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD CONSTRAINT `tb_cuti_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
