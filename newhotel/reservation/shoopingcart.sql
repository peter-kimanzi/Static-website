-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2012 at 09:02 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shoopingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `internet_shop`
--

CREATE TABLE IF NOT EXISTS `internet_shop` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `img` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `img` (`img`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `internet_shop`
--

INSERT INTO `internet_shop` (`id`, `img`, `name`, `description`, `price`) VALUES
(1, 'iPod.png', 'iPod', 'The original and popular iPod.', 200),
(2, 'iMac.png', 'iMac', 'The iMac computer.', 1200),
(3, 'iPhone.png', 'iPhone', 'This is the new iPhone.', 400),
(4, 'iPod-Shuffle.png', 'iPod Shuffle', 'The new iPod shuffle.', 49),
(5, 'iPod-Nano.png', 'iPod Nano', 'The new iPod Nano.', 99),
(6, 'Apple-TV.png', 'Apple TV', 'The new Apple TV. Buy it now!', 300);

-- --------------------------------------------------------

--
-- Table structure for table `rooinventory`
--

CREATE TABLE IF NOT EXISTS `rooinventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `arrival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `confirmation` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `rooinventory`
--

INSERT INTO `rooinventory` (`id`, `room`, `qty`, `arrival`, `departure`, `status`, `confirmation`) VALUES
(1, 1, 3, '01/12/2012', '02/12/2012', 'active', '5heiqukt'),
(2, 2, 2, '01/12/2012', '02/12/2012', 'active', '5heiqukt'),
(3, 3, 1, '01/12/2012', '02/12/2012', 'active', '5heiqukt'),
(4, 3, 1, '01/12/2012', '02/12/2012', 'active', 'osaqcbrc'),
(5, 5, 1, '01/12/2012', '02/12/2012', 'active', 'osaqcbrc'),
(6, 2, 1, '01/12/2012', '02/12/2012', 'active', 'rqhocdv8'),
(7, 5, 1, '01/12/2012', '02/12/2012', 'active', 'rqhocdv8'),
(8, 1, 1, '01/12/2012', '02/12/2012', 'active', '5dn3rdbg'),
(9, 2, 1, '01/12/2012', '02/12/2012', 'active', '5dn3rdbg'),
(10, 1, 1, '01/12/2012', '02/12/2012', 'active', 'e6g0n52y'),
(11, 2, 1, '01/12/2012', '02/12/2012', 'active', 'e6g0n52y'),
(12, 2, 1, '01/12/2012', '02/12/2012', 'active', 'e0sc85j7'),
(13, 2, 1, '01/12/2012', '02/12/2012', 'active', 'z7o0mch2'),
(14, 1, 1, '01/12/2012', '02/12/2012', 'active', 'xaf235uo'),
(15, 2, 1, '30/11/2012', '01/12/2012', 'active', '8tacfwtz'),
(16, 1, 1, '30/11/2012', '01/12/2012', 'active', '8tacfwtz'),
(17, 2, 1, '30/11/2012', '01/12/2012', 'active', 'gxp8373n'),
(18, 1, 1, '30/11/2012', '01/12/2012', 'active', 'gxp8373n'),
(19, 2, 1, '30/11/2012', '01/12/2012', 'active', '22qos2jk'),
(20, 1, 1, '30/11/2012', '01/12/2012', 'active', '22qos2jk'),
(21, 2, 1, '30/11/2012', '01/12/2012', 'active', '30ih0tn3'),
(22, 1, 1, '30/11/2012', '01/12/2012', 'active', '30ih0tn3'),
(23, 2, 1, '30/11/2012', '01/12/2012', 'active', 'nt738wj6'),
(24, 1, 1, '30/11/2012', '01/12/2012', 'active', 'nt738wj6'),
(25, 2, 1, '30/11/2012', '01/12/2012', 'active', 'kdwunvuu'),
(26, 1, 1, '30/11/2012', '01/12/2012', 'active', 'kdwunvuu'),
(27, 2, 1, '30/11/2012', '01/12/2012', 'active', 'ei4uve83'),
(28, 1, 1, '30/11/2012', '01/12/2012', 'active', 'ei4uve83'),
(29, 2, 1, '30/11/2012', '01/12/2012', 'active', 'e66by8yk'),
(30, 1, 1, '30/11/2012', '01/12/2012', 'active', 'e66by8yk'),
(31, 2, 1, '30/11/2012', '01/12/2012', 'active', '8bch20ws'),
(32, 1, 1, '30/11/2012', '01/12/2012', 'active', '8bch20ws'),
(33, 1, 1, '30/11/2012', '01/12/2012', 'active', 'vvd7mphp'),
(34, 2, 1, '30/11/2012', '01/12/2012', 'active', 'vvd7mphp'),
(35, 2, 1, '30/11/2012', '01/12/2012', 'active', 'akj7kycj'),
(36, 3, 1, '30/11/2012', '01/12/2012', 'active', 'akj7kycj'),
(37, 3, 1, '30/11/2012', '01/12/2012', 'active', 'tf37k3sr'),
(38, 2, 1, '30/11/2012', '01/12/2012', 'active', 'tf37k3sr'),
(39, 5, 1, '30/11/2012', '01/12/2012', 'active', 'tf37k3sr'),
(40, 2, 1, '30/11/2012', '01/12/2012', 'active', 'ydgqk0rz'),
(41, 2, 1, '30/11/2012', '01/12/2012', 'active', 'zgkwzmu8'),
(42, 2, 1, '30/11/2012', '01/12/2012', 'active', '5rwyvq3z'),
(43, 2, 1, '30/11/2012', '01/12/2012', 'active', 'r7ir2uic'),
(44, 2, 1, '30/11/2012', '01/12/2012', 'active', 'tfpwieyy'),
(45, 2, 1, '30/11/2012', '01/12/2012', 'active', 'kkc7crpg'),
(46, 3, 1, '30/11/2012', '01/12/2012', 'active', 'ikaa6gjp'),
(47, 3, 1, '30/11/2012', '01/12/2012', 'active', 'in7fimb6'),
(48, 2, 1, '22/12/2012', '29/12/2012', 'active', 'j6j3i8fv'),
(49, 1, 1, '22/12/2012', '29/12/2012', 'active', 'j6j3i8fv'),
(50, 3, 1, '22/12/2012', '29/12/2012', 'active', 'j6j3i8fv'),
(51, 3, 1, '30/11/2012', '01/12/2012', 'active', '25kxfe2h'),
(52, 2, 1, '22/12/2012', '29/12/2012', 'active', 'hxof6jkk'),
(53, 1, 1, '22/12/2012', '29/12/2012', 'active', 'hxof6jkk'),
(54, 3, 1, '22/12/2012', '29/12/2012', 'active', 'hxof6jkk'),
(55, 3, 1, '30/11/2012', '01/12/2012', 'active', 'tsds6e48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
