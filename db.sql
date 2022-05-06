-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2022 at 06:53 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(200) NOT NULL,
  `tax` double NOT NULL,
  `service_charge` int(20) NOT NULL,
  `total_amount_cents` double NOT NULL,
  `is_walking` tinyint(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `reference_no`, `tax`, `service_charge`, `total_amount_cents`, `is_walking`, `status`) VALUES
(93, '86', 1.903824, 0, 31.7304, 1, 'pending'),
(92, '117', 0.884496, 0, 14.7416, 1, 'pending'),
(91, '105', 0.374832, 0, 6.2472, 1, 'pending'),
(90, '129', 0.12, 0, 2, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `cost_per_item` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `quantity` int(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `cost_per_item`, `product_name`, `quantity`) VALUES
(130, 88, 8, 'P3', 1),
(131, 57, 16, 'P4', 5),
(129, 57, 4, 'P2', 2),
(128, 60, 2, 'P1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(200) NOT NULL,
  `order_id` int(20) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `paid_amount_cents` decimal(30,0) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `payment_method`, `status`, `paid_amount_cents`) VALUES
(93, 33, 'credit', 'refunded', '106');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
