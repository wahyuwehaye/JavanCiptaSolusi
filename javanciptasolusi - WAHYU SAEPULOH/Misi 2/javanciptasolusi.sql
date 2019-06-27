-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2019 at 08:19 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `javanciptasolusi`
--

-- --------------------------------------------------------

--
-- Table structure for table `silsilahkeluarga`
--

CREATE TABLE `silsilahkeluarga` (
  `id` int(10) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `anak` int(10) DEFAULT NULL,
  `cucu` int(10) DEFAULT NULL,
  `cicit` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `silsilahkeluarga`
--

INSERT INTO `silsilahkeluarga` (`id`, `nama`, `jenis_kelamin`, `anak`, `cucu`, `cicit`) VALUES
(1, 'Budi', 'L', 0, 0, NULL),
(2, 'Dedi', 'L', 1, 0, NULL),
(3, 'Dodi', 'L', 1, 0, NULL),
(4, 'Dede', 'L', 1, 0, NULL),
(5, 'Dewi', 'P', 1, 0, NULL),
(6, 'Feri', 'L', 2, 1, NULL),
(7, 'Farah', 'P', 2, 1, NULL),
(8, 'Gugus', 'L', 3, 1, NULL),
(9, 'Gandi', 'L', 3, 1, NULL),
(10, 'Hani', 'P', 4, 1, NULL),
(11, 'Hana', 'P', 4, 1, NULL),
(12, 'Wahyu Saepuloh', 'L', 0, 0, NULL),
(13, 'Wehaye', 'L', 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `silsilahkeluarga`
--
ALTER TABLE `silsilahkeluarga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `silsilahkeluarga`
--
ALTER TABLE `silsilahkeluarga`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
