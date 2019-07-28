-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 06:50 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `kategori_artikel` varchar(50) NOT NULL,
  `judul_artikel` varchar(30) NOT NULL,
  `desk_artikel` text NOT NULL,
  `isi_artikel` text NOT NULL,
  `sumber_artikel` varchar(100) NOT NULL,
  `id_pem` int(11) DEFAULT NULL,
  `user_ukm` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `kategori_artikel`, `judul_artikel`, `desk_artikel`, `isi_artikel`, `sumber_artikel`, `id_pem`, `user_ukm`) VALUES
(3, 'Ini kategori', 'Ini judul1', 'ini deskripsi 1', 'ini isi artikel 1', 'ini sumber artikel 1', 1, NULL),
(4, 'ini kategori artikel 2 ', 'ini judul artikel 2', 'ini desk artikel 2', 'ini isi artikel 2', 'ini sumber artikel 2', NULL, 'agroTech'),
(5, 'Kategori 3', 'Judul 3', 'Deskripsi 3', 'Isi 3', 'Sumber 3', NULL, 'agroTech'),
(6, 'Kategori 4', 'Judul 4', 'Deskripsi 4', 'Isi  4', 'Sumber 4', 2, NULL),
(7, 'hjgj', 'ghjghj', 'ghjgjh', 'gjhgj', 'ghjgj', NULL, 'rahman');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `pemilik_produk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `pemilik_produk`) VALUES
(1, 'Jagung Surabaya', 'Jagung ini rasanya manis keasinan', 'jagungBerkualitas'),
(2, 'Jagung Bogor', 'Jagung ini rasanya manis tanpa asin ', 'jagungBerkualitas'),
(3, 'Mesin Pencari Bibit Unggul', 'Mesin ini berfungsi mencari bibit unggul', 'agroTech'),
(4, 'Mesin Pencepat Panen', 'Mesin ini berguna untu mempercepat panen', 'agroTech'),
(7, 'Pertanian Kopi Cepat', 'Ini pertanian Kopi', 'Andri Pertanian'),
(8, 'wjwjjw', 'jkjkkj', 'rahman');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `uname`, `password`) VALUES
(1, 'staff_001', '12345'),
(2, 'staff_002', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `namaUKM` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `pemilik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`namaUKM`, `deskripsi`, `pemilik`) VALUES
('agroTech', 'alalal', 'cyberneoo'),
('Andri Pertanian', '123', 'andri123'),
('jagungBerkualitas', 'Ini jagung bagus banget loh', 'desabojong12'),
('rahman', 'kon', 'manskuy');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role`) VALUES
('andri123', '123456', 2),
('anjing123', '123', 1),
('bahlul123', 'anjing', 1),
('cyberneoo', '1234', 2),
('desabojong12', '123', 2),
('manskuy', 'manskuy', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_pem` (`id_pem`),
  ADD KEY `user_ukm` (`user_ukm`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `pemilik_produk` (`pemilik_produk`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`namaUKM`),
  ADD KEY `pemilik` (`pemilik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`user_ukm`) REFERENCES `ukm` (`namaUKM`),
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`id_pem`) REFERENCES `staff` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`pemilik_produk`) REFERENCES `ukm` (`namaUKM`);

--
-- Constraints for table `ukm`
--
ALTER TABLE `ukm`
  ADD CONSTRAINT `ukm_ibfk_1` FOREIGN KEY (`pemilik`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
