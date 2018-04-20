-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 10:54 AM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nik`, `nama`, `alamat`, `kota`, `telepon`, `kelamin`, `email`) VALUES
('', '', 'jakarta timur', '', '', '', ''),
('admin001', 'Nurul', 'Jalan Persahabatan VI', 'jakarta timur', '082122694604', 'Perempuan', 'info.sancuindonesia@gmail.com');

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
('agen003', '2018-04-18', 'Yuni', 'Jl.Jatimas Raya RT.03 RW.05 Karangroto Genuk Semarang', 'Semarang', '081325656978', 'izzdzak@ymail.com', 'Perempuan', '');

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
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_pembelian` int(11) NOT NULL,
  `kode_agen` varchar(10) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `sancu` int(11) NOT NULL,
  `boncu` int(11) NOT NULL,
  `pretty` int(11) NOT NULL,
  `xtreme` int(11) NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL,
  `jumlah_dibayar` int(11) NOT NULL,
  `sisa_tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`kode_pembelian`, `kode_agen`, `tanggal_pembelian`, `sancu`, `boncu`, `pretty`, `xtreme`, `jumlah_item`, `jumlah_pembelian`, `jumlah_dibayar`, `sisa_tagihan`) VALUES
(1, 'agen001', '2018-04-18', 0, 20, 20, 400, 440, 2000000, 2000000, 0),
(3, 'agen003', '2018-04-19', 12, 44, 13, 550, 619, 780000, 550000, 230000),
(4, 'agen001', '2018-04-19', 11, 33, 22, 44, 110, 805000, 430000, 375000),
(5, 'agen003', '2018-04-20', 100, 80, 1, 0, 181, 900001, 0, 900001),
(6, 'agen002', '2018-04-20', 1000, 2, 0, 0, 1002, 5000000, 600000, 4400000),
(7, 'agen001', '2018-04-20', 781, 0, 0, 500, 1281, 19002304, 501314, 18500990),
(8, 'agen002', '2018-04-20', 400, 10, 0, 40, 450, 700000, 500000, 200000),
(9, 'agen002', '2018-04-20', 99, 80, 70, 70, 319, 6000000, 400000, 5600000),
(10, 'agen003', '2018-04-20', 1000, 10, 0, 0, 1010, 30000000, 400000, 29600000),
(11, 'agen003', '2018-04-20', 600, 14, 51, 66, 731, 70704401, 14145155, 56559246),
(12, 'agen001', '2018-04-20', 400, 500, 600, 0, 1500, 40000000, 5000000, 35000000);

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
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kode_pembelian`),
  ADD KEY `kode_agen` (`kode_agen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `kode_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kode_agen`) REFERENCES `agen` (`kode_agen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
