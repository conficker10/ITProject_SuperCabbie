-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2020 at 05:26 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_data`
--

DROP TABLE IF EXISTS `car_data`;
CREATE TABLE IF NOT EXISTS `car_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Brand` varchar(100) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Variant` varchar(100) NOT NULL,
  `Fuel` varchar(100) NOT NULL,
  `Transmission` varchar(100) NOT NULL,
  `Year` varchar(100) NOT NULL,
  `Rent` int(30) NOT NULL,
  `Owner` int(11) DEFAULT NULL,
  `Rented_By` int(11) DEFAULT NULL,
  `Image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Rented_By` (`Rented_By`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_data`
--

INSERT INTO `car_data` (`id`, `Brand`, `Model`, `Variant`, `Fuel`, `Transmission`, `Year`, `Rent`, `Owner`, `Rented_By`, `Image`) VALUES
(1, 'Honda', 'City', 'i-VTEC S', 'Petrol', 'Manual', '2015', 700, 1, 0, 'hondacity.jpg'),
(4, 'Hyundai', 'Verna', 'CDi', 'Diesel', 'Automatic', '2017', 800, 2, 0, 'hverna.jpg'),
(7, 'Maruti', 'Swift Dzire', 'VDi', 'Petrol', 'Manual', '2013', 600, 4, 0, 'dzire.jpg'),
(6, 'Maruti', 'Alto 800', 'Lxi', 'CNG', 'Manual', '2014', 400, 3, 0, 'alto.jpg'),
(8, 'Hyundai', 'i20', 'Era 1.2', 'Petrol', 'Manual', '2014', 500, 1, 0, 'i20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

DROP TABLE IF EXISTS `user_data`;
CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Admin_Access` varchar(40) NOT NULL,
  PRIMARY KEY (`Email`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `Name`, `Email`, `Phone`, `Password`, `Admin_Access`) VALUES
(1, 'Mr. Admin', 'admin@supercabbie.com', '8950626006', 'e19d5cd5af0378da05f63f891c7467af', 'Yes'),
(2, 'Abhinav Gupta', 'abhinavabhi1012@gmail.com', '9876543210', 'e99a18c428cb38d5f260853678922e03', 'No'),
(3, 'Dummy', 'dummy@gmail.com', '9876543211', '749d7048edd2de31c2c7a88d4d196254', 'No'),
(4, 'Raghav Sharma', 'raghu@gmail.com', '8950626007', '749d7048edd2de31c2c7a88d4d196254', 'No');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
