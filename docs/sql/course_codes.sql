-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 04:38 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `course_codes`
--

CREATE TABLE `course_codes` (
  `CLID` int(11) NOT NULL,
  `header` varchar(63) DEFAULT NULL,
  `subjectShort` varchar(7) DEFAULT NULL,
  `courseNums` int(11) DEFAULT NULL,
  `courseFull` varchar(15) DEFAULT NULL,
  `title` varchar(63) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `attributes` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_codes`
--

INSERT INTO `course_codes` (`CLID`, `header`, `subjectShort`, `courseNums`, `courseFull`, `title`, `credits`, `attributes`) VALUES
(1, 'Undergraduate Courses', 'CPS', 104, 'CPS104', 'Visual Programming', 3, 'Liberal Arts'),
(2, 'Undergraduate Courses', 'CPS', 110, 'CPS110', 'Web Page Design', 3, 'Liberal Arts'),
(3, 'Undergraduate Courses', 'CPS', 210, 'CPS210', 'Computer Science I: Found', 4, 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts'),
(4, 'Undergraduate Courses', 'CPS', 310, 'CPS310', 'Computer Science II: Data', 4, 'Liberal Arts'),
(5, 'Undergraduate Courses', 'CPS', 315, 'CPS315', 'Computer Science III', 4, 'Liberal Arts'),
(6, 'Undergraduate Courses', 'CPS', 330, 'CPS330', 'Assembly Language and Com', 4, 'Liberal Arts'),
(7, 'Undergraduate Courses', 'CPS', 340, 'CPS340', 'Operating Systems', 4, 'Liberal Arts'),
(8, 'Undergraduate Courses', 'CPS', 352, 'CPS352', 'Object Oriented Programmi', 3, 'Critical Thinking Intermediate, Information Mgmt Intrmd, Liberal Arts'),
(9, 'Undergraduate Courses', 'CPS', 353, 'CPS353', 'Software Engineering', 3, 'Liberal Arts'),
(10, 'Undergraduate Courses', 'CPS', 415, 'CPS415', 'Discrete and Continuous C', 3, 'Liberal Arts'),
(11, 'Undergraduate Courses', 'CPS', 425, 'CPS425', 'Language Processing', 4, 'Liberal Arts'),
(12, 'Undergraduate Courses', 'CPS', 485, 'CPS485', 'Projects', 4, 'Critical Thinking Advanced, Information Mgmt Advanced, Liberal Arts'),
(13, 'Undergraduate Courses', 'CPS', 493, 'CPS493', 'Cybersecurity', 3, ''),
(14, 'Graduate Courses', 'CPS', 593, 'CPS593', 'Foundations of Computer S', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_codes`
--
ALTER TABLE `course_codes`
  ADD PRIMARY KEY (`CLID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_codes`
--
ALTER TABLE `course_codes`
  MODIFY `CLID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
