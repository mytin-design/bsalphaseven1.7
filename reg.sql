-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 04, 2024 at 03:21 AM
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
-- Database: `reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `agrinurubrics`
--

CREATE TABLE `agrinurubrics` (
  `agrinufromee` varchar(255) NOT NULL,
  `agrinutoee` varchar(255) NOT NULL,
  `agrinufromme` varchar(255) NOT NULL,
  `agrinutome` varchar(255) NOT NULL,
  `agrinufromae` varchar(255) NOT NULL,
  `agrinutoae` varchar(255) NOT NULL,
  `agrinufrombe` varchar(255) NOT NULL,
  `agrinutobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `annsname` varchar(255) NOT NULL,
  `dateuploaded` varchar(255) NOT NULL,
  `annsauthor` varchar(255) NOT NULL,
  `annstype` varchar(255) NOT NULL,
  `annsgrade` varchar(250) NOT NULL,
  `annsdetails` varchar(255) NOT NULL,
  `annsfile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`annsname`, `dateuploaded`, `annsauthor`, `annstype`, `annsgrade`, `annsdetails`, `annsfile`) VALUES
('Back To School', '2024-08-24', 'Tr. Denis', 'general', 'gradefive', 'Welcome back!', 'uploads/'),
('School Opening Dates', '2222-12-12', 'Dr. Denis', 'general', 'all', 'LOREM IPSUM DOR LOR ET ALIT UT IMUR ISI COR TERO BUR TERIK', 'uploads/CERT OF MERIT.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `staffid` varchar(255) NOT NULL,
  `assignname` varchar(255) NOT NULL,
  `dateuploaded` varchar(255) DEFAULT NULL,
  `assigntr` varchar(255) DEFAULT NULL,
  `assigntype` varchar(255) DEFAULT NULL,
  `assigngrade` varchar(255) DEFAULT NULL,
  `assignduedate` varchar(255) DEFAULT NULL,
  `assigninstructs` varchar(255) DEFAULT NULL,
  `assignfile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignmentsnew`
--

CREATE TABLE `assignmentsnew` (
  `id` int(11) NOT NULL,
  `staffid` varchar(255) NOT NULL,
  `assignname` varchar(255) NOT NULL,
  `dateuploaded` datetime DEFAULT current_timestamp(),
  `assigntr` varchar(255) NOT NULL,
  `assigntype` varchar(255) DEFAULT NULL,
  `assigngrade` varchar(255) DEFAULT NULL,
  `assignduedate` datetime DEFAULT NULL,
  `assigninstructs` text DEFAULT NULL,
  `assignfile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignmentsnew`
--

INSERT INTO `assignmentsnew` (`id`, `staffid`, `assignname`, `dateuploaded`, `assigntr`, `assigntype`, `assigngrade`, `assignduedate`, `assigninstructs`, `assignfile`) VALUES
(4, 'karen', 'Homescience', '2024-09-03 00:00:00', 'TR. JOHN', 'math', 'Grade Four', '2024-09-11 00:00:00', 'gggggggggggggg', 'uploads/ACADEMIC REPORT G 5Y TERM II 2024.docx');

-- --------------------------------------------------------

--
-- Table structure for table `casportsrubrics`
--

CREATE TABLE `casportsrubrics` (
  `casportsfromee` varchar(255) NOT NULL,
  `casportstoee` varchar(255) NOT NULL,
  `casportsfromme` varchar(255) NOT NULL,
  `casportstome` varchar(255) NOT NULL,
  `casportsfromae` varchar(255) NOT NULL,
  `casportstoae` varchar(255) NOT NULL,
  `casportsfrombe` varchar(255) NOT NULL,
  `casportstobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cdesigns`
--

CREATE TABLE `cdesigns` (
  `designid` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `dateuploaded` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comprubrics`
--

CREATE TABLE `comprubrics` (
  `compfromee` varchar(255) NOT NULL,
  `comptoee` varchar(255) NOT NULL,
  `compfromme` varchar(255) NOT NULL,
  `comptome` varchar(255) NOT NULL,
  `compfromae` varchar(255) NOT NULL,
  `comptoae` varchar(255) NOT NULL,
  `compfrombe` varchar(255) NOT NULL,
  `comptobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crerubrics`
--

CREATE TABLE `crerubrics` (
  `crefromee` varchar(255) NOT NULL,
  `cretoee` varchar(255) NOT NULL,
  `crefromme` varchar(255) NOT NULL,
  `cretome` varchar(255) NOT NULL,
  `crefromae` varchar(255) NOT NULL,
  `cretoae` varchar(255) NOT NULL,
  `crefrombe` varchar(255) NOT NULL,
  `cretobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deletedannouncements`
--

CREATE TABLE `deletedannouncements` (
  `annsname` varchar(255) NOT NULL,
  `dateuploaded` varchar(255) NOT NULL,
  `annsauthor` varchar(255) NOT NULL,
  `annstype` varchar(255) NOT NULL,
  `annsgrade` varchar(250) NOT NULL,
  `annsdetails` varchar(255) NOT NULL,
  `annsfile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deletedjuniorgrades`
--

CREATE TABLE `deletedjuniorgrades` (
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
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deletedlowergrades`
--

CREATE TABLE `deletedlowergrades` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stdgrade` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `subjmath` varchar(255) NOT NULL,
  `subjmathrub` varchar(255) NOT NULL,
  `subjeng` varchar(255) NOT NULL,
  `subjengrub` varchar(255) NOT NULL,
  `subjread` varchar(255) NOT NULL,
  `subjreadrub` varchar(255) NOT NULL,
  `subjkisw` varchar(255) NOT NULL,
  `subjkiswrub` varchar(255) NOT NULL,
  `subjkusoma` varchar(255) NOT NULL,
  `subjkusomarub` varchar(255) NOT NULL,
  `subjenv` varchar(255) NOT NULL,
  `subjenvrub` varchar(255) NOT NULL,
  `subjca` varchar(255) NOT NULL,
  `subjcarub` varchar(255) NOT NULL,
  `subjagrinu` varchar(255) NOT NULL,
  `subjagrinurub` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deletednotes`
--

CREATE TABLE `deletednotes` (
  `notesname` varchar(255) NOT NULL,
  `dateuploaded` varchar(255) DEFAULT NULL,
  `notestr` varchar(255) DEFAULT NULL,
  `notestype` varchar(255) DEFAULT NULL,
  `notesgrade` varchar(255) DEFAULT NULL,
  `notesfile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deletednotes`
--

INSERT INTO `deletednotes` (`notesname`, `dateuploaded`, `notestr`, `notestype`, `notesgrade`, `notesfile`) VALUES
('Integrated Science', '2024-01-05', 'Tr. Denis', 'integratedsci', 'gradeseven', 'uploads/adn.docx'),
('Mathematics', '2024-05-03', 'Tr Rodgers', 'math', 'gradeeight', 'uploads/A & F for M - Ali.edited.docx');

-- --------------------------------------------------------

--
-- Table structure for table `deletedstaffsubjects`
--

CREATE TABLE `deletedstaffsubjects` (
  `staffid` varchar(255) NOT NULL,
  `subjectcode` varchar(255) NOT NULL,
  `subjectname` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deletedstaffsubjects`
--

INSERT INTO `deletedstaffsubjects` (`staffid`, `subjectcode`, `subjectname`, `class`, `stream`, `date`, `teacher`, `status`) VALUES
('denismytin@gmail.com', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `deletedstudentsubjects`
--

CREATE TABLE `deletedstudentsubjects` (
  `username` varchar(255) NOT NULL,
  `subjectcode` varchar(255) NOT NULL,
  `subjectname` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deletedstudentsubjects`
--

INSERT INTO `deletedstudentsubjects` (`username`, `subjectcode`, `subjectname`, `date`, `teacher`, `status`) VALUES
('001admin', 'Math001', 'Kiswahili', '2024-04-24', 'Tr John', '');

-- --------------------------------------------------------

--
-- Table structure for table `deleteduppergrades`
--

CREATE TABLE `deleteduppergrades` (
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
  `subjscie` varchar(255) NOT NULL,
  `subjscierub` varchar(255) NOT NULL,
  `subjsocial` varchar(255) NOT NULL,
  `subjsocialrub` varchar(255) NOT NULL,
  `subjscre` varchar(255) NOT NULL,
  `subjscrerub` varchar(255) NOT NULL,
  `subjca` varchar(255) NOT NULL,
  `subjcarub` varchar(255) NOT NULL,
  `subjagrinu` varchar(255) NOT NULL,
  `subjagrinurub` varchar(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `engrubrics`
--

CREATE TABLE `engrubrics` (
  `engfromee` varchar(255) NOT NULL,
  `engtoee` varchar(255) NOT NULL,
  `engfromme` varchar(255) NOT NULL,
  `engtome` varchar(255) NOT NULL,
  `engfromae` varchar(255) NOT NULL,
  `engtoae` varchar(255) NOT NULL,
  `engfrombe` varchar(255) NOT NULL,
  `engtobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `envrubrics`
--

CREATE TABLE `envrubrics` (
  `envfromee` varchar(255) NOT NULL,
  `envtoee` varchar(255) NOT NULL,
  `envfromme` varchar(255) NOT NULL,
  `envtome` varchar(255) NOT NULL,
  `envfromae` varchar(255) NOT NULL,
  `envtoae` varchar(255) NOT NULL,
  `envfrombe` varchar(255) NOT NULL,
  `envtobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `examname` varchar(255) NOT NULL,
  `dateuploaded` varchar(255) DEFAULT NULL,
  `examtr` varchar(255) DEFAULT NULL,
  `examtype` varchar(255) DEFAULT NULL,
  `examgrade` varchar(255) DEFAULT NULL,
  `examfile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filledmarks`
--

CREATE TABLE `filledmarks` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stdgrade` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `subjmath` varchar(255) NOT NULL,
  `subjeng` varchar(255) NOT NULL,
  `subjkisw` varchar(255) NOT NULL,
  `subjscie` varchar(255) NOT NULL,
  `subjscre` varchar(255) NOT NULL,
  `subjintscie` varchar(255) NOT NULL,
  `subjpretech` varchar(255) NOT NULL,
  `subjca` varchar(255) NOT NULL,
  `subjagrinu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insharubrics`
--

CREATE TABLE `insharubrics` (
  `inshafromee` varchar(255) NOT NULL,
  `inshatoee` varchar(255) NOT NULL,
  `inshafromme` varchar(255) NOT NULL,
  `inshatome` varchar(255) NOT NULL,
  `inshafromae` varchar(255) NOT NULL,
  `inshatoae` varchar(255) NOT NULL,
  `inshafrombe` varchar(255) NOT NULL,
  `inshatobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intescierubrics`
--

CREATE TABLE `intescierubrics` (
  `intesciefromee` varchar(255) NOT NULL,
  `intescietoee` varchar(255) NOT NULL,
  `intesciefromme` varchar(255) NOT NULL,
  `intescietome` varchar(255) NOT NULL,
  `intesciefromae` varchar(255) NOT NULL,
  `intescietoae` varchar(255) NOT NULL,
  `intesciefrombe` varchar(255) NOT NULL,
  `intescietobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `juniorgrades`
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
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `juniorgrades`
--

INSERT INTO `juniorgrades` (`username`, `name`, `stdgrade`, `stream`, `subjmath`, `subjmathrub`, `subjeng`, `subjengrub`, `subjkisw`, `subjkiswrub`, `subjsocial`, `subjsocialrub`, `subjscre`, `subjscrerub`, `subjintscie`, `subjintscierub`, `subjpretech`, `subjpretechrub`, `subjca`, `subjcarub`, `subjagrinu`, `subjagrinurub`, `total`) VALUES
('B000123331', 'MURIITHI SASHA ESTHER KERU', 'Grade Seven', 'Y', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', 495),
('B000383495', 'WANGUI REGINA WAHU', 'Grade Seven', 'Y', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', 297),
('B000471861', 'THEURI COLETTE WANJIRU', 'Grade Seven', 'Y', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', 297);

-- --------------------------------------------------------

--
-- Table structure for table `kiswrubrics`
--

CREATE TABLE `kiswrubrics` (
  `kiswfromee` varchar(255) NOT NULL,
  `kiswtoee` varchar(255) NOT NULL,
  `kiswfromme` varchar(255) NOT NULL,
  `kiswtome` varchar(255) NOT NULL,
  `kiswfromae` varchar(255) NOT NULL,
  `kiswtoae` varchar(255) NOT NULL,
  `kiswfrombe` varchar(255) NOT NULL,
  `kiswtobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kusomarubrics`
--

CREATE TABLE `kusomarubrics` (
  `kusofromee` varchar(255) NOT NULL,
  `kusotoee` varchar(255) NOT NULL,
  `kusofromme` varchar(255) NOT NULL,
  `kusotome` varchar(255) NOT NULL,
  `kusofromae` varchar(255) NOT NULL,
  `kusotoae` varchar(255) NOT NULL,
  `kusofrombe` varchar(255) NOT NULL,
  `kusotobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lowergrades`
--

CREATE TABLE `lowergrades` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stdgrade` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `subjmath` varchar(255) NOT NULL,
  `subjmathrub` varchar(255) NOT NULL,
  `subjeng` varchar(255) NOT NULL,
  `subjengrub` varchar(255) NOT NULL,
  `subjread` varchar(255) NOT NULL,
  `subjreadrub` varchar(255) NOT NULL,
  `subjkisw` varchar(255) NOT NULL,
  `subjkiswrub` varchar(255) NOT NULL,
  `subjkusoma` varchar(255) NOT NULL,
  `subjkusomarub` varchar(255) NOT NULL,
  `subjenv` varchar(255) NOT NULL,
  `subjenvrub` varchar(255) NOT NULL,
  `subjca` varchar(255) NOT NULL,
  `subjcarub` varchar(255) NOT NULL,
  `subjagrinu` varchar(255) NOT NULL,
  `subjagrinurub` varchar(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lowergrades`
--

INSERT INTO `lowergrades` (`username`, `name`, `stdgrade`, `stream`, `subjmath`, `subjmathrub`, `subjeng`, `subjengrub`, `subjread`, `subjreadrub`, `subjkisw`, `subjkiswrub`, `subjkusoma`, `subjkusomarub`, `subjenv`, `subjenvrub`, `subjca`, `subjcarub`, `subjagrinu`, `subjagrinurub`, `total`) VALUES
('AHYUS77878SDSDS', 'JOHN KIRIAMITI', 'Grade Two', 'X', '22', 'EE', '22', 'EE', '22', 'EE', '22', 'EE', '22', 'EE', '22', 'EE', '22', 'EE', '22', 'EE', 176),
('B005198285', 'NGARUIYA EPHRAIM KARERI', 'Grade Three', 'X', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', '33', 'EE', 264),
('JOHN12345', 'JOHN CARLOS', 'Grade One', 'X', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', 88),
('JOHN12345', 'JOHN CARLOS', 'Grade One', 'X', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', 88),
('JOHN12345', 'JOHN CARLOS', 'Grade One', 'X', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', 88),
('JOHN12345', 'JOHN CARLOS', 'Grade One', 'X', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', 88),
('JOHN12345', 'JOHN CARLOS', 'Grade One', 'X', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', '11', 'EE', 88),
('B005199154', 'MUCHIRI LIAM KUGA', 'Grade Three', 'X', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', 440);

-- --------------------------------------------------------

--
-- Table structure for table `marksdetails`
--

CREATE TABLE `marksdetails` (
  `grade` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marksdetails`
--

INSERT INTO `marksdetails` (`grade`, `stream`, `year`, `term`, `type`) VALUES
('grade5', 'z', '2005', 'one', 'opener'),
('Grade Seven', 'Y', '2024', 'Two', 'Opener'),
('Grade Two', 'Y', '2001', 'One', 'Midterm'),
('No Grade Selected', 'default', 'defaultopt', 'default', 'default'),
('Grade Three', 'Y', '2002', 'Two', 'Midterm'),
('Grade One', 'X', '2010', 'One', 'Midterm'),
('Grade Three', 'Y', '2003', 'Three', 'Endterm'),
('Grade Five', 'Y', '2001', 'Three', 'Endterm'),
('Grade Six', 'Z', '2002', 'Two', 'Midterm'),
('Grade Four', 'Y', '2004', 'Two', 'Endterm'),
('Grade Six', 'Z', '2003', 'Three', 'Endterm'),
('Grade Five', 'Y', '2004', 'Three', 'Other'),
('Grade Five', 'Z', '2006', 'Two', 'Endterm'),
('Grade Six', 'Y', '2005', 'Two', 'C.A.T'),
('Grade Eight', 'X', '2024', 'Two', 'Opener'),
('Grade Five', 'Y', '2024', 'Two', 'Endterm'),
('Grade Two', 'Y', '2006', 'Two', 'Midterm');

-- --------------------------------------------------------

--
-- Table structure for table `mathrubrics`
--

CREATE TABLE `mathrubrics` (
  `mathfromee` varchar(255) NOT NULL,
  `mathtoee` varchar(255) NOT NULL,
  `mathfromme` varchar(255) NOT NULL,
  `mathtome` varchar(255) NOT NULL,
  `mathfromae` varchar(255) NOT NULL,
  `mathtoae` varchar(255) NOT NULL,
  `mathfrombe` varchar(255) NOT NULL,
  `mathtobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notesname` varchar(255) NOT NULL,
  `dateuploaded` varchar(255) DEFAULT NULL,
  `notestr` varchar(255) DEFAULT NULL,
  `notestype` varchar(255) DEFAULT NULL,
  `notesgrade` varchar(255) DEFAULT NULL,
  `notesfile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pretechrubrics`
--

CREATE TABLE `pretechrubrics` (
  `pretechfromee` varchar(255) NOT NULL,
  `pretechtoee` varchar(255) NOT NULL,
  `pretechfromme` varchar(255) NOT NULL,
  `pretechtome` varchar(255) NOT NULL,
  `pretechfromae` varchar(255) NOT NULL,
  `pretechtoae` varchar(255) NOT NULL,
  `pretechfrombe` varchar(255) NOT NULL,
  `pretechtobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `readrubrics`
--

CREATE TABLE `readrubrics` (
  `readfromee` varchar(255) NOT NULL,
  `readtoee` varchar(255) NOT NULL,
  `readfromme` varchar(255) NOT NULL,
  `readtome` varchar(255) NOT NULL,
  `readfromae` varchar(255) NOT NULL,
  `readtoae` varchar(255) NOT NULL,
  `readfrombe` varchar(255) NOT NULL,
  `readtobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rubrics`
--

CREATE TABLE `rubrics` (
  `rubricname` varchar(255) NOT NULL,
  `subjectname` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `fromee` varchar(255) NOT NULL,
  `toee` varchar(255) NOT NULL,
  `fromme` varchar(255) NOT NULL,
  `tome` varchar(255) NOT NULL,
  `fromae` varchar(255) NOT NULL,
  `toae` varchar(255) NOT NULL,
  `frombe` varchar(255) NOT NULL,
  `tobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rubrics`
--

INSERT INTO `rubrics` (`rubricname`, `subjectname`, `grade`, `fromee`, `toee`, `fromme`, `tome`, `fromae`, `toae`, `frombe`, `tobe`) VALUES
('Rubric One', 'Reading', 'Grade Two', '44', '44', '33', '33', '33', '33', '33', '33'),
('Rubric Two', 'Kiswahili', 'Grade Three', '44', '441', '11', '11', '11', '11', '11', '11'),
('Rubric One', 'Mathematics', 'Grade One', '25', '30', '15', '24', '9', '14', '1', '8'),
('Rubric Two', 'Reading', 'Grade Three', '22', '22', '22', '22', '22', '22', '22', '22'),
('Rubric One', 'Mathematics', 'Grade Eight', '44', '50', '31', '43', '20', '30', '1', '19'),
('Rubric One', 'Science & Technology', 'Grade Two', '55', '56', '55', '44', '555', '55', '5444', '88'),
('Rubric One', 'Kiswahili', 'Grade Eleven', '66', '66', '66', '66', '66', '66', '66', '66'),
('Rubric Two', 'Agric & Nutrition', 'Grade Ten', '88', '88', '88', '88', '88', '88', '88', '88'),
('Rubric Three', 'Kusoma', 'Grade Nine', '55', '55', '55', '55', '55', '55', '55', '55'),
('Rubric Four', 'Science & Technology', 'Grade Seven', '77', '77', '77', '77', '77', '77', '77', '66');

-- --------------------------------------------------------

--
-- Table structure for table `scierubrics`
--

CREATE TABLE `scierubrics` (
  `sciefromee` varchar(255) NOT NULL,
  `scietoee` varchar(255) NOT NULL,
  `sciefromme` varchar(255) NOT NULL,
  `scietome` varchar(255) NOT NULL,
  `sciefromae` varchar(255) NOT NULL,
  `scietoae` varchar(255) NOT NULL,
  `sciefrombe` varchar(255) NOT NULL,
  `scietobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socialrubrics`
--

CREATE TABLE `socialrubrics` (
  `socialfromee` varchar(255) NOT NULL,
  `socialtoee` varchar(255) NOT NULL,
  `socialfromme` varchar(255) NOT NULL,
  `socialtome` varchar(255) NOT NULL,
  `socialfromae` varchar(255) NOT NULL,
  `socialtoae` varchar(255) NOT NULL,
  `socialfrombe` varchar(255) NOT NULL,
  `socialtobe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('dmytin@ymail.com', 'Linsey Karanja', '1111-11-11 00:00:00', 'IT', '20,000', 'Grade Eight', 'Y', 'uploads/wife.jpeg', 'Sciences &amp; IT', 'Integrated Science, Pretechnical Studies, Math', 'dmytin@ymail.com', '0719444041', 'Mother', 'True', 'Single', '2222-02-22 00:00:00', 'Active', 'Female', 'X', 'X', 'X', 'Equity Bank', 'X', 'Kenyan', '$2y$10$SrYV1i.FnSvWNjCSNNYRZ.yiqil14zG8MNq0Uby/InAW6GZ8pmJM6'),
('karen', 'karina rosesnburg', '5555-05-05 00:00:00', '55555', '55555', '5', '', 'uploads/hun.PNG', 'rrrrr', 'rrrrr', 'rrr@g.co', '55555', '555555', '555555555', '5555555', '3333-03-31 00:00:00', '333333333', '333333', '33333333333', '33333333', '333333', '3333', '33333', '33333', '$2y$10$qV7jUgHZZ/yAbQfvoA7KcufSnXEjvAqcBTTa5JAP09jvgGy6KV72u');

-- --------------------------------------------------------

--
-- Table structure for table `staffcompletedassigns`
--

CREATE TABLE `staffcompletedassigns` (
  `id` int(11) NOT NULL,
  `staffid` varchar(255) NOT NULL,
  `assignment_id` varchar(255) NOT NULL,
  `assignname` varchar(255) NOT NULL,
  `dateuploaded` varchar(255) DEFAULT NULL,
  `assigntr` varchar(255) DEFAULT NULL,
  `assigntype` varchar(255) DEFAULT NULL,
  `assigngrade` varchar(255) DEFAULT NULL,
  `assignduedate` varchar(255) DEFAULT NULL,
  `assigninstructs` varchar(255) DEFAULT NULL,
  `assignfile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffcompletedassigns`
--

INSERT INTO `staffcompletedassigns` (`id`, `staffid`, `assignment_id`, `assignname`, `dateuploaded`, `assigntr`, `assigntype`, `assigngrade`, `assignduedate`, `assigninstructs`, `assignfile`) VALUES
(1, '', '4', 'Homescience', '2024-09-03 00:00:00', 'TR. JOHN', 'math', 'Grade Four', '2024-09-11 00:00:00', 'gggggggggggggg', 'uploads/ENDTERM II  EXAM RESULT  2024.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `staffsettings`
--

CREATE TABLE `staffsettings` (
  `staffid` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `txtcolor` varchar(250) NOT NULL,
  `centcolor` varchar(250) NOT NULL,
  `hwrapcolor` varchar(250) NOT NULL,
  `layout` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffsettings`
--

INSERT INTO `staffsettings` (`staffid`, `color`, `txtcolor`, `centcolor`, `hwrapcolor`, `layout`) VALUES
('denismytin@gmail.com', '#ffffff', '#000000', '#fbfbfb', '#fbfbfb', ''),
('dmytin@ymail.com', '#e8ffff', '#000000', '#ffecec', '#f2f9f9', '');

-- --------------------------------------------------------

--
-- Table structure for table `staffsubjects`
--

CREATE TABLE `staffsubjects` (
  `staffid` varchar(255) NOT NULL,
  `subjectcode` varchar(255) NOT NULL,
  `subjectname` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffsubjects`
--

INSERT INTO `staffsubjects` (`staffid`, `subjectcode`, `subjectname`, `class`, `stream`, `date`, `teacher`, `status`) VALUES
('denismytin@gmail.com', 'Math002', 'English', 'Gradeseven', 'Y', '2024-05-07', 'Tr John', ''),
('', 'Math003', 'Science &amp; Technology', 'Gradethree', 'Z', '2024-01-10', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `staffthemes`
--

CREATE TABLE `staffthemes` (
  `themename` varchar(250) NOT NULL,
  `colorname` varchar(250) NOT NULL,
  `colorcode` varchar(250) NOT NULL,
  `colorcode2` varchar(250) NOT NULL,
  `colorcode3` varchar(250) NOT NULL,
  `colorcode4` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffthemes`
--

INSERT INTO `staffthemes` (`themename`, `colorname`, `colorcode`, `colorcode2`, `colorcode3`, `colorcode4`) VALUES
('dark', 'dulio', '#ff403a', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stdassignments`
--

CREATE TABLE `stdassignments` (
  `username` varchar(255) NOT NULL,
  `assignname` varchar(255) NOT NULL,
  `dateuploaded` varchar(255) DEFAULT NULL,
  `assigntr` varchar(255) DEFAULT NULL,
  `assigntype` varchar(255) DEFAULT NULL,
  `assigngrade` varchar(255) DEFAULT NULL,
  `assignduedate` varchar(255) NOT NULL,
  `assigninstructs` varchar(255) NOT NULL,
  `assignfile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stdassignments`
--

INSERT INTO `stdassignments` (`username`, `assignname`, `dateuploaded`, `assigntr`, `assigntype`, `assigngrade`, `assignduedate`, `assigninstructs`, `assignfile`) VALUES
('', 'Homescience', '2024-09-03', 'TR. JOHN', 'math', 'Grade Four', '2024-09-11', 'gggggggggggggg', 'uploads/ACADEMIC REPORT G 5Y TERM II 2024.docx');

-- --------------------------------------------------------

--
-- Table structure for table `stdcompletedassignsnew`
--

CREATE TABLE `stdcompletedassignsnew` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `assignname` varchar(255) NOT NULL,
  `dateuploaded` varchar(255) DEFAULT NULL,
  `assigntr` varchar(255) DEFAULT NULL,
  `assigntype` varchar(255) DEFAULT NULL,
  `assigngrade` varchar(255) DEFAULT NULL,
  `assignduedate` varchar(255) DEFAULT NULL,
  `assigninstructs` varchar(255) DEFAULT NULL,
  `assignfile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stdcompletedassignsnew`
--

INSERT INTO `stdcompletedassignsnew` (`id`, `assignment_id`, `username`, `assignname`, `dateuploaded`, `assigntr`, `assigntype`, `assigngrade`, `assignduedate`, `assigninstructs`, `assignfile`) VALUES
(1, 4, 'ATYS67S88A9SS', 'Homescience', '2024-09-03 00:00:00', 'TR. JOHN', 'math', 'Grade Four', '2024-09-11 00:00:00', 'gggggggggggggg', 'uploads/ENDTERM II  EXAM RESULT  2024.xlsx');

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
(0, 'admin', '001admin', 'N/A', 'Grade Five', 'Healthy', 'uploads/20231013_081409.jpg', 'Male', '1996-06-15', '0000', '071944041', 'English', 'Active', 'Kenyan', '$2y$10$zfGH2QKPUIDVDC9YXnky/OHemC.4lv5KCF0Ukfloprol0tzoJPzva', ''),
(0, 'Linsey Lindah', '12345', 'y', 'gradeone', 'good', 'uploads/wife.jpeg', 'female', '2000-12-22', '70000', '071944041', 'english', 'active', 'Kenyan', '$2y$10$R8IWZ9MK2wAWGzJrG77X3uDXQysilDpAGLghxsHG7bGCYkdwxzLLy', ''),
(0, 'MUNGE ARNOLD GITACHU', 'A000006838', 'Y', 'Grade Eight', 'Good', 'uploads/20231013_081457.jpg', 'Male', '2010-09-06', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$f7ud7kds7l4gu/UgeYng5eNpqa6zXF.Lxdu//FCuZShMNl16Geknu', ''),
(0, 'MWANGI,CYNTHIA NGIMA', 'A000070842', 'X', 'Grade Eight', 'Good', 'uploads/20231013_081423.jpg', 'Female', '2011-07-19', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$QelQkgB5LFJg9MuugYoOMumOPsVuPUoBpuBvgKOFLvRN4.ly9yu9i', ''),
(0, 'GITONGA GIFT WANGUI', 'A000149073', 'Y', 'Grade Eight', 'Good', 'uploads/20231013_081900.jpg', 'Female', '2010-06-10', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$2kV6.NvkD18JSjv6jiflr.65xIN9EM.J5jJb3ZFtAbxCf0WkJh.WO', ''),
(0, 'WANGECHI YVONNE WANJIKU', 'A001483545', 'Y', 'Grade Six', 'Good', 'uploads/20231013_081900.jpg', 'Female', '2012-12-12', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$ukN3uReMt5cwwjRp7Jjphe4F9c/L4gHf0H2u6Dx7/adPz29LrgLEK', ''),
(0, 'MURIITHI NELLY GATHONI', 'A001526312', 'X', 'Grade Six', 'Good', 'uploads/20231013_081423.jpg', 'Female', '2012-12-12', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$/FbU7NytYVtM/1LwOGT4yuJUg3Okro6QZV2XWBW/4s6KcQpVhEcy2', ''),
(0, 'WAMBUI DANSON KURIA', 'A001673195', 'Y', 'Grade Six', 'Good', 'uploads/20231013_081409.jpg', 'Male', '2012-12-12', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$wsqWMudlQw/UalcFUhub8O5uWPhjxBIU61bbuPw4YHOr110t8GKqO', ''),
(0, 'ROBIN KING&#039;ORI', 'A002766574', 'Y', 'Grade Five', 'Good', 'uploads/denis-profile.jfif', 'Male', '2013-04-29', '00000', '0719444041', 'Kiswahili', 'Active', 'Kenyan', '$2y$10$72vCWRqusBQ8EHQrzmBo3O1Jdf8HZFayMLgqeIWumwilJRooDEXo2', ''),
(0, 'JOY WAIRIMU MWANGI', 'A002791685', 'Y', 'Grade Five', 'Good', 'uploads/20231013_081857.jpg', 'Female', '2013-03-27', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$3M80yeefOJpAVSaijWA9Lepi60El8Egt45JgvQYXY7gz7XvPDbWv6', ''),
(0, 'JOHN KIRIAMITI', 'AHYUS77878SAAS9', 'Y', 'Grade Nine', 'Bad', 'uploads/20231013_081457.jpg', 'Male', '2019-03-31', '00000', '0719444041', 'Engkisw', 'Active', 'Kenyan', '$2y$10$tBMfmaFCTsDKDkbrIs6U.O9fXByqQsJGNZlXI/0rk02BqpDIcNf2q', ''),
(0, 'JOHN KIRIAMITI', 'AHYUS77878SDSDS', 'X', 'Grade Two', 'Bad', 'uploads/abigaeldpresisent.jpg', 'Male', '2024-06-13', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$x58UwMP3GjAFVI/WpCpgHuCAQTWi/eawSiuAeFOM24EsxJ32VNhmq', ''),
(0, 'ALAINE MUMBI', 'ALAINE12345', 'X', 'Grade Ten', 'Good', 'uploads/admissions.jpg', 'Female', '2010-05-23', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$VAoAK/hXpR1X1SNktaGWHOysplREEjDX5Tv6regqPU9xA37r5RUdi', ''),
(0, 'ALICE NGUNJU', 'ALICE001009', 'X', 'Grade Nine', 'Good', 'uploads/abigaeldpresisent.jpg', 'Female', '2009-06-20', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$XbZjiwC0tAgav375.IRGa.H2g.LUh8H3Fp/XNU.AshaJyrTysjhB2', ''),
(0, 'MARYANN NYAMBURA', 'ATYS67S88A9SS', 'X', 'Grade Four', 'Good', 'uploads/20231013_081900.jpg', 'Female', '2201-02-22', '00000', '0719444041', 'Kiswahili', 'Suspended', 'Kenyan', '$2y$10$jTCGuWgH4yDCAh9VVwy99Om9oo3aWGFHKLFCUcQwiVFRrL3fBKd4G', ''),
(0, 'MURIITHI SASHA ESTHER KERU', 'B000123331', 'Y', 'Grade Seven', 'Good', 'uploads/20231013_081911.jpg', 'Female', '2011-07-29', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$mZL0o/.yToPAlPNrDEty4ukqXexUK1JSbScCnrvOC6rvGeOKD45m6', ''),
(0, 'WANGUI REGINA WAHU', 'B000383495', 'Y', 'Grade Seven', 'Good', 'uploads/20231013_081900.jpg', 'Female', '2011-03-31', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$IneSjpKjkLfOp3HjVhcriOIel.aUIaxtt30ck3p8eYuc/Eg/sO3cm', ''),
(0, 'THEURI COLETTE WANJIRU', 'B000471861', 'Y', 'Grade Seven', 'Good', 'uploads/20231013_081423.jpg', 'Female', '2011-09-13', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$2lqhXfBBY2qbQ3yuXqJmDOutVJH0BY4xEI0mKCrzAr36fKrLCc316', ''),
(0, 'RYAN KIMOTHO', 'B002510010', 'Y', 'Grade Five', 'Good', 'uploads/20231013_081457.jpg', 'Male', '2013-05-17', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$or40QPTHBe.ZHXBwjxgXsenC85EzIV0XJNro9su.KOQJS1r7Ph4t6', ''),
(0, 'NGARUIYA EPHRAIM KARERI', 'B005198285', 'X', 'Grade Three', 'Good', 'uploads/20231013_081423.jpg', 'Male', '2016-05-09', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$4M5GC7DV/pLaAWYw/VlWCeOV0Wql2vUzv820xUv7QJlpXkby1SjU6', ''),
(0, 'MUCHIRI LIAM KUGA', 'B005199154', 'X', 'Grade Three', 'Good', 'uploads/20231013_081457.jpg', 'Male', '2015-05-03', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$KA7jlRreNuNavJpvDChiquGZizNUeUAK8IxDZeR5g/QeJhMTFGxCm', ''),
(0, 'MUCHIRI LIAM KUGA', 'B005200663', 'X', 'Grade Three', 'Good', 'uploads/20231013_081911.jpg', 'Female', '2015-05-05', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$7t8lL/v3kfbC21V.YWnAwOLEsmyyrOymcGFZy7m37Asb3G849p2cu', ''),
(0, 'COLLINS MWANGI', 'COLLINS12345', 'X', 'Grade Twelve', 'Good', 'uploads/allconsostaff.jpg', 'default', '2010-03-12', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$yPfTf3lw90c7m7e0PGPJg.Ge03CYMfKBclgk35tRIKfmrxx0pogie', ''),
(0, 'KAREN NJERI', 'DS7DSY8DSYD', 'Y', 'Grade Eleven', 'Good', 'uploads/20231013_081911.jpg', 'Female', '3333-03-31', '00000', '0719444041', 'Engkisw', 'Suspended', 'Kenyan', '$2y$10$e27i7EXafsTC/Es2pYhyc.MZuA.TzpskcBF9CsldbSf/KB/FcTVzi', ''),
(0, 'LINET WANJUGU', 'DSYU7DS87DSD', 'Z', 'Grade Twelve', 'Bad', 'uploads/20231013_081900.jpg', 'Female', '3332-03-31', '00000', '0719444041', 'Other', 'Absent', 'Kenyan', '$2y$10$z8pcU2DeE183/ii1JQjqT.LZkDV0E9oCm74pgvxL6L3u7uuzkikda', ''),
(0, 'JOHN CARLOS', 'JOHN12345', 'X', 'Grade One', 'Good', 'uploads/admissions.jpg', 'default', '2010-04-22', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$KYsphHXr7R3wrkHbhszbe.9YmXnTQR1sqyD/GPFuzbJRi/7IA5V5S', ''),
(0, 'KIM KIMANI KIM', 'KIM12345', 'X', 'Grade Eight', 'Good', 'uploads/cpsouter10.jpg', 'Male', '2005-04-13', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$zol4TAxtRg3JQlNTDUZU/e9ElTJPBwk1j4yla5YFQ/UlCqxgeWL/u', ''),
(0, 'KIMANI LIAM JOHN', 'RA5278DYT2', 'Z', 'Grade One', 'Good', 'uploads/20231013_081409.jpg', 'Male', '2020-09-09', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$PyzZGh7R0335xkJnTK1O.Op4nVDA2yAzt89.1VS/K0VprnG.unLN2', ''),
(0, 'ALICE KAMARU', 'RTS56YS7A7SAS', 'Y', 'Grade Ten', 'Good', 'uploads/20231013_081423.jpg', 'Female', '2212-02-21', '00000', '0719444041', 'Engkisw', 'Active', 'Kenyan', '$2y$10$viplaaPPB/5nFSKFJ7voSuST0HOCZUAwNyEbgqKthQqSVym1MM/T6', ''),
(0, 'SHASHAI MWENDWA', 'SHASHAI12345', 'X', 'Grade Eleven', 'Good', 'uploads/andreamuthonidorm.jpg', 'default', '2000-12-12', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$4tsEJtmuKxF/duyX8izgs.d3DofFOmO7aPeDcqNw7TFPyqzxgxprS', ''),
(0, 'MANU HELLEN KEN', 'STAR356AYUS7', 'Y', 'Grade Two', 'Good', 'uploads/20231013_081423.jpg', 'Female', '2018-02-22', '00000', '0719444041', 'Kiswahili', 'Active', 'Kenyan', '$2y$10$xUx5EtgCOvJDWkipl3e3z.sCqBfEiPJFORwtOUnzTf8c3Q8lldTdG', ''),
(0, 'LOYSE ANN NJERI', 'TRY67SUAY7W', 'Y', 'Grade One', 'Good', 'uploads/20231013_081423.jpg', 'Female', '2020-05-05', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$MgH0DRLVW6DyW5eCEZeAYetCEN0UoDV45uDQGstiGK3Kl0w1g3mQG', ''),
(0, 'JOHN MAINA ALICE', 'USYI7A8S99AS', 'Y', 'Grade Nine', 'Worse', 'uploads/20231013_081409.jpg', 'Female', '1212-02-21', '00000', '0719444041', 'Engkisw', 'Suspended', 'Kenyan', '$2y$10$ngJYfouVmnl2ItHg6ULJjuHPUmhwgRn3pe5R1egSrBfz6Fd46V9R2', ''),
(0, 'wwww', 'wwww', 'www', 'www', 'www', 'uploads/couple.jpg', 'www', '0002-02-22', '222', '2222', 'wwww', 'www', 'www', '$2y$10$ws2YUg96wVNxMJpAA2B23Od0mnbFrZeB/9mUZYBLYeCqhk4q7W0Ge', ''),
(0, 'ANN NJERI MARY', 'YETHS827SAM', 'Z', 'Grade One', 'Good', 'uploads/20231013_081857.jpg', 'Female', '2019-04-04', '00000', '0719444041', 'English', 'Active', 'Kenyan', '$2y$10$WpuN56BCb7RwDtZmUL34hOMyokncKb/yHcqNfCgXxB0Kf8WnfDMvq', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `studentsubjects`
--

CREATE TABLE `studentsubjects` (
  `username` varchar(255) NOT NULL,
  `subjectcode` varchar(255) NOT NULL,
  `subjectname` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentsubjects`
--

INSERT INTO `studentsubjects` (`username`, `subjectcode`, `subjectname`, `date`, `teacher`, `status`) VALUES
('001admin', 'Math002', 'Science &amp; Technology', '2024-04-09', 'Tr Denis', ''),
('A000149073', 'Math0G3', 'English', '2024-09-01', 'Tr Mary Agnes', '');

-- --------------------------------------------------------

--
-- Table structure for table `uppergrades`
--

CREATE TABLE `uppergrades` (
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
  `subjscie` varchar(255) NOT NULL,
  `subjscierub` varchar(255) NOT NULL,
  `subjsocial` varchar(255) NOT NULL,
  `subjsocialrub` varchar(255) NOT NULL,
  `subjscre` varchar(255) NOT NULL,
  `subjscrerub` varchar(255) NOT NULL,
  `subjca` varchar(255) NOT NULL,
  `subjcarub` varchar(255) NOT NULL,
  `subjagrinu` varchar(255) NOT NULL,
  `subjagrinurub` varchar(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uppergrades`
--

INSERT INTO `uppergrades` (`username`, `name`, `stdgrade`, `stream`, `subjmath`, `subjmathrub`, `subjeng`, `subjengrub`, `subjkisw`, `subjkiswrub`, `subjscie`, `subjscierub`, `subjsocial`, `subjsocialrub`, `subjscre`, `subjscrerub`, `subjca`, `subjcarub`, `subjagrinu`, `subjagrinurub`, `total`) VALUES
('ATYS67S88A9SS', 'MARYANN NYAMBURA', 'Grade Four', 'X', '44', 'EE', '44', 'EE', '44', 'EE', '44', 'EE', '44', 'EE', '44', 'EE', '44', 'EE', '44', 'EE', 352),
('A002766574', 'ROBIN KING&#039;ORI', 'Grade Five', 'Y', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', '55', 'EE', 440),
('A002766574', 'ROBIN KING&#039;ORI', 'Grade Five', 'Y', '66', 'EE', '66', 'EE', '66', 'EE', '66', 'EE', '66', 'EE', '66', 'EE', '66', 'EE', '66', 'EE', 528),
('A002791685', 'JOY WAIRIMU MWANGI', 'Grade Five', 'Y', '44', 'EE', '44', 'EE', '44', 'EE', '44', 'EE', '44', 'EE', '44', 'EE', '44', 'EE', '44', 'EE', 352);

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `passcode` varchar(255) DEFAULT NULL,
  `confirm_passcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`annsname`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignname`);

--
-- Indexes for table `assignmentsnew`
--
ALTER TABLE `assignmentsnew`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deletedstudentsubjects`
--
ALTER TABLE `deletedstudentsubjects`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`examname`);

--
-- Indexes for table `juniorgrades`
--
ALTER TABLE `juniorgrades`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notesname`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `staffcompletedassigns`
--
ALTER TABLE `staffcompletedassigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffsubjects`
--
ALTER TABLE `staffsubjects`
  ADD PRIMARY KEY (`subjectcode`);

--
-- Indexes for table `staffthemes`
--
ALTER TABLE `staffthemes`
  ADD PRIMARY KEY (`themename`);

--
-- Indexes for table `stdassignments`
--
ALTER TABLE `stdassignments`
  ADD PRIMARY KEY (`assignname`);

--
-- Indexes for table `stdcompletedassignsnew`
--
ALTER TABLE `stdcompletedassignsnew`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_id` (`assignment_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `studentsettings`
--
ALTER TABLE `studentsettings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `studentsubjects`
--
ALTER TABLE `studentsubjects`
  ADD PRIMARY KEY (`subjectcode`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignmentsnew`
--
ALTER TABLE `assignmentsnew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staffcompletedassigns`
--
ALTER TABLE `staffcompletedassigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stdcompletedassignsnew`
--
ALTER TABLE `stdcompletedassignsnew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stdcompletedassignsnew`
--
ALTER TABLE `stdcompletedassignsnew`
  ADD CONSTRAINT `stdcompletedassignsnew_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `assignmentsnew` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
