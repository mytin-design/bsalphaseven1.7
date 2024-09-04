-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 07:03 PM
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
-- Database: `reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--
CREATE TABLE `juniorgrades` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stdgrade` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `subjmath` varchar(255) NOT NULL,
  `subjmathrub` varchar(255) NOT NULL,
  `subjeng` varchar(255) NOT NULL,
  `subjengrub` varchar(255) NOT NULL,
  `subjkisw` varchar(255) NOT NULL,
  `subjkiswrub` varchar(255) NOT NULL,
  `subjsocial` varchar(255) NOT NULL,
  `subjsocialrub` varchar(255) NOT NULL,
  `subjscre` varchar(255) NOT NULL,
  `subjscrerub` varchar(255) NOT NULL,
  `subjintscie` varchar(255) NOT NULL,
  `subjintscierub` varchar(255) NOT NULL,
  `subjpretech` varchar(255) NOT NULL,
  `subjpretechrub` varchar(255) NOT NULL,
  `subjca` varchar(255) NOT NULL,
  `subjcarub` varchar(255) NOT NULL,
  `subjagrinu` varchar(255) NOT NULL,
  `subjagrinurub` varchar(255) NOT NULL,
  `total` INT(255) NOT NULL

)
 ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `juniorgrades`
--
ALTER TABLE `juniorgrades`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
