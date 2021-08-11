-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`id`, `kode`, `nama`, `username`, `password`) VALUES
(1,	'PGN17',	'Admin area',	'admin',	'$2y$10$w155SIO6.RMI4.Gs6N4lLuRP.sd2UzZhWb5Z1Xop8Xv1NVlE0yG9G'),
(2,	'Admin - 68',	'Miftahul',	'sales_area1',	'$2y$10$vprw1RUyziDsh5KUHGDDFuBmVAzTcR0Aupp0WtukRtZrvofu6pLFO');

DROP TABLE IF EXISTS `cabang`;
CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_cabang` varchar(11) DEFAULT NULL,
  `nama_cabang` varchar(80) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cabang` (`id_cabang`, `kode_cabang`, `nama_cabang`, `telepon`, `alamat`) VALUES
(2,	'F533',	'Chatime LW Foodcourt',	'021987654',	'Living World, Alam Sutra, Serpong'),
(3,	'F12S',	'Chatime Aeon Mall, BSD',	'0213234532',	'AEON MALL, BSD'),
(4,	'QB1',	'Chatime Q Big, BSD',	'021324354',	'BSD, Serpong');

DROP TABLE IF EXISTS `detail_laporan`;
CREATE TABLE `detail_laporan` (
  `no_laporan` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `detail_laporan` (`no_laporan`, `nama_produk`, `jumlah`) VALUES
('LAP1624765073',	'Chatime Susu',	2),
('LAP1624765073',	'Chatime Milk Tea',	4);

DROP TABLE IF EXISTS `kasir`;
CREATE TABLE `kasir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` int(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kasir` (`id`, `nik`, `nama`, `id_cabang`, `username`, `password`) VALUES
(1,	24314,	'Gita',	3,	'gita',	'$2y$10$FnL663lR7oxzPbUf/ofNHuPa.lpOxGn3U2a9hNrz9p4lTWo6VoMEy');

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_produk` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kategori` (`id_kategori`, `kategori_produk`) VALUES
(1,	'Milk Tea'),
(2,	'Smoothies');

DROP TABLE IF EXISTS `laporan`;
CREATE TABLE `laporan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `shopee_food` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `no_terima` (`no_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `laporan` (`id`, `no_laporan`, `tgl_laporan`, `jam_laporan`, `nama_cabang`, `nama_store_manager`, `target`, `nett`, `mtd_nett`, `sales_race`, `sales_achieve`, `sc`, `large`, `grab`, `gofood`, `walk_in`, `shopee_food`, `status`) VALUES
(15,	'LAP1624765073',	'27/06/2021',	'10:37:53',	'Chatime Aeon Mall, BSD',	'Mif',	200000,	3000000,	2100000,	'43%',	'55%',	33,	33,	430000,	770000,	77000,	756700,	'REVIEW');

DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(225) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `id_kategori`, `harga`) VALUES
(1,	'FF!',	'Chatime Susu',	2,	54000),
(3,	'F21',	'Ketam Hitam',	1,	20000),
(4,	'SS2',	'Chatime Milk Tea',	1,	32000);

DROP TABLE IF EXISTS `store_manager`;
CREATE TABLE `store_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_cabang` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `store_manager` (`id`, `kode`, `nama`, `id_cabang`, `username`, `password`) VALUES
(6,	'Kasir - 61',	'Lina',	2,	'lina',	'$2y$10$gQzf0z2QXDyEC8UV1Dj6heEzsSw8I7ta.8LOjbHHU6QF2fikGnHhm'),
(7,	'Kasir - 38',	'Mif',	3,	'mif',	'$2y$10$ZYbqtZ50/dh/khcDO2QblOHnQiapANq6nNdutcZLfwmBIXUQOY8Dq');

-- 2021-08-09 13:19:15
