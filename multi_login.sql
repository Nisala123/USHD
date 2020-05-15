-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 05:43 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `dep` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep`) VALUES
(1, 'ICT'),
(2, 'EET'),
(3, 'MTT'),
(4, 'BPT'),
(5, 'FDT');

-- --------------------------------------------------------

--
-- Table structure for table `exam_d`
--

CREATE TABLE `exam_d` (
  `dep` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_d`
--

INSERT INTO `exam_d` (`dep`, `date`) VALUES
('MTT', '2019-04-28 22:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `lec_notes`
--

CREATE TABLE `lec_notes` (
  `sub_code` varchar(20) NOT NULL,
  `sub_name` varchar(80) NOT NULL,
  `dep` varchar(20) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lec_notes`
--

INSERT INTO `lec_notes` (`sub_code`, `sub_name`, `dep`, `sem`, `year`, `date`) VALUES
('ICT 2305', 'Computational Mathematics', 'ICT', '2nd', '2nd', '2019-04-28 21:50:53'),
('ICT 2206', 'Software System Design', 'BPT', '1st', '2nd', '2019-05-10 16:26:48'),
('ICT 2308', 'Database Systems', 'ICT', '2nd', '2nd', '2019-05-24 09:08:09'),
('ICT 2207', 'Software System Design', 'ICT', '2nd', '2nd', '2019-05-24 09:11:34'),
('ICT 2206', 'Multimedia and Web Technology', 'ICT', '2nd', '2nd', '2019-05-24 09:17:51'),
('ICT 2305', 'Software System Design', 'BPT', '1st', '2nd', '2019-12-14 22:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `dep` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`dep`, `date`) VALUES
('BPT', '2019-04-28 22:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `sub_code`
--

CREATE TABLE `sub_code` (
  `id` int(100) NOT NULL,
  `dep_id` int(10) NOT NULL,
  `s_code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_code`
--

INSERT INTO `sub_code` (`id`, `dep_id`, `s_code`) VALUES
(1, 1, 'ICT 2206'),
(2, 1, 'ICT 2207'),
(3, 3, 'MTT 3204');

-- --------------------------------------------------------

--
-- Table structure for table `ti_tables`
--

CREATE TABLE `ti_tables` (
  `dep` varchar(20) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ti_tables`
--

INSERT INTO `ti_tables` (`dep`, `sem`, `year`, `date`) VALUES
('ICT', '1st', '1st', '2019-04-28 22:00:13'),
('BPT', '1st', '1st', '2019-04-28 22:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(1, 'Nisala', 'nisalanayanajith123@gmail.com', 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'alice', 'alice111@gmail.com', 'lecturer', '698d51a19d8a121ce581499d7b701668'),
(5, 'john', 'john@gmail.com', 'student', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(8, 'mala', 'mala@gmail.com', 'student', 'ODg4OA=='),
(9, 'gadi', 'gadi123@gmail.com', 'Student', 'NDMyMQ=='),
(11, 'sunil', 's@gmail.com', 'Student', 'MzMz'),
(12, 'nimal', 'nimal@gmail.com', 'student', 'bmltYWw='),
(13, 'kamal', 'kamal@gmail.com', 'Student', 'a2FtYWw='),
(14, 'Malith', 'malith@gmail.com', 'lecturer', 'bWFsaXRo'),
(15, 'redhat', 'redhat@gmail.com', 'lecturer', 'cmVk'),
(16, 'nisala', 'nisalanayanajith123@gmail.com', 'admin', 'MTIzNDU=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_d`
--
ALTER TABLE `exam_d`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `lec_notes`
--
ALTER TABLE `lec_notes`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `sub_code`
--
ALTER TABLE `sub_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ti_tables`
--
ALTER TABLE `ti_tables`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
