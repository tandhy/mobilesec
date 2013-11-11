-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2013 at 09:17 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `tlogin`
--

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
  `actCode` varchar(50) NOT NULL,
  `accStatus` int(1) NOT NULL DEFAULT '0',
  `lastLogin` datetime NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
