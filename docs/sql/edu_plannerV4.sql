-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 06:46 PM
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
-- Table structure for table `applicants`
--
-- Creation: Nov 15, 2023 at 07:37 PM
--

CREATE TABLE `applicants` (
  `APPID` int(25) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `m_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `address1` varchar(25) NOT NULL,
  `address2` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `phone_num` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--
-- Creation: Nov 28, 2023 at 04:27 PM
--

CREATE TABLE `countries` (
  `CTID` int(11) NOT NULL,
  `country_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`CTID`, `country_name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Andorra'),
(5, 'Angola'),
(6, 'Antigua & Deps'),
(7, 'Argentina'),
(8, 'Armenia'),
(9, 'Australia'),
(10, 'Austria'),
(11, 'Azerbaijan'),
(12, 'Bahamas'),
(13, 'Bahrain'),
(14, 'Bangladesh'),
(15, 'Barbados'),
(16, 'Belarus'),
(17, 'Belgium'),
(18, 'Belize'),
(19, 'Benin'),
(20, 'Bhutan'),
(21, 'Bolivia'),
(22, 'Bosnia Herzegovina'),
(23, 'Botswana'),
(24, 'Brazil'),
(25, 'Brunei'),
(26, 'Bulgaria'),
(27, 'Burkina'),
(28, 'Burundi'),
(29, 'Cambodia'),
(30, 'Cameroon'),
(31, 'Canada'),
(32, 'Cape Verde'),
(33, 'Central African Rep'),
(34, 'Chad'),
(35, 'Chile'),
(36, 'China'),
(37, 'Colombia'),
(38, 'Comoros'),
(39, 'Congo'),
(40, 'Congo {Democratic Rep}'),
(41, 'Costa Rica'),
(42, 'Croatia'),
(43, 'Cuba'),
(44, 'Cyprus'),
(45, 'Czech Republic'),
(46, 'Denmark'),
(47, 'Djibouti'),
(48, 'Dominica'),
(49, 'Dominican Republic'),
(50, 'East Timor'),
(51, 'Ecuador'),
(52, 'Egypt'),
(53, 'El Salvador'),
(54, 'Equatorial Guinea'),
(55, 'Eritrea'),
(56, 'Estonia'),
(57, 'Ethiopia'),
(58, 'Fiji'),
(59, 'Finland'),
(60, 'France'),
(61, 'Gabon'),
(62, 'Gambia'),
(63, 'Georgia'),
(64, 'Germany'),
(65, 'Ghana'),
(66, 'Greece'),
(67, 'Grenada'),
(68, 'Guatemala'),
(69, 'Guinea'),
(70, 'Guinea-Bissau'),
(71, 'Guyana'),
(72, 'Haiti'),
(73, 'Honduras'),
(74, 'Hungary'),
(75, 'Iceland'),
(76, 'India'),
(77, 'Indonesia'),
(78, 'Iran'),
(79, 'Iraq'),
(80, 'Ireland {Republic}'),
(81, 'Israel'),
(82, 'Italy'),
(83, 'Ivory Coast'),
(84, 'Jamaica'),
(85, 'Japan'),
(86, 'Jordan'),
(87, 'Kazakhstan'),
(88, 'Kenya'),
(89, 'Kiribati'),
(90, 'Korea North'),
(91, 'Korea South'),
(92, 'Kosovo'),
(93, 'Kuwait'),
(94, 'Kyrgyzstan'),
(95, 'Laos'),
(96, 'Latvia'),
(97, 'Lebanon'),
(98, 'Lesotho'),
(99, 'Liberia'),
(100, 'Libya'),
(101, 'Liechtenstein'),
(102, 'Lithuania'),
(103, 'Luxembourg'),
(104, 'Macedonia'),
(105, 'Madagascar'),
(106, 'Malawi'),
(107, 'Malaysia'),
(108, 'Maldives'),
(109, 'Mali'),
(110, 'Malta'),
(111, 'Marshall Islands'),
(112, 'Mauritania'),
(113, 'Mauritius'),
(114, 'Mexico'),
(115, 'Micronesia'),
(116, 'Moldova'),
(117, 'Monaco'),
(118, 'Mongolia'),
(119, 'Montenegro'),
(120, 'Morocco'),
(121, 'Mozambique'),
(122, 'Myanmar, {Burma}'),
(123, 'Namibia'),
(124, 'Nauru'),
(125, 'Nepal'),
(126, 'Netherlands'),
(127, 'New Zealand'),
(128, 'Nicaragua'),
(129, 'Niger'),
(130, 'Nigeria'),
(131, 'Norway'),
(132, 'Oman'),
(133, 'Pakistan'),
(134, 'Palau'),
(135, 'Panama'),
(136, 'Papua New Guinea'),
(137, 'Paraguay'),
(138, 'Peru'),
(139, 'Philippines'),
(140, 'Poland'),
(141, 'Portugal'),
(142, 'Qatar'),
(143, 'Romania'),
(144, 'Russian Federation'),
(145, 'Rwanda'),
(146, 'St Kitts & Nevis'),
(147, 'St Lucia'),
(148, 'Saint Vincent & the Grenadines'),
(149, 'Samoa'),
(150, 'San Marino'),
(151, 'Sao Tome & Principe'),
(152, 'Saudi Arabia'),
(153, 'Senegal'),
(154, 'Serbia'),
(155, 'Seychelles'),
(156, 'Sierra Leone'),
(157, 'Singapore'),
(158, 'Slovakia'),
(159, 'Slovenia'),
(160, 'Solomon Islands'),
(161, 'Somalia'),
(162, 'South Africa'),
(163, 'South Sudan'),
(164, 'Spain'),
(165, 'Sri Lanka'),
(166, 'Sudan'),
(167, 'Suriname'),
(168, 'Swaziland'),
(169, 'Sweden'),
(170, 'Switzerland'),
(171, 'Syria'),
(172, 'Taiwan'),
(173, 'Tajikistan'),
(174, 'Tanzania'),
(175, 'Thailand'),
(176, 'Togo'),
(177, 'Tonga'),
(178, 'Trinidad & Tobago'),
(179, 'Tunisia'),
(180, 'Turkey'),
(181, 'Turkmenistan'),
(182, 'Tuvalu'),
(183, 'Uganda'),
(184, 'Ukraine'),
(185, 'United Arab Emirates'),
(186, 'United Kingdom'),
(187, 'United States'),
(188, 'Uruguay'),
(189, 'Uzbekistan'),
(190, 'Vanuatu'),
(191, 'Vatican City'),
(192, 'Venezuela'),
(193, 'Vietnam'),
(194, 'Yemen'),
(195, 'Zambia'),
(196, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--
-- Creation: Nov 18, 2023 at 10:42 PM
--

CREATE TABLE `courses` (
  `CLID` int(11) NOT NULL,
  `header` varchar(25) DEFAULT NULL,
  `crn` varchar(25) DEFAULT NULL,
  `course` varchar(25) DEFAULT NULL,
  `sec` varchar(25) DEFAULT NULL,
  `title` varchar(25) DEFAULT NULL,
  `instructional_method` varchar(25) DEFAULT NULL,
  `credits` int(2) DEFAULT NULL,
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

INSERT INTO `courses` (`CLID`, `header`, `crn`, `course`, `sec`, `title`, `instructional_method`, `credits`, `dates`, `days`, `time`, `loc`, `instructor`, `attributes`, `available_seats`) VALUES
(2, 'Undergraduate Courses', '1097', 'CPS104', '1', 'Visual Programming', 'FS', 3, '1/22-5/17', 'M', '5:00 PM-7:50 PM', 'SH 259', 'Cameron Pardo', 'Liberal Arts', '24'),
(3, 'Undergraduate Courses', '1096', 'CPS110', '1', 'Web Page Design', 'FS', 3, '1/22-5/17', 'T', '5:00 PM-7:50 PM', 'SH 271', 'Katherine Brainard', 'Liberal Arts', '24'),
(4, 'Undergraduate Courses', '1104', 'CPS210', '1', 'Computer Science I: Found', 'FS', 4, '1/22-5/17', 'MR', '8:00 AM-9:15 AM', 'CSB 222', 'Michael Curry', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(5, 'Undergraduate Courses', '1104', 'CPS210', '1', 'Computer Science I: Found', 'FS', 4, '1/22-5/17', 'W', '8:00 AM-10:50 AM', 'CSB 021', '', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(6, 'Undergraduate Courses', '1100', 'CPS210', '2', 'Computer Science I: Found', 'FS', 4, '1/22-5/17', 'MR', '8:00 AM-9:15 AM', 'CSB 222', 'Michael Curry', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(7, 'Undergraduate Courses', '1100', 'CPS210', '2', 'Computer Science I: Found', 'FS', 4, '1/22-5/17', 'W', '12:30 PM-3:20 PM', 'CSB 021', '', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(8, 'Undergraduate Courses', '1103', 'CPS210', '3', 'Computer Science I: Found', 'FS', 4, '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'HUM 320', 'Michael Curry', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(9, 'Undergraduate Courses', '1103', 'CPS210', '3', 'Computer Science I: Found', 'FS', 4, '1/22-5/17', 'W', '3:30 PM-6:20 PM', 'HUM 301', '', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(10, 'Undergraduate Courses', '1101', 'CPS210', '4', 'Computer Science I: Found', 'FS', 4, '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'HUM 320', 'Michael Curry', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(11, 'Undergraduate Courses', '1101', 'CPS210', '4', 'Computer Science I: Found', 'FS', 4, '1/22-5/17', 'R', '3:30 PM-6:20 PM', 'HUM 301', '', 'Critical Thinking Introductory, Information Mgmt Intro, Liberal Arts', '15'),
(12, 'Undergraduate Courses', '1107', 'CPS310', '1', 'Computer Science II: Data', 'FS', 4, '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 100', 'Kaitlin Hoffmann', 'Liberal Arts', '15'),
(13, 'Undergraduate Courses', '1107', 'CPS310', '1', 'Computer Science II: Data', 'FS', 4, '1/22-5/17', 'W', '8:00 AM-10:50 AM', 'HUM 301', '', 'Liberal Arts', '15'),
(14, 'Undergraduate Courses', '1076', 'CPS310', '2', 'Computer Science II: Data', 'FS', 4, '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 100', 'Kaitlin Hoffmann', 'Liberal Arts', '15'),
(15, 'Undergraduate Courses', '1076', 'CPS310', '2', 'Computer Science II: Data', 'FS', 4, '1/22-5/17', 'W', '12:30 PM-3:20 PM', 'HUM 301', '', 'Liberal Arts', '15'),
(16, 'Undergraduate Courses', '1077', 'CPS310', '3', 'Computer Science II: Data', 'FS', 4, '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 100', 'Kaitlin Hoffmann', 'Liberal Arts', '15'),
(17, 'Undergraduate Courses', '1077', 'CPS310', '3', 'Computer Science II: Data', 'FS', 4, '1/22-5/17', 'W', '3:30 PM-6:20 PM', 'CSB 021', '', 'Liberal Arts', '15'),
(18, 'Undergraduate Courses', '1108', 'CPS310', '4', 'Computer Science II: Data', 'FS', 4, '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 100', 'Kaitlin Hoffmann', 'Liberal Arts', '15'),
(19, 'Undergraduate Courses', '1108', 'CPS310', '4', 'Computer Science II: Data', 'FS', 4, '1/22-5/17', 'R', '3:30 PM-6:20 PM', 'LC 110', '', 'Liberal Arts', '15'),
(20, 'Undergraduate Courses', '1105', 'CPS315', '1', 'Computer Science III', 'FS', 4, '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'LC 104', 'Min Chen', 'Liberal Arts', '15'),
(21, 'Undergraduate Courses', '1105', 'CPS315', '1', 'Computer Science III', 'FS', 4, '1/22-5/17', 'R', '3:30 PM-6:20 PM', 'SH 271', '', 'Liberal Arts', '15'),
(22, 'Undergraduate Courses', '1106', 'CPS315', '2', 'Computer Science III', 'FS', 4, '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'LC 104', 'Min Chen', 'Liberal Arts', '15'),
(23, 'Undergraduate Courses', '1106', 'CPS315', '2', 'Computer Science III', 'FS', 4, '1/22-5/17', 'W', '8:00 AM-10:50 AM', 'SH 271', '', 'Liberal Arts', '15'),
(24, 'Undergraduate Courses', '1073', 'CPS315', '3', 'Computer Science III', 'FS', 4, '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'LC 104', 'Min Chen', 'Liberal Arts', '15'),
(25, 'Undergraduate Courses', '1073', 'CPS315', '3', 'Computer Science III', 'FS', 4, '1/22-5/17', 'W', '12:30 PM-3:20 PM', 'SH 271', '', 'Liberal Arts', '15'),
(26, 'Undergraduate Courses', '1102', 'CPS330', '1', 'Assembly Language and Com', 'FS', 4, '1/22-5/17', 'MR', '12:30 PM-1:45 PM', 'LC 104', 'Reed Williams', 'Liberal Arts', '20'),
(27, 'Undergraduate Courses', '1102', 'CPS330', '1', 'Assembly Language and Com', 'FS', 4, '1/22-5/17', 'T', '3:30 PM-6:20 PM', 'SH 259', '', 'Liberal Arts', '20'),
(28, 'Undergraduate Courses', '1078', 'CPS330', '2', 'Assembly Language and Com', 'FS', 4, '1/22-5/17', 'MR', '12:30 PM-1:45 PM', 'LC 104', 'Reed Williams', 'Liberal Arts', '20'),
(29, 'Undergraduate Courses', '1078', 'CPS330', '2', 'Assembly Language and Com', 'FS', 4, '1/22-5/17', 'W', '3:30 PM-6:20 PM', 'SH 259', '', 'Liberal Arts', '20'),
(30, 'Undergraduate Courses', '1075', 'CPS330', '3', 'Assembly Language and Com', 'FS', 4, '1/22-5/17', 'MR', '12:30 PM-1:45 PM', 'LC 104', 'Reed Williams', 'Liberal Arts', '15'),
(31, 'Undergraduate Courses', '1075', 'CPS330', '3', 'Assembly Language and Com', 'FS', 4, '1/22-5/17', 'W', '12:30 PM-3:20 PM', 'SH 259', '', 'Liberal Arts', '15'),
(32, 'Undergraduate Courses', '1099', 'CPS340', '1', 'Operating Systems', 'FS', 4, '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'HUM 313', 'Hanh Pham', 'Liberal Arts', '12'),
(33, 'Undergraduate Courses', '1099', 'CPS340', '1', 'Operating Systems', 'FS', 4, '1/22-5/17', 'T', '2:00 PM-4:50 PM', 'HUM 301', '', 'Liberal Arts', '12'),
(34, 'Undergraduate Courses', '1094', 'CPS340', '2', 'Operating Systems', 'FS', 4, '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'HUM 313', 'Hanh Pham', 'Liberal Arts', '12'),
(35, 'Undergraduate Courses', '1094', 'CPS340', '2', 'Operating Systems', 'FS', 4, '1/22-5/17', 'F', '2:00 PM-4:50 PM', 'HUM 301', '', 'Liberal Arts', '12'),
(36, 'Undergraduate Courses', '1082', 'CPS352', '1', 'Object Oriented Programmi', 'FS', 3, '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 108', 'Min Chen', 'Critical Thinking Intermediate, Information Mgmt Intrmd, Liberal Arts', '35'),
(37, 'Undergraduate Courses', '1095', 'CPS353', '1', 'Software Engineering', 'FS', 3, '1/22-5/17', 'M', '5:00 PM-7:50 PM', 'HUM 118', 'Anthony Denizard', 'Liberal Arts', '35'),
(38, 'Undergraduate Courses', '1098', 'CPS415', '1', 'Discrete and Continuous C', 'FS', 3, '1/22-5/17', 'TF', '9:30 AM-10:45 AM', 'OM 229', 'Keqin Li', 'Liberal Arts', '35'),
(39, 'Undergraduate Courses', '1083', 'CPS425', '1', 'Language Processing', 'FS', 4, '1/22-5/17', 'MR', '8:00 AM-9:15 AM', 'HUM 115', 'Ashley Suchy', 'Liberal Arts', '15'),
(40, 'Undergraduate Courses', '1083', 'CPS425', '1', 'Language Processing', 'FS', 4, '1/22-5/17', 'W', '3:30 PM-6:20 PM', 'SH 271', '', 'Liberal Arts', '15'),
(41, 'Undergraduate Courses', '1080', 'CPS425', '2', 'Language Processing', 'FS', 4, '1/22-5/17', 'MR', '8:00 AM-9:15 AM', 'HUM 115', 'Ashley Suchy', 'Liberal Arts', '15'),
(42, 'Undergraduate Courses', '1080', 'CPS425', '2', 'Language Processing', 'FS', 4, '1/22-5/17', 'W', '11:00 AM-1:50 PM', 'CSB 145', '', 'Liberal Arts', '15'),
(43, 'Undergraduate Courses', '1081', 'CPS485', '1', 'Projects', 'FS', 4, '1/22-5/17', 'T', '12:30 PM-4:20 PM', 'SH 271', 'Hanh Pham', 'Critical Thinking Advanced, Information Mgmt Advanced, Liberal Arts', '20'),
(44, 'Undergraduate Courses', '1084', 'CPS485', '2', 'Projects', 'FS', 4, '1/22-5/17', 'W', '9:30 AM-1:20 PM', 'CSB 153', 'Hanh Pham', 'Critical Thinking Advanced, Information Mgmt Advanced, Liberal Arts', '20'),
(45, 'Undergraduate Courses', '1092', 'CPS493', '2', 'Cybersecurity', 'FS', 3, '1/22-5/17', 'TF', '12:30 PM-1:45 PM', 'HUM 310', 'Kaitlin Hoffmann', '', '10'),
(46, 'Undergraduate Courses', '1087', 'CPS493', '3', 'Web Server Programming', 'FS', 3, '1/22-5/17', 'MR', '2:00 PM-3:15 PM', 'CSB 221', 'Moshe Plotkin', '', '35'),
(47, 'Undergraduate Courses', '1074', 'CPS493', '8', 'Deep Learning', 'FS', 3, '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'HUM 115', 'Chirakkal Easwaran', '', '10'),
(48, 'Graduate Courses', '1079', 'CPS593', '2', 'Foundations of Computer S', 'FS', 3, '1/22-5/17', 'TF', '9:30 AM-10:45 AM', 'HUM 216', 'Ashley Suchy', '', '35'),
(49, 'Graduate Courses', '1091', 'CPS593', '3', 'Programming & Data Struct', 'FS', 3, '1/22-5/17', 'MR', '2:00 PM-3:15 PM', 'HUM 113', 'Keqin Li', '', '35'),
(50, 'Graduate Courses', '1088', 'CPS593', '4', 'Discrete Structures', 'FS', 3, '1/22-5/17', 'MR', '9:30 AM-10:45 AM', 'LC 113', 'Katherine Brainard', '', '35'),
(51, 'Graduate Courses', '1085', 'CPS593', '5', 'Web & Database Programmin', 'FS', 3, '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'HUM 310', 'Kaitlin Hoffmann', '', '35'),
(52, 'Graduate Courses', '1086', 'CPS593', '6', 'Artificial Intelligence', 'FS', 3, '1/22-5/17', 'TF', '11:00 AM-12:15 PM', 'LC 103', 'Min Chen', '', '35'),
(53, 'Graduate Courses', '1093', 'CPS593', '7', 'Cybersecurity', 'FS', 3, '1/22-5/17', 'TF', '12:30 PM-1:45 PM', 'HUM 310', 'Kaitlin Hoffmann', '', '25'),
(54, 'Graduate Courses', '1089', 'CPS593', '8', 'Deep Learning', 'FS', 3, '1/22-5/17', 'MR', '11:00 AM-12:15 PM', 'HUM 115', 'Chirakkal Easwaran', '', '24'),
(55, 'Graduate Courses', '1090', 'CPS593', '9', 'Functional Programming', 'FS', 3, '1/22-5/17', 'MR', '12:30 PM-1:45 PM', 'LC 102', 'Ashley Suchy', '', '35'),
(57, NULL, 'z', 'z', 'z', 'z', 'z', 0, 'z', 'z', 'z', 'z', 'z', 'z', 'z'),
(58, NULL, 'x', 'x', 'x', 'x', 'x', 0, 'x', 'x', 'x', 'x', 'x', 'x', 'x'),
(59, NULL, 'g', 'z', 'z', 'z', 'z', 0, '3', 'z', 'z', 'z', 'z', 'z', 'z'),
(60, NULL, 'h', 'h', 'h', 'h', 'h', 0, '4', 'h', 'h', 'h', 'h', 'h', 'h'),
(61, 'v', 'v', 'v', 'v', 'v', 'v', 2, 'v', 'v', 'v', 'v', 'v', 'v', 'v');

-- --------------------------------------------------------

--
-- Table structure for table `course_subjects`
--
-- Creation: Nov 23, 2023 at 09:01 PM
--

CREATE TABLE `course_subjects` (
  `SUBID` int(11) NOT NULL,
  `subjects` varchar(30) DEFAULT NULL,
  `crn_value` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `course_subjects`
--

INSERT INTO `course_subjects` (`SUBID`, `subjects`, `crn_value`) VALUES
(1, 'Adolescence Education', 'SED'),
(2, 'Ancient World Studies', 'ANC'),
(3, 'Anthropology', 'ANT'),
(4, 'Art Education', 'ARE'),
(5, 'Art History', 'ARH'),
(6, 'Art Studio', 'ARS'),
(7, 'Asian Studies', 'ASN'),
(8, 'Astronomy', 'AST'),
(9, 'Biochemistry', 'BCM'),
(10, 'Biology', 'BIO'),
(11, 'Black Studies', 'BLK'),
(12, 'Business Administration', 'BUS'),
(13, 'Chemistry', 'CHE'),
(14, 'Chinese', 'CHI'),
(15, 'Communication Disorders', 'CMD'),
(16, 'Communication Studies', 'CMM'),
(17, 'Computer Science', 'CPS'),
(18, 'Counselor Education', 'COU'),
(19, 'Deaf Studies', 'DFS'),
(20, 'Digital Design and Fabrication', 'DDF'),
(21, 'Digital Media and Journalism', 'DMJ'),
(22, 'Disaster Studies', 'DIS'),
(23, 'Early Childhood/Childhood Educ', 'EED'),
(24, 'Economics', 'ECO'),
(25, 'Education Interdisciplinary', 'EDI'),
(26, 'Educational Administration', 'EDA'),
(27, 'Educational Studies', 'EDS'),
(28, 'Engineering-Computer', 'EGC'),
(29, 'Engineering-Electrical', 'EGE'),
(30, 'Engineering-General', 'EGG'),
(31, 'Engineering-Mechanical', 'EGM'),
(32, 'English', 'ENG'),
(33, 'English as a Second Language', 'ESL'),
(34, 'Environmental Science', 'EGS'),
(35, 'Environmental Science (Old)', 'ENS'),
(36, 'Environmental Studies', 'ENV'),
(37, 'Evolutionary Studies', 'EVO'),
(38, 'Film and Video Studies', 'FVS'),
(39, 'French', 'FRN'),
(40, 'General Studies', 'BGS'),
(41, 'Geography', 'GEO'),
(42, 'Geology', 'GLG'),
(43, 'German', 'GER'),
(44, 'Hebrew', 'HEB'),
(45, 'History', 'HIS'),
(46, 'Honors', 'HON'),
(47, 'Institute for Int\'l Business', 'IIB'),
(48, 'Interdisciplinary', 'INT'),
(49, 'International Relations', 'INR'),
(50, 'Italian', 'ITA'),
(51, 'Italian Studies', 'ITS'),
(52, 'Japanese', 'JPN'),
(53, 'Jewish Studies', 'JST'),
(54, 'Kiswahili', 'KIS'),
(55, 'Lang, Lit & Cultures', 'LLC'),
(56, 'Latin Amer & Caribbean Studies', 'LAM'),
(57, 'Law and Politics', 'LAW'),
(58, 'Linguistics', 'LIN'),
(59, 'Literacy Education', 'LED'),
(60, 'Mathematics', 'MAT'),
(61, 'Medieval/Early Modern Studies', 'MED'),
(62, 'Music', 'MUS'),
(63, 'Native American Studies', 'NAS'),
(64, 'Philosophy', 'PHI'),
(65, 'Physics', 'PHY'),
(66, 'Political Science', 'POL'),
(67, 'Psychology', 'PSY'),
(68, 'Religious Studies', 'REL'),
(69, 'Russian', 'RUS'),
(70, 'Sociology', 'SOC'),
(71, 'Spanish', 'SPA'),
(72, 'Special Education', 'SPE'),
(73, 'Study Abroad', 'SAB'),
(74, 'Theater Arts', 'THE'),
(75, 'Women\'s,Gender, & Sexuality St', 'WOM');

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
-- Creation: Nov 23, 2023 at 08:40 PM
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
  `clearance` int(1) NOT NULL,
  `courses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`courses`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`UPID`, `user_email`, `user_password`, `f_name`, `m_name`, `l_name`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `phone_num`, `clearance`, `courses`) VALUES
(1, 'changeme@me.com', 'hellochange', 'Change', 'F', 'Me', '13113 Here Road', 'Apt. C5', 'Johnstown', 'CA', '90210', 'USA', '555-123-9587', 0, ''),
(2, 'angelf@gmail.com', 'helloangel', 'Angel', 'O', 'Flores', '21 Bieber St.', 'Apt. A11', 'New York City', 'New York', '50401', 'United States', '555-666-7777', 0, ''),
(26, 'denizard@gmail.com', 'hellodenizard', 'Anthony', '', 'Denizard', '14 Zelmer Street', '', 'Bronx', 'New York', '14052', 'United States', '123-456-7777', 1, ''),
(34, 'ramses@gmail.com', 'helloramses', 'Ramses', '', 'Terry', '21 Yardhouse Rd.', '', 'Yorktown', 'New York', '20355', 'United States', '456-968-2215', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`APPID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`CTID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CLID`);

--
-- Indexes for table `course_subjects`
--
ALTER TABLE `course_subjects`
  ADD PRIMARY KEY (`SUBID`);

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
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `APPID` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `CTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CLID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `course_subjects`
--
ALTER TABLE `course_subjects`
  MODIFY `SUBID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `LLID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `UPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
