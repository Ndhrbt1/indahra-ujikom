-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 01:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_biaya_rental`
--

CREATE TABLE `t_biaya_rental` (
  `id` int(11) NOT NULL,
  `Mobil` varchar(50) DEFAULT NULL,
  `Biaya_Rental_per_Hari` decimal(10,2) DEFAULT NULL,
  `Biaya_Extra_per_Hour` decimal(10,2) DEFAULT 100000.00,
  `Program` varchar(50) DEFAULT NULL,
  `Diskon` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_biaya_rental`
--

INSERT INTO `t_biaya_rental` (`id`, `Mobil`, `Biaya_Rental_per_Hari`, `Biaya_Extra_per_Hour`, `Program`, `Diskon`) VALUES
(1, 'Avanza', 640000.00, 100000.00, 'Paket 1', 10.00),
(2, 'Avanza', 640000.00, 100000.00, 'Paket 2', 20.00),
(3, 'Avanza', 640000.00, 100000.00, 'Paket 3', 25.00),
(4, 'Avanza', 640000.00, 100000.00, 'Harian', 0.00),
(5, 'Innova', 890000.00, 100000.00, 'Paket 1', 10.00),
(6, 'Innova', 890000.00, 100000.00, 'Paket 2', 20.00),
(7, 'Innova', 890000.00, 100000.00, 'Paket 3', 25.00),
(8, 'Innova', 890000.00, 100000.00, 'Harian', 0.00),
(9, 'New Altis', 1500000.00, 100000.00, 'Paket 1', 10.00),
(10, 'New Altis', 1500000.00, 100000.00, 'Paket 2', 20.00),
(11, 'New Altis', 1500000.00, 100000.00, 'Paket 3', 25.00),
(12, 'New Altis', 1500000.00, 100000.00, 'Harian', 0.00),
(13, 'New Camry', 2190000.00, 100000.00, 'Paket 1', 10.00),
(14, 'New Camry', 2190000.00, 100000.00, 'Paket 2', 20.00),
(15, 'New Camry', 2190000.00, 100000.00, 'Paket 3', 25.00),
(16, 'New Camry', 2190000.00, 100000.00, 'Harian', 0.00),
(17, 'Alphard', 3220000.00, 100000.00, 'Paket 1', 10.00),
(18, 'Alphard', 3220000.00, 100000.00, 'Paket 2', 20.00),
(19, 'Alphard', 3220000.00, 100000.00, 'Paket 3', 25.00),
(20, 'Alphard', 3220000.00, 100000.00, 'Harian', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `t_sewa`
--

CREATE TABLE `t_sewa` (
  `id` int(11) NOT NULL,
  `nama_penyewa` varchar(255) NOT NULL,
  `mobil` varchar(255) NOT NULL,
  `durasi_sewa` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `biaya_dasar` decimal(10,2) NOT NULL,
  `diskon` decimal(10,2) NOT NULL,
  `biaya_tambahan` decimal(10,2) NOT NULL,
  `total_biaya` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_sewa`
--

INSERT INTO `t_sewa` (`id`, `nama_penyewa`, `mobil`, `durasi_sewa`, `program`, `biaya_dasar`, `diskon`, `biaya_tambahan`, `total_biaya`) VALUES
(22, 'Indah', 'Alphard', 1, 'Harian', 3220000.00, 0.00, 0.00, 3220000.00),
(23, 'Indah Robiatul', 'New Camry', 4, 'Paket 1', 8760000.00, 876000.00, 0.00, 7884000.00),
(24, 'Indah Robiatul Adawiyah', 'New Altis', 7, 'Paket 2', 10500000.00, 2100000.00, 0.00, 8400000.00),
(25, 'Robiatul', 'Innova', 10, 'Paket 3', 8900000.00, 2225000.00, 0.00, 6675000.00),
(26, 'Adawiyah', 'Avanza', 1, 'Harian', 640000.00, 0.00, 100000.00, 740000.00),
(27, 'Indah Adawiyah', 'Innova', 4, 'Paket 1', 3560000.00, 356000.00, 200000.00, 3404000.00),
(29, 'Robiatul Adawiyah', 'Alphard', 3, 'Harian', 9660000.00, 0.00, 0.00, 9660000.00),
(30, 'IRA ', 'Innova', 3, 'Harian', 2670000.00, 0.00, 500000.00, 3170000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_biaya_rental`
--
ALTER TABLE `t_biaya_rental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_sewa`
--
ALTER TABLE `t_sewa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_biaya_rental`
--
ALTER TABLE `t_biaya_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_sewa`
--
ALTER TABLE `t_sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
