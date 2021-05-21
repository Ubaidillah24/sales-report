-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 05:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `kode`, `nama`, `username`, `password`) VALUES
(1, 'PGN17', 'Admin area', 'admin', '$2y$10$w155SIO6.RMI4.Gs6N4lLuRP.sd2UzZhWb5Z1Xop8Xv1NVlE0yG9G'),
(2, 'Admin - 68', 'Miftahul', 'sales_area1', '$2y$10$vprw1RUyziDsh5KUHGDDFuBmVAzTcR0Aupp0WtukRtZrvofu6pLFO');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL,
  `kode_cabang` varchar(11) DEFAULT NULL,
  `nama_cabang` varchar(80) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `kode_cabang`, `nama_cabang`, `telepon`, `alamat`) VALUES
(2, 'F533', 'Chatime LW Foodcourt', '021987654', 'Living World, Alam Sutra, Serpong'),
(3, 'F12S', 'Chatime Aeon Mall, BSD', '0213234532', 'AEON MALL, BSD'),
(4, 'QB1', 'Chatime Q Big, BSD', '021324354', 'BSD, Serpong');

-- --------------------------------------------------------

--
-- Table structure for table `detail_laporan`
--

CREATE TABLE `detail_laporan` (
  `no_laporan` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_laporan`
--

INSERT INTO `detail_laporan` (`no_laporan`, `nama_produk`, `jumlah`) VALUES
('LAP1619241344', 'Chatime Susu', 1),
('LAP1619242513', 'Chatime Susu', 1),
('LAP1619242513', 'Chatime Milk Tea', 1),
('LAP1619243921', 'Ketam Hitam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori_produk`) VALUES
(1, 'Milk Tea'),
(2, 'Smoothies');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `no_laporan` varchar(25) DEFAULT NULL,
  `tgl_laporan` varchar(25) DEFAULT NULL,
  `jam_laporan` varchar(10) DEFAULT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `nama_store_manager` varchar(50) NOT NULL,
  `target` int(11) NOT NULL,
  `nett` int(11) NOT NULL,
  `mtd_nett` int(11) NOT NULL,
  `sales_race` varchar(11) NOT NULL,
  `sales_achieve` varchar(11) NOT NULL,
  `sc` int(11) NOT NULL,
  `large` int(11) NOT NULL,
  `grab` int(11) NOT NULL,
  `gofood` int(11) NOT NULL,
  `walk_in` int(11) NOT NULL,
  `shopee_food` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `no_laporan`, `tgl_laporan`, `jam_laporan`, `nama_cabang`, `nama_store_manager`, `target`, `nett`, `mtd_nett`, `sales_race`, `sales_achieve`, `sc`, `large`, `grab`, `gofood`, `walk_in`, `shopee_food`) VALUES
(7, 'LAP1619241344', '24/04/2021', '12:15:44', 'Chatime LW Foodcourt', 'Lina', 10000, 20000, 234400, '43%', '43%', 44, 33, 2323000, 123000, 1100000, 234000),
(9, 'LAP1619242513', '24/04/2021', '12:35:13', 'Chatime Aeon Mall, BSD', 'Mif', 30000000, 32000000, 124000, '43%', '43%', 44, 55, 1000000, 2000000, 3000000, 500000),
(11, 'LAP1619243921', '24/04/2021', '12:58:41', 'Chatime Q Big, BSD', 'Admin area', 12300000, 3000000, 2800000, '67%', '55%', 45, 67, 1000000, 700000, 2000000, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `id_kategori`, `harga`) VALUES
(1, 'FF!', 'Chatime Susu', 2, 54000),
(3, 'F21', 'Ketam Hitam', 1, 20000),
(4, 'SS2', 'Chatime Milk Tea', 1, 32000);

-- --------------------------------------------------------

--
-- Table structure for table `store_manager`
--

CREATE TABLE `store_manager` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_manager`
--

INSERT INTO `store_manager` (`id`, `kode`, `nama`, `id_cabang`, `username`, `password`) VALUES
(6, 'Kasir - 61', 'Lina', 2, 'lina', '$2y$10$gQzf0z2QXDyEC8UV1Dj6heEzsSw8I7ta.8LOjbHHU6QF2fikGnHhm'),
(7, 'Kasir - 38', 'Mif', 3, 'mif', '$2y$10$ZYbqtZ50/dh/khcDO2QblOHnQiapANq6nNdutcZLfwmBIXUQOY8Dq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_terima` (`no_laporan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `store_manager`
--
ALTER TABLE `store_manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_cabang` (`id_cabang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store_manager`
--
ALTER TABLE `store_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
