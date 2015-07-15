-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2015 at 05:33 PM
-- Server version: 5.5.41-log
-- PHP Version: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `photogallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `comment` blob NOT NULL,
  `date` date NOT NULL,
  `size` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `img`, `comment`, `date`, `size`) VALUES
(1, '1.jpg', 0xd0a4d0bed182d0bed0b3d180d0b0d184d0b8d18f20d0bdd0bed0bcd0b5d1802031, '2015-07-15', 217),
(2, '2.jpg', 0xd0a4d0bed182d0bed0b3d180d0b0d184d0b8d18f20d0bdd0bed0bcd0b5d1802032, '2015-07-15', 115),
(3, '3.jpg', 0xd0a4d0bed182d0bed0b3d180d0b0d184d0b8d18f20d0bdd0bed0bcd0b5d1802033, '2015-07-15', 546),
(4, '4.jpg', 0xd0a4d0bed182d0bed0b3d180d0b0d184d0b8d18f20d0bdd0bed0bcd0b5d1802034, '2015-07-15', 44),
(5, '5.jpg', 0xd0a4d0bed182d0bed0b3d180d0b0d184d0b8d18f20d0bdd0bed0bcd0b5d1802035, '2015-07-15', 127),
(6, '6.jpg', 0xd0a4d0bed182d0bed0b3d180d0b0d184d0b8d18f20d0bdd0bed0bcd0b5d18020360d0a, '2015-07-15', 122);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
