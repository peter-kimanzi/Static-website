-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2012 at 04:52 AM
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
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about`) VALUES
(1, 'Come and experience the warmth and hospitality in the NEWEST and ONE of the FINEST hotels in Pagadian City.&#9829; (opened last Oct 28, 2011)<br><br>\r\n<strong>Description</strong><br>\r\nThe newest hotel in Pagadian City nestled along the highway towards the city from the airport. It has a relaxing pool at the back of its hotel where guests can truly enjoy the hassle-free accommodation and relaxation. -Pagadian.info\r\n<br><br><strong>General Information</strong><br>\r\nTo provide guests a calm, modest, charm and cozy ambiance, a well-refurbished 1,700 sq. meter hotel was opened in National highway, Tuburan district, Pagadian City.\r\n<br><br>\r\nThe hotel, named ?four queens? after the owner and her three daughters: Princess, Vanessa, and Paulline, has two (2) elegant and fully-air conditioned function halls, swimming pools, green house (a garden wedding and reception venue),\r\nand a videoke bar.\r\n<br><br>\r\nIt has superior, comfortable, elegant, clean and fully-air conditioned rooms with flat screen cable television and hot-and cold water shower rooms where some rooms have private balcony, with spectacular view of the pool area. All rooms are at affordable rates.\r\n<br><br>\r\nTo provide an ideal venue for conferences, training, seminars, and assessment meetings, the Empress hall equipped with an LCD projector, a state-of-the art audio visual equipment and Wi-fi internet access which can accommodate 100-200 persons, is ready to serve. It has also Duchess hall, an open air hall beside the pool fully equipped with audio-visual facilities and wireless internet connection which can house comfortably 50-100 persons.\r\nbyGideon C. Corgue\r\n<br><br><br>\r\n\r\nHOTEL FEATURES<br>\r\n&#9829; Banquet services, wedding packages & conference facilities<br>\r\n&#9829; Outdoor Adult and Kiddy pools<br>\r\n&#9829; Coffee Shop<br>\r\n&#9829; Bar and Restaurant<br>\r\n&#9829; high-speed Internet access in all guestrooms, meeting facilities, and in all public areas<br>\r\n&#9829; Airport Transfers<br>\r\n&#9829; Laundry and Pressing Services<br>\r\n&#9829; 24 hour Room service<br>\r\n&#9829; Body massage<br>\r\n&#9829; Daily housekeeping service<br>\r\n&#9829; Security Surveillance cameras<br>\r\n&#9829; 24-hour standby generator<br>\r\n&#9829; PABX telephone system<br>');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address`) VALUES
(1, 'Telephone Number: <br>(062) 214-4157 or (062) 308-1022<br>\r\nEmail:<br>admin@fourqueensresort.com<br>\r\nAddress: <br>Rizal Avenue, Tuburan District, Pagadian City,\r\nZamboanga del Sur, Philippines																				');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(13, 'roo19.jpg'),
(14, 'room1.jpg'),
(15, 'room2.jpg'),
(16, 'room3.jpg'),
(17, 'room4.jpg'),
(18, 'room5.jpg'),
(19, 'room6.jpg'),
(20, 'room7.jpg'),
(21, 'room8.jpg'),
(22, 'room9.jpg'),
(23, 'room10.jpg'),
(24, 'room10.jpg'),
(25, 'room11.jpg'),
(26, 'room12.jpg'),
(27, 'room13.jpg'),
(28, 'room15.jpg'),
(29, 'room17.jpg'),
(30, 'room18.jpg'),
(31, 'room20.jpg'),
(32, 'room21.jpg'),
(33, 'room22.jpg'),
(34, 'room23.jpg'),
(35, 'room24.jpg');

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
  `room_number` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `img` (`img`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `internet_shop`
--

INSERT INTO `internet_shop` (`id`, `img`, `name`, `description`, `price`, `room_number`) VALUES
(12, 't_standardDouble.jpg', 'Standard Double', '1 single bed and 1 pull out single bed with own CR, Hot and cold shower, flat screen tv, and fully airconditioned room. ', 999, '111'),
(13, 't_deluxe.jpg', 'Deluxe', '1 double bed, flat screen tv, hot and cold shower, and fully airconditioned and with own terrace.', 1199, '111'),
(11, 't_standard.jpg', 'Standard', 'Two single beds, fully airconditioned, with flat screen tv, and common CR.', 699, '111'),
(14, 't_juniorSuite.jpg', 'Junior Suite', '1 queen sized bed, flat screen tv, hot and cold shower, and fully airconditioned, and with own terrace.', 1299, '111'),
(15, 't_suite.jpg', 'Suite', '1 queen sized bed and 1 single bed, hot and cold shower, flat screen tv, fully airconditioned room, with own mini refrigerator, and with own terrace.', 1799, '111'),
(16, 't_family.jpg', 'Family', '2 double beds, with flat sCReen tv, fully airconditioned room and with hot and cold shower.', 2299, '111'),
(17, 't_superiorFamily.jpg', 'Superior Family', '2 queen sized beds, with flat screen tv, fully airconditioned room, and with hot and cold shower.', 2499, '111'),
(18, 't_dormitory.jpg', 'Dormitory Type', 'Double deck beds that will occupy maximum of 32/42 persons and a minimum of 15 persons. Rooms are fully airconditioned, and with common CR.', 4485, '111');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'iuyyuyuyu', 'yuyuyuyu', 'yuyuyuyu', 'yuyuyuyu'),
(2, 'jkjjk', 'jkjkjk', 'jkjkjkjk', 'kjkjkjkj'),
(3, 'errer', 'dsdsds@sdsds.com', 'kkjkjkjk', 'kjkjkjkjkjkj');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int(20) NOT NULL,
  `arrival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `result` int(11) NOT NULL,
  `payable` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `confirmation` varchar(20) NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `firstname`, `lastname`, `city`, `address`, `country`, `email`, `contact`, `arrival`, `departure`, `result`, `payable`, `status`, `confirmation`) VALUES
(4, 'jkj', 'kjkjkjk', 'kjkjkj', 'jkjkjkj', 'kjkjkjk', 'email', 0, '12/12/2012', '13/12/2012', 1, 211212, 'Cancel', 'jfvby8kv'),
(3, 'argie', 'policar[io', 'bacolod', 'talisay', 'philippines', 'email', 909090909, '03/12/2012', '09/12/2012', 6, 2248, 'Cancel', 'sw8jx83n'),
(5, '', '', '', '', '', 'email', 0, '26/12/2012', '27/12/2012', 1, 0, 'active', 'sz3w0cmq'),
(6, 'hghg', 'hghghg', 'gh', 'hghgh', 'ghgh', 'email', 0, '26/12/2012', '27/12/2012', 1, 2498, 'active', '720c36aa'),
(7, 'tytyt', 'ytytyt', 'ytytyt', 'ytytyt', 'ytytyt', 'email', 0, '17/12/2012', '19/12/2012', 2, 7283, 'active', 'qie3thni');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rooinventory`
--

INSERT INTO `rooinventory` (`id`, `room`, `qty`, `arrival`, `departure`, `status`, `confirmation`) VALUES
(1, 11, 1, '26/12/2012', '27/12/2012', 'active', '720c36aa'),
(2, 15, 1, '26/12/2012', '27/12/2012', 'active', '720c36aa'),
(3, 15, 1, '17/12/2012', '19/12/2012', 'active', 'qie3thni'),
(4, 12, 1, '17/12/2012', '19/12/2012', 'active', 'qie3thni'),
(5, 18, 1, '17/12/2012', '19/12/2012', 'active', 'qie3thni');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `image`) VALUES
(9, 'room11.jpg'),
(10, 'room3.jpg'),
(11, 'room18.jpg'),
(12, 'room23.jpg'),
(13, 'room22.jpg'),
(14, 'room21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `position` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `position`) VALUES
(1, 'admin', 'admin', 'front desk');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
