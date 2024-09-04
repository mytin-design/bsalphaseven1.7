-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 07:05 PM
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
-- Table structure for table `studentsettings`
--

CREATE TABLE `studentsettings` (
  `username` varchar(255) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `layout` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentsettings`
--

INSERT INTO `studentsettings` (`username`, `color`, `layout`) VALUES
('cititv', '#1ce3e3', 'grid'),
('crerasas', '#400040', 'grid'),
('dking', '#8080ff', 'grid'),
('jeffbezos', '#00ffff', 'grid'),
('linetwa', '#0000a0', 'grid'),
('mwanikifra', '#ffff80', 'grid'),
('njeri', '#c0c0c0', 'grid'),
('njerikaren', '#ff0000', 'list'),
('pppp', '#80ffff', 'grid'),
('tch1234', '#c0c0c0', 'grid'),
('timking', '#80ff80', 'grid'),
('uu', '#8080ff', 'grid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentsettings`
--
ALTER TABLE `studentsettings`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
