-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 01:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starter`
--
DROP DATABASE IF EXISTS `starter`;
CREATE DATABASE IF NOT EXISTS `starter` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `starter`;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_item`
--
-- Creation: Sep 15, 2021 at 10:18 PM
--

CREATE TABLE `inventory_item` (
  `IIID` int(11) NOT NULL,
  `VID` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_description` text NOT NULL,
  `item_image_path` varchar(50) NOT NULL,
  `item_ssn` varchar(20) NOT NULL,
  `item_model` varchar(50) NOT NULL,
  `item_purchase_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `inventory_item`:
--   `VID`
--       `vendor` -> `VID`
--

--
-- Dumping data for table `inventory_item`
--

INSERT INTO `inventory_item` (`IIID`, `VID`, `item_name`, `item_description`, `item_image_path`, `item_ssn`, `item_model`, `item_purchase_date`) VALUES
(2, 1, 'Box Cars', 'Big red cars.', '../img/toys/boxcars.jpg', 'DeX46744300001', 'LegoBXC', '09/13/2021 0512'),
(3, 1, 'Horse', '3 Years old\r\nReady for mating	', '../img/animals/horse/horse.jpg', 'H20000987002', 'Quarter', '09132021 1347'),
(4, 1, 'Horse', '3 Years old\r\nReady for mating	', '../img/animals/horse/horse.jpg', 'H20000987002', 'Quarter', '09132021 1347');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--
-- Creation: Sep 15, 2021 at 10:20 PM
--

CREATE TABLE `vendor` (
  `VID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `website` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `vendor`:
--

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`VID`, `name`, `phone`, `website`) VALUES
(1, 'Sams\' Club', '(555)123-4567', 'https://www.sams.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD PRIMARY KEY (`IIID`),
  ADD KEY `VID` (`VID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`VID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_item`
--
ALTER TABLE `inventory_item`
  MODIFY `IIID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `VID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD CONSTRAINT `inventory_item_ibfk_1` FOREIGN KEY (`VID`) REFERENCES `vendor` (`VID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
