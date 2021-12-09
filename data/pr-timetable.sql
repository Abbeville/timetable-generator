-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2021 at 10:49 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pr-timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `classname_id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `set_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `classname_id`, `programme_id`, `department_id`, `classroom_id`, `set_status`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 1, 3, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `classnames`
--

CREATE TABLE `classnames` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classnames`
--

INSERT INTO `classnames` (`id`, `name`) VALUES
(1, 'NDI'),
(2, 'NDII'),
(3, 'HNDI'),
(4, 'HNDII'),
(5, 'NDIII'),
(6, 'HNDIII');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_title` varchar(150) NOT NULL,
  `course_code` varchar(150) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_title`, `course_code`, `department_id`) VALUES
(1, 'introduction to computer', 'com111', 1),
(2, 'use of english', 'gns101', 4),
(3, 'OO Java', 'com121', 1),
(4, 'Introduction to Digital Electronics', 'com112', 1),
(5, 'Basic Hardware Maintenance', 'com123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `days_of_the_week`
--

CREATE TABLE `days_of_the_week` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `short_form` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `days_of_the_week`
--

INSERT INTO `days_of_the_week` (`id`, `name`, `short_form`) VALUES
(1, 'Monday', 'mon'),
(2, 'Tuesday', 'tue'),
(3, 'Wednesday', 'wed'),
(4, 'Thursday', 'thur'),
(5, 'Friday', 'fri'),
(6, 'Saturday', 'sat'),
(7, 'Sunday', 'sun');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `faculty_id`) VALUES
(1, 'COMPUTER SCIENCE', 1),
(2, 'MECHANICAL ', 2),
(3, 'SLT', 1),
(4, 'GNS', 4),
(5, 'geology', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`) VALUES
(1, 'FASSA'),
(2, 'FENG'),
(3, 'FFMS'),
(4, 'FBCS'),
(5, 'FESSA');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `day_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `class_id`, `course_id`, `lecturer_id`, `day_id`, `period_id`, `created_at`) VALUES
(4, 1, 4, 3, 1, 2, NULL),
(5, 1, 1, 5, 2, 2, NULL),
(6, 1, 1, 3, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `department` int(150) NOT NULL,
  `sex` varchar(150) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `name`, `phone`, `email`, `department`, `sex`, `username`, `password`) VALUES
(1, 'Dr MRS BABALOLA', '0808383899', 'babalola@gmail.com', 1, 'female', NULL, NULL),
(3, 'Mrs Ganiyu', '099283909', 'ganiyu@hotmail.com', 1, 'male', NULL, NULL),
(4, 'Dr Phillips', '0808389493', 'phillips@gmail.com', 5, 'male', NULL, NULL),
(5, 'Mr Ajanlekoko Bashiru', '0908898988', 'aja@nlekoko.com', 1, 'male', NULL, NULL),
(6, 'Mr Egbedokun', '0903989o88', 'egbe@gmail.com', 1, 'male', NULL, NULL),
(7, 'Mrs Oni', '0909383847', 'oni@gmail.com', 1, 'female', 'oni', 'oni');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_room`
--

CREATE TABLE `lecture_room` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `capacity` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture_room`
--

INSERT INTO `lecture_room` (`id`, `name`, `capacity`) VALUES
(1, 'ORISUN LECTURE ROOM', '700'),
(2, 'SEWAGE I', '800'),
(3, 'SEWAGE II', '800'),
(4, 'SEWAGE III', '800'),
(5, 'ETF', '1000'),
(6, 'CEC', '550');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `id` int(11) NOT NULL,
  `notice_title` varchar(150) NOT NULL,
  `notice` text NOT NULL,
  `create_timestamp` timestamp NOT NULL,
  `end_timestamp` timestamp NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`id`, `notice_title`, `notice`, `create_timestamp`, `end_timestamp`, `status`) VALUES
(1, 'First Notice Board', 'We got no news for you, this is just Sakamanje...', '2021-07-27 23:00:00', '2021-09-28 23:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` int(11) NOT NULL,
  `time` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `time`) VALUES
(1, '8:00am - 10:00am'),
(2, '10:00am - 12:00pm'),
(3, '12:00pm - 2:00pm'),
(4, '2:00pm - 4:00pm'),
(5, '4:00pm - 6:00pm');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `name`) VALUES
(1, 'FT'),
(2, 'FT&DPP'),
(3, 'PT');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `matric` varchar(150) NOT NULL,
  `department_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `matric`, `department_id`, `class_id`, `username`, `password`, `created_at`) VALUES
(1, 'Dominic Keith', 'Ciaran Odom', '201090939', 1, 2, 'abbeville', 'userpass', '2021-08-13 08:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'captain');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classnames`
--
ALTER TABLE `classnames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days_of_the_week`
--
ALTER TABLE `days_of_the_week`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture_room`
--
ALTER TABLE `lecture_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classnames`
--
ALTER TABLE `classnames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `days_of_the_week`
--
ALTER TABLE `days_of_the_week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lecture_room`
--
ALTER TABLE `lecture_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
