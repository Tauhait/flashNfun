-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2017 at 10:06 AM
-- Server version: 5.6.35-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flashNfun`
--
CREATE DATABASE IF NOT EXISTS `flashNfun` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `flashNfun`;

-- --------------------------------------------------------

--
-- Table structure for table `ActivePlayers`
--
-- Creation: Jun 01, 2017 at 10:48 AM
--

DROP TABLE IF EXISTS `ActivePlayers`;
CREATE TABLE IF NOT EXISTS `ActivePlayers` (
  `pid` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dname` varchar(30) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--
-- Creation: Jun 15, 2017 at 06:20 PM
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('admin@flashNfun', 'fun@flash@2017#admin');

-- --------------------------------------------------------

--
-- Table structure for table `avgUSP`
--
-- Creation: Jun 06, 2017 at 10:41 AM
-- Last update: Jun 14, 2017 at 04:30 PM
--

DROP TABLE IF EXISTS `avgUSP`;
CREATE TABLE IF NOT EXISTS `avgUSP` (
  `gid` int(12) NOT NULL,
  `usp_avg` int(12) NOT NULL,
  `t_voters` int(12) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `avgUSP`
--

INSERT INTO `avgUSP` (`gid`, `usp_avg`, `t_voters`) VALUES
(9, 5, 1),
(7, 5, 2),
(6, 5, 1),
(5, 5, 1),
(2, 5, 1),
(10, 5, 1),
(12, 2, 3),
(11, 5, 1),
(3, 5, 1),
(1, 5, 2),
(4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forgotPass`
--
-- Creation: Apr 24, 2017 at 06:52 AM
--

DROP TABLE IF EXISTS `forgotPass`;
CREATE TABLE IF NOT EXISTS `forgotPass` (
  `email` varchar(65) NOT NULL,
  `confirmcode` varchar(65) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `game1`
--
-- Creation: May 07, 2017 at 07:01 AM
--

DROP TABLE IF EXISTS `game1`;
CREATE TABLE IF NOT EXISTS `game1` (
  `pid` int(10) NOT NULL,
  `gid` int(10) DEFAULT NULL,
  `score` int(20) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `pid` (`pid`),
  KEY `pid_2` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game1`
--

INSERT INTO `game1` (`pid`, `gid`, `score`) VALUES
(54, 1, 80),
(56, 1, 0),
(59, 1, 0),
(65, 1, 50),
(67, 1, 3),
(72, 1, 0),
(73, 1, 0),
(74, 1, 49),
(75, 1, 0),
(76, 1, 0),
(77, 1, 0),
(78, 1, 0),
(79, 1, 0),
(80, 1, 0),
(82, 1, 0),
(83, 1, 0),
(84, 1, 0),
(87, 1, 0),
(88, 1, 0),
(90, 1, 0),
(92, 1, 0),
(93, 1, 0),
(103, 1, 0),
(111, 1, 0),
(112, 1, 10),
(113, 1, 0),
(114, 1, 0),
(115, 1, 0),
(116, 1, 0),
(117, 1, 0),
(118, 1, 5),
(119, 1, 0),
(120, 1, 0),
(121, 1, 0),
(122, 1, 0),
(123, 1, 0),
(124, 1, 0),
(125, 1, 0),
(126, 1, 0),
(127, 1, 0),
(128, 1, 0),
(129, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game2`
--
-- Creation: May 07, 2017 at 07:01 AM
--

DROP TABLE IF EXISTS `game2`;
CREATE TABLE IF NOT EXISTS `game2` (
  `pid` int(10) NOT NULL,
  `gid` int(10) DEFAULT NULL,
  `score` int(20) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game2`
--

INSERT INTO `game2` (`pid`, `gid`, `score`) VALUES
(54, 2, 2450),
(56, 2, 1250),
(59, 2, 0),
(65, 2, 0),
(67, 2, 2800),
(72, 2, 0),
(73, 2, 2700),
(74, 2, 2800),
(75, 2, 0),
(76, 2, 1450),
(77, 2, 1450),
(78, 2, 0),
(79, 2, 0),
(80, 2, 0),
(82, 2, 1250),
(83, 2, 0),
(84, 2, 0),
(87, 2, 1250),
(88, 2, 0),
(90, 2, 0),
(92, 2, 0),
(93, 2, 0),
(103, 2, 0),
(111, 2, 0),
(112, 2, 0),
(113, 2, 0),
(114, 2, 0),
(115, 2, 0),
(116, 2, 1250),
(117, 2, 0),
(118, 2, 0),
(119, 2, 0),
(120, 2, 0),
(121, 2, 0),
(122, 2, 0),
(123, 2, 0),
(124, 2, 1450),
(125, 2, 0),
(126, 2, 0),
(127, 2, 0),
(128, 2, 0),
(129, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game3`
--
-- Creation: May 07, 2017 at 07:01 AM
--

DROP TABLE IF EXISTS `game3`;
CREATE TABLE IF NOT EXISTS `game3` (
  `pid` int(10) NOT NULL,
  `gid` int(10) DEFAULT NULL,
  `score` int(20) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game3`
--

INSERT INTO `game3` (`pid`, `gid`, `score`) VALUES
(54, 3, 140),
(56, 3, 150),
(59, 3, 0),
(65, 3, 10),
(67, 3, 310),
(72, 3, 0),
(73, 3, 624),
(74, 3, 0),
(75, 3, 0),
(76, 3, 0),
(77, 3, 0),
(78, 3, 0),
(79, 3, 0),
(80, 3, 0),
(82, 3, 10),
(83, 3, 0),
(84, 3, 0),
(87, 3, 0),
(88, 3, 0),
(90, 3, 0),
(92, 3, 0),
(93, 3, 0),
(103, 3, 0),
(111, 3, 0),
(112, 3, 0),
(113, 3, 0),
(114, 3, 0),
(115, 3, 0),
(116, 3, 80),
(117, 3, 0),
(118, 3, 0),
(119, 3, 0),
(120, 3, 0),
(121, 3, 0),
(122, 3, 0),
(123, 3, 0),
(124, 3, 0),
(125, 3, 0),
(126, 3, 0),
(127, 3, 0),
(128, 3, 0),
(129, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game4`
--
-- Creation: May 07, 2017 at 07:01 AM
--

DROP TABLE IF EXISTS `game4`;
CREATE TABLE IF NOT EXISTS `game4` (
  `pid` int(10) NOT NULL,
  `gid` int(10) DEFAULT NULL,
  `score` int(20) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game4`
--

INSERT INTO `game4` (`pid`, `gid`, `score`) VALUES
(54, 4, 20450),
(56, 4, 2350),
(59, 4, 0),
(65, 4, 0),
(67, 4, 1850),
(72, 4, 0),
(73, 4, 1750),
(74, 4, 25950),
(75, 4, 0),
(76, 4, 0),
(77, 4, 0),
(78, 4, 0),
(79, 4, 0),
(80, 4, 0),
(82, 4, 0),
(83, 4, 0),
(84, 4, 0),
(87, 4, 0),
(88, 4, 0),
(90, 4, 0),
(92, 4, 0),
(93, 4, 0),
(103, 4, 0),
(111, 4, 0),
(112, 4, 17450),
(113, 4, 0),
(114, 4, 0),
(115, 4, 0),
(116, 4, 0),
(117, 4, 0),
(118, 4, 0),
(119, 4, 0),
(120, 4, 0),
(121, 4, 3450),
(122, 4, 6950),
(123, 4, 0),
(124, 4, 0),
(125, 4, 0),
(126, 4, 0),
(127, 4, 0),
(128, 4, 0),
(129, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game5`
--
-- Creation: May 07, 2017 at 07:01 AM
--

DROP TABLE IF EXISTS `game5`;
CREATE TABLE IF NOT EXISTS `game5` (
  `pid` int(10) NOT NULL,
  `gid` int(10) DEFAULT NULL,
  `score` int(20) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game5`
--

INSERT INTO `game5` (`pid`, `gid`, `score`) VALUES
(54, 5, 3600),
(56, 5, 0),
(59, 5, 0),
(65, 5, 0),
(67, 5, 0),
(72, 5, 0),
(73, 5, 0),
(74, 5, 0),
(75, 5, 0),
(76, 5, 0),
(77, 5, 0),
(78, 5, 0),
(79, 5, 0),
(80, 5, 0),
(82, 5, 0),
(83, 5, 0),
(84, 5, 0),
(87, 5, 0),
(88, 5, 0),
(90, 5, 0),
(92, 5, 0),
(93, 5, 0),
(103, 5, 0),
(111, 5, 0),
(112, 5, 0),
(113, 5, 0),
(114, 5, 0),
(115, 5, 0),
(116, 5, 0),
(117, 5, 0),
(118, 5, 0),
(119, 5, 0),
(120, 5, 0),
(121, 5, 0),
(122, 5, 0),
(123, 5, 0),
(124, 5, 0),
(125, 5, 0),
(126, 5, 0),
(127, 5, 0),
(128, 5, 0),
(129, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game6`
--
-- Creation: May 07, 2017 at 07:01 AM
--

DROP TABLE IF EXISTS `game6`;
CREATE TABLE IF NOT EXISTS `game6` (
  `pid` int(10) NOT NULL,
  `gid` int(10) NOT NULL,
  `score` int(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game6`
--

INSERT INTO `game6` (`pid`, `gid`, `score`) VALUES
(54, 6, 8068),
(56, 6, 6138),
(59, 6, 0),
(65, 6, 7338),
(67, 6, 7638),
(72, 6, 17538),
(73, 6, 4638),
(74, 6, 266538),
(75, 6, 0),
(76, 6, 0),
(77, 6, 9138),
(78, 6, 0),
(79, 6, 60738),
(80, 6, 0),
(82, 6, 0),
(83, 6, 0),
(84, 6, 0),
(87, 6, 0),
(88, 6, 5238),
(90, 6, 0),
(92, 6, 0),
(93, 6, 0),
(103, 6, 0),
(111, 6, 0),
(112, 6, 22038),
(113, 6, 0),
(114, 6, 0),
(115, 6, 0),
(116, 6, 5838),
(117, 6, 0),
(118, 6, 0),
(119, 6, 0),
(120, 6, 0),
(121, 6, 0),
(122, 6, 12138),
(123, 6, 0),
(124, 6, 0),
(125, 6, 0),
(126, 6, 0),
(127, 6, 0),
(128, 6, 0),
(129, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game7`
--
-- Creation: May 10, 2017 at 04:06 AM
--

DROP TABLE IF EXISTS `game7`;
CREATE TABLE IF NOT EXISTS `game7` (
  `pid` int(10) NOT NULL,
  `gid` int(10) NOT NULL,
  `score` int(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game7`
--

INSERT INTO `game7` (`pid`, `gid`, `score`) VALUES
(54, 7, 972),
(56, 7, 5372),
(59, 7, 0),
(65, 7, 972),
(67, 7, 0),
(72, 7, 5872),
(73, 7, 674),
(74, 7, 3680),
(75, 7, 0),
(76, 7, 0),
(77, 7, 0),
(78, 7, 0),
(79, 7, 1876),
(80, 7, 0),
(82, 7, 1786),
(83, 7, 0),
(84, 7, 0),
(87, 7, 0),
(88, 7, 0),
(90, 7, 0),
(92, 7, 0),
(93, 7, 0),
(103, 7, 0),
(111, 7, 0),
(112, 7, 10272),
(113, 7, 0),
(114, 7, 0),
(115, 7, 0),
(116, 7, 372),
(117, 7, 0),
(118, 7, 572),
(119, 7, 0),
(120, 7, 0),
(121, 7, 0),
(122, 7, 2472),
(123, 7, 0),
(124, 7, 0),
(125, 7, 0),
(126, 7, 0),
(127, 7, 0),
(128, 7, 0),
(129, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game8`
--
-- Creation: May 07, 2017 at 07:01 AM
--

DROP TABLE IF EXISTS `game8`;
CREATE TABLE IF NOT EXISTS `game8` (
  `pid` int(10) NOT NULL,
  `gid` int(10) NOT NULL,
  `score` int(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game8`
--

INSERT INTO `game8` (`pid`, `gid`, `score`) VALUES
(54, 8, 13220),
(56, 8, 0),
(59, 8, 0),
(65, 8, 0),
(67, 8, 6636),
(72, 8, 0),
(73, 8, 0),
(74, 8, 6859),
(75, 8, 0),
(76, 8, 0),
(77, 8, 1455),
(78, 8, 0),
(79, 8, 7539),
(80, 8, 0),
(82, 8, 0),
(83, 8, 0),
(84, 8, 0),
(87, 8, 0),
(88, 8, 0),
(90, 8, 0),
(92, 8, 0),
(93, 8, 0),
(103, 8, 0),
(111, 8, 0),
(112, 8, 9930),
(113, 8, 0),
(114, 8, 0),
(115, 8, 0),
(116, 8, 0),
(117, 8, 0),
(118, 8, 1780),
(119, 8, 0),
(120, 8, 0),
(121, 8, 2744),
(122, 8, 292),
(123, 8, 0),
(124, 8, 0),
(125, 8, 0),
(126, 8, 0),
(127, 8, 0),
(128, 8, 0),
(129, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game9`
--
-- Creation: May 07, 2017 at 07:01 AM
--

DROP TABLE IF EXISTS `game9`;
CREATE TABLE IF NOT EXISTS `game9` (
  `pid` int(10) NOT NULL,
  `gid` int(10) NOT NULL,
  `score` int(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game9`
--

INSERT INTO `game9` (`pid`, `gid`, `score`) VALUES
(54, 9, 20),
(56, 9, 120),
(59, 9, 0),
(65, 9, 0),
(67, 9, 30),
(72, 9, 0),
(73, 9, 0),
(74, 9, 40),
(75, 9, 0),
(76, 9, 0),
(77, 9, 0),
(78, 9, 0),
(79, 9, 0),
(80, 9, 0),
(82, 9, 0),
(83, 9, 0),
(84, 9, 0),
(87, 9, 0),
(88, 9, 0),
(90, 9, 0),
(92, 9, 0),
(93, 9, 0),
(103, 9, 0),
(111, 9, 0),
(112, 9, 0),
(113, 9, 0),
(114, 9, 0),
(115, 9, 0),
(116, 9, 0),
(117, 9, 0),
(118, 9, 300),
(119, 9, 0),
(120, 9, 0),
(121, 9, 0),
(122, 9, 0),
(123, 9, 0),
(124, 9, 0),
(125, 9, 0),
(126, 9, 0),
(127, 9, 0),
(128, 9, 0),
(129, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game10`
--
-- Creation: May 07, 2017 at 07:01 AM
--

DROP TABLE IF EXISTS `game10`;
CREATE TABLE IF NOT EXISTS `game10` (
  `pid` int(10) NOT NULL,
  `gid` int(10) NOT NULL,
  `score` int(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game10`
--

INSERT INTO `game10` (`pid`, `gid`, `score`) VALUES
(54, 10, 20),
(56, 10, 15),
(59, 10, 0),
(65, 10, 18),
(67, 10, 0),
(72, 10, 0),
(73, 10, 17),
(74, 10, 27),
(75, 10, 0),
(76, 10, 0),
(77, 10, 0),
(78, 10, 0),
(79, 10, 13),
(80, 10, 0),
(82, 10, 0),
(83, 10, 0),
(84, 10, 0),
(87, 10, 0),
(88, 10, 0),
(90, 10, 0),
(92, 10, 0),
(93, 10, 0),
(103, 10, 0),
(111, 10, 0),
(112, 10, 0),
(113, 10, 0),
(114, 10, 0),
(115, 10, 0),
(116, 10, 0),
(117, 10, 0),
(118, 10, 0),
(119, 10, 0),
(120, 10, 0),
(121, 10, 0),
(122, 10, 0),
(123, 10, 0),
(124, 10, 0),
(125, 10, 0),
(126, 10, 0),
(127, 10, 0),
(128, 10, 0),
(129, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game11`
--
-- Creation: May 07, 2017 at 07:01 AM
--

DROP TABLE IF EXISTS `game11`;
CREATE TABLE IF NOT EXISTS `game11` (
  `pid` int(10) NOT NULL,
  `gid` int(10) NOT NULL,
  `score` int(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game11`
--

INSERT INTO `game11` (`pid`, `gid`, `score`) VALUES
(54, 11, 12250),
(56, 11, 0),
(59, 11, 0),
(65, 11, 4300),
(67, 11, 7900),
(72, 11, 0),
(73, 11, 0),
(74, 11, 24100),
(75, 11, 0),
(76, 11, 0),
(77, 11, 0),
(78, 11, 0),
(79, 11, 0),
(80, 11, 0),
(82, 11, 0),
(83, 11, 0),
(84, 11, 0),
(87, 11, 0),
(88, 11, 0),
(90, 11, 0),
(92, 11, 50),
(93, 11, 0),
(103, 11, 0),
(111, 11, 0),
(112, 11, 17600),
(113, 11, 0),
(114, 11, 0),
(115, 11, 0),
(116, 11, 200),
(117, 11, 0),
(118, 11, 0),
(119, 11, 0),
(120, 11, 0),
(121, 11, 500),
(122, 11, 550),
(123, 11, 0),
(124, 11, 0),
(125, 11, 0),
(126, 11, 0),
(127, 11, 0),
(128, 11, 0),
(129, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `game12`
--
-- Creation: May 07, 2017 at 07:01 AM
--

DROP TABLE IF EXISTS `game12`;
CREATE TABLE IF NOT EXISTS `game12` (
  `pid` int(10) NOT NULL,
  `gid` int(10) NOT NULL,
  `score` int(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game12`
--

INSERT INTO `game12` (`pid`, `gid`, `score`) VALUES
(54, 12, 120),
(56, 12, 120),
(59, 12, 0),
(65, 12, 120),
(67, 12, 0),
(72, 12, 0),
(73, 12, 120),
(74, 12, 0),
(75, 12, 0),
(76, 12, 0),
(77, 12, 0),
(78, 12, 0),
(79, 12, 0),
(80, 12, 0),
(82, 12, 0),
(83, 12, 0),
(84, 12, 0),
(87, 12, 0),
(88, 12, 0),
(90, 12, 0),
(92, 12, 0),
(93, 12, 0),
(103, 12, 0),
(111, 12, 0),
(112, 12, 120),
(113, 12, 0),
(114, 12, 0),
(115, 12, 0),
(116, 12, 120),
(117, 12, 0),
(118, 12, 0),
(119, 12, 0),
(120, 12, 0),
(121, 12, 0),
(122, 12, 292),
(123, 12, 0),
(124, 12, 0),
(125, 12, 0),
(126, 12, 0),
(127, 12, 0),
(128, 12, 0),
(129, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gameUSP`
--
-- Creation: Jun 06, 2017 at 03:15 PM
--

DROP TABLE IF EXISTS `gameUSP`;
CREATE TABLE IF NOT EXISTS `gameUSP` (
  `gid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `usp` int(4) NOT NULL,
  PRIMARY KEY (`gid`,`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gameUSP`
--

INSERT INTO `gameUSP` (`gid`, `pid`, `usp`) VALUES
(1, 54, 5),
(1, 73, 5),
(2, 73, 5),
(3, 73, 5),
(4, 73, 5),
(5, 73, 5),
(6, 73, 5),
(7, 56, 5),
(7, 73, 5),
(9, 73, 5),
(10, 73, 5),
(11, 73, 5),
(12, 54, 1),
(12, 73, 5),
(12, 74, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mailingList`
--
-- Creation: Jun 03, 2017 at 03:37 PM
--

DROP TABLE IF EXISTS `mailingList`;
CREATE TABLE IF NOT EXISTS `mailingList` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `mailingList`
--

INSERT INTO `mailingList` (`id`, `email_id`) VALUES
(4, 'ak_tewari07@yahoo.com'),
(5, 'argha.bose.6000@gmail.com'),
(6, 'ashique.ahamed9@gmail.com'),
(7, 'ayankumardey.18@gmail.com'),
(8, 'bastab_65@hotmail.com'),
(9, 'berasouvik91.sb@gmail.com'),
(10, 'bidz@yahoo.co.in'),
(11, 'cbanerjee001@yahoo.co.in'),
(12, 'chatterjee.sayak93@gmail.com'),
(13, 'chatterjeesrinjana@hotmail.com'),
(14, 'chowdhur.sourav94@gmail.com'),
(15, 'COOL.ritd@gmail.com'),
(16, 'debadityasarkar15@gmail.com'),
(17, 'deblinaroy164.1995@gmail.com'),
(18, 'dipanjanbanerjee09@gmail.com'),
(19, 'dipanjanbanerjee15@gmail.com'),
(20, 'dt_tamanna@yahoo.in'),
(21, 'dt_tauhait@hotmail.com'),
(22, 'dt_tauhait@yahoo.in'),
(23, 'duttatapan100@gmail.com'),
(24, 'flashnfun@gmail.com'),
(25, 'ghosh.debayan16@gmail.com'),
(26, 'gms_pharma@rediffmail.com'),
(27, 'hillolhp9@gmail.com'),
(28, 'karmakarnilashis1998@gmail.com'),
(29, 'miracles.asa@gmail.com'),
(30, 'priya.srimani0@gmail.com'),
(31, 'punitsigma47@gmail.com'),
(32, 'raysouvik11114@gmail.com'),
(33, 'rohitsarkar@gmail.com'),
(34, 'rtr180saikat@gmail.com'),
(35, 'samibratagsh7@gmail.com'),
(36, 'sarthak.sen1401@gmail.com'),
(37, 'sengupta335@gmail.com'),
(38, 'settindrajit21@gmail.com'),
(39, 'shhubhadeep.3g@gmail.com'),
(40, 'shuvam32@yahoo.in'),
(41, 'sisir.college@gmail.com'),
(42, 'sujoy4394@gmail.com'),
(43, 'supratim994@gmail.com'),
(44, 'suvo.knj@gmail.com'),
(45, 'tabswarup@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `playerInfo`
--
-- Creation: Jun 10, 2017 at 06:01 PM
--

DROP TABLE IF EXISTS `playerInfo`;
CREATE TABLE IF NOT EXISTS `playerInfo` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `displayname` varchar(25) NOT NULL,
  `password` varchar(12) NOT NULL,
  `phoneNo` int(12) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `playerInfo`
--

INSERT INTO `playerInfo` (`pid`, `firstname`, `lastname`, `email`, `displayname`, `password`, `phoneNo`) VALUES
(54, 'Tuhin', 'Dutta', 'dt_tauhait@hotmail.com', 'Tauhait', '7344', NULL),
(56, 'Shubhadeep', 'Chowdhury', 'shhubhadeep.3g@gmail.com', 'OdiN..', '12345678', NULL),
(59, 'Rohit', 'Sarkar', 'rohitsarkar@gmail.com', 'rohitsarkar', 'rohitsarkar', NULL),
(65, 'sayak', 'Chatterjee', 'chatterjee.sayak93@gmail.com', 'mada', 'test@123', NULL),
(67, 'Bidisha', 'Haldar', 'bidz@yahoo.co.in', 'Bidz', 'dipanjan17', NULL),
(72, 'Tapan', 'Dutta', 'duttatapan100@gmail.com', 'Tapan100', 'Tap123', NULL),
(73, 'Busty', 'Dey', 'bastab_65@hotmail.com', 'Bastab', '7955', NULL),
(74, 'Dipanjan', 'Banerjee', 'dipanjanbanerjee15@gmail.com', 'Lucifer', 'dipanjan17', NULL),
(75, 'Shubhadeep', 'Chowdhury', 'suvo.knj@gmail.com', 'Suvo', '0000', NULL),
(76, 'Samibrata ', 'ghosh', 'samibratagsh7@gmail.com', 'samy@94', '1027', NULL),
(77, 'Ashique', 'ahammed', 'ashique.ahamed9@gmail.com', 'zeus', '12111995', NULL),
(78, 'Sourav', 'Chowdhury', 'chowdhur.sourav94@gmail.com', 'Sourav', '7501', NULL),
(79, 'Avishek', 'Tewari', 'ak_tewari07@yahoo.com', 'Stark', 'flashed', NULL),
(80, 'Sarthak', 'Sen', 'sarthak.sen1401@gmail.com', 'Sarthak', 'Ohhello@123', NULL),
(82, 'S', 'Roy', 'raysouvik11114@gmail.com', 'SROY', '1995', NULL),
(83, 'Debayan', 'Ghosh', 'ghosh.debayan16@gmail.com', 'Debayan', 'sonugh0sh', NULL),
(84, 'Indrajit', 'Sett', 'settindrajit21@gmail.com', 'Indra', 'indra03', NULL),
(87, 'Swarup', 'Banik', 'tabswarup@gmail.com', 'ROXY', 'arupsw12.', NULL),
(88, 'Hillol', 'Patra', 'hillolhp9@gmail.com', 'hp', 'jis@1234', NULL),
(90, 'Nilashis', 'Karmakar', 'karmakarnilashis1998@gmail.com', 'Nilu', '12341998', NULL),
(92, 'Chandan', 'Banerjee', 'cbanerjee001@yahoo.co.in', 'Chandan', 'dipanjan17', NULL),
(93, 'Santanu', 'mukherjee', 'gms_pharma@rediffmail.com', 'Swastik', 'swastik', NULL),
(103, 'Tamanna', 'Dutta', 'dt_tamanna@yahoo.in', '_Tami', 'tami33', NULL),
(111, 'Tuhin', 'Dutta', 'dt_tauhait@yahoo.in', 'Tahet', 'tah123', NULL),
(112, 'Dipanjan', 'Banerjee', 'dipanjanbanerjee09@gmail.com', 'ImDb27', 'dipanjan17', NULL),
(113, 'Bastab', 'Dey', 'miracles.asa@gmail.com', 'BD', 'bd123', NULL),
(114, 'Deblina', 'Roy', 'deblinaroy164.1995@gmail.com', '_duttaDeb_', 'ilovetuhin9', NULL),
(115, 'Punit', 'Sharma', 'punitsigma47@gmail.com', 'NARINE', 'hello123', NULL),
(116, 'PRIYA', 'SRIMANI', 'priya.srimani0@gmail.com', 'Priya', 'priya12345', NULL),
(117, 'Sujoy', 'Saha', 'sujoy4394@gmail.com', 'Sujoy', 'sjybjy', NULL),
(118, 'Subham', 'Sengupta', 'sengupta335@gmail.com', 'Subham', 'pazzword', NULL),
(119, 'Shuvam', 'Banik', 'shuvam32@yahoo.in', 'HelloWorld', 'ipl2017', NULL),
(120, 'Souvik', 'Bera', 'berasouvik91.sb@gmail.com', 'bera', '2677', NULL),
(121, 'srinjana', 'chatterjee', 'chatterjeesrinjana@hotmail.com', 'sri', 'puja', NULL),
(122, 'Ayan', 'Dey', 'ayankumardey.18@gmail.com', 'AKD', 'ayan400', NULL),
(123, 'Supatim', 'Bhattachar', 'supratim994@gmail.com', 'Supratim', 'supratim', NULL),
(124, 'Debaditya', 'Sarkar', 'debadityasarkar15@gmail.com', 'Debaditya', 'deba.1995', NULL),
(125, 'Sisir', 'Bhowmick', 'sisir.college@gmail.com', 'Sisir', 'Jis@1995', NULL),
(126, 'Saikat', 'Paul', 'rtr180saikat@gmail.com', 'saikat', 'Ranaghat@123', NULL),
(127, 'Ritankar', 'Dey', 'COOL.ritd@gmail.com', 'AUDITORE', 'auditore1994', NULL),
(128, 'Arghadeep', 'Bose', 'argha.bose.6000@gmail.com', 'Arghadeep', 'kaliyaganj', NULL),
(129, 'Flashn', 'Fun', 'flashnfun@gmail.com', 'Fnf', 'test@123', NULL);

--
-- Triggers `playerInfo`
--
DROP TRIGGER IF EXISTS `Subsciptions`;
DELIMITER //
CREATE TRIGGER `Subsciptions` AFTER INSERT ON `playerInfo`
 FOR EACH ROW insert into mailingList (email_id) values (new.email)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `profilePic`
--
-- Creation: Apr 23, 2017 at 10:24 PM
--

DROP TABLE IF EXISTS `profilePic`;
CREATE TABLE IF NOT EXISTS `profilePic` (
  `pid` int(10) NOT NULL,
  `imgPath` varchar(65) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilePic`
--

INSERT INTO `profilePic` (`pid`, `imgPath`) VALUES
(54, 'profilePic/smile.jpg'),
(56, 'profilePic/abstract-578a.jpg'),
(65, 'profilePic/IMG_20170106_050459.jpg'),
(67, 'profilePic/Bidisha 20170423_201200.jpg'),
(73, 'profilePic/18301302_1449046618485108_7551014350884260973_n.jpg'),
(74, 'profilePic/IMG_20170416_010249_244.jpg'),
(76, 'profilePic/dngh1sd.jpg'),
(103, 'profilePic/Long_March_2D_launching_VRSS-1.jpg'),
(111, 'profilePic/11.jpg'),
(112, 'profilePic/img1445792796356.jpg'),
(113, 'profilePic/crime.png'),
(118, 'profilePic/dp2.jpg'),
(125, 'profilePic/IMG_2165.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rush_modify`
--
-- Creation: Jun 11, 2017 at 08:48 AM
--

DROP TABLE IF EXISTS `rush_modify`;
CREATE TABLE IF NOT EXISTS `rush_modify` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `email` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rush_modify`
--

INSERT INTO `rush_modify` (`id`, `email`) VALUES
(1, 'dt_tauhait@hotmail.com'),
(2, 'bastab_65@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tempPlayerInfo`
--
-- Creation: May 07, 2017 at 07:01 AM
--

DROP TABLE IF EXISTS `tempPlayerInfo`;
CREATE TABLE IF NOT EXISTS `tempPlayerInfo` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(65) NOT NULL,
  `displayname` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirmcode` varchar(65) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempPlayerInfo`
--

INSERT INTO `tempPlayerInfo` (`firstname`, `lastname`, `email`, `displayname`, `password`, `confirmcode`) VALUES
('Anupriyo', 'Mitra', 'anupriyomitra@gmail.com', 'Anupriyo', 'archana', 'b55f2380e856578de565c6ccfd0c6010'),
('Avik', 'Saha', 'avikrahul21@gmail.com', 'Avik', 'avikrahul', 'f81bc9eef3678b494e384b940377937c'),
('Bibek', 'Das', 'bibek.3g@gmail.com', 'bibek', '45876624', 'f6cdf7f217b15e678bf130b03aeec697'),
('Narendraa', 'Modi', 'clashofclanphantom2017@gmail.com', 'Modi', 'namo2013', '83a0ced4829bd722c1541f3c02e07e99'),
('t', 'k', 'dt_tauhait@hotmail.com', 'ki', 'll', 'chgjxsyerstyljpuoif545664'),
('Madhu', 'smita', 'madhu.smita7@gmail.com', 'madhu', '123456', '17b0cea3880f009731665b774f4ea8e1'),
('Matthew', 'Ellis', 'matthew.ellis@supercell.net', 'Matthew', 'SupercellWorld@2012', '90461540e7d20c69484d82f096d8c5b5'),
('Vvvv', 'Vvvv', 'vvvv@vv.com', 'Vvv', 'vvv', '868c915a709e555808f971c54c049fb4');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ActivePlayers`
--
ALTER TABLE `ActivePlayers`
  ADD CONSTRAINT `ActivePlayers_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game1`
--
ALTER TABLE `game1`
  ADD CONSTRAINT `game1_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game2`
--
ALTER TABLE `game2`
  ADD CONSTRAINT `game2_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game3`
--
ALTER TABLE `game3`
  ADD CONSTRAINT `game3_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game4`
--
ALTER TABLE `game4`
  ADD CONSTRAINT `game4_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game5`
--
ALTER TABLE `game5`
  ADD CONSTRAINT `game5_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game6`
--
ALTER TABLE `game6`
  ADD CONSTRAINT `game6_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game7`
--
ALTER TABLE `game7`
  ADD CONSTRAINT `game7_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game8`
--
ALTER TABLE `game8`
  ADD CONSTRAINT `game8_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game9`
--
ALTER TABLE `game9`
  ADD CONSTRAINT `game9_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game10`
--
ALTER TABLE `game10`
  ADD CONSTRAINT `game10_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game11`
--
ALTER TABLE `game11`
  ADD CONSTRAINT `game11_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game12`
--
ALTER TABLE `game12`
  ADD CONSTRAINT `game12_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profilePic`
--
ALTER TABLE `profilePic`
  ADD CONSTRAINT `profilePic_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `playerInfo` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
DROP EVENT `timeout_users`$$
CREATE DEFINER=`tauhaitdutta`@`localhost` EVENT `timeout_users` ON SCHEDULE EVERY 1 DAY STARTS '2017-06-09 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO truncate ActivePlayers$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
