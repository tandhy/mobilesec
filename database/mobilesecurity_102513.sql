-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
<<<<<<< HEAD
-- Generation Time: Oct 25, 2013 at 08:33 PM
=======
-- Generation Time: Oct 25, 2013 at 08:31 PM
>>>>>>> iter1
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobilesecurity`
--
CREATE DATABASE IF NOT EXISTS `mobilesecurity` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mobilesecurity`;

-- --------------------------------------------------------

--
-- Table structure for table `tCategory`
--

DROP TABLE IF EXISTS `tCategory`;
CREATE TABLE IF NOT EXISTS `tCategory` (
  `idCategory` int(2) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`idCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tlogin`
--

DROP TABLE IF EXISTS `tlogin`;
CREATE TABLE IF NOT EXISTS `tlogin` (
  `email` varchar(100) NOT NULL COMMENT 'holds email, act as username',
  `password` varchar(100) NOT NULL COMMENT 'hold password',
  `fName` varchar(50) NOT NULL,
  `mName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `institution` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `regDate` date NOT NULL,
  `accStatus` int(1) NOT NULL DEFAULT '0',
  `lastLogin` date NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tlogin`
--

INSERT INTO `tlogin` (`email`, `password`, `fName`, `mName`, `lName`, `institution`, `area`, `phone`, `mobile`, `role`, `regDate`, `accStatus`, `lastLogin`) VALUES
('tandhy.bintang@gmail.com', 'e7b80bbdb26746a88f28114e531140ba', 'Tandhy', 'B', 'Parlindungan', 'Boston University Metropolitan College', 'Security', '6177631324', '6177631324', 'user', '2013-10-18', 0, '2013-10-18'),
('tandhy@bu.edu', 'e7b80bbdb26746a88f28114e531140ba', 'Tandhy', 'B', 'Parlindungan', 'Boston University', 'Security', '6177631324', '6177631324', 'admin', '2013-10-18', 1, '2013-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tpaper`
--

DROP TABLE IF EXISTS `tpaper`;
CREATE TABLE IF NOT EXISTS `tpaper` (
  `id` varchar(12) NOT NULL COMMENT 'format :ddmmyyyyhhmm',
  `fileName` varchar(255) NOT NULL COMMENT 'filename path',
  `title` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `ConfPub` varchar(100) NOT NULL COMMENT 'Conference Publisher',
  `abstract` text NOT NULL COMMENT 'abstract',
  `idCat` int(2) NOT NULL COMMENT 'Category',
  `bibTex` text NOT NULL,
  `fileUrl` varchar(255) NOT NULL,
  `createDate` date NOT NULL COMMENT 'created Date',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
