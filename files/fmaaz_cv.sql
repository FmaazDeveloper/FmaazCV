-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 05, 2023 at 10:21 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmaazcv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('FmaazDeveloper@gmail.com', 'Mohammad@2004');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_ID` int(3) NOT NULL,
  `issuer_arabic` varchar(50) NOT NULL,
  `course_title_arabic` varchar(50) NOT NULL,
  `brief_arabic` varchar(20) NOT NULL,
  `issuer_english` varchar(50) NOT NULL,
  `course_title_english` varchar(50) NOT NULL,
  `brief_english` varchar(20) NOT NULL,
  `hours` int(3) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `photo` varchar(250) NOT NULL,
  PRIMARY KEY (`course_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
  `education_ID` int(3) NOT NULL,
  `issuer_arabic` varchar(50) NOT NULL,
  `major_arabic` varchar(50) NOT NULL,
  `level_arabic` varchar(20) NOT NULL,
  `issuer_english` varchar(50) NOT NULL,
  `major_english` varchar(50) NOT NULL,
  `level_english` varchar(20) NOT NULL,
  `average` float(5,2) NOT NULL,
  `average_from` varchar(20) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`education_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_ID`, `issuer_arabic`, `major_arabic`, `level_arabic`, `issuer_english`, `major_english`, `level_english`, `average`, `average_from`, `photo`, `start_date`, `end_date`) VALUES
(1, 'جامعة الملك سعود', 'غبزبغعزهكبغع', 'دبلوم', 'hmy,uyi.u7', 'ihoihn', 'Diploma', 4.25, '5.00', 'GitHub QR.png', '2023-01-06', '2023-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `experience_ID` int(3) NOT NULL,
  `issuer_arabic` varchar(50) NOT NULL,
  `job_title_arabic` varchar(50) NOT NULL,
  `brief_arabic` varchar(20) NOT NULL,
  `issuer_english` varchar(50) NOT NULL,
  `job_title_english` varchar(50) NOT NULL,
  `brief_english` varchar(20) NOT NULL,
  `average` float(5,2) NOT NULL,
  `average_from` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `photo` varchar(250) NOT NULL,
  PRIMARY KEY (`experience_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
