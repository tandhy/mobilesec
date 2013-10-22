-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2013 at 08:26 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tConferencePub`
--

DROP TABLE IF EXISTS `tConferencePub`;
CREATE TABLE IF NOT EXISTS `tConferencePub` (
  `idConfPub` int(2) NOT NULL,
  `pubName` varchar(255) NOT NULL,
  `pubShortName` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`idConfPub`)
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
  `actCode` varchar(50) NOT NULL,
  `accStatus` int(1) NOT NULL DEFAULT '0',
  `lastLogin` datetime NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `idConfPub` int(2) NOT NULL COMMENT 'Conference Publisher',
  `abstract` text NOT NULL COMMENT 'abstract',
  `idCat` int(2) NOT NULL COMMENT 'Category',
  `idTargProbCat` int(2) NOT NULL COMMENT 'Target Problem Category',
  `tarProbDet` text NOT NULL COMMENT 'Target Problem Detail',
  `idProbSolCat` int(2) NOT NULL COMMENT 'Target Problem Solution Category',
  `relWork` text NOT NULL COMMENT 'Related Work',
  `pros` text NOT NULL,
  `cons` text NOT NULL,
  `performance` text NOT NULL,
  `other` text NOT NULL,
  `bibTex` text NOT NULL,
  `fileUrl` varchar(255) NOT NULL,
  `createDate` date NOT NULL COMMENT 'created Date',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
