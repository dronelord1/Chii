-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 11:16 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esp_8266`
--

-- --------------------------------------------------------

--
-- Table structure for table `esptable2`
--

CREATE TABLE `esptable2` (
  `id` int(5) NOT NULL,
  `PASSWORD` int(5) NOT NULL,
  `SENT_NUMBER_1` float NOT NULL,
  `SENT_NUMBER_2` float NOT NULL,
  `SENT_NUMBER_3` float NOT NULL,
  `SENT_NUMBER_4` float NOT NULL,
  `SENT_BOOL_1` tinyint(1) NOT NULL,
  `SENT_BOOL_2` tinyint(1) NOT NULL,
  `SENT_BOOL_3` tinyint(1) NOT NULL,
  `RECEIVED_NUM1` float NOT NULL,
  `RECEIVED_BOOL1` tinyint(1) NOT NULL,
  `Amount` varchar(255) CHARACTER SET hp8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `esptable2`
--

INSERT INTO `esptable2` (`id`, `PASSWORD`, `SENT_NUMBER_1`, `SENT_NUMBER_2`, `SENT_NUMBER_3`, `SENT_NUMBER_4`, `SENT_BOOL_1`, `SENT_BOOL_2`, `SENT_BOOL_3`, `RECEIVED_NUM1`, `RECEIVED_BOOL1`, `Amount`) VALUES
(99999, 12345, 20.44, 223.5, 50, 3.1, 0, 0, 3, 0.13, 0, '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `esptable2`
--
ALTER TABLE `esptable2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `esptable2`
--
ALTER TABLE `esptable2`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
