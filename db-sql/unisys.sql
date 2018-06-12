-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 06:33 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unisys`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientID` int(30) NOT NULL,
  `clientName` varchar(100) NOT NULL,
  `clientEmail` varchar(100) NOT NULL,
  `clientContact` varchar(20) NOT NULL,
  `serviceID` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientID`, `clientName`, `clientEmail`, `clientContact`, `serviceID`) VALUES
(1, 'client1', 'client1@mail.com', '0718855652', NULL),
(2, 'client2', 'client2@mail.com', '0718855642', NULL),
(3, 'client3', 'abc@gmail.com', '123454321', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(30) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `customerContact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `customerName`, `customerEmail`, `customerContact`) VALUES
(8, 'customer1', 'customer1@gmail.com', '0717705526');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoiceId` varchar(30) NOT NULL,
  `itemID` varchar(30) NOT NULL,
  `customerID` int(30) NOT NULL,
  `itemCount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoiceId`, `itemID`, `customerID`, `itemCount`) VALUES
('2', '1', 8, 15),
('3', '2', 8, 50);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` varchar(30) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemType` varchar(100) NOT NULL,
  `itemPrice` decimal(8,2) NOT NULL,
  `location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `itemName`, `itemType`, `itemPrice`, `location`) VALUES
('1', 'Chair', 'stage-setup', '800.00', NULL),
('10', 'Night lamp', 'tent', '600.00', NULL),
('11', 'DJ sound system', 'dj', '9000.00', NULL),
('12', 'DJ disco lights', 'dj', '6000.00', NULL),
('13', 'Ent Pack 01', 'entertainer', '500.00', NULL),
('14', 'Ent Pack 02', 'entertainer', '1000.00', NULL),
('15', 'Ent Pack 03', 'entertainer', '1500.00', NULL),
('16', 'Cake', 'catering', '1000.00', NULL),
('17', 'Drinks', 'catering', '1500.00', NULL),
('18', 'Dessert', 'catering', '700.00', NULL),
('2', 'DJ Bulb', 'dj', '4500.00', NULL),
('3', 'Stage lights', 'stage-setup', '4000.00', NULL),
('4', 'Paper flower decoration', 'floral-deco', '1000.00', NULL),
('5', 'Plastic flower decoration', 'floral-deco', '800.00', NULL),
('6', 'Wood flower art', 'floral-deco', '1200.00', NULL),
('7', 'Wood table', 'stage-setup', '3000.00', NULL),
('8', 'Tent (6-person)', 'tent', '6000.00', NULL),
('9', 'Tent (10-person)', 'tent', '8000.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `itemID` varchar(30) NOT NULL,
  `itemCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`itemID`, `itemCount`) VALUES
('0', 15),
('4', 3),
('5', 2),
('6', 3),
('3', 2),
('1', 2),
('7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `serviceimages`
--

CREATE TABLE `serviceimages` (
  `serviceID` varchar(30) NOT NULL,
  `imageID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceID` varchar(30) NOT NULL,
  `serviceType` varchar(100) NOT NULL,
  `serviceDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `serviceType`, `serviceDescription`) VALUES
('1', 'deco', 'Decoration Management Company'),
('2', 'food', 'Catering Service providing Company');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `type` int(1) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `type`, `user_id`) VALUES
('client1', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
('client2', '81dc9bdb52d04dc20036dbd8313ed055', 1, 2),
('client3', '81dc9bdb52d04dc20036dbd8313ed055', 1, 3),
('customer1', '81dc9bdb52d04dc20036dbd8313ed055', 2, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoiceId`,`itemID`),
  ADD KEY `itemID` (`itemID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `serviceimages`
--
ALTER TABLE `serviceimages`
  ADD PRIMARY KEY (`serviceID`,`imageID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`itemID`) REFERENCES `items` (`itemID`) ON UPDATE CASCADE;

--
-- Constraints for table `serviceimages`
--
ALTER TABLE `serviceimages`
  ADD CONSTRAINT `serviceimages_ibfk_1` FOREIGN KEY (`serviceID`) REFERENCES `services` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
