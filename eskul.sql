-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 11:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliah`
--

-- --------------------------------------------------------

--
-- Table structure for table `eskul`
--

CREATE TABLE `eskul` (
  `id` int(11) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` enum('12 PPLG 1','12 PPLG 2','12 PPLG 3') NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eskul`
--

INSERT INTO `eskul` (`id`, `nis`, `nama`, `kelas`, `jk`, `tanggal_daftar`) VALUES
(11, '20234321', 'Ahmad Soleh', '12 PPLG 1', 'laki-laki', '2023-11-15'),
(17, '20236786', 'Virgoun', '12 PPLG 3', 'laki-laki', '2024-02-29'),
(18, '20235436', 'Chintya Agustina', '12 PPLG 1', 'perempuan', '2023-01-13'),
(22, '20231234', 'Fazri Bachtiar', '12 PPLG 2', 'laki-laki', '2018-02-13'),
(25, '20233242', 'Sodiqin Al-Mabrurr', '12 PPLG 2', 'laki-laki', '2023-11-11'),
(28, '20232342', 'Dewi Sardewi', '12 PPLG 3', 'perempuan', '2023-11-25'),
(32, '20233202', 'Mimin', '12 PPLG 2', 'laki-laki', '2023-08-09'),
(33, '20234322', 'Ono Kasmin', '12 PPLG 1', 'perempuan', '2024-02-22'),
(34, '20234234', 'Syamil Al-Husaeni', '12 PPLG 2', 'laki-laki', '2023-11-02'),
(35, '31423042', 'Lilis Sunelis', '12 PPLG 2', 'perempuan', '2023-11-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eskul`
--
ALTER TABLE `eskul`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eskul`
--
ALTER TABLE `eskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
