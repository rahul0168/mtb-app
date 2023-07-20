-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2023 at 08:18 AM
-- Server version: 8.0.18
-- PHP Version: 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtb`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `static_rate` int(11) DEFAULT NULL,
  `customised_rate` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `is_sending_active` int(11) DEFAULT NULL,
  `is_receiving_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `static_rate`, `customised_rate`, `type`, `is_sending_active`, `is_receiving_active`) VALUES
(1, 'UK', 100, 4, 0, 0, 0),
(2, 'US', 455, 3, 0, 1, 1),
(3, 'India\r\n', 344, 5, 0, 1, 1),
(4, 'Pakistan\r\n\r\n', 233, 45, 0, 1, 1),
(12, '', 0, 0, 0, NULL, NULL),
(13, 'Rahul naik', 111, 111, 0, NULL, NULL),
(5, 'Admin', 233, 444, 0, 1, 1),
(6, 'rahul', 23, 23, 0, 1, 1),
(7, 'Rahul naik', 435, 444, 0, NULL, NULL),
(8, 'Saichha', 11, 22, 0, NULL, NULL),
(9, 'Saichha', 22, 22, 0, NULL, NULL),
(10, 'ss', 44, 44, 0, NULL, NULL),
(11, 'Admin', 344, 444, 0, NULL, NULL),
(14, 'Rahul naik', 111, 111, 0, 0, 1),
(15, 'Saichha', 111, 111, 0, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
