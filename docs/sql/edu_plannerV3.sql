-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 11:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

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
-- Table structure for table `courses`
--
-- Creation: Nov 02, 2023 at 01:48 AM
--

CREATE TABLE `courses` (
  `CLID` int(11) NOT NULL,
  `header` varchar(25) DEFAULT NULL,
  `CRN` varchar(25) DEFAULT NULL,
  `course` varchar(25) DEFAULT NULL,
  `sec` varchar(25) DEFAULT NULL,
  `title` varchar(25) DEFAULT NULL,
  `instructional_method` varchar(25) DEFAULT NULL,
  `credits` varchar(25) DEFAULT NULL,
  `dates` varchar(25) DEFAULT NULL,
  `days` varchar(25) DEFAULT NULL,
  `time` varchar(25) DEFAULT NULL,
  `loc` varchar(25) DEFAULT NULL,
  `instructor` varchar(25) DEFAULT NULL,
  `attributes` varchar(69) DEFAULT NULL,
  `available_seats` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CLID`, `header`, `CRN`, `course`, `sec`, `title`, `instructional_method`, `credits`, `dates`, `days`, `time`, `loc`, `instructor`, `attributes`, `available_seats`) VALUES
(1, 'Header', 'CRN', 'Course', 'Sec', 'Title', 'IM', 'Cr', 'Dates', 'Days', 'Time', 'Loc', 'Instructor', 'Attributes', 'Avail'),
(2, 'Undergraduate Courses', '1097', 'CPS104', '1', 'Visual Programming', 'FS', '3', '1/22-5/17', 'M', '5:00 PM-7:50 PM', 'SH 259', 'Cameron Pardo', 'Liberal Arts', '24'),
(3, 'Undergraduate Courses', '1096', 'CPS110', '1', 'Web Page Design', 'FS', '3', '1/22-5/17', 'T', '5:00 PM-7:50 PM', 'SH 271', 'Katherine Brainard', 'Liberal Arts', '24'),
(4, 'Undergraduate Courses', '1104', 'CPS210', '1', 'Computer Science I: Found', 'FS', '4', '1/22-5/17', 'MR', '8:00 AM-9:15 AM', 'CSB 222', 'Michael Curry', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(5, 'Undergraduate Courses', '1104', 'CPS210', '1', 'Computer Science I: Found', 'FS', '4', '1/22-5/17', 'W', '8:00 AM-10:50 AM', 'CSB 021', '', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(6, 'Undergraduate Courses', '1100', 'CPS210', '2', 'Computer Science I: Found', 'FS', '4', '1/22-5/17', 'MR', '8:00 AM-9:15 AM', 'CSB 222', 'Michael Curry', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(7, 'Undergraduate Courses', '1100', 'CPS210', '2', 'Computer Science I: Found', 'FS', '4', '1/22-5/17', 'W', '12:30 PM-3:20 PM', 'CSB 021', '', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(8, 'Undergraduate Courses', '1103', 'CPS210', '3', 'Computer Science I: Found', 'FS', '4', '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'HUM 320', 'Michael Curry', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(9, 'Undergraduate Courses', '1103', 'CPS210', '3', 'Computer Science I: Found', 'FS', '4', '1/22-5/17', 'W', '3:30 PM-6:20 PM', 'HUM 301', '', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(10, 'Undergraduate Courses', '1101', 'CPS210', '4', 'Computer Science I: Found', 'FS', '4', '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'HUM 320', 'Michael Curry', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(11, 'Undergraduate Courses', '1101', 'CPS210', '4', 'Computer Science I: Found', 'FS', '4', '1/22-5/17', 'R', '3:30 PM-6:20 PM', 'HUM 301', '', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(12, 'Undergraduate Courses', '1107', 'CPS310', '1', 'Computer Science II: Data', 'FS', '4', '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 100', 'Kaitlin Hoffmann', 'Liberal Arts', '15'),
(13, 'Undergraduate Courses', '1107', 'CPS310', '1', 'Computer Science II: Data', 'FS', '4', '1/22-5/17', 'W', '8:00 AM-10:50 AM', 'HUM 301', '', 'Liberal Arts', '15'),
(14, 'Undergraduate Courses', '1076', 'CPS310', '2', 'Computer Science II: Data', 'FS', '4', '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 100', 'Kaitlin Hoffmann', 'Liberal Arts', '15'),
(15, 'Undergraduate Courses', '1076', 'CPS310', '2', 'Computer Science II: Data', 'FS', '4', '1/22-5/17', 'W', '12:30 PM-3:20 PM', 'HUM 301', '', 'Liberal Arts', '15'),
(16, 'Undergraduate Courses', '1077', 'CPS310', '3', 'Computer Science II: Data', 'FS', '4', '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 100', 'Kaitlin Hoffmann', 'Liberal Arts', '15'),
(17, 'Undergraduate Courses', '1077', 'CPS310', '3', 'Computer Science II: Data', 'FS', '4', '1/22-5/17', 'W', '3:30 PM-6:20 PM', 'CSB 021', '', 'Liberal Arts', '15'),
(18, 'Undergraduate Courses', '1108', 'CPS310', '4', 'Computer Science II: Data', 'FS', '4', '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 100', 'Kaitlin Hoffmann', 'Liberal Arts', '15'),
(19, 'Undergraduate Courses', '1108', 'CPS310', '4', 'Computer Science II: Data', 'FS', '4', '1/22-5/17', 'R', '3:30 PM-6:20 PM', 'LC 110', '', 'Liberal Arts', '15'),
(20, 'Undergraduate Courses', '1105', 'CPS315', '1', 'Computer Science III', 'FS', '4', '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'LC 104', 'Min Chen', 'Liberal Arts', '15'),
(21, 'Undergraduate Courses', '1105', 'CPS315', '1', 'Computer Science III', 'FS', '4', '1/22-5/17', 'R', '3:30 PM-6:20 PM', 'SH 271', '', 'Liberal Arts', '15'),
(22, 'Undergraduate Courses', '1106', 'CPS315', '2', 'Computer Science III', 'FS', '4', '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'LC 104', 'Min Chen', 'Liberal Arts', '15'),
(23, 'Undergraduate Courses', '1106', 'CPS315', '2', 'Computer Science III', 'FS', '4', '1/22-5/17', 'W', '8:00 AM-10:50 AM', 'SH 271', '', 'Liberal Arts', '15'),
(24, 'Undergraduate Courses', '1073', 'CPS315', '3', 'Computer Science III', 'FS', '4', '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'LC 104', 'Min Chen', 'Liberal Arts', '15'),
(25, 'Undergraduate Courses', '1073', 'CPS315', '3', 'Computer Science III', 'FS', '4', '1/22-5/17', 'W', '12:30 PM-3:20 PM', 'SH 271', '', 'Liberal Arts', '15'),
(26, 'Undergraduate Courses', '1102', 'CPS330', '1', 'Assembly Language and Com', 'FS', '4', '1/22-5/17', 'MR', '12:30 PM-1:45 PM', 'LC 104', 'Reed Williams', 'Liberal Arts', '20'),
(27, 'Undergraduate Courses', '1102', 'CPS330', '1', 'Assembly Language and Com', 'FS', '4', '1/22-5/17', 'T', '3:30 PM-6:20 PM', 'SH 259', '', 'Liberal Arts', '20'),
(28, 'Undergraduate Courses', '1078', 'CPS330', '2', 'Assembly Language and Com', 'FS', '4', '1/22-5/17', 'MR', '12:30 PM-1:45 PM', 'LC 104', 'Reed Williams', 'Liberal Arts', '20'),
(29, 'Undergraduate Courses', '1078', 'CPS330', '2', 'Assembly Language and Com', 'FS', '4', '1/22-5/17', 'W', '3:30 PM-6:20 PM', 'SH 259', '', 'Liberal Arts', '20'),
(30, 'Undergraduate Courses', '1075', 'CPS330', '3', 'Assembly Language and Com', 'FS', '4', '1/22-5/17', 'MR', '12:30 PM-1:45 PM', 'LC 104', 'Reed Williams', 'Liberal Arts', '15'),
(31, 'Undergraduate Courses', '1075', 'CPS330', '3', 'Assembly Language and Com', 'FS', '4', '1/22-5/17', 'W', '12:30 PM-3:20 PM', 'SH 259', '', 'Liberal Arts', '15'),
(32, 'Undergraduate Courses', '1099', 'CPS340', '1', 'Operating Systems', 'FS', '4', '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'HUM 313', 'Hanh Pham', 'Liberal Arts', '12'),
(33, 'Undergraduate Courses', '1099', 'CPS340', '1', 'Operating Systems', 'FS', '4', '1/22-5/17', 'T', '2:00 PM-4:50 PM', 'HUM 301', '', 'Liberal Arts', '12'),
(34, 'Undergraduate Courses', '1094', 'CPS340', '2', 'Operating Systems', 'FS', '4', '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'HUM 313', 'Hanh Pham', 'Liberal Arts', '12'),
(35, 'Undergraduate Courses', '1094', 'CPS340', '2', 'Operating Systems', 'FS', '4', '1/22-5/17', 'F', '2:00 PM-4:50 PM', 'HUM 301', '', 'Liberal Arts', '12'),
(36, 'Undergraduate Courses', '1082', 'CPS352', '1', 'Object Oriented Programmi', 'FS', '3', '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 108', 'Min Chen', 'Critical Thinking Intermediate, Information Mgmt Intrmd, Liberal Arts', '35'),
(37, 'Undergraduate Courses', '1095', 'CPS353', '1', 'Software Engineering', 'FS', '3', '1/22-5/17', 'M', '5:00 PM-7:50 PM', 'HUM 118', 'Anthony Denizard', 'Liberal Arts', '35'),
(38, 'Undergraduate Courses', '1098', 'CPS415', '1', 'Discrete and Continuous C', 'FS', '3', '1/22-5/17', 'TF', '9:30 AM-10:45 AM', 'OM 229', 'Keqin Li', 'Liberal Arts', '35'),
(39, 'Undergraduate Courses', '1083', 'CPS425', '1', 'Language Processing', 'FS', '4', '1/22-5/17', 'MR', '8:00 AM-9:15 AM', 'HUM 115', 'Ashley Suchy', 'Liberal Arts', '15'),
(40, 'Undergraduate Courses', '1083', 'CPS425', '1', 'Language Processing', 'FS', '4', '1/22-5/17', 'W', '3:30 PM-6:20 PM', 'SH 271', '', 'Liberal Arts', '15'),
(41, 'Undergraduate Courses', '1080', 'CPS425', '2', 'Language Processing', 'FS', '4', '1/22-5/17', 'MR', '8:00 AM-9:15 AM', 'HUM 115', 'Ashley Suchy', 'Liberal Arts', '15'),
(42, 'Undergraduate Courses', '1080', 'CPS425', '2', 'Language Processing', 'FS', '4', '1/22-5/17', 'W', '11:00 AM-1:50 PM', 'CSB 145', '', 'Liberal Arts', '15'),
(43, 'Undergraduate Courses', '1081', 'CPS485', '1', 'Projects', 'FS', '4', '1/22-5/17', 'T', '12:30 PM-4:20 PM', 'SH 271', 'Hanh Pham', 'Critical Thinking Advanced, Information Mgmt Advanced, Liberal Arts', '20'),
(44, 'Undergraduate Courses', '1084', 'CPS485', '2', 'Projects', 'FS', '4', '1/22-5/17', 'W', '9:30 AM-1:20 PM', 'CSB 153', 'Hanh Pham', 'Critical Thinking Advanced, Information Mgmt Advanced, Liberal Arts', '20'),
(45, 'Undergraduate Courses', '1092', 'CPS493', '2', 'Cybersecurity', 'FS', '3', '1/22-5/17', 'TF', '12:30 PM-1:45 PM', 'HUM 310', 'Kaitlin Hoffmann', '', '10'),
(46, 'Undergraduate Courses', '1087', 'CPS493', '3', 'Web Server Programming', 'FS', '3', '1/22-5/17', 'MR', '2:00 PM-3:15 PM', 'CSB 221', 'Moshe Plotkin', '', '35'),
(47, 'Undergraduate Courses', '1074', 'CPS493', '8', 'Deep Learning', 'FS', '3', '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'HUM 115', 'Chirakkal Easwaran', '', '10'),
(48, 'Graduate Courses', '1079', 'CPS593', '2', 'Foundations of Computer S', 'FS', '3', '1/22-5/17', 'TF', '9:30 AM-10:45 AM', 'HUM 216', 'Ashley Suchy', '', '35'),
(49, 'Graduate Courses', '1091', 'CPS593', '3', 'Programming & Data Struct', 'FS', '3', '1/22-5/17', 'MR', '2:00 PM-3:15 PM', 'HUM 113', 'Keqin Li', '', '35'),
(50, 'Graduate Courses', '1088', 'CPS593', '4', 'Discrete Structures', 'FS', '3', '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 113', 'Katherine Brainard', '', '35'),
(51, 'Graduate Courses', '1085', 'CPS593', '5', 'Web & Database Programmin', 'FS', '3', '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'HUM 310', 'Kaitlin Hoffmann', '', '35'),
(52, 'Graduate Courses', '1086', 'CPS593', '6', 'Artificial Intelligence', 'FS', '3', '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'LC 103', 'Min Chen', '', '35'),
(53, 'Graduate Courses', '1093', 'CPS593', '7', 'Cybersecurity', 'FS', '3', '1/22-5/17', 'TF', '12:30 PM-1:45 PM', 'HUM 310', 'Kaitlin Hoffmann', '', '25'),
(54, 'Graduate Courses', '1089', 'CPS593', '8', 'Deep Learning', 'FS', '3', '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'HUM 115', 'Chirakkal Easwaran', '', '24'),
(55, 'Graduate Courses', '1090', 'CPS593', '9', 'Functional Programming', 'FS', '3', '1/22-5/17', 'MR', '12:30 PM-1:45 PM', 'LC 102', 'Ashley Suchy', '', '35');

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--
-- Creation: Sep 20, 2023 at 06:26 PM
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
-- Creation: Nov 02, 2023 at 02:04 AM
--

CREATE TABLE `user_profile` (
  `UPID` int(11) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `m_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `address1` varchar(25) NOT NULL,
  `address2` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `country` varchar(25) NOT NULL,
  `phone_num` varchar(25) NOT NULL,
  `clearance` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`UPID`, `user_email`, `user_password`, `f_name`, `m_name`, `l_name`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `phone_num`, `clearance`) VALUES
(1, 'changeme@me.com', 'hellochange', 'Change', 'F', 'Me', '13113 Here Road', 'Apt. C5', 'Johnstown', 'CA', '90210', 'USA', '555-123-9587', 0),
(2, 'angelf@gmail.com', 'helloangel', 'Angel', 'O', 'Flores', '21 Bieber St.', 'Apt. A11', 'New York City', 'New York', '50401', 'United States', '555-666-7777', 0),
(26, 'denizard@gmail.com', 'hellodenizard', 'Anthony', '', 'Denizard', '14 Zelmer Street', '', 'Bronx', 'New York', '14052', 'United States', '123-456-7777', 1),
(34, 'ramses@gmail.com', 'helloramses', 'Ramses', '', 'Terry', '21 Yardhouse Rd.', '', 'Yorktown', 'New York', '20355', 'United States', '456-968-2215', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CLID`);

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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CLID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `LLID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `UPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
