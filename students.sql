-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 02:44 PM
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `stream` varchar(250) NOT NULL,
  `stdgrade` varchar(250) NOT NULL,
  `healthstatus` varchar(250) NOT NULL,
  `profileimg` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `dateofbirth` date NOT NULL,
  `feebalance` varchar(250) NOT NULL,
  `parentphone` varchar(250) NOT NULL,
  `language` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `nationality` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `confirmpassword` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `username`, `stream`, `stdgrade`, `healthstatus`, `profileimg`, `gender`, `dateofbirth`, `feebalance`, `parentphone`, `language`, `status`, `nationality`, `password`, `confirmpassword`) VALUES
(0, 'admin', '001admin', 'N/A', '000', 'Healthy', 'uploads/den.png', 'Male', '1996-06-15', '0000', '071944041', 'English', 'Active', 'Kenyan', '$2y$10$zfGH2QKPUIDVDC9YXnky/OHemC.4lv5KCF0Ukfloprol0tzoJPzva', ''),
(0, 'Linsey Lindah', '12345', 'y', 'gradeone', 'good', 'uploads/wife.jpeg', 'female', '2000-12-22', '70000', '071944041', 'english', 'active', 'Kenyan', '$2y$10$R8IWZ9MK2wAWGzJrG77X3uDXQysilDpAGLghxsHG7bGCYkdwxzLLy', ''),
(0, 'John Maina', 'ABC123', 'x', 'gradeseven', 'good', 'uploads/wife.jpeg', 'male', '4444-04-04', '222', '22222', 'english', 'active', 'Kenyan', '$2y$10$2Tc68sKhGFC2sv1yy2BL6u7phwWiNoqxmZSK.Fk7hOfYKHpG1WF3a', ''),
(0, 'wwww', 'wwww', 'www', 'www', 'www', 'uploads/couple.jpg', 'www', '0002-02-22', '222', '2222', 'wwww', 'www', 'www', '$2y$10$ws2YUg96wVNxMJpAA2B23Od0mnbFrZeB/9mUZYBLYeCqhk4q7W0Ge', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
