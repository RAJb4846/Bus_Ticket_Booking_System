-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2026 at 02:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus-details`
--

-- --------------------------------------------------------

--
-- Table structure for table `mh01cb6601`
--

CREATE TABLE `mh01cb6601` (
  `seat_no` int(11) NOT NULL,
  `booked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_general_ci;

--
-- Dumping data for table `mh01cb6601`
--

INSERT INTO `mh01cb6601` (`seat_no`, `booked`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 0),
(27, 0),
(28, 0),
(29, 0),
(30, 0),
(31, 0),
(32, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mh01cb7061`
--

CREATE TABLE `mh01cb7061` (
  `seat_no` int(11) NOT NULL,
  `booked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_general_ci;

--
-- Dumping data for table `mh01cb7061`
--

INSERT INTO `mh01cb7061` (`seat_no`, `booked`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 1),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 1),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 0),
(27, 0),
(28, 0),
(29, 0),
(30, 0),
(31, 0),
(32, 0),
(33, 0),
(34, 0),
(35, 0),
(36, 0),
(37, 0),
(38, 0),
(39, 0),
(40, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mh01cb6601`
--
ALTER TABLE `mh01cb6601`
  ADD PRIMARY KEY (`seat_no`);

--
-- Indexes for table `mh01cb7061`
--
ALTER TABLE `mh01cb7061`
  ADD PRIMARY KEY (`seat_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mh01cb6601`
--
ALTER TABLE `mh01cb6601`
  MODIFY `seat_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `mh01cb7061`
--
ALTER TABLE `mh01cb7061`
  MODIFY `seat_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
