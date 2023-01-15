-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2023 at 05:26 AM
-- Server version: 5.7.39-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

CREATE TABLE `admin` (
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_ID` int(3) NOT NULL,
  `issuer_arabic` varchar(50) NOT NULL,
  `course_title_arabic` varchar(50) NOT NULL,
  `brief_arabic` varchar(20) NOT NULL,
  `issuer_english` varchar(50) NOT NULL,
  `course_title_english` varchar(50) NOT NULL,
  `brief_english` varchar(20) NOT NULL,
  `hours` int(3) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_ID` int(3) NOT NULL,
  `issuer_arabic` varchar(50) NOT NULL,
  `major_arabic` varchar(50) NOT NULL,
  `level_arabic` varchar(20) NOT NULL,
  `issuer_english` varchar(50) NOT NULL,
  `major_english` varchar(50) NOT NULL,
  `level_english` varchar(20) NOT NULL,
  `average` float(5,2) NOT NULL,
  `average_from` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
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
  `end_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `general_brief`
--

CREATE TABLE `general_brief` (
  `general_brief_ID` int(3) NOT NULL,
  `brief_arabic` varchar(4000) NOT NULL,
  `brief_english` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_ID` int(11) NOT NULL,
  `name_arabic` varchar(50) CHARACTER SET utf8 NOT NULL,
  `brief_arabic` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `name_english` varchar(50) CHARACTER SET utf8 NOT NULL,
  `brief_english` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `url` varchar(50) CHARACTER SET utf8 NOT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitors_count`
--

CREATE TABLE `visitors_count` (
  `visitors_count` int(11) NOT NULL,
  `count_date` date NOT NULL,
  `count_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_ID`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_ID`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`experience_ID`);

--
-- Indexes for table `general_brief`
--
ALTER TABLE `general_brief`
  ADD PRIMARY KEY (`general_brief_ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
