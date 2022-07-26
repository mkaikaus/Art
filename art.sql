-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2022 at 05:36 PM
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
-- Database: `art`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int(100) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `Email`, `Password`) VALUES
(1, 'Alauddin Mohammad Kaikaus', 'akaikaus31@gmail.com', 'admin123'),
(2, 'Nasima Akter', 'nasima@gmail.com', 'admin234');

-- --------------------------------------------------------

--
-- Table structure for table `art_info`
--

DROP TABLE IF EXISTS `art_info`;
CREATE TABLE IF NOT EXISTS `art_info` (
  `ArtID` int(100) NOT NULL AUTO_INCREMENT,
  `ArtTitle` varchar(255) NOT NULL,
  `Artist` varchar(255) NOT NULL,
  `YearOfMaking` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `Piece` int(100) NOT NULL,
  `Image` varchar(255) NOT NULL,
  PRIMARY KEY (`ArtID`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art_info`
--

INSERT INTO `art_info` (`ArtID`, `ArtTitle`, `Artist`, `YearOfMaking`, `Price`, `Piece`, `Image`) VALUES
(118, 'The Starry Night', 'Vincent van Gogh', 1889, 8000, 10, '1616955469_The Starry Night.jpg'),
(119, 'The Scream ', 'Edvard Munch', 1893, 6700, 10, '1616955695_The Scream.jpg'),
(120, 'Guernica ', 'Pablo Picasso', 1937, 5999, 10, '1616955856_Guernica.jpg'),
(121, 'The Kiss ', 'Gustav Klimt', 1907, 6400, 10, '1616955950_The kiss.jpg'),
(122, 'Girl With a Pearl Earring ', 'Johannes Vermeer', 1665, 7800, 10, '1616956040_Girl With a Pearl Earring.jpg'),
(123, 'Las Meninas', 'Diego Velazquez', 1656, 6700, 10, '1616956153_Las Meninas.jpg'),
(124, 'Sunflowers ', 'Vincent Van Gogh', 1887, 7500, 10, '1616956280_Sunflowers.jpg'),
(116, 'Mona Lisa', 'Leonardo da Vinci', 1503, 7500, 10, '1616953325_mona lisa.jpg'),
(117, 'The Last Supper', 'Leonardo da Vinci', 1495, 6800, 10, '1616953385_the last supper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

DROP TABLE IF EXISTS `customer_info`;
CREATE TABLE IF NOT EXISTS `customer_info` (
  `CustomerID` int(100) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `PhoneNumber` varchar(14) NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`CustomerID`, `CustomerName`, `Email`, `Password`, `Address`, `PhoneNumber`) VALUES
(1, 'Maleeha Kaikaus ', 'maleeha@gmail.com', '12345', 'Feni', '+8801636538666'),
(2, 'Saad Bin Kaikaus', 'saad@gmail.com', 'saad13', 'Feni', '+8801818105154'),
(3, 'Jannatul Mawa', 'mawa123@gmail.com', 'mawa2', 'Chittagong', '+8801685817071'),
(12, 'Radwa Kaikaus', 'rk95@gmail.com', 'miti123', 'Tangail', '+8801689907693'),
(15, 'monisa saha', 'sumi@gmail.com', '12345', 'mirpur', '+8801612345678');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

DROP TABLE IF EXISTS `order_info`;
CREATE TABLE IF NOT EXISTS `order_info` (
  `OrderID` int(100) NOT NULL AUTO_INCREMENT,
  `ArtTitle` varchar(255) NOT NULL,
  `TotalAmount` int(100) NOT NULL,
  `TotalCost` int(100) NOT NULL,
  `PaymentMethod` varchar(255) NOT NULL,
  `flag` int(10) NOT NULL,
  `CustomerID` int(100) NOT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`OrderID`, `ArtTitle`, `TotalAmount`, `TotalCost`, `PaymentMethod`, `flag`, `CustomerID`) VALUES
(2, 'The Starry Night', 2, 16000, 'bkash', 1, 1),
(11, 'The Scream', 2, 13400, 'bank', 1, 2),
(4, 'Las Meninas', 2, 13400, 'cash on delivery', 1, 1),
(6, 'The Scream', 2, 13400, 'rocket', 1, 2),
(7, 'Girl With a Pearl Earring', 3, 23400, 'bank', 0, 1),
(8, 'Guernica', 1, 5999, 'bank', 0, 3),
(9, 'The Scream', 1, 6700, 'rocket', 0, 3),
(10, 'Mona Lisa', 2, 15000, 'bank', 0, 1),
(17, 'Mona Lisa', 1, 7500, 'bkash', 0, 14),
(16, 'Sunflowers', 2, 15000, 'rocket', 1, 14),
(18, 'The Scream', 3, 20100, 'cash on delivery', 1, 15),
(19, 'The Kiss', 1, 6400, 'bkash', 0, 15),
(20, 'Mona Lisa', 3, 22500, 'rocket', 1, 15);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
