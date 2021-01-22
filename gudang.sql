-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 01:45 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `kd_material` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `varian` enum('Arabica','Robusta') NOT NULL,
  `tipe` enum('Semi Washed','Full Washed','Natural Fermented','Honey Proses','Wine Fermented') NOT NULL,
  `kemasan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bentuk` enum('Bubuk Kopi','Biji Kopi Roast') NOT NULL,
  `stok` int(11) NOT NULL,
  `detail` enum('Kasir','Gudang') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`kd_material`, `nama`, `varian`, `tipe`, `kemasan`, `jumlah`, `bentuk`, `stok`, `detail`) VALUES
(36, 'Kopi Atlantik 100gr', 'Arabica', 'Semi Washed', 100, 7, 'Bubuk Kopi', 924, 'Gudang'),
(37, 'Kopi Klotok 150gr', 'Arabica', 'Full Washed', 150, 1, 'Bubuk Kopi', 438, 'Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `material_keluar`
--

CREATE TABLE `material_keluar` (
  `kd_keluar` int(11) NOT NULL,
  `kd_material` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kemasan` int(11) NOT NULL,
  `detail` enum('kasir','gudang','','') NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_keluar`
--

INSERT INTO `material_keluar` (`kd_keluar`, `kd_material`, `waktu`, `jumlah`, `kemasan`, `detail`, `status`) VALUES
(21, 37, '2021-01-21 01:29:38', 2, 6, 'gudang', 1),
(22, 36, '2021-01-21 01:29:52', 4, 44, 'gudang', 1);

--
-- Triggers `material_keluar`
--
DELIMITER $$
CREATE TRIGGER `material_out` AFTER INSERT ON `material_keluar` FOR EACH ROW BEGIN 
	UPDATE material SET stok = stok - (NEW.jumlah * NEW.kemasan),
    					jumlah = jumlah - NEW.jumlah
	WHERE NEW.kd_material=material.kd_material
    AND material.stok > NEW.jumlah ;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `mtrl_klr_update` AFTER UPDATE ON `material_keluar` FOR EACH ROW BEGIN 
	UPDATE material SET stok = (stok + (OLD.jumlah*OLD.kemasan))-(NEW.jumlah*OLD.kemasan)
	WHERE NEW.kd_material=material.kd_material AND NEW.detail='Gudang';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `on_delete` AFTER DELETE ON `material_keluar` FOR EACH ROW BEGIN 
	UPDATE material SET stok = stok + OLD.jumlah
	WHERE OLD.kd_material=material.kd_material AND OLD.detail='Gudang';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `material_masuk`
--

CREATE TABLE `material_masuk` (
  `kd_masuk` int(11) NOT NULL,
  `kd_material` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `kemasan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `supplier` int(11) DEFAULT NULL,
  `detail` enum('Kasir','Gudang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_masuk`
--

INSERT INTO `material_masuk` (`kd_masuk`, `kd_material`, `waktu`, `kemasan`, `jumlah`, `supplier`, `detail`) VALUES
(54, 36, '2021-01-20 17:19:34', 100, 10, 9, 'Gudang'),
(55, 36, '2021-01-20 17:19:34', 100, 10, 9, 'Gudang'),
(56, 37, '2021-01-20 17:20:52', 150, 2, 9, 'Gudang');

--
-- Triggers `material_masuk`
--
DELIMITER $$
CREATE TRIGGER `gudang_masuk` AFTER INSERT ON `material_masuk` FOR EACH ROW BEGIN 
	UPDATE material SET stok = stok + (NEW.jumlah * NEW.kemasan), kemasan = NEW.kemasan,jumlah=NEW.jumlah
	WHERE NEW.kd_material=material.kd_material AND NEW.detail='Gudang';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kasir_masuk` BEFORE INSERT ON `material_masuk` FOR EACH ROW BEGIN 
	UPDATE material SET stok = stok + NEW.jumlah
	WHERE NEW.kd_material=material.kd_material AND NEW.detail='Kasir';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `mtrl_in_del` AFTER DELETE ON `material_masuk` FOR EACH ROW BEGIN 
	UPDATE material SET stok = stok - OLD.jumlah
	WHERE OLD.kd_material=material.kd_material AND OLD.detail='Gudang';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `mtrl_update` AFTER UPDATE ON `material_masuk` FOR EACH ROW BEGIN 
	UPDATE material SET stok = (stok - (OLD.jumlah * OLD.kemasan))  + (NEW.jumlah * NEW.kemasan), kemasan = NEW.kemasan,jumlah=NEW.jumlah
	WHERE NEW.kd_material=material.kd_material AND NEW.detail='Gudang';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenkel` enum('L','P','','') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jenkel`, `tgl_lahir`, `no_hp`, `alamat`, `role`) VALUES
(13, 'Mamang Kasbor', 'L', '2021-01-01', '081521555980', 'Yogyakarta', 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_sup` int(11) NOT NULL,
  `nama_sup` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_sup`, `nama_sup`, `owner`, `no_hp`, `alamat`) VALUES
(9, 'CV. Rukun Punia', 'Bpk. Surya Winata', '081521555980', 'Mlati, Sleman, Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `id_pegawai`, `role`) VALUES
(1, 'admin', '$2y$10$FmO8fDbUZcPH7X9NP1NGoetVZ5YCo86uzQ2iBcOmH9UFBaNc1L86a', 0, 1),
(12, 'user', '$2y$10$SNKA29Yp.cgWPcMNQG.8keQ8V.ho5h9UaTSZWWAJr3bepUhZM5ZA2', 13, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`kd_material`);

--
-- Indexes for table `material_keluar`
--
ALTER TABLE `material_keluar`
  ADD PRIMARY KEY (`kd_keluar`),
  ADD KEY `kd_material` (`kd_material`);

--
-- Indexes for table `material_masuk`
--
ALTER TABLE `material_masuk`
  ADD PRIMARY KEY (`kd_masuk`),
  ADD KEY `kd_material` (`kd_material`),
  ADD KEY `supplier` (`supplier`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_sup`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `kd_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `material_keluar`
--
ALTER TABLE `material_keluar`
  MODIFY `kd_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `material_masuk`
--
ALTER TABLE `material_masuk`
  MODIFY `kd_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_sup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `material_keluar`
--
ALTER TABLE `material_keluar`
  ADD CONSTRAINT `material_keluar_ibfk_1` FOREIGN KEY (`kd_material`) REFERENCES `material` (`kd_material`);

--
-- Constraints for table `material_masuk`
--
ALTER TABLE `material_masuk`
  ADD CONSTRAINT `material_masuk_ibfk_1` FOREIGN KEY (`kd_material`) REFERENCES `material` (`kd_material`),
  ADD CONSTRAINT `material_masuk_ibfk_2` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`id_sup`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
