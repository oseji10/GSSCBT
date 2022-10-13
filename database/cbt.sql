-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 04:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_log_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `password`, `last_log_date`) VALUES
(1, 'Omang Emmanuel', 'omang@gmail.com', '12345', '2020-06-24 22:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_id` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `department_id`, `date`) VALUES
(1, 'Computer Science', 1110341392, '2020-02-29 16:59:37'),
(2, 'Mass Communication', 1034907213, '2020-02-29 16:36:04'),
(3, 'Microbiology', 1213906825, '2020-02-29 16:36:04'),
(4, 'Electrical and Electronics Engineering', 1232671751, '2020-02-29 16:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `eassy`
--

CREATE TABLE `eassy` (
  `id` int(11) NOT NULL,
  `course_title` varchar(250) NOT NULL,
  `qestion` varchar(1000) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `pin` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `question_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eassy`
--

INSERT INTO `eassy` (`id`, `course_title`, `qestion`, `answer`, `pin`, `date`, `question_id`, `mark`) VALUES
(1, 'Use Of English', '<p>dsgcsdc sdcsd dcdsdhs dfhvdfjv vv</p>\r\n', 'Omang Sunday', 0, '2020-02-22 21:00:28', 1253674817, 2),
(2, 'Use Of English', '<p>hvd dfvfd vdfv fvkjvfv fvbjdhvf vfvfdv dfvjdfvfv</p>\r\n', 'Mr Ofut', 0, '2020-02-22 21:00:28', 1189665867, 2);

-- --------------------------------------------------------

--
-- Table structure for table `level_year`
--

CREATE TABLE `level_year` (
  `id` int(11) NOT NULL,
  `level_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_year`
--

INSERT INTO `level_year` (`id`, `level_name`) VALUES
(1, '100'),
(2, '200');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `course_title` varchar(225) NOT NULL,
  `questions` text NOT NULL,
  `option_A` varchar(125) NOT NULL,
  `option_B` varchar(125) NOT NULL,
  `option_C` varchar(125) NOT NULL,
  `option_D` varchar(125) NOT NULL,
  `option_E` varchar(125) NOT NULL,
  `answer` varchar(225) NOT NULL,
  `mark` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question_id` varchar(125) NOT NULL,
  `pin` int(11) NOT NULL,
  `question_type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `course_title`, `questions`, `option_A`, `option_B`, `option_C`, `option_D`, `option_E`, `answer`, `mark`, `date_added`, `question_id`, `pin`, `question_type`) VALUES
(1, 'Use Of English', '<p>Which of the following WAN technologies would have the HIGHEST latency?</p>\r\n', 'Satellite', 'Cable', 'DSL', 'Frame-relay', 'None', 'A', 2, '2020-02-03 13:35:38', '1220080819', 0, 'objective'),
(2, 'Use Of English', 'A tax accounting firm has decided to allow some employees to work from home during the tax season. Which of the following should be the MOST important criteria when planning the home office networks?', 'Amount of memory on each workstation', 'A secure VPN connection to the main office', 'The distance between each home office and the main office', ' The Internet Service Provider bandwidth capability', 'All of the above', 'B', 2, '2020-02-03 13:35:38', '1007150869', 0, 'objective'),
(3, 'Use Of English', 'Which of the following network appliances allows an IT department to restrict which websites are allowed to be accessed from the company network?', 'Proxy server', 'Load balancer', 'VPN concentrator', 'All of the above', 'Virtual PBX', 'A', 2, '2020-02-03 13:35:38', '1271253890', 0, 'objective'),
(4, 'Use Of English', 'A user is unable to access the network when the network printer is on. This is MOST likely due to which of the following?', 'Duplicate IP address', 'Compatibility mismatch', 'Duplex mismatch', 'Equipment limitations', 'Not sure', 'A', 2, '2020-02-03 13:35:38', '1112679194', 0, 'objective'),
(5, 'Use Of English', 'Which of the following describes a process that can translate internal network IP addresses to external ones?', 'Change control', 'NAT', 'Not sure', 'PAT', 'Remote terminal emulation', 'B', 2, '2020-02-03 13:35:38', '1322009604', 0, 'objective'),
(6, 'Use Of English', 'Which of the following threats would MOST likely be addressed in a company-wide security training class?', 'VLAN hopping', 'None of the above', 'Evil twin', 'Social engineering', 'Man-in-the-middle', 'D', 2, '2020-02-03 13:35:38', '1055937347', 0, 'objective'),
(7, 'Use Of English', 'Which of the following topologies uses various connections to increase redundancy?', 'Ring', 'Star', 'Mesh', 'Bus', 'None of the above', 'C', 2, '2020-02-03 13:35:38', '1135581253', 0, 'objective'),
(8, 'Use Of English', 'A technician is configuring mobile devices for new employees. Which of the following documents should be updated to show that the new employees are receiving these mobile devices?', 'Network diagram', 'Change Management', 'Asset management', 'Organizational chart', 'Standard operating procedure', 'C', 2, '2020-02-03 13:35:38', '1079648759', 0, 'objective'),
(9, 'Use Of English', '<p>rffrufyhuhbfehrfhOma</p>\r\n', '', '', '', '', '', 'Omang Sunday', 2, '2020-02-22 23:39:35', '1337520988', 0, 'subobjective'),
(10, 'Use Of English', '<p>gkhdskchsdcdvOf</p>\r\n', '', '', '', '', '', 'Mr Ofut', 2, '2020-02-22 23:39:35', '1364540900', 0, 'subobjective'),
(11, 'Use Of English', '<p>yuyfouwfyewf f</p>\r\n', '', '', '', '', '', 'Developer', 2, '2020-02-22 23:39:35', '1063975414', 0, 'subobjective');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`) VALUES
('5d0f5bb361e7a', 'Omg Computer Traning', 10, 2, 2, 5, 'WHAT IS THE MEANING OF COMPUTER', '#OMG', '2019-06-23 11:00:03'),
('5e2b5d1c0daf1', 'Grog', 2, 0, 10, 60, 'gckhvlliulujlihkuh', '#tag', '2020-01-24 21:09:48'),
('5e2b63f0299db', 'Bronze', 5, 0, 5, 60, 'I am Texting', '#b', '2020-01-24 21:38:56'),
('5e2b64612359c', 'Bronze', 10, 0, 5, 60, 'I am Texting', '#b', '2020-01-24 21:40:49'),
('5e2b67d5d8350', 'Mathematics', 10, 0, 10, 60, 'This Question Are To Be Ansered Correctly', '#Math', '2020-01-24 21:55:33'),
('5e2b68f8db7d1', 'English', 10, 0, 10, 60, 'hbfjbv;fjvdfv g bgbjg gxdl ', '#Eng', '2020-01-24 22:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `result` varchar(225) NOT NULL,
  `acm` int(11) NOT NULL,
  `admissionNo` varchar(125) NOT NULL,
  `level` varchar(125) NOT NULL,
  `department` varchar(255) NOT NULL,
  `date_taken` varchar(125) NOT NULL,
  `course_title` varchar(225) NOT NULL,
  `percentage_score` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `fullname`, `result`, `acm`, `admissionNo`, `level`, `department`, `date_taken`, `course_title`, `percentage_score`) VALUES
(8, 'Omang Anna', '10', 0, '16/csc/116', '100', 'Computer Science', '2020-02-24 01:23:49', 'Use Of English', '10%');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `faulcuty` varchar(255) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `last_log_date` varchar(125) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `course_title`, `fullname`, `email`, `phone`, `department`, `faulcuty`, `staff_id`, `last_log_date`, `pin`) VALUES
(2, 'Use Of English', 'Mrs Joy Omang', 'joy@gmail.com', '09067454349', 'Elementry', 'Education', '1399314324', '2020-03-01 17:24:32', 0),
(3, 'Intro To Computer', 'Dr Umoh', 'umoh@gmail.com', '09076588134', 'Computer Science', 'Physical Science', '1210047130', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `star`
--

CREATE TABLE `star` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `rate` int(11) NOT NULL,
  `dt_rated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `star`
--

INSERT INTO `star` (`id`, `id_post`, `ip`, `rate`, `dt_rated`) VALUES
(1, 1, '::1', 5, '2020-02-28 14:13:56'),
(2, 1, '127.0.0.1', 5, '2020-02-28 15:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `admissionNo` varchar(225) NOT NULL,
  `department` varchar(125) NOT NULL,
  `level` varchar(125) NOT NULL,
  `course1` varchar(255) NOT NULL,
  `course2` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmPassword` varchar(125) NOT NULL,
  `pin` int(11) NOT NULL,
  `last_log_date` varchar(255) NOT NULL,
  `in_session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `username`, `email`, `admissionNo`, `department`, `level`, `course1`, `course2`, `password`, `confirmPassword`, `pin`, `last_log_date`, `in_session`) VALUES
(1, 'Omang Anna', 'Anna', 'anna@gmail.com', '16/csc/116', 'Computer Science', '100', 'General Math', 'Use Of English', '1234', '1234', 0, '2020-06-25 13:49:07', 1),
(2, 'ANUEBUNWA HENRY CHINONSO', '', 'henrynonso242@gmail.com', '17/D/Csc/004', 'Computer science', '100', 'Intro Computer', 'General Math', '12345', '12345', 0, '', 0),
(3, 'Joseph Onyebuchi', 'JoeGreat', 'onyestyle@gmail.com', '17/D/CSC/011', 'Electrical and Electronics Engineering', '100', 'General Math', 'Use of English', '12345678', '12345678', 0, '', 0),
(4, 'Godwin Ushie', 'goddyushie', 'goddyushie@gmail.com', '17/D/CSC016', 'Mass Communication', '100', 'General Math', 'Use of English', '123456789', '123456789', 0, '', 0),
(5, 'Marvelous Feme', 'marviefeme', 'marviefeme@gmail.com', '17/D/CSC/007', 'Microbiology', '100', 'General Math', 'Use of English', '012345678', '012345678', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `course_title`, `course_code`, `course_id`, `date_added`, `pin`) VALUES
(2, 'Use Of English', 'ENG1101', '1100168738', '0000-00-00 00:00:00', 0),
(3, 'Intro To Computer', 'ITC1101', '1141768969', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `exam_time` varchar(125) NOT NULL,
  `course_title` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `exam_time`, `course_title`) VALUES
(2, '60', 'Use Of English');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eassy`
--
ALTER TABLE `eassy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_year`
--
ALTER TABLE `level_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `star`
--
ALTER TABLE `star`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eassy`
--
ALTER TABLE `eassy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level_year`
--
ALTER TABLE `level_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `star`
--
ALTER TABLE `star`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
