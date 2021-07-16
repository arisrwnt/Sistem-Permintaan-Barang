-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 05:03 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rizki`
--

-- --------------------------------------------------------

--
-- Table structure for table `is_helm`
--

CREATE TABLE `is_helm` (
  `kode_helm` varchar(10) NOT NULL,
  `nama_helm` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_helm`
--

INSERT INTO `is_helm` (`kode_helm`, `nama_helm`, `harga_beli`, `harga_jual`, `satuan`, `stok`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
('AM-2323', 'sowan', 9000000, 10000000, 'Lembar', 70, 1, '2021-04-07 15:14:25', 1, '2021-06-06 11:30:41'),
('AM-2324', 'baru ansol', 50000, 75000, 'Pcs', 45, 1, '2021-05-27 13:45:22', 1, '2021-06-07 14:06:33'),
('B000001', 'ansol', 4900, 10000, 'Lembar', 103, 1, '2021-03-29 06:46:58', 1, '2021-06-07 14:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `is_obat_keluar`
--

CREATE TABLE `is_obat_keluar` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `kode_helm` varchar(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('pending','konfirmasi') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_obat_keluar`
--

INSERT INTO `is_obat_keluar` (`kode_transaksi`, `tujuan`, `tanggal_keluar`, `kode_helm`, `jumlah_keluar`, `created_user`, `created_date`, `status`) VALUES
('TK-2021-0000001', 'PT ruhmtech', '2021-03-29', 'B000001', 17, 1, '2021-05-27 13:55:40', 'pending'),
('TK-2021-0000002', '', '2021-04-07', 'AM-2323', 30, 1, '2021-04-07 15:16:16', 'pending'),
('TK-2021-0000003', '', '2021-05-27', 'AM-2324', 50, 1, '2021-05-27 13:48:45', 'pending'),
('TK-2021-0000004', 'pt sinergi indonesia', '2021-05-27', 'AM-2324', 25, 1, '2021-05-27 14:13:46', 'pending'),
('TK-2021-0000005', 'pt abcd', '2021-05-27', 'B000001', 50, 1, '2021-05-27 14:14:06', 'pending'),
('TK-2021-0000006', 'KP boelak', '2021-06-06', 'B000001', 50, 3, '2021-06-06 11:47:07', 'pending'),
('TK-2021-0000007', 'uhuh', '2021-06-07', 'AM-2324', 5, 1, '2021-06-07 14:06:33', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `is_obat_masuk`
--

CREATE TABLE `is_obat_masuk` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `kode_helm` varchar(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_obat_masuk`
--

INSERT INTO `is_obat_masuk` (`kode_transaksi`, `tanggal_masuk`, `kode_helm`, `jumlah_masuk`, `created_user`, `created_date`) VALUES
('TM-2021-0000001', '2021-03-29', 'B000001', 100, 1, '2021-03-29 06:49:58'),
('TM-2021-0000002', '2021-04-07', 'B000001', 100, 1, '2021-04-07 13:52:33'),
('TM-2021-0000003', '2021-04-07', 'AM-2323', 100, 1, '2021-04-07 15:15:49'),
('TM-2021-0000004', '2021-05-27', 'AM-2324', 100, 1, '2021-05-27 13:47:04'),
('TM-2021-0000005', '2021-05-20', 'AM-2324', 25, 1, '2021-05-27 13:47:55'),
('TM-2021-0000006', '2021-06-07', 'B000001', 20, 1, '2021-06-07 14:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `is_users`
--

CREATE TABLE `is_users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_users`
--

INSERT INTO `is_users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'rizki', '21232f297a57a5a743894a0e4a801fc3', 'rizki@hotmail.cm', '082110148215', 'ww.png', 'Super Admin', 'aktif', '2017-04-01 08:15:15', '2021-06-02 19:10:30'),
(3, 'gudang', 'wahidin', '202cb962ac59075b964b07152d234b70', 'wahidin@gmail.com', '085758858855', '', 'Gudang', 'aktif', '2017-04-01 08:15:15', '2021-03-29 08:28:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `is_helm`
--
ALTER TABLE `is_helm`
  ADD PRIMARY KEY (`kode_helm`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `is_obat_keluar`
--
ALTER TABLE `is_obat_keluar`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_barang` (`kode_helm`),
  ADD KEY `created_user` (`created_user`);

--
-- Indexes for table `is_obat_masuk`
--
ALTER TABLE `is_obat_masuk`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_barang` (`kode_helm`),
  ADD KEY `created_user` (`created_user`);

--
-- Indexes for table `is_users`
--
ALTER TABLE `is_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `is_users`
--
ALTER TABLE `is_users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `is_helm`
--
ALTER TABLE `is_helm`
  ADD CONSTRAINT `is_helm_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_helm_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_obat_masuk`
--
ALTER TABLE `is_obat_masuk`
  ADD CONSTRAINT `is_obat_masuk_ibfk_1` FOREIGN KEY (`kode_helm`) REFERENCES `is_helm` (`kode_helm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_obat_masuk_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
