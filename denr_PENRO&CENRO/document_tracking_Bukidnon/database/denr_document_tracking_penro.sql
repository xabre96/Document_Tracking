-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2015 at 08:28 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denr_document_tracking_penro`
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
  `subject` text NOT NULL,
  `sender` varchar(45) NOT NULL,
  `instructions` text NOT NULL,
  `status_id` tinyint(4) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document_id`, `subject`, `sender`, `instructions`, `status_id`, `address`) VALUES
(15120001, 'asd2', 'asd2', 'asd2', 1, 'asd2'),
(15120002, 'asd', 'asd', 'asd', 0, 'asd');

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
(1, '2015-12-15', '2015-12-15', '2015-12-15', '0000-00-00', 15120001),
(2, '2015-12-15', '2015-12-15', '2015-12-17', '2015-12-15', 15120002);

-- --------------------------------------------------------

--
-- Table structure for table `document_details`
--

CREATE TABLE `document_details` (
  `document_details_id` int(11) NOT NULL,
  `compliance_type_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document_details`
--

INSERT INTO `document_details` (`document_details_id`, `compliance_type_id`, `document_id`) VALUES
(1, 1, 15120001),
(2, 1, 15120002);

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
(1, '1:15 p.m.', 15120001),
(2, '2:21 p.m.', 15120002);

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
  `other` text NOT NULL,
  `document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`other_id`, `other`, `document_id`) VALUES
(1, 'asdfghi', 15120002),
(2, 'asdasdas2', 15120001);

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
(1, 'ORD', '1788e2f9f6528276c4127611e144cd6ef3fae94417a8f03d0bc6f337bbe848c74f908f912f3773e191d2103e5d99ea04ab2de4d21158260fb158f836db3f073b', 1),
(2, 'HEA', '7fbf94298c2bdcf633de487a9e5352adbbc9ba998c974964794bc1739fa23f696a2d5e76760e477861977f8353a0a817ab73eee76f22df231d352a75c2e3d342', 1),
(3, 'ICT', '6a6a10989844d8d10afbd71d5660ade5d0357fa9c528232e6cba49dda6b375203212b57d85a768094d5302fa08abc6fda11d031e92caa33e7feed108133869f9', 1),
(4, 'ARD_MS', 'd84897ff0e23285f53d17bf4df15c60273a0e8bf6caaa9c9e5a9a223274690dec51f1746729f9c5b82ae735d81a4b6bb0a8a80ed5c03a29c2209d11d1a6daf41', 3),
(5, 'ARD_TS', '7620e8d53ed6a3ece3a7afe0c866278223b9a360cd6e8dbad63f7fe47021a4f04c7281c1ed39945088f8b0e403220fd4dd85e6b8f48078074ca76ec4ced31601', 3),
(6, 'RD', '992c8a0c6d5ea6bd4f00d60d6d61b58d840986c2b08d0e8fa24483762c8af0af874962ac3f7319932347d8956e927b97f9a921bc222e9c26a9230edec19045c1', 3),
(7, 'MSHEA', '4488b218715f035f5a9c665987feebd11b086902ef117c0c81735ccc22cc5d470e632c6c075c94bf84b5f84269d7af63d2561e4b80c2a27e241d54e75bacebc6', 3),
(8, 'TSHEA', '8f77a9571b3c367936645e3a805bb7862d2407112bd0d8f5fd67cb099ab54a8589fafe1d2ea1a0ce1c41fef601d843b0e7ba5a7d91c6abcc0875826912dc405f', 3),
(9, 'ADMIN', '52ae409b0d7abe1d1d39a5095fd5739e4a2666c670e8105e3f2c7a24f902467a4c18bb8c10e16deb2835f47dc19ed5704fcaa5639d2737ca313386b84c14995d', 2),
(10, 'LEGAL', '52ae409b0d7abe1d1d39a5095fd5739e4a2666c670e8105e3f2c7a24f902467a4c18bb8c10e16deb2835f47dc19ed5704fcaa5639d2737ca313386b84c14995d', 2),
(11, 'PMD', '52ae409b0d7abe1d1d39a5095fd5739e4a2666c670e8105e3f2c7a24f902467a4c18bb8c10e16deb2835f47dc19ed5704fcaa5639d2737ca313386b84c14995d', 2),
(12, 'FINANCE', '52ae409b0d7abe1d1d39a5095fd5739e4a2666c670e8105e3f2c7a24f902467a4c18bb8c10e16deb2835f47dc19ed5704fcaa5639d2737ca313386b84c14995d', 2),
(13, 'CDD', '52ae409b0d7abe1d1d39a5095fd5739e4a2666c670e8105e3f2c7a24f902467a4c18bb8c10e16deb2835f47dc19ed5704fcaa5639d2737ca313386b84c14995d', 2),
(14, 'LPDD', '52ae409b0d7abe1d1d39a5095fd5739e4a2666c670e8105e3f2c7a24f902467a4c18bb8c10e16deb2835f47dc19ed5704fcaa5639d2737ca313386b84c14995d', 2),
(15, 'SMD', '52ae409b0d7abe1d1d39a5095fd5739e4a2666c670e8105e3f2c7a24f902467a4c18bb8c10e16deb2835f47dc19ed5704fcaa5639d2737ca313386b84c14995d', 2),
(16, 'ED', '52ae409b0d7abe1d1d39a5095fd5739e4a2666c670e8105e3f2c7a24f902467a4c18bb8c10e16deb2835f47dc19ed5704fcaa5639d2737ca313386b84c14995d', 2),
(17, 'INREMP', '52ae409b0d7abe1d1d39a5095fd5739e4a2666c670e8105e3f2c7a24f902467a4c18bb8c10e16deb2835f47dc19ed5704fcaa5639d2737ca313386b84c14995d', 2),
(18, 'RPAO', '52ae409b0d7abe1d1d39a5095fd5739e4a2666c670e8105e3f2c7a24f902467a4c18bb8c10e16deb2835f47dc19ed5704fcaa5639d2737ca313386b84c14995d', 2);

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
(1, 'none', 'none', 'none', 'none', 'none', 'none@none.com'),
(2, 'HEA', 'HEA', 'HEA', 'HEA', 'HEA', 'HEA@HEA.com'),
(3, 'ICT', 'ICT', 'ICT', 'ICT', 'ICT', 'ICT@ICT.com'),
(4, 'ARD MS', 'ARD MS', 'ARD MS', 'ARDMS', 'ARDMS', 'ARD_MS@ARDMS.com'),
(5, 'ARDTS', 'ARDTS', 'ARDTS', 'ARDTS', 'ARDTS', 'ARDTS@ARDTS.com'),
(6, 'RD', 'RD', 'RD', 'RD', 'RD', 'RD@RD.com'),
(7, 'MSHEA', 'MSHEA', 'MSHEA', 'MSHEA', 'MSHEA', 'MSHEA@MSHEA.COM'),
(8, 'TSHEA', 'TSHEA', 'TSHEA', 'TSHEA', 'TSHEA', 'TSHEA@TSHEA.com'),
(9, 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN@ADMIN.com'),
(10, 'LEGAL', 'LEGAL', 'LEGAL', 'LEGAL', 'LEGAL', 'LEGAL@LEGAL.com'),
(11, 'PMD', 'PMD', 'PMD', 'PMD', 'PMD', 'PMD@PMD.com'),
(12, 'FINANCE', 'FINANCE', 'FINANCE', 'FINANCE', 'FINANCE', 'FINANCE@FINANCE.com'),
(13, 'CDD', 'CDD', 'CDD', 'CDD', 'CDD', 'CDD@CDD.com'),
(14, 'LPDD', 'LPDD', 'LPDD', 'LPDD', 'LPDD', 'LPDD@LPDD.com'),
(15, 'SMD', 'SMD', 'SMD', 'SMD', 'SMD', 'SMD@SMD.com'),
(16, 'ED', 'ED', 'ED', 'ED', 'ED', 'ED@ED.com'),
(17, 'INREMP', 'INREMP', 'INREMP', 'INREMP', 'INREMP', 'INREMP@INREMP.com'),
(18, 'RPAO', 'RPAO', 'RPAO', 'RPAO', 'RPAO', 'RPAO@RPAO.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` tinyint(11) NOT NULL,
  `user_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'guest');

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
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15120003;
--
-- AUTO_INCREMENT for table `document_date`
--
ALTER TABLE `document_date`
  MODIFY `document_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `document_details`
--
ALTER TABLE `document_details`
  MODIFY `document_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `document_time`
--
ALTER TABLE `document_time`
  MODIFY `document_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `other_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
