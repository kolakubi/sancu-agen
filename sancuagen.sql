-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 05:15 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sancuagen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agen`
--

CREATE TABLE `agen` (
  `kode_agen` varchar(10) NOT NULL,
  `tgl_gabung` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `fotoprofil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agen`
--

INSERT INTO `agen` (`kode_agen`, `tgl_gabung`, `nama`, `alamat`, `kota`, `telepon`, `email`, `kelamin`, `fotoprofil`) VALUES
('agen001', '2018-04-15', 'M Ikhsan', 'Jln Raya PKP ciracasssssssss', 'DKI Jakarta', '081293925404', 'ikhsanmuhammad74@yahoo.co.id', 'Laki-laki', 'upload/profil/profil-ihsan.jpg'),
('agen002', '2018-04-17', 'Abin', 'Jl. Cipinang Pulo RT.13/RW 12 no 24, kel. Cipinang Besar Utara Kec.Jatinegara Jakt-Tim 13410', 'Jakarta Timur', '085219441217', 'tary_minie@yahoo.co.id', 'Laki-laki', 'upload/profil/abin.jpg'),
('agen003', '2018-04-18', 'Yuni', 'Jl.Jatimas Raya RT.03 RW.05 Karangroto Genuk Semarang', 'Semarang', '081325656978', 'izzdzak@ymail.com', 'Perempuan', ''),
('agen004', '2018-04-21', 'Mal', 'jalan jalan ah', 'Jakarta', '02101201020', 'mal@mal.com', 'Laki-laki', '');

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `kode_bonus` int(11) NOT NULL,
  `kode_agen` varchar(10) NOT NULL,
  `jumlah_bonus` int(11) NOT NULL,
  `ribuan` int(11) NOT NULL,
  `puluhan_ribu` int(11) NOT NULL,
  `total_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`kode_bonus`, `kode_agen`, `jumlah_bonus`, `ribuan`, `puluhan_ribu`, `total_item`) VALUES
(5, 'agen001', 650000, 2001, 1, 2650);

-- --------------------------------------------------------

--
-- Table structure for table `bonus_detail`
--

CREATE TABLE `bonus_detail` (
  `kode_bonus` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bonus` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `kode_bonus_detail` int(11) NOT NULL,
  `history_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonus_detail`
--

INSERT INTO `bonus_detail` (`kode_bonus`, `status`, `bonus`, `jumlah_item`, `tanggal_pembelian`, `kode_bonus_detail`, `history_item`) VALUES
(5, '', 0, 500, '2018-05-01', 51, 500),
(5, '', 0, 350, '2018-05-03', 52, 850),
(5, '', 350000, 1000, '2018-05-05', 53, 1850),
(5, '', 300000, 800, '2018-05-08', 54, 2650);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `level`) VALUES
('admin001', 'password', 1),
('agen001', 'password', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kode_pembayaran` int(11) NOT NULL,
  `kode_pembelian` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL,
  `sisa_tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kode_pembayaran`, `kode_pembelian`, `tanggal_pembelian`, `jumlah_pembelian`, `sisa_tagihan`) VALUES
(74, 102, '2018-05-01', 900000, 0),
(75, 103, '2018-05-03', 450000, 0),
(76, 104, '2018-05-05', 1200000, 350000),
(77, 105, '2018-05-08', 1200000, 900000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_detail`
--

CREATE TABLE `pembayaran_detail` (
  `kode_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `tagihan_sebelumnya` int(11) NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `sisa_tagihan` int(11) NOT NULL,
  `kode_pembayaran_detail` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_detail`
--

INSERT INTO `pembayaran_detail` (`kode_pembayaran`, `tanggal_pembayaran`, `tagihan_sebelumnya`, `nominal_pembayaran`, `sisa_tagihan`, `kode_pembayaran_detail`, `keterangan`) VALUES
(74, '2018-05-01', 900000, 500000, 400000, 61, 'Bayar Pembelian tgl 1 Mei BCA'),
(74, '2018-05-02', 400000, 300000, 100000, 62, 'Bayar Pembelian tgl 1 Mei Mandiri'),
(74, '2018-05-04', 100000, 100000, 0, 63, 'Bayar Pembelian tgl 1 Mei BCA'),
(76, '2018-05-05', 1200000, 350000, 850000, 64, 'bonus pembelian 2018-05-05'),
(75, '2018-05-06', 450000, 450000, 0, 65, 'Bayar Pembelian tgl 4 Mei Mandiri'),
(76, '2018-05-07', 850000, 500000, 350000, 66, 'Bayar Pembelian tgl 7 Mei BCA'),
(77, '2018-05-08', 1200000, 300000, 900000, 67, 'bonus pembelian 2018-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_pembelian` int(11) NOT NULL,
  `kode_agen` varchar(10) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`kode_pembelian`, `kode_agen`, `tanggal_pembelian`, `total_item`, `total_pembelian`) VALUES
(102, 'agen001', '2018-05-01', 900, 900000),
(103, 'agen001', '2018-05-03', 450, 450000),
(104, 'agen001', '2018-05-05', 1200, 1200000),
(105, 'agen001', '2018-05-08', 1200, 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `kode_pembelian_detail` int(11) NOT NULL,
  `kode_pembelian` int(11) NOT NULL,
  `kode_item` varchar(255) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `total_harga_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`kode_pembelian_detail`, `kode_pembelian`, `kode_item`, `jumlah_item`, `total_harga_item`) VALUES
(155, 102, 'sancu', 200, 200000),
(156, 102, 'boncu', 300, 300000),
(157, 102, 'pretty', 200, 200000),
(158, 102, 'xtreme', 200, 200000),
(159, 103, 'sancu', 300, 300000),
(160, 103, 'boncu', 50, 50000),
(161, 103, 'pretty', 50, 50000),
(162, 103, 'xtreme', 50, 50000),
(163, 104, 'sancu', 500, 500000),
(164, 104, 'boncu', 500, 500000),
(165, 104, 'pretty', 100, 100000),
(166, 104, 'xtreme', 100, 100000),
(167, 105, 'sancu', 500, 500000),
(168, 105, 'boncu', 300, 300000),
(169, 105, 'pretty', 200, 200000),
(170, 105, 'xtreme', 200, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_item` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_item`, `Nama`) VALUES
('boncu', 'boncu'),
('pretty', 'pretty'),
('sancu', 'sancu'),
('xtreme', 'xtreme');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `kode_saldo` int(11) NOT NULL,
  `kode_agen` varchar(10) NOT NULL,
  `tgl_perubahan` date NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`kode_saldo`, `kode_agen`, `tgl_perubahan`, `debet`, `kredit`, `nominal`, `keterangan`) VALUES
(107, 'agen001', '2018-05-01', 900000, 0, 900000, 'pembelian'),
(108, 'agen001', '2018-05-01', 0, 500000, 400000, 'Bayar Pembelian tgl 1 Mei BCA'),
(109, 'agen001', '2018-05-02', 0, 300000, 100000, 'Bayar Pembelian tgl 1 Mei Mandiri'),
(110, 'agen001', '2018-05-03', 450000, 0, 550000, 'pembelian'),
(111, 'agen001', '2018-05-04', 0, 100000, 450000, 'Bayar Pembelian tgl 1 Mei BCA'),
(112, 'agen001', '2018-05-05', 1200000, 0, 1650000, 'pembelian'),
(113, 'agen001', '2018-05-05', 0, 350000, 1300000, 'bonus pembelian 2018-05-05'),
(114, 'agen001', '2018-05-06', 0, 450000, 850000, 'Bayar Pembelian tgl 4 Mei Mandiri'),
(115, 'agen001', '2018-05-07', 0, 500000, 350000, 'Bayar Pembelian tgl 7 Mei BCA'),
(116, 'agen001', '2018-05-08', 1200000, 0, 1550000, 'pembelian'),
(117, 'agen001', '2018-05-08', 0, 300000, 1250000, 'bonus pembelian 2018-05-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `agen`
--
ALTER TABLE `agen`
  ADD PRIMARY KEY (`kode_agen`);

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`kode_bonus`),
  ADD KEY `kode_agen` (`kode_agen`);

--
-- Indexes for table `bonus_detail`
--
ALTER TABLE `bonus_detail`
  ADD PRIMARY KEY (`kode_bonus_detail`),
  ADD KEY `kode_bonus` (`kode_bonus`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`),
  ADD KEY `kode_pembelian` (`kode_pembelian`);

--
-- Indexes for table `pembayaran_detail`
--
ALTER TABLE `pembayaran_detail`
  ADD PRIMARY KEY (`kode_pembayaran_detail`),
  ADD KEY `kode_pembayaran` (`kode_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kode_pembelian`),
  ADD KEY `kode_agen` (`kode_agen`),
  ADD KEY `kode_pembelian` (`kode_pembelian`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`kode_pembelian_detail`),
  ADD KEY `kode_item` (`kode_item`),
  ADD KEY `pembelian_detail_ibfk_1` (`kode_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_item`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`kode_saldo`),
  ADD KEY `kode_agen` (`kode_agen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `kode_bonus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bonus_detail`
--
ALTER TABLE `bonus_detail`
  MODIFY `kode_bonus_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `kode_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `pembayaran_detail`
--
ALTER TABLE `pembayaran_detail`
  MODIFY `kode_pembayaran_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `kode_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `kode_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `kode_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bonus`
--
ALTER TABLE `bonus`
  ADD CONSTRAINT `bonus_ibfk_1` FOREIGN KEY (`kode_agen`) REFERENCES `agen` (`kode_agen`);

--
-- Constraints for table `bonus_detail`
--
ALTER TABLE `bonus_detail`
  ADD CONSTRAINT `bonus_detail_ibfk_1` FOREIGN KEY (`kode_bonus`) REFERENCES `bonus` (`kode_bonus`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`kode_pembelian`) REFERENCES `pembelian` (`kode_pembelian`);

--
-- Constraints for table `pembayaran_detail`
--
ALTER TABLE `pembayaran_detail`
  ADD CONSTRAINT `pembayaran_detail_ibfk_1` FOREIGN KEY (`kode_pembayaran`) REFERENCES `pembayaran` (`kode_pembayaran`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kode_agen`) REFERENCES `agen` (`kode_agen`);

--
-- Constraints for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD CONSTRAINT `pembelian_detail_ibfk_1` FOREIGN KEY (`kode_pembelian`) REFERENCES `pembelian` (`kode_pembelian`),
  ADD CONSTRAINT `pembelian_detail_ibfk_2` FOREIGN KEY (`kode_item`) REFERENCES `produk` (`kode_item`);

--
-- Constraints for table `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `saldo_ibfk_1` FOREIGN KEY (`kode_agen`) REFERENCES `agen` (`kode_agen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
