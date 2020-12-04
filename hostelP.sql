-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2019 at 12:54 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostelP`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `email` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`email`, `admin_name`, `admin_id`, `password`) VALUES
('gaurav_b170383cs@gmail.com', 'gaurav', 'g', 'g'),
('rishav_b170562cs@gmail.com', 'rishav', 'b', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `APPLICATION_FORM`
--

CREATE TABLE `APPLICATION_FORM` (
  `serial_no` int(10) NOT NULL,
  `hostel_choice` varchar(50) NOT NULL,
  `applicant_roll` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `FEES`
--

CREATE TABLE `FEES` (
  `rollNo` varchar(50) NOT NULL,
  `admin_id` varchar(50) DEFAULT NULL,
  `fees` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `HOSTEL`
--

CREATE TABLE `HOSTEL` (
  `hostel_name` varchar(50) NOT NULL,
  `admin_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `MEMBERS`
--

CREATE TABLE `MEMBERS` (
  `member_roll` varchar(50) NOT NULL,
  `serial_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ROOM`
--

CREATE TABLE `ROOM` (
  `room_no` int(10) NOT NULL,
  `hostel_name` varchar(50) NOT NULL,
  `flag_occupied` tinyint(1) NOT NULL,
  `admin_id` varchar(50) DEFAULT NULL,
  `serial_no` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `first name` varchar(50) NOT NULL,
  `middle name` varchar(50) DEFAULT NULL,
  `last name` varchar(50) DEFAULT NULL,
  `department` varchar(50) NOT NULL,
  `rollNo` varchar(50) NOT NULL,
  `phone no` int(50) NOT NULL,
  `year` int(50) NOT NULL,
  `emailID` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`first name`, `middle name`, `last name`, `department`, `rollNo`, `phone no`, `year`, `emailID`, `password`) VALUES
('rishav', 's', 'raj', 'cse', 'b', 77590, 2017, 'rishav_b170562cs@nitc.ac.in', 'b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `APPLICATION_FORM`
--
ALTER TABLE `APPLICATION_FORM`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `FEES`
--
ALTER TABLE `FEES`
  ADD PRIMARY KEY (`rollNo`);

--
-- Indexes for table `HOSTEL`
--
ALTER TABLE `HOSTEL`
  ADD PRIMARY KEY (`hostel_name`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `MEMBERS`
--
ALTER TABLE `MEMBERS`
  ADD PRIMARY KEY (`member_roll`);

--
-- Indexes for table `ROOM`
--
ALTER TABLE `ROOM`
  ADD PRIMARY KEY (`room_no`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`rollNo`),
  ADD UNIQUE KEY `emailID` (`emailID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `HOSTEL`
--
ALTER TABLE `HOSTEL`
  ADD CONSTRAINT `HOSTEL_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `ADMIN` (`admin_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
