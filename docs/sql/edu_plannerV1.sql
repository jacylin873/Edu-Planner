-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 02:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edu_planner`
--
DROP DATABASE IF EXISTS `edu_planner`;
CREATE DATABASE IF NOT EXISTS `edu_planner` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `edu_planner`;

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--
-- Creation: Sep 18, 2023 at 12:43 AM
--

CREATE TABLE `login_logs` (
  `LLID` int(11) NOT NULL,
  `UPID` int(11) NOT NULL,
  `time_stamp` varchar(25) NOT NULL,
  `is_error` int(1) NOT NULL,
  `log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--
-- Creation: Sep 18, 2023 at 12:34 AM
-- Last update: Sep 18, 2023 at 12:48 AM
--

CREATE TABLE `user_profile` (
  `UPID` int(11) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `m_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `address1` varchar(25) NOT NULL,
  `address2` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `country` varchar(25) NOT NULL,
  `phone1` varchar(25) NOT NULL,
  `cell1` varchar(25) NOT NULL,
  `sum_em1` varchar(25) NOT NULL,
  `sum_em2` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`UPID`, `user_email`, `f_name`, `m_name`, `l_name`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `phone1`, `cell1`, `sum_em1`, `sum_em2`) VALUES
(1, 'changeme@me.com', 'Change', 'F', 'Me', '13113 Here Road', 'Apt. C5', 'Johnstown', 'CA', '90210', 'USA', '555-123-9587', '321-485-6324', 'meridian', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`LLID`),
  ADD KEY `UPID` (`UPID`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`UPID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `LLID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `UPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_ibfk_1` FOREIGN KEY (`UPID`) REFERENCES `user_profile` (`UPID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
