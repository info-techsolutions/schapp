-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2017 at 05:56 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `z_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_arm`
--

CREATE TABLE `z_tb_arm` (
  `arm_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_arm`
--

INSERT INTO `z_tb_arm` (`arm_id`, `name`) VALUES
(1, 'a'),
(2, 'X');

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_class`
--

CREATE TABLE `z_tb_class` (
  `class_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_class`
--

INSERT INTO `z_tb_class` (`class_id`, `name`) VALUES
(1, 'SSS 1');

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_grade`
--

CREATE TABLE `z_tb_grade` (
  `grade_id` int(11) NOT NULL,
  `person_number` varchar(50) NOT NULL,
  `session_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `arm_id` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `grade` char(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_grade`
--

INSERT INTO `z_tb_grade` (`grade_id`, `person_number`, `session_id`, `term_id`, `test_id`, `subject_id`, `class_id`, `arm_id`, `score`, `grade`, `created_at`, `updated_at`) VALUES
(1, 'EDU/2017/001', 1, 1, 1, 2, 1, 1, 10, '', '2017-03-03 21:10:28', '2017-03-03 21:10:28'),
(2, 'EDU/2017/001', 1, 1, 1, 3, 1, 1, 10, '', '2017-03-03 21:10:48', '2017-03-03 21:10:48'),
(3, 'EDU/2017/001', 1, 1, 1, 4, 1, 1, 10, '', '2017-03-03 21:11:12', '2017-03-03 21:11:12'),
(4, 'EDU/2017/001', 1, 1, 1, 5, 1, 1, 10, '', '2017-03-03 21:11:30', '2017-03-03 21:11:30'),
(5, 'EDU/2017/001', 1, 1, 2, 2, 1, 1, 11, '', '2017-03-03 21:12:22', '2017-03-15 14:22:22'),
(6, 'EDU/2017/001', 1, 1, 2, 4, 1, 1, 15, '', '2017-03-03 21:13:14', '2017-03-03 21:13:14'),
(7, 'EDU/2017/001', 1, 1, 2, 5, 1, 1, 15, '', '2017-03-03 21:13:44', '2017-03-03 21:13:44'),
(8, 'EDU/2017/001', 1, 1, 2, 3, 1, 1, 15, '', '2017-03-03 21:35:41', '2017-03-03 21:35:41'),
(9, 'EDU/2017/49', 1, 1, 1, 2, 1, 1, 13, '', '2017-03-06 09:35:55', '2017-03-06 09:35:55'),
(10, 'EDU/2017/49', 1, 1, 1, 3, 1, 1, 13, '', '2017-03-06 09:36:33', '2017-03-06 09:36:33'),
(11, 'EDU/2017/49', 1, 1, 1, 4, 1, 1, 13, '', '2017-03-06 09:36:53', '2017-03-06 09:36:53'),
(12, 'EDU/2017/49', 1, 1, 1, 5, 1, 1, 13, '', '2017-03-06 09:37:12', '2017-03-06 09:37:12'),
(13, 'EDU/2017/49', 1, 1, 2, 2, 1, 1, 10, '', '2017-03-06 09:41:44', '2017-03-15 16:16:53'),
(14, 'EDU/2017/49', 1, 1, 2, 3, 1, 1, 11, '', '2017-03-06 09:44:27', '2017-03-06 09:44:27'),
(15, 'EDU/2017/49', 1, 1, 2, 4, 1, 1, 11, '', '2017-03-06 09:44:48', '2017-03-06 09:44:48'),
(16, 'EDU/2017/49', 1, 1, 2, 5, 1, 1, 11, '', '2017-03-06 09:45:22', '2017-03-06 09:45:22'),
(17, 'EDU/2017/002', 1, 1, 1, 2, 1, 1, 10, '', '2017-03-07 14:01:55', '2017-03-07 14:01:55'),
(18, 'EDU/2017/002', 1, 1, 1, 3, 1, 1, 10, '', '2017-03-08 12:50:15', '2017-03-08 12:50:15'),
(19, 'EDU/2017/002', 1, 1, 1, 4, 1, 1, 10, '', '2017-03-19 22:23:21', '2017-03-19 22:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_gradesetup`
--

CREATE TABLE `z_tb_gradesetup` (
  `gradesetup_id` int(11) NOT NULL,
  `froms` varchar(100) NOT NULL,
  `tos` varchar(100) NOT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_gradesetup`
--

INSERT INTO `z_tb_gradesetup` (`gradesetup_id`, `froms`, `tos`, `grade`, `remark`) VALUES
(1, '100', '70', 'A', 'Excellent'),
(2, '69', '60', 'B', 'Very Good'),
(3, '59', '50', 'C', 'Good'),
(4, '49', '45', 'D', 'Fair');

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_payment_status`
--

CREATE TABLE `z_tb_payment_status` (
  `payment_status_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `person_number` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_payment_status`
--

INSERT INTO `z_tb_payment_status` (`payment_status_id`, `session_id`, `term_id`, `person_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'EDU/2017/001', 'HALF', '2017-03-14 11:04:44', '2017-03-15 11:07:25'),
(2, 1, 1, 'EDU/2017/002', 'FULL', '2017-03-14 11:18:29', '2017-03-14 11:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_permission`
--

CREATE TABLE `z_tb_permission` (
  `permission_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_person`
--

CREATE TABLE `z_tb_person` (
  `person_id` int(11) NOT NULL,
  `person_number` varchar(30) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `arm_id` int(11) DEFAULT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `profile_photo_url` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `typ` varchar(20) DEFAULT NULL,
  `sponsor_id` int(11) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_person`
--

INSERT INTO `z_tb_person` (`person_id`, `person_number`, `password`, `class_id`, `arm_id`, `firstname`, `lastname`, `phone`, `gender`, `profile_photo_url`, `address`, `typ`, `sponsor_id`, `payment_status`, `created_at`) VALUES
(1, 'EDU/2017/001', NULL, 1, 1, 'yomi', 'ogunfayo', '0904444422', 'Male', '1128584030.png', 'Ogunfayo estate', 'STUDENT', 12, 'HALF', '2017-02-25 16:56:50'),
(2, 'EDU/2017/49', NULL, 1, 2, 'ola', 'harry', '080474747', 'Female', '202075312.jpeg', 'Memudu Street, Alapere, Ketu, Lagos.', 'STUDENT', 13, NULL, '2017-02-28 11:57:24'),
(3, 'EDU/2017/002', NULL, 1, 1, 'union', 'ola', '09044445333', 'Male', 'trasac.png', '2 lekki expressway,lagos', 'STUDENT', 13, 'FULL', '2017-03-07 14:01:38'),
(5, 'uni', 'uni', NULL, NULL, 'union', 'eghosa', '7039660244', 'Male', 'timetricpayed.png', 'We love to see', NULL, NULL, NULL, '2017-03-09 10:41:31'),
(6, 'lovina', 'lovina', NULL, NULL, 'michael', 'inkton', '09044444222', 'Male', 'temitopeadebayo_1.png', 'We are the world', NULL, NULL, NULL, '2017-03-09 11:03:38'),
(7, 'admin', 'admin', NULL, NULL, 'admin', 'admin', '0904444', 'Female', 'Test2.png', 'We are the world', NULL, NULL, NULL, '2017-03-09 11:15:01'),
(8, 'root', 'root', NULL, NULL, 'root', 'root', '0903333', 'Male', 'root.png', 'Eputu', NULL, NULL, NULL, '2017-03-09 12:13:36'),
(12, 'esther', 'uni', NULL, NULL, 'lovi', 'ogunfayo', '0906605050', 'Male', 'student.png', 'lekki', NULL, NULL, NULL, '2017-03-14 09:19:48'),
(13, 'ola', 'lovina', NULL, NULL, 'james', 'ola', '0806686969', 'Male', 'transaction_confirmed_1.png', 'metheiee', NULL, NULL, NULL, '2017-03-14 09:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_report`
--

CREATE TABLE `z_tb_report` (
  `report_id` int(11) NOT NULL,
  `person_number` varchar(25) NOT NULL,
  `session_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `test_one` int(11) DEFAULT NULL,
  `test_two` int(11) DEFAULT NULL,
  `test_three` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_report`
--

INSERT INTO `z_tb_report` (`report_id`, `person_number`, `session_id`, `term_id`, `class_id`, `subject_id`, `test_one`, `test_two`, `test_three`, `total`) VALUES
(1, 'EDU/2017/001', 1, 1, 1, 2, 10, 15, NULL, NULL),
(2, 'EDU/2017/001', 1, 1, 1, 3, 10, 15, NULL, NULL),
(3, 'EDU/2017/001', 1, 1, 1, 4, 10, 15, NULL, NULL),
(4, 'EDU/2017/001', 1, 1, 1, 5, 10, 15, NULL, NULL),
(5, 'EDU/2017/002', 1, 1, 1, 2, 10, NULL, NULL, NULL),
(6, 'EDU/2017/002', 1, 1, 1, 3, 10, NULL, NULL, NULL),
(7, 'EDU/2017/49', 1, 1, 1, 2, 13, 11, NULL, NULL),
(8, 'EDU/2017/49', 1, 1, 1, 3, 13, 11, NULL, NULL),
(9, 'EDU/2017/49', 1, 1, 1, 4, 13, 11, NULL, NULL),
(10, 'EDU/2017/49', 1, 1, 1, 5, 13, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_role`
--

CREATE TABLE `z_tb_role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_role`
--

INSERT INTO `z_tb_role` (`role_id`, `name`, `description`) VALUES
(1, 'ADMIN', 'manages all things except superadmin'),
(2, 'STAFF', 'Manages all things pertaining to students'),
(3, 'SUPERADMIN', 'Manages everything about the school'),
(4, 'PARENT', 'things that pertain to parents');

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_role_permission`
--

CREATE TABLE `z_tb_role_permission` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_session`
--

CREATE TABLE `z_tb_session` (
  `session_id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `times_opened` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_session`
--

INSERT INTO `z_tb_session` (`session_id`, `year`, `times_opened`) VALUES
(1, '2016/2017', 54),
(2, '2015/2016', 50),
(3, '2017/2018', 50);

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_subjects`
--

CREATE TABLE `z_tb_subjects` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_subjects`
--

INSERT INTO `z_tb_subjects` (`subject_id`, `name`) VALUES
(2, 'English languages'),
(3, 'Mathematics'),
(4, 'Chemistry'),
(5, 'Yoruba');

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_term`
--

CREATE TABLE `z_tb_term` (
  `term_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_term`
--

INSERT INTO `z_tb_term` (`term_id`, `name`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Third');

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_test`
--

CREATE TABLE `z_tb_test` (
  `test_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_test`
--

INSERT INTO `z_tb_test` (`test_id`, `name`) VALUES
(1, 'Unit Test1'),
(2, 'Unit Test2');

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_users`
--

CREATE TABLE `z_tb_users` (
  `user_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `z_tb_user_role`
--

CREATE TABLE `z_tb_user_role` (
  `user_role_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `z_tb_user_role`
--

INSERT INTO `z_tb_user_role` (`user_role_id`, `person_id`, `role_id`) VALUES
(1, 5, 2),
(2, 6, 4),
(3, 7, 1),
(4, 8, 3),
(8, 12, 4),
(9, 13, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `z_tb_arm`
--
ALTER TABLE `z_tb_arm`
  ADD PRIMARY KEY (`arm_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `z_tb_class`
--
ALTER TABLE `z_tb_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `z_tb_grade`
--
ALTER TABLE `z_tb_grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `z_tb_gradesetup`
--
ALTER TABLE `z_tb_gradesetup`
  ADD PRIMARY KEY (`gradesetup_id`);

--
-- Indexes for table `z_tb_payment_status`
--
ALTER TABLE `z_tb_payment_status`
  ADD PRIMARY KEY (`payment_status_id`);

--
-- Indexes for table `z_tb_permission`
--
ALTER TABLE `z_tb_permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `z_tb_person`
--
ALTER TABLE `z_tb_person`
  ADD PRIMARY KEY (`person_id`),
  ADD UNIQUE KEY `person_number` (`person_number`);

--
-- Indexes for table `z_tb_report`
--
ALTER TABLE `z_tb_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `z_tb_role`
--
ALTER TABLE `z_tb_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `z_tb_role_permission`
--
ALTER TABLE `z_tb_role_permission`
  ADD KEY `role_id` (`role_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `z_tb_session`
--
ALTER TABLE `z_tb_session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `z_tb_subjects`
--
ALTER TABLE `z_tb_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `z_tb_term`
--
ALTER TABLE `z_tb_term`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `z_tb_test`
--
ALTER TABLE `z_tb_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `z_tb_users`
--
ALTER TABLE `z_tb_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `person_id` (`person_id`);

--
-- Indexes for table `z_tb_user_role`
--
ALTER TABLE `z_tb_user_role`
  ADD PRIMARY KEY (`user_role_id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `z_tb_arm`
--
ALTER TABLE `z_tb_arm`
  MODIFY `arm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `z_tb_class`
--
ALTER TABLE `z_tb_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `z_tb_grade`
--
ALTER TABLE `z_tb_grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `z_tb_gradesetup`
--
ALTER TABLE `z_tb_gradesetup`
  MODIFY `gradesetup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `z_tb_payment_status`
--
ALTER TABLE `z_tb_payment_status`
  MODIFY `payment_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `z_tb_permission`
--
ALTER TABLE `z_tb_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `z_tb_person`
--
ALTER TABLE `z_tb_person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `z_tb_report`
--
ALTER TABLE `z_tb_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `z_tb_role`
--
ALTER TABLE `z_tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `z_tb_session`
--
ALTER TABLE `z_tb_session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `z_tb_subjects`
--
ALTER TABLE `z_tb_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `z_tb_term`
--
ALTER TABLE `z_tb_term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `z_tb_test`
--
ALTER TABLE `z_tb_test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `z_tb_users`
--
ALTER TABLE `z_tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `z_tb_user_role`
--
ALTER TABLE `z_tb_user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `z_tb_role_permission`
--
ALTER TABLE `z_tb_role_permission`
  ADD CONSTRAINT `z_tb_role_permission_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `z_tb_role` (`role_id`),
  ADD CONSTRAINT `z_tb_role_permission_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `z_tb_permission` (`permission_id`);

--
-- Constraints for table `z_tb_user_role`
--
ALTER TABLE `z_tb_user_role`
  ADD CONSTRAINT `z_tb_user_role_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `z_tb_person` (`person_id`),
  ADD CONSTRAINT `z_tb_user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `z_tb_role` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
