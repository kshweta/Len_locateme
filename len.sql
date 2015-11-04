-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2015 at 08:45 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `len`
--

-- --------------------------------------------------------

--
-- Table structure for table `apdata`
--

CREATE TABLE IF NOT EXISTS `apdata` (
  `id` varchar(50) NOT NULL,
  `ap_ssid` varchar(50) NOT NULL,
  `A` int(50) NOT NULL,
  `n` float NOT NULL,
  `x` int(50) NOT NULL,
  `y` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `venuedata`
--

CREATE TABLE IF NOT EXISTS `venuedata` (
  `id` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `length` int(100) NOT NULL,
  `breadth` int(100) NOT NULL,
  `ap1` varchar(50) NOT NULL,
  `ap2` varchar(50) NOT NULL,
  `ap3` varchar(50) NOT NULL,
  `ap4` varchar(50) NOT NULL,
  `pixelX` int(7) NOT NULL,
  `pixelY` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apdata`
--
ALTER TABLE `apdata`
  ADD PRIMARY KEY (`ap_ssid`),
  ADD UNIQUE KEY `ap_ssid` (`ap_ssid`),
  ADD UNIQUE KEY `ap_ssid_2` (`ap_ssid`);

--
-- Indexes for table `venuedata`
--
ALTER TABLE `venuedata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ap1` (`ap1`,`ap2`,`ap3`,`ap4`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
