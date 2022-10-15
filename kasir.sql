-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 12:10 PM
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
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok_barang`) VALUES
('bk_bb', 'Buku Tulis Big Boss', 1700, 250),
('bk_kk', 'Buku Tulis Kiky', 1400, 1200),
('bk_sd', 'Buku Tulis Sidu', 1500, 2000),
('drp_snw', 'Drawing Pen Snowman', 7800, 150),
('flw_ppr', 'Flower Wrapping Paper', 2350, 20),
('krt_jsm', 'Karton Jasmine', 590, 1000),
('krt_mnl', 'Kertas Cover Jilid Manila', 700, 200),
('krt_ns', 'Kertas Nasi ', 1700, 1000),
('ll_jyk', 'Loose Leaf Joyko ', 4700, 20),
('pl_2b_jyk', 'Pensil 2B Joyko ', 8250, 100),
('pl_2b_mn', 'Pensil 2B Montana', 7400, 1200),
('pl_3b_fc', 'Pensil 3B Faber Castell', 3650, 500),
('pl_el', 'Pensil Eternal ', 8688, 200),
('pl_mk_jyk', 'Pensil Mekanik Joyko', 2500, 120),
('pl_pan', 'Pensil Painting', 9900, 230),
('pn_jyk', 'Pena Joyko', 1500, 230),
('pn_kkr', 'Pena Kokoro', 5500, 210),
('pn_pcl', 'Pena Piccolo', 15300, 100),
('pn_plt', 'Pena Pilot', 1000, 500),
('pn_snw', 'Pena Snowman', 3500, 75),
('ps_ew', 'Penghapus Elastis Warna', 4000, 200),
('ps_hfck', 'Penghapus Hitam Faber Castell Kecil', 3000, 200),
('ps_mic', 'Penghapus Model Ice Cream', 7930, 55),
('ps_mk_jyk', 'Penghapus Magnetik Joyko', 6300, 120),
('ps_pc', 'Penghapus PVC', 3000, 500),
('ptn_ad', 'Pocket Note Anime Death', 9799, 20),
('stn_glx', 'Sticky Note Galaxy', 2990, 300),
('tpx_rl', 'Tip-Ex Roller', 27755, 20);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` varchar(5) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `nama_jenis`) VALUES
('bk', 'Buku Tulis'),
('drp', 'Drawing Pen'),
('flw', 'Flower Wrapping'),
('krt', 'Karton '),
('ll', 'Loose Leaf'),
('pl', 'Pensil'),
('pn', 'Pena'),
('ps', 'Penghapus'),
('ptn', 'Pocket Note'),
('stn', 'Sticky Note'),
('tpx', 'Tip-Ex');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_depan`, `nama_belakang`, `no_telp`) VALUES
('A101', 'Indah', 'Permatasari', '081226329912'),
('A102', 'Robby ', 'Simanjuntak', '082377432211'),
('A103', 'Ferry', 'Irawan', '089112762211'),
('A104', 'Kurnia', 'Untung', '081277361621'),
('A105', 'Ayu', 'Kumala Sari', '082736172838'),
('A106', 'Bambang', 'Wirawan', '084763672876'),
('A107', 'Primaria', 'Mentanasari', '083672817261'),
('A108', 'Permata', 'Sari Dewi', '087763882763'),
('A109', 'Hermawan', 'Resmianda', '076283718397'),
('A110', 'Talia', 'Lintang Arum', '087263524171'),
('A111', 'Olivia', 'Grace', '082213736281'),
('A112', 'Wina', 'Edwin', '086325617238');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `metode_pembayaran` varchar(20) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `status_pembayaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `total`, `metode_pembayaran`, `bayar`, `kembalian`, `waktu`, `status_pembayaran`) VALUES
(1010, 64000, 'Virtual Money', 64000, 0, '2022-10-06 18:55:00', 'Lunas'),
(1011, 10000, 'Cash', 10000, 0, '2022-09-29 14:03:14', 'lunas'),
(1012, 23500, 'Cash', 25000, 1500, '2022-10-05 09:57:00', 'lunas'),
(1013, 5000, 'Cash', 5000, 0, '2022-10-05 10:59:00', 'lunas'),
(1014, 6200, 'Cash', 7000, 800, '2022-09-27 22:00:00', 'lunas'),
(1015, 23200, 'Cash', 25000, 1800, '2022-09-29 10:02:00', 'lunas'),
(1016, 2300, 'Cash', 2500, 200, '2022-09-29 10:02:00', 'lunas'),
(1017, 7300, 'Cash', 1000, 2700, '2022-09-15 10:02:00', 'lunas'),
(1018, 23500, 'Cash', 24000, 500, '2022-09-25 11:02:00', 'lunas'),
(1019, 52000, 'Virtual Money', 52000, 0, '2022-10-04 11:04:00', 'lunas'),
(1020, 1500, 'Virtual Money', 1500, 0, '2022-10-04 17:03:00', 'Lunas'),
(1110, 11000, 'Cash', 12000, 1000, '2022-09-28 20:01:00', 'lunas'),
(1210, 34500, 'Cash', 35000, 500, '2022-09-20 00:06:00', 'lunas'),
(1310, 12000, 'Virtual Money', 12000, 0, '2022-10-03 11:05:00', 'lunas'),
(1410, 2500, 'Cash', 2500, 0, '2022-10-05 09:35:00', 'lunas'),
(1411, 10000, 'Virtual Money', 10000, 0, '2022-10-03 17:06:00', 'Lunas'),
(1412, 1200, 'Cash', 0, 0, '2022-10-03 19:06:00', 'Lunas'),
(1413, 2000, 'Cash', 2000, 0, '2022-09-28 18:05:00', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `no_telepon`, `password`) VALUES
(1, 'Satria', '2233121', '123'),
(2, 'Reza', '534124123', '123'),
(3, 'Ramadhan', '351331231', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1414;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
