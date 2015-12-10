-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2015 at 01:59 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denr_document_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `compliance_type`
--

CREATE TABLE `compliance_type` (
  `compliance_type_id` int(11) NOT NULL,
  `compliance_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compliance_type`
--

INSERT INTO `compliance_type` (`compliance_type_id`, `compliance_type`) VALUES
(1, 'Rush'),
(2, 'Priority'),
(3, 'Routinary'),
(4, 'Cases');

-- --------------------------------------------------------

--
-- Stand-in structure for view `courier_credentials`
--
CREATE TABLE `courier_credentials` (
`user_id` int(11)
,`user_name` varchar(30)
,`user_type_id` int(11)
,`first_name` varchar(45)
,`last_name` varchar(45)
,`middle_name` varchar(45)
,`contact_number` varchar(45)
,`address` varchar(45)
,`email` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(11) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `sender` varchar(45) NOT NULL,
  `instructions` text NOT NULL,
  `status_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document_id`, `subject`, `sender`, `instructions`, `status_id`) VALUES
(15120001, 'sada', 'sadas', 'asdasd', 0),
(15120002, 'test', 'test', 'test', 1),
(15120003, 'test', 'test', 'test', 1),
(15120004, 'asdsad', 'w', 'sad', 1),
(15120005, 'asdsd', 'asd', 'sadasd', 1),
(15120006, 'asd', 'asd', 'asd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_date`
--

CREATE TABLE `document_date` (
  `document_date_id` int(11) NOT NULL,
  `date_received` date NOT NULL,
  `followUp_date` date NOT NULL,
  `due_date` varchar(11) NOT NULL,
  `released_date` date NOT NULL,
  `document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document_date`
--

INSERT INTO `document_date` (`document_date_id`, `date_received`, `followUp_date`, `due_date`, `released_date`, `document_id`) VALUES
(62, '2015-12-07', '0000-00-00', '2015-12-09', '2015-12-08', 15120001),
(63, '2015-12-07', '0000-00-00', '2015-12-09', '0000-00-00', 15120002),
(64, '2015-12-08', '0000-00-00', '2015-12-10', '0000-00-00', 15120003),
(65, '2015-12-08', '0000-00-00', 'No due date', '0000-00-00', 15120004),
(66, '2015-12-08', '2015-12-08', '2015-12-10', '0000-00-00', 15120005),
(67, '2015-12-08', '0000-00-00', 'No due date', '0000-00-00', 15120006);

-- --------------------------------------------------------

--
-- Table structure for table `document_details`
--

CREATE TABLE `document_details` (
  `document_details_id` int(11) NOT NULL,
  `compliance_type_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document_details`
--

INSERT INTO `document_details` (`document_details_id`, `compliance_type_id`, `office_id`, `document_id`) VALUES
(343, 1, 1, 15120001),
(344, 1, 2, 15120001),
(345, 2, 3, 15120002),
(346, 2, 4, 15120002),
(347, 2, 5, 15120002),
(348, 2, 6, 15120002),
(349, 2, 7, 15120002),
(350, 2, 8, 15120002),
(351, 2, 13, 15120002),
(355, 1, 13, 15120001),
(356, 1, 6, 15120003),
(357, 1, 7, 15120003),
(358, 1, 9, 15120003),
(359, 1, 13, 15120003),
(360, 4, 9, 15120004),
(361, 1, 1, 15120005),
(362, 4, 3, 15120006),
(363, 1, 2, 15120005),
(364, 1, 3, 15120005),
(365, 1, 6, 15120005),
(366, 1, 8, 15120005),
(367, 1, 13, 15120005);

-- --------------------------------------------------------

--
-- Table structure for table `document_time`
--

CREATE TABLE `document_time` (
  `document_time_id` int(11) NOT NULL,
  `time_received` varchar(20) NOT NULL,
  `document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document_time`
--

INSERT INTO `document_time` (`document_time_id`, `time_received`, `document_id`) VALUES
(50, '03:00', 15120001),
(51, '03:00 PM', 15120002),
(52, '03:00 PM', 15120003),
(53, '03:00 PM', 15120004),
(54, '03:00 PM', 15120005),
(55, '03:00 PM', 15120006);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `office_id` int(11) NOT NULL,
  `office` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`office_id`, `office`) VALUES
(1, 'ARD MS'),
(2, 'PMD'),
(3, 'Legal Division'),
(4, 'Finance Division'),
(5, 'Administrative Division'),
(6, 'ARD TS'),
(7, 'CDD'),
(8, 'Enforcement Division'),
(9, 'LPD'),
(10, 'Surveys & Mapping Division'),
(11, 'RPAO'),
(12, 'INREMP'),
(13, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `other_id` int(11) NOT NULL,
  `other` varchar(45) NOT NULL,
  `document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`other_id`, `other`, `document_id`) VALUES
(3, 'CENRO', 15120001),
(4, 'PENRO', 15120003),
(5, 'CENRO', 15120005);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` tinyint(4) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'pending'),
(2, 'follow up'),
(3, 'due'),
(4, 'acted');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(512) NOT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `user_name`, `password`, `user_type_id`) VALUES
(1, 'admin', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1),
(2, 'shun', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 2),
(7, 'xan', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `contact_number` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `first_name`, `last_name`, `middle_name`, `contact_number`, `address`, `email`) VALUES
(1, 'Nikki Monique', 'Daug', 'admin', '09352030067', 'admin', 'admin@admin.com'),
(2, 'Daryla', 'Cale', 'Cuaresma', '09090909090', 'Campo', 'shun@gmail.com'),
(7, 'Xan', 'Gutierrez', 'Fabre', '09352030067', 'cdo', 'xan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type`) VALUES
(1, 'admin'),
(2, 'courier');

-- --------------------------------------------------------

--
-- Structure for view `courier_credentials`
--
DROP TABLE IF EXISTS `courier_credentials`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `courier_credentials`  AS  select `a`.`user_id` AS `user_id`,`a`.`user_name` AS `user_name`,`a`.`user_type_id` AS `user_type_id`,`b`.`first_name` AS `first_name`,`b`.`last_name` AS `last_name`,`b`.`middle_name` AS `middle_name`,`b`.`contact_number` AS `contact_number`,`b`.`address` AS `address`,`b`.`email` AS `email` from (`user_account` `a` join `user_profile` `b`) where (`a`.`user_id` = `b`.`user_id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compliance_type`
--
ALTER TABLE `compliance_type`
  ADD PRIMARY KEY (`compliance_type_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `document_date`
--
ALTER TABLE `document_date`
  ADD PRIMARY KEY (`document_date_id`);

--
-- Indexes for table `document_details`
--
ALTER TABLE `document_details`
  ADD PRIMARY KEY (`document_details_id`);

--
-- Indexes for table `document_time`
--
ALTER TABLE `document_time`
  ADD PRIMARY KEY (`document_time_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`other_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compliance_type`
--
ALTER TABLE `compliance_type`
  MODIFY `compliance_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15120007;
--
-- AUTO_INCREMENT for table `document_date`
--
ALTER TABLE `document_date`
  MODIFY `document_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `document_details`
--
ALTER TABLE `document_details`
  MODIFY `document_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;
--
-- AUTO_INCREMENT for table `document_time`
--
ALTER TABLE `document_time`
  MODIFY `document_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `other_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
