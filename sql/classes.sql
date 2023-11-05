-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 02:18 AM
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
-- Table structure for table `classes`
--
-- Creation: Nov 02, 2023 at 12:57 AM
-- Last update: Nov 02, 2023 at 12:57 AM
--

CREATE TABLE `classes` (
  `COL 1` varchar(21) DEFAULT NULL,
  `COL 2` varchar(4) DEFAULT NULL,
  `COL 3` varchar(6) DEFAULT NULL,
  `COL 4` varchar(3) DEFAULT NULL,
  `COL 5` varchar(43) DEFAULT NULL,
  `COL 6` varchar(2) DEFAULT NULL,
  `COL 7` varchar(2) DEFAULT NULL,
  `COL 8` varchar(9) DEFAULT NULL,
  `COL 9` varchar(4) DEFAULT NULL,
  `COL 10` varchar(17) DEFAULT NULL,
  `COL 11` varchar(7) DEFAULT NULL,
  `COL 12` varchar(18) DEFAULT NULL,
  `COL 13` varchar(69) DEFAULT NULL,
  `COL 14` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`, `COL 9`, `COL 10`, `COL 11`, `COL 12`, `COL 13`, `COL 14`) VALUES
('Header', 'CRN', 'Course', 'Sec', 'Title', 'IM', 'Cr', 'Dates', 'Days', 'Time', 'Loc', 'Instructor', 'Attributes', 'Avail'),
('Undergraduate Courses', '1097', 'CPS104', '1', 'Visual Programming', 'FS', '3', '1/22-5/17', 'M', '5:00 PM-7:50 PM', 'SH 259', 'Cameron Pardo', 'Liberal Arts', '24'),
('Undergraduate Courses', '1096', 'CPS110', '1', 'Web Page Design', 'FS', '3', '1/22-5/17', 'T', '5:00 PM-7:50 PM', 'SH 271', 'Katherine Brainard', 'Liberal Arts', '24'),
('Undergraduate Courses', '1104', 'CPS210', '1', 'Computer Science I: Foundations', 'FS', '4', '1/22-5/17', 'MR', '8:00 AM-9:15 AM', 'CSB 222', 'Michael Curry', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
('Undergraduate Courses', '1104', 'CPS210', '1', 'Computer Science I: Foundations', 'FS', '4', '1/22-5/17', 'W', '8:00 AM-10:50 AM', 'CSB 021', '', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
('Undergraduate Courses', '1100', 'CPS210', '2', 'Computer Science I: Foundations', 'FS', '4', '1/22-5/17', 'MR', '8:00 AM-9:15 AM', 'CSB 222', 'Michael Curry', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
('Undergraduate Courses', '1100', 'CPS210', '2', 'Computer Science I: Foundations', 'FS', '4', '1/22-5/17', 'W', '12:30 PM-3:20 PM', 'CSB 021', '', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
('Undergraduate Courses', '1103', 'CPS210', '3', 'Computer Science I: Foundations', 'FS', '4', '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'HUM 320', 'Michael Curry', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
('Undergraduate Courses', '1103', 'CPS210', '3', 'Computer Science I: Foundations', 'FS', '4', '1/22-5/17', 'W', '3:30 PM-6:20 PM', 'HUM 301', '', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
('Undergraduate Courses', '1101', 'CPS210', '4', 'Computer Science I: Foundations', 'FS', '4', '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'HUM 320', 'Michael Curry', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
('Undergraduate Courses', '1101', 'CPS210', '4', 'Computer Science I: Foundations', 'FS', '4', '1/22-5/17', 'R', '3:30 PM-6:20 PM', 'HUM 301', '', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
('Undergraduate Courses', '1107', 'CPS310', '1', 'Computer Science II: Data Structures', 'FS', '4', '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 100', 'Kaitlin Hoffmann', 'Liberal Arts', '15'),
('Undergraduate Courses', '1107', 'CPS310', '1', 'Computer Science II: Data Structures', 'FS', '4', '1/22-5/17', 'W', '8:00 AM-10:50 AM', 'HUM 301', '', 'Liberal Arts', '15'),
('Undergraduate Courses', '1076', 'CPS310', '2', 'Computer Science II: Data Structures', 'FS', '4', '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 100', 'Kaitlin Hoffmann', 'Liberal Arts', '15'),
('Undergraduate Courses', '1076', 'CPS310', '2', 'Computer Science II: Data Structures', 'FS', '4', '1/22-5/17', 'W', '12:30 PM-3:20 PM', 'HUM 301', '', 'Liberal Arts', '15'),
('Undergraduate Courses', '1077', 'CPS310', '3', 'Computer Science II: Data Structures', 'FS', '4', '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 100', 'Kaitlin Hoffmann', 'Liberal Arts', '15'),
('Undergraduate Courses', '1077', 'CPS310', '3', 'Computer Science II: Data Structures', 'FS', '4', '1/22-5/17', 'W', '3:30 PM-6:20 PM', 'CSB 021', '', 'Liberal Arts', '15'),
('Undergraduate Courses', '1108', 'CPS310', '4', 'Computer Science II: Data Structures', 'FS', '4', '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 100', 'Kaitlin Hoffmann', 'Liberal Arts', '15'),
('Undergraduate Courses', '1108', 'CPS310', '4', 'Computer Science II: Data Structures', 'FS', '4', '1/22-5/17', 'R', '3:30 PM-6:20 PM', 'LC 110', '', 'Liberal Arts', '15'),
('Undergraduate Courses', '1105', 'CPS315', '1', 'Computer Science III', 'FS', '4', '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'LC 104', 'Min Chen', 'Liberal Arts', '15'),
('Undergraduate Courses', '1105', 'CPS315', '1', 'Computer Science III', 'FS', '4', '1/22-5/17', 'R', '3:30 PM-6:20 PM', 'SH 271', '', 'Liberal Arts', '15'),
('Undergraduate Courses', '1106', 'CPS315', '2', 'Computer Science III', 'FS', '4', '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'LC 104', 'Min Chen', 'Liberal Arts', '15'),
('Undergraduate Courses', '1106', 'CPS315', '2', 'Computer Science III', 'FS', '4', '1/22-5/17', 'W', '8:00 AM-10:50 AM', 'SH 271', '', 'Liberal Arts', '15'),
('Undergraduate Courses', '1073', 'CPS315', '3', 'Computer Science III', 'FS', '4', '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'LC 104', 'Min Chen', 'Liberal Arts', '15'),
('Undergraduate Courses', '1073', 'CPS315', '3', 'Computer Science III', 'FS', '4', '1/22-5/17', 'W', '12:30 PM-3:20 PM', 'SH 271', '', 'Liberal Arts', '15'),
('Undergraduate Courses', '1102', 'CPS330', '1', 'Assembly Language and Computer Architecture', 'FS', '4', '1/22-5/17', 'MR', '12:30 PM-1:45 PM', 'LC 104', 'Reed Williams', 'Liberal Arts', '20'),
('Undergraduate Courses', '1102', 'CPS330', '1', 'Assembly Language and Computer Architecture', 'FS', '4', '1/22-5/17', 'T', '3:30 PM-6:20 PM', 'SH 259', '', 'Liberal Arts', '20'),
('Undergraduate Courses', '1078', 'CPS330', '2', 'Assembly Language and Computer Architecture', 'FS', '4', '1/22-5/17', 'MR', '12:30 PM-1:45 PM', 'LC 104', 'Reed Williams', 'Liberal Arts', '20'),
('Undergraduate Courses', '1078', 'CPS330', '2', 'Assembly Language and Computer Architecture', 'FS', '4', '1/22-5/17', 'W', '3:30 PM-6:20 PM', 'SH 259', '', 'Liberal Arts', '20'),
('Undergraduate Courses', '1075', 'CPS330', '3', 'Assembly Language and Computer Architecture', 'FS', '4', '1/22-5/17', 'MR', '12:30 PM-1:45 PM', 'LC 104', 'Reed Williams', 'Liberal Arts', '15'),
('Undergraduate Courses', '1075', 'CPS330', '3', 'Assembly Language and Computer Architecture', 'FS', '4', '1/22-5/17', 'W', '12:30 PM-3:20 PM', 'SH 259', '', 'Liberal Arts', '15'),
('Undergraduate Courses', '1099', 'CPS340', '1', 'Operating Systems', 'FS', '4', '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'HUM 313', 'Hanh Pham', 'Liberal Arts', '12'),
('Undergraduate Courses', '1099', 'CPS340', '1', 'Operating Systems', 'FS', '4', '1/22-5/17', 'T', '2:00 PM-4:50 PM', 'HUM 301', '', 'Liberal Arts', '12'),
('Undergraduate Courses', '1094', 'CPS340', '2', 'Operating Systems', 'FS', '4', '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'HUM 313', 'Hanh Pham', 'Liberal Arts', '12'),
('Undergraduate Courses', '1094', 'CPS340', '2', 'Operating Systems', 'FS', '4', '1/22-5/17', 'F', '2:00 PM-4:50 PM', 'HUM 301', '', 'Liberal Arts', '12'),
('Undergraduate Courses', '1082', 'CPS352', '1', 'Object Oriented Programming', 'FS', '3', '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 108', 'Min Chen', 'Critical Thinking Intermediate, Information Mgmt Intrmd, Liberal Arts', '35'),
('Undergraduate Courses', '1095', 'CPS353', '1', 'Software Engineering', 'FS', '3', '1/22-5/17', 'M', '5:00 PM-7:50 PM', 'HUM 118', 'Anthony Denizard', 'Liberal Arts', '35'),
('Undergraduate Courses', '1098', 'CPS415', '1', 'Discrete and Continuous Computer Algorithms', 'FS', '3', '1/22-5/17', 'TF', '9:30 AM-10:45 AM', 'OM 229', 'Keqin Li', 'Liberal Arts', '35'),
('Undergraduate Courses', '1083', 'CPS425', '1', 'Language Processing', 'FS', '4', '1/22-5/17', 'MR', '8:00 AM-9:15 AM', 'HUM 115', 'Ashley Suchy', 'Liberal Arts', '15'),
('Undergraduate Courses', '1083', 'CPS425', '1', 'Language Processing', 'FS', '4', '1/22-5/17', 'W', '3:30 PM-6:20 PM', 'SH 271', '', 'Liberal Arts', '15'),
('Undergraduate Courses', '1080', 'CPS425', '2', 'Language Processing', 'FS', '4', '1/22-5/17', 'MR', '8:00 AM-9:15 AM', 'HUM 115', 'Ashley Suchy', 'Liberal Arts', '15'),
('Undergraduate Courses', '1080', 'CPS425', '2', 'Language Processing', 'FS', '4', '1/22-5/17', 'W', '11:00 AM-1:50 PM', 'CSB 145', '', 'Liberal Arts', '15'),
('Undergraduate Courses', '1081', 'CPS485', '1', 'Projects', 'FS', '4', '1/22-5/17', 'T', '12:30 PM-4:20 PM', 'SH 271', 'Hanh Pham', 'Critical Thinking Advanced, Information Mgmt Advanced, Liberal Arts', '20'),
('Undergraduate Courses', '1084', 'CPS485', '2', 'Projects', 'FS', '4', '1/22-5/17', 'W', '9:30 AM-1:20 PM', 'CSB 153', 'Hanh Pham', 'Critical Thinking Advanced, Information Mgmt Advanced, Liberal Arts', '20'),
('Undergraduate Courses', '1092', 'CPS493', '2', 'Cybersecurity', 'FS', '3', '1/22-5/17', 'TF', '12:30 PM-1:45 PM', 'HUM 310', 'Kaitlin Hoffmann', '', '10'),
('Undergraduate Courses', '1087', 'CPS493', '3', 'Web Server Programming', 'FS', '3', '1/22-5/17', 'MR', '2:00 PM-3:15 PM', 'CSB 221', 'Moshe Plotkin', '', '35'),
('Undergraduate Courses', '1074', 'CPS493', '8', 'Deep Learning', 'FS', '3', '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'HUM 115', 'Chirakkal Easwaran', '', '10'),
('Graduate Courses', '1079', 'CPS593', '2', 'Foundations of Computer Science', 'FS', '3', '1/22-5/17', 'TF', '9:30 AM-10:45 AM', 'HUM 216', 'Ashley Suchy', '', '35'),
('Graduate Courses', '1091', 'CPS593', '3', 'Programming & Data Structures', 'FS', '3', '1/22-5/17', 'MR', '2:00 PM-3:15 PM', 'HUM 113', 'Keqin Li', '', '35'),
('Graduate Courses', '1088', 'CPS593', '4', 'Discrete Structures', 'FS', '3', '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 113', 'Katherine Brainard', '', '35'),
('Graduate Courses', '1085', 'CPS593', '5', 'Web & Database Programming', 'FS', '3', '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'HUM 310', 'Kaitlin Hoffmann', '', '35'),
('Graduate Courses', '1086', 'CPS593', '6', 'Artificial Intelligence', 'FS', '3', '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'LC 103', 'Min Chen', '', '35'),
('Graduate Courses', '1093', 'CPS593', '7', 'Cybersecurity', 'FS', '3', '1/22-5/17', 'TF', '12:30 PM-1:45 PM', 'HUM 310', 'Kaitlin Hoffmann', '', '25'),
('Graduate Courses', '1089', 'CPS593', '8', 'Deep Learning', 'FS', '3', '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'HUM 115', 'Chirakkal Easwaran', '', '24'),
('Graduate Courses', '1090', 'CPS593', '9', 'Functional Programming', 'FS', '3', '1/22-5/17', 'MR', '12:30 PM-1:45 PM', 'LC 102', 'Ashley Suchy', '', '35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
