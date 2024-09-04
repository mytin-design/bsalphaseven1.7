-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 06:15 PM
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
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dateofbirth` datetime DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `basicpay` varchar(250) DEFAULT '0.0000',
  `staffgrade` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `profileimg` varchar(250) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `subjects` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `nextofkin` varchar(255) DEFAULT NULL,
  `remedialallocation` varchar(255) DEFAULT NULL,
  `maritalstatus` varchar(255) DEFAULT NULL,
  `yearofemployment` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `gender` varchar(250) NOT NULL,
  `nhifno` varchar(255) DEFAULT NULL,
  `nssfno` varchar(255) DEFAULT NULL,
  `tscno` varchar(255) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `bankaccno` varchar(255) DEFAULT NULL,
  `nationality` varchar(250) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `name`, `dateofbirth`, `role`, `basicpay`, `staffgrade`, `stream`, `profileimg`, `department`, `subjects`, `email`, `phone`, `nextofkin`, `remedialallocation`, `maritalstatus`, `yearofemployment`, `status`, `gender`, `nhifno`, `nssfno`, `tscno`, `bankname`, `bankaccno`, `nationality`, `password`) VALUES
('denismytin@gmail.com', 'Denis King&#039;ori', '1996-06-15 00:00:00', 'IT', '20,000', 'Grade Six', '', 'uploads/den.png', 'Sciences &amp; IT', 'Integrated Science, Pretechnical Studies, Math', 'dmytin@ymail.com', '0719444041', 'Mother', 'True', 'Single', '2024-02-01 00:00:00', 'Active', 'Male', 'X', 'X', 'X', 'Equity Bank', 'X', 'Kenyan', '$2y$10$VjWbEr2YnuVdHSL14sbSDODeVpuoyiSOjo/Wgof/7VH1cXzNucMg2'),
('dmytin@ymail.com', 'Linsey Karanja', '1111-11-11 00:00:00', 'IT', '20,000', 'gradefive', '', 'uploads/wife.jpeg', 'Sciences &amp; IT', 'Integrated Science, Pretechnical Studies, Math', 'dmytin@ymail.com', '0719444041', 'Mother', 'True', 'Single', '2222-02-22 00:00:00', 'Active', 'Female', 'X', 'X', 'X', 'Equity Bank', 'X', 'Kenyan', '$2y$10$SrYV1i.FnSvWNjCSNNYRZ.yiqil14zG8MNq0Uby/InAW6GZ8pmJM6'),
('karen', 'karina rosesnburg', '5555-05-05 00:00:00', '55555', '55555', '5', '', 'uploads/hun.PNG', 'rrrrr', 'rrrrr', 'rrr@g.co', '55555', '555555', '555555555', '5555555', '3333-03-31 00:00:00', '333333333', '333333', '33333333333', '33333333', '333333', '3333', '33333', '33333', '$2y$10$qV7jUgHZZ/yAbQfvoA7KcufSnXEjvAqcBTTa5JAP09jvgGy6KV72u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
