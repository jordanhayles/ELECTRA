-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 12:10 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorysys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Password` char(9) NOT NULL,
  `ConfirmPass` char(9) NOT NULL,
  `Department` varchar(40) NOT NULL,
  `Title` varchar(40) NOT NULL,
  `Activity` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `FirstName`, `LastName`, `Password`, `ConfirmPass`, `Department`, `Title`, `Activity`) VALUES
(4, 'jordan20', 'Jordan', 'Hayles', '123456', '123456', 'IT', 'IT Manager', 0),
(8, 'scotty', 'Shane', 'Scott', 'madmax', 'madmax', 'IT', 'Computer Technician', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id2` int(100) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Password` char(9) NOT NULL,
  `ConfirmPass` char(9) NOT NULL,
  `Department` varchar(40) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id2`, `Username`, `FirstName`, `LastName`, `Password`, `ConfirmPass`, `Department`, `Title`, `Active`) VALUES
(8, 'shelly22', 'Shelly', 'Pryce', 'mmmppp', 'mmmppp', 'Accounts', 'Cashier', 'yes'),
(9, 'shanice', 'Shanice', 'Letts', 'mmmppp', 'mmmppp', 'Accounts', 'Accountant', 'no'),
(11, 'John12', 'John', 'Brown', '123456', '123456', 'Accounts', 'Accountant', 'no'),
(13, 'bob26', 'Bob', 'Marley', '123456', '123456', 'Accounts', 'Accountant', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(100) NOT NULL,
  `unitcost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `description`, `quantity`, `unitcost`) VALUES
(6, 'Apple Ipod 8', 'IOS 10- Music player, bluetooth,13mp camera', 8, 23400),
(7, 'Zontech', 'Power Banger Charger\r\n40 Voltz', 14, 5000),
(8, 'MSI PRO X', 'Gaming Laptop\r\nIntel Core i9, 32GB RAM\r\n', 5, 124000),
(10, 'Dell Inspiron X', 'bad condition', 2, 45000),
(11, 'Lexmark E210', 'Printer- free colored and black ink\r\nLexmark CD included in purchase', 9, 13450),
(13, 'Galaxy s7', '64 gb internal memory', 24, 45000),
(14, 'Apple Ipod 9', '60 gb', 3, 68000),
(15, 'HP Pavilion', 'Turbo speed\r\nManage applications well\r\nIn good condition\r\n', 10, 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id2`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id2` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
