-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2013 at 08:15 AM
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
-- Table structure for table `tCategory`
--

CREATE TABLE IF NOT EXISTS `tCategory` (
  `idCategory` int(2) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`idCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tCategory`
--

INSERT INTO `tCategory` (`idCategory`, `Category`, `Description`) VALUES
(1, 'Mobile Computing for e-Commerce', ''),
(2, 'Authentication/Authorization Issues', ''),
(3, 'Ad-Hoc, Mobile, Wireless Networks and Mobile Compu', '');

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
  `accStatus` int(1) NOT NULL DEFAULT '0',
  `lastLogin` date NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tlogin`
--

INSERT INTO `tlogin` (`email`, `password`, `fName`, `mName`, `lName`, `institution`, `area`, `phone`, `mobile`, `role`, `regDate`, `accStatus`, `lastLogin`) VALUES
('administrator', 'a93c6b163e4097772f05ed8ce4b3d556', 'Administrator', '', '', 'Boston University Metropolitan College', '', '', '', 'admin', '2013-10-29', 1, '2013-10-29'),
('levlumino@gmail.com', 'eeed48e3836f9ed3f0e052223c642ae8', 'Lev', '', 'Lumino', 'Boston University Metropolitan College', 'Security', '6177631324', '6177631324', 'user', '2013-10-29', 1, '2013-10-29'),
('tandhy.bintang@gmail.com', 'e7b80bbdb26746a88f28114e531140ba', 'Tandhy', 'B', 'Parlindungan', 'Boston University Metropolitan College', 'Security', '6177631324', '6177631324', 'user', '2013-10-30', 1, '2013-10-30'),
('tandhy@bu.edu', 'e7b80bbdb26746a88f28114e531140ba', 'Tandhy', 'B', 'Parlindungan', 'Boston University', 'Security', '6177631324', '6177631324', 'admin', '2013-10-18', 1, '2013-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tpaper`
--

CREATE TABLE IF NOT EXISTS `tpaper` (
  `id` varchar(14) NOT NULL COMMENT 'format :ddmmyyyyhhmmss',
  `fileName` varchar(255) NOT NULL COMMENT 'filename path',
  `title` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `confPub` varchar(100) NOT NULL COMMENT 'Conference Publisher',
  `abstract` text NOT NULL COMMENT 'abstract',
  `idCat` int(2) NOT NULL COMMENT 'Category',
  `bibTex` text NOT NULL,
  `fileUrl` varchar(255) NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `createDate` date NOT NULL COMMENT 'created Date',
  PRIMARY KEY (`id`),
  KEY `createdBy` (`createdBy`),
  KEY `idCat` (`idCat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tReviewPaper`
--

CREATE TABLE IF NOT EXISTS `tReviewPaper` (
  `id` varchar(14) NOT NULL COMMENT 'id Review Paper',
  `idPaper` varchar(14) NOT NULL COMMENT 'id Paper',
  `idTargetProblemCat` int(2) NOT NULL COMMENT 'id Target Problem Category',
  `targetProblemDetail` text NOT NULL COMMENT 'Target Problem Detail',
  `idPropSolutionCat` int(2) NOT NULL COMMENT 'id Propose Solution Category',
  `propSolutionDetail` text NOT NULL COMMENT 'Propose Solution Detail',
  `relatedWork` text NOT NULL,
  `pros` text NOT NULL,
  `cons` text NOT NULL,
  `performance` text NOT NULL,
  `other` text NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `createdDate` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPaper` (`idPaper`,`idTargetProblemCat`,`idPropSolutionCat`,`createdBy`),
  KEY `createdBy` (`createdBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tpaper`
--
ALTER TABLE `tpaper`
  ADD CONSTRAINT `createdBy` FOREIGN KEY (`createdBy`) REFERENCES `tlogin` (`email`),
  ADD CONSTRAINT `paperCategory` FOREIGN KEY (`idCat`) REFERENCES `tCategory` (`idCategory`);

--
-- Constraints for table `tReviewPaper`
--
ALTER TABLE `tReviewPaper`
  ADD CONSTRAINT `reviewPaperBy` FOREIGN KEY (`createdBy`) REFERENCES `tlogin` (`email`),
  ADD CONSTRAINT `reviewOnPaper` FOREIGN KEY (`idPaper`) REFERENCES `tpaper` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
