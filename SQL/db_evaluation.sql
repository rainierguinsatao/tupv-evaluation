-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 11:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `mi` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `type` text NOT NULL,
  `faculty_type` text NOT NULL,
  `dept` text NOT NULL,
  `course` text NOT NULL,
  `switch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `first_name`, `last_name`, `mi`, `email`, `password`, `type`, `faculty_type`, `dept`, `course`, `switch`) VALUES
(6, 'admin', 'admin', '', 'admin@tupv.edu.ph', 'admin', 'admin', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses_tbl`
--

CREATE TABLE `courses_tbl` (
  `id` int(11) NOT NULL,
  `courseName` text NOT NULL,
  `acro` text NOT NULL,
  `dept` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `froms_tbl`
--

CREATE TABLE `froms_tbl` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `title` text NOT NULL,
  `type` text NOT NULL,
  `qid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rate_score_tbl`
--

CREATE TABLE `rate_score_tbl` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `name` text NOT NULL,
  `kind` text NOT NULL,
  `course` text NOT NULL,
  `term` text NOT NULL,
  `sy` text NOT NULL,
  `qid` text NOT NULL,
  `tits` text NOT NULL,
  `faculty` text NOT NULL,
  `score` int(11) NOT NULL,
  `comms` text NOT NULL,
  `nagrateid` int(11) NOT NULL,
  `gnrateid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rate_score_tbl2`
--

CREATE TABLE `rate_score_tbl2` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `name` text NOT NULL,
  `kind` text NOT NULL,
  `course` text NOT NULL,
  `term` text NOT NULL,
  `sy` text NOT NULL,
  `qid` text NOT NULL,
  `tits` text NOT NULL,
  `faculty` text NOT NULL,
  `score` int(11) NOT NULL,
  `comms` text NOT NULL,
  `nagrateid` int(11) NOT NULL,
  `gnrateid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `froms_tbl`
--
ALTER TABLE `froms_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_score_tbl`
--
ALTER TABLE `rate_score_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_score_tbl2`
--
ALTER TABLE `rate_score_tbl2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `froms_tbl`
--
ALTER TABLE `froms_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate_score_tbl`
--
ALTER TABLE `rate_score_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate_score_tbl2`
--
ALTER TABLE `rate_score_tbl2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
