-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2021 at 09:53 AM
-- Server version: 5.5.56-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rkat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tab_action_plan`
--

CREATE TABLE `tab_action_plan` (
  `action_plan_id` int(11) NOT NULL,
  `action_plan_name` varchar(255) NOT NULL,
  `action_plan_goal` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_name` varchar(255) NOT NULL,
  `edited_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tab_action_plan`
--

INSERT INTO `tab_action_plan` (`action_plan_id`, `action_plan_name`, `action_plan_goal`, `create_by`, `create_name`, `create_date`, `edited_by`, `edited_name`, `edited_date`) VALUES
(1, 'Integrasi Divisi Terkait', '2021-05-01', 9999999, 'Developer Metro TV', '2021-03-19 11:22:50', 9999999, 'Developer Metro TV', '2021-03-19 11:22:50'),
(2, 'Pengembangan Servis Transmisi Skala International', '2021-06-02', 9999999, 'Developer Metro TV', '2021-03-19 11:22:50', 9999999, 'Developer Metro TV', '2021-03-19 11:22:50'),
(3, 'Integrasi Sistem Keuangan', '2021-04-01', 9999999, 'Developer Metro TV', '2021-03-19 12:06:53', 9999999, 'Developer Metro TV', '2021-03-19 12:06:53'),
(4, 'Penggabungan Traffic Terpadu', '2021-06-02', 9999999, 'Developer Metro TV', '2021-03-19 12:06:53', 9999999, 'Developer Metro TV', '2021-03-19 12:06:53'),
(5, 'Sekertariat Produksi dan Redaksi 1 Pintu', '2021-05-01', 9999999, 'Developer Metro TV', '2021-03-19 12:08:55', 9999999, 'Developer Metro TV', '2021-03-19 12:08:55'),
(6, 'Action Plan Test', '2021-03-22', 9999999, 'Developer Metro TV', '2021-03-22 16:27:45', 9999999, 'Developer Metro TV', '2021-03-22 16:27:45'),
(7, 'Action Plan Test 2', '2021-03-22', 9999999, 'Developer Metro TV', '2021-03-22 16:28:23', 9999999, 'Developer Metro TV', '2021-03-22 16:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `tab_department`
--

CREATE TABLE `tab_department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_department`
--

INSERT INTO `tab_department` (`dept_id`, `dept_name`) VALUES
(1, 'ACCOUNTING & TAX'),
(2, 'ADMIN SUPPORT IDM'),
(3, 'BOD'),
(4, 'BUDGET CONTROL'),
(5, 'COLLECTION'),
(6, 'CONTENT & DEV'),
(7, 'CONTENT & KNOWLEDGE MANAGEMENT'),
(8, 'CONTENT NETWORKING OTHERS'),
(9, 'CORPORATE'),
(10, 'CORPORATE COMMUNICATION & PR'),
(11, 'CREATIVE & SOCIAL MEDIA'),
(12, 'CREATIVE DEVELOPMENT IDM'),
(13, 'CREATIVE IDM OTHERS'),
(14, 'CREATIVE MEDCOM'),
(15, 'DIGITAL CREATIVE CONTENT OTHERS'),
(16, 'DIGITAL LIBRARY CENTER'),
(17, 'DIGITAL LIBRARY CENTER'),
(18, 'DIGITAL MARKETING MEDCOM'),
(19, 'DIGITAL PROMOTION'),
(20, 'EAGLE INSTITUTE'),
(21, 'ENGINEERING'),
(22, 'ENGINEERING'),
(23, 'FIN & ACC IDM'),
(24, 'FIN & ACC OTHERS'),
(25, 'FINANCE'),
(26, 'FINANCE MEDCOM'),
(27, 'GA IDM'),
(28, 'GENERAL AFFAIR'),
(29, 'GENERAL AFFAIRS'),
(30, 'GENERAL AFFAIRS'),
(31, 'GENERAL AFFAIRS & ASSET MANAGEMENT'),
(32, 'GRAPHIC CONTENT'),
(33, 'GRAPHIC DEV'),
(34, 'GRAPHICS'),
(35, 'HR & GA MTI'),
(36, 'HR & LEGAL'),
(37, 'HR EMPLOYMENT'),
(38, 'HR IDM'),
(39, 'HR MEDCOM'),
(40, 'HUMAN RESOURCES DEVELOPMENT'),
(41, 'HUMAN RESOURCES MANAGEMENT'),
(42, 'INDEPTH REPORTING & NON BULLETIN'),
(43, 'INDEPTH REPORTING & NON BULLETIN'),
(44, 'INDOCATEER'),
(45, 'IT INFRASTRUCTURE'),
(46, 'IT INFRASTRUCTURE'),
(47, 'IT OFFICE & BROADCAST SUPPORT'),
(48, 'IT OPERATIONAL'),
(49, 'IT OPERATIONS MEDCOM'),
(50, 'IT PROJECT'),
(51, 'LEARNING & DEVELOPMENT'),
(52, 'LEGAL'),
(53, 'LEGAL MEDCOM'),
(54, 'LOGISTIC'),
(55, 'LOGISTIC & ASSET MANAGEMENT'),
(56, 'LOGISTIC & ASSET MANAGEMENT'),
(57, 'M.I.C.E & SPECIAL EVENTS IDM'),
(58, 'MAINTENANCE'),
(59, 'MAINTENANCE & LOGISTIC MTI'),
(60, 'MAINTENANCE TRANSMISSION'),
(61, 'MARKETING'),
(62, 'MARKETING PLANNING & RESEARCH'),
(63, 'MARKETING TOOLS & CREATIVE'),
(64, 'MCR'),
(65, 'MCR'),
(66, 'ME & BUILDING MANAGEMENT'),
(67, 'MEDIA ACADEMY'),
(68, 'MEDIA GROUP NEWS'),
(69, 'MEDIA INDONESIA'),
(70, 'MEDIA PARTNERSHIP'),
(71, 'MEDIA SERVICE'),
(72, 'MIS'),
(73, 'MIS'),
(74, 'NEWS CONTENT ENRICHMENT'),
(75, 'NEWS ENT & SPORT MEDCOM'),
(76, 'NEWS ENT & SPORT MEDCOM'),
(77, 'NEWS GATHERING'),
(78, 'NEWS GATHERING MEDCOM'),
(79, 'NEWS MEDCOM'),
(80, 'NEWS OTHERS'),
(81, 'NEWS PRODUCTION BULLETIN'),
(82, 'NEWS PRODUCTION MEDCOM'),
(83, 'NEWS PRODUCTION MEDCOM OTHR'),
(84, 'NEWS PRODUCTION NON BULETIN'),
(85, 'NEWS RESEARCH CENTER'),
(86, 'NEWS SECRETARIAT'),
(87, 'NEWS SECRETARIAT MEDCOM'),
(88, 'NEWS SERVICES'),
(89, 'NEWS TV SUPP & SOCMED MEDCOM'),
(90, 'OPERATIONS'),
(91, 'OTHERS'),
(92, 'PARTNERSHIP & SPONSORSHIP IDM'),
(93, 'PODME'),
(94, 'PROD & CREATIVE IDM OTHERS'),
(95, 'PROD & DEV OTHERS'),
(96, 'PRODUCTION & CREATIVE'),
(97, 'PRODUCTION IDM OTHERS'),
(98, 'PRODUCTION NON NEWS'),
(99, 'PROGRAMMING OPERATION & SCHEDULLING'),
(100, 'PROJECT'),
(101, 'PROJECT & SNG'),
(102, 'PROJECT DEVELOPMENT MTI'),
(103, 'PROJECT IDM'),
(104, 'PROJECT MEDCOM'),
(105, 'PROJECT TRANSMISSION & SNG'),
(106, 'PROMOTION'),
(107, 'PROMOTION'),
(108, 'PURCHASING'),
(109, 'REPORTING & SYSTEM'),
(110, 'S & M OTHERS'),
(111, 'SALES'),
(112, 'SALES & MARKETING IDM'),
(113, 'SALES & MARKETING OTHERS'),
(114, 'SALES 1'),
(115, 'SALES 10 (NON AIRING)'),
(116, 'SALES 2'),
(117, 'SALES 3'),
(118, 'SALES 4'),
(119, 'SALES 5'),
(120, 'SALES 6'),
(121, 'SALES 7'),
(122, 'SALES 8'),
(123, 'SALES 9 (CSR & PARTNERSHIP)'),
(124, 'SALES ADMIN IDM'),
(125, 'SALES ADMINISTRATION SUPPORT'),
(126, 'SALES MEDCOM'),
(127, 'SALES MEDIA INDONESIA'),
(128, 'SALES ONLINE'),
(129, 'SCM'),
(130, 'SEKRETARIAT MTI'),
(131, 'SPECIAL PROJECT'),
(132, 'STRATEGIC PROGRAMMING'),
(133, 'SURABAYA - SATU'),
(134, 'SYSTEM & PROCEDURE'),
(135, 'TALENT'),
(136, 'TECHNICAL & SERVICE SUPPORT IDM'),
(137, 'TECHNICAL OPERATION'),
(138, 'TECHNICAL OPERATION'),
(139, 'TRADING'),
(140, 'TRAFFIC'),
(141, 'TRANSMISSION'),
(142, 'TRANSMISSION JKT MTI'),
(143, 'TRANSMISSION OPERATION MTI'),
(144, 'TV JARINGAN MTI'),
(145, 'VIDEO PRODUCTION & GRAPHIC IDM'),
(146, 'VIDEO PRODUCTION MEDCOM'),
(147, 'WEB DESIGN'),
(148, 'WEB DESIGN');

-- --------------------------------------------------------

--
-- Table structure for table `tab_directorate`
--

CREATE TABLE `tab_directorate` (
  `dir_id` int(11) NOT NULL,
  `dir_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_directorate`
--

INSERT INTO `tab_directorate` (`dir_id`, `dir_name`) VALUES
(1, 'CKM'),
(2, 'CORPORATE'),
(3, 'EAGLE INSTITUTE'),
(4, 'FIN ADM & TS - FINANCE'),
(5, 'FINANCE & TECHNICAL SUPPORT-TECHNIC'),
(6, 'FINANCE, HR & TECHNICAL SUPPORT'),
(7, 'INDOCATEER'),
(8, 'INDONESIA MEDIA'),
(9, 'MEDCOM.ID'),
(10, 'MEDIA ACADEMY'),
(11, 'MEDIA GROUP NEWS'),
(12, 'MEDIA INDONESIA'),
(13, 'MEDIA LESTARI'),
(14, 'METRO TRANSMISI IND'),
(15, 'NASDEM'),
(16, 'NEWS'),
(17, 'OTHERS'),
(18, 'OUTSOURCING'),
(19, 'PRESIDENT OFFICE'),
(20, 'PROG & DEV'),
(21, 'PROJECT'),
(22, 'S & M'),
(23, 'TRAINEE');

-- --------------------------------------------------------

--
-- Table structure for table `tab_division`
--

CREATE TABLE `tab_division` (
  `div_id` int(11) NOT NULL,
  `div_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_division`
--

INSERT INTO `tab_division` (`div_id`, `div_name`) VALUES
(1, 'BOD'),
(2, 'CKM'),
(3, 'CONTENT NETWORKING'),
(4, 'CORPORATE'),
(5, 'CORPORATE COMMUNICATION & PR'),
(6, 'CREATIVE IDM'),
(7, 'DIGITAL CREATIVE CONTENT'),
(8, 'EAGLE INSTITUTE'),
(9, 'ENGINEERING'),
(10, 'ENGINEERING'),
(11, 'FIN & ACC'),
(12, 'FINANCE & ADMINISTRATION MEDCO'),
(13, 'GRAPHIC CONTENT & PROMOTION'),
(14, 'HR & LEGAL'),
(15, 'HR & LEGAL MEDCOM'),
(16, 'INDOCATEER'),
(17, 'INTERNAL CONTROL'),
(18, 'IT'),
(19, 'IT'),
(20, 'IT OPERATIONS MEDCOM'),
(21, 'MARKETING'),
(22, 'MEDIA ACADEMY'),
(23, 'MEDIA GROUP NEWS'),
(24, 'MEDIA INDONESIA'),
(25, 'METRO TRANSMISI IND'),
(26, 'NEWS BULLETIN & NON BULLETIN'),
(27, 'NEWS GATHERING MEDCOM'),
(28, 'NEWS MEDCOM'),
(29, 'NEWS PRODUCTION MEDCOM'),
(30, 'OPERATION & SUPPORT IDM'),
(31, 'OTHERS'),
(32, 'PODME'),
(33, 'PROD & DEV'),
(34, 'PRODUCTION & DEVELOPMENT'),
(35, 'PRODUCTION IDM'),
(36, 'PROG & DEV'),
(37, 'PROJECT'),
(38, 'PROJECT IDM'),
(39, 'PROJECT MEDCOM'),
(40, 'PROMOTION'),
(41, 'S & M - IDM'),
(42, 'SALES'),
(43, 'SALES & MARKETING'),
(44, 'SALES & MARKETING MEDCOM'),
(45, 'SCM'),
(46, 'SCM'),
(47, 'SUPPLY CHAIN MANAGEMENT'),
(48, 'SURABAYA - SATU'),
(49, 'TRANSMISSION'),
(50, 'TRANSMISSIONS'),
(51, 'WEB DESIGN');

-- --------------------------------------------------------

--
-- Table structure for table `tr_level1`
--

CREATE TABLE `tr_level1` (
  `level1_id` int(11) NOT NULL,
  `action_plan_id` int(11) NOT NULL,
  `level1_progress` float NOT NULL,
  `level1_notes` varchar(255) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_name` varchar(255) NOT NULL,
  `edited_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_level1`
--

INSERT INTO `tr_level1` (`level1_id`, `action_plan_id`, `level1_progress`, `level1_notes`, `create_by`, `create_name`, `create_date`, `edited_by`, `edited_name`, `edited_date`) VALUES
(1, 1, 38, '', 9999999, 'Developer Metro TV', '2021-03-19 11:38:02', 9999999, 'Developer Metro TV', '2021-03-22 13:40:55'),
(2, 2, 0, '', 9999999, 'Developer Metro TV', '2021-03-19 11:38:02', 9999999, 'Developer Metro TV', '2021-03-19 11:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `tr_level2`
--

CREATE TABLE `tr_level2` (
  `level2_id` int(11) NOT NULL,
  `level1_id` int(11) NOT NULL,
  `action_plan_id` int(11) NOT NULL,
  `dir_id` int(11) NOT NULL,
  `level2_progress` float NOT NULL,
  `level2_notes` varchar(255) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_name` varchar(255) NOT NULL,
  `edited_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_level2`
--

INSERT INTO `tr_level2` (`level2_id`, `level1_id`, `action_plan_id`, `dir_id`, `level2_progress`, `level2_notes`, `create_by`, `create_name`, `create_date`, `edited_by`, `edited_name`, `edited_date`) VALUES
(1, 1, 3, 5, 30, 'yy', 9999999, 'Developer Metro TV', '2021-03-19 12:10:13', 9999999, 'Developer Metro TV', '2021-03-22 13:40:55'),
(2, 1, 4, 20, 35, 'Notes 2', 9999999, 'Developer Metro TV', '2021-03-19 12:10:13', 9999999, 'Developer Metro TV', '2021-03-20 20:10:53'),
(3, 1, 5, 16, 50, 'Notes 3', 9999999, 'Developer Metro TV', '2021-03-19 12:08:55', 9999999, 'Developer Metro TV', '2021-03-20 21:45:53'),
(4, 2, 6, 16, 0, '', 9999999, 'Developer Metro TV', '2021-03-22 16:27:45', 9999999, 'Developer Metro TV', '2021-03-22 16:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `tr_level3`
--

CREATE TABLE `tr_level3` (
  `level3_id` int(11) NOT NULL,
  `level2_id` int(11) NOT NULL,
  `action_plan_id` int(11) NOT NULL,
  `div_id` int(11) NOT NULL,
  `level3_progress` int(11) NOT NULL,
  `level3_notes` varchar(255) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_name` varchar(255) NOT NULL,
  `edited_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_level3`
--

INSERT INTO `tr_level3` (`level3_id`, `level2_id`, `action_plan_id`, `div_id`, `level3_progress`, `level3_notes`, `create_by`, `create_name`, `create_date`, `edited_by`, `edited_name`, `edited_date`) VALUES
(1, 1, 7, 18, 0, '', 9999999, 'Developer Metro TV', '2021-03-22 16:28:23', 9999999, 'Developer Metro TV', '2021-03-22 16:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `tr_level4`
--

CREATE TABLE `tr_level4` (
  `level4_id` int(11) NOT NULL,
  `level3_id` int(11) NOT NULL,
  `action_plan_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `level4_progress` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_name` varchar(255) NOT NULL,
  `edited_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_level1`
-- (See below for the actual view)
--
CREATE TABLE `vw_level1` (
`level1_id` int(11)
,`action_plan_id` int(11)
,`action_plan_name` varchar(255)
,`level1_progress` float
,`level1_notes` varchar(255)
,`action_plan_goal` date
,`create_by` int(11)
,`create_name` varchar(255)
,`create_date` datetime
,`edited_by` int(11)
,`edited_name` varchar(255)
,`edited_date` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_level2`
-- (See below for the actual view)
--
CREATE TABLE `vw_level2` (
`level2_id` int(11)
,`action_plan_id` int(11)
,`action_plan_name` varchar(255)
,`action_plan_goal` date
,`level1_id` int(11)
,`level1_name` varchar(255)
,`level1_goal` date
,`dir_id` int(11)
,`dir_name` varchar(255)
,`level2_progress` float
,`level2_notes` varchar(255)
,`create_by` int(11)
,`create_name` varchar(255)
,`create_date` datetime
,`edited_by` int(11)
,`edited_name` varchar(255)
,`edited_date` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_level3`
-- (See below for the actual view)
--
CREATE TABLE `vw_level3` (
`level3_id` int(11)
,`action_plan_id` int(11)
,`action_plan_name` varchar(255)
,`action_plan_goal` date
,`level2_id` int(11)
,`level2_name` varchar(255)
,`level2_goal` date
,`div_id` int(11)
,`div_name` varchar(255)
,`level3_progress` int(11)
,`level3_notes` varchar(255)
,`create_by` int(11)
,`create_name` varchar(255)
,`create_date` datetime
,`edited_by` int(11)
,`edited_name` varchar(255)
,`edited_date` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `vw_level1`
--
DROP TABLE IF EXISTS `vw_level1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`dev`@`%` SQL SECURITY DEFINER VIEW `vw_level1`  AS  select `tbl1`.`level1_id` AS `level1_id`,`tbl1`.`action_plan_id` AS `action_plan_id`,`tbl2`.`action_plan_name` AS `action_plan_name`,`tbl1`.`level1_progress` AS `level1_progress`,`tbl1`.`level1_notes` AS `level1_notes`,`tbl2`.`action_plan_goal` AS `action_plan_goal`,`tbl1`.`create_by` AS `create_by`,`tbl1`.`create_name` AS `create_name`,`tbl1`.`create_date` AS `create_date`,`tbl1`.`edited_by` AS `edited_by`,`tbl1`.`edited_name` AS `edited_name`,`tbl1`.`edited_date` AS `edited_date` from (`tr_level1` `tbl1` left join `tab_action_plan` `tbl2` on((`tbl1`.`action_plan_id` = `tbl2`.`action_plan_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_level2`
--
DROP TABLE IF EXISTS `vw_level2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`dev`@`%` SQL SECURITY DEFINER VIEW `vw_level2`  AS  select `tbl1`.`level2_id` AS `level2_id`,`tbl1`.`action_plan_id` AS `action_plan_id`,`tbl3`.`action_plan_name` AS `action_plan_name`,`tbl3`.`action_plan_goal` AS `action_plan_goal`,`tbl1`.`level1_id` AS `level1_id`,`tbl3_2`.`action_plan_name` AS `level1_name`,`tbl3_2`.`action_plan_goal` AS `level1_goal`,`tbl1`.`dir_id` AS `dir_id`,`tbl4`.`dir_name` AS `dir_name`,`tbl1`.`level2_progress` AS `level2_progress`,`tbl1`.`level2_notes` AS `level2_notes`,`tbl1`.`create_by` AS `create_by`,`tbl1`.`create_name` AS `create_name`,`tbl1`.`create_date` AS `create_date`,`tbl1`.`edited_by` AS `edited_by`,`tbl1`.`edited_name` AS `edited_name`,`tbl1`.`edited_date` AS `edited_date` from ((((`tr_level2` `tbl1` left join `tr_level1` `tbl2` on((`tbl1`.`level1_id` = `tbl2`.`level1_id`))) left join `tab_action_plan` `tbl3` on((`tbl1`.`action_plan_id` = `tbl3`.`action_plan_id`))) left join `tab_action_plan` `tbl3_2` on((`tbl2`.`action_plan_id` = `tbl3_2`.`action_plan_id`))) left join `tab_directorate` `tbl4` on((`tbl1`.`dir_id` = `tbl4`.`dir_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_level3`
--
DROP TABLE IF EXISTS `vw_level3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`dev`@`%` SQL SECURITY DEFINER VIEW `vw_level3`  AS  select `tbl1`.`level3_id` AS `level3_id`,`tbl1`.`action_plan_id` AS `action_plan_id`,`tbl3`.`action_plan_name` AS `action_plan_name`,`tbl3`.`action_plan_goal` AS `action_plan_goal`,`tbl1`.`level2_id` AS `level2_id`,`tbl3_2`.`action_plan_name` AS `level2_name`,`tbl3_2`.`action_plan_goal` AS `level2_goal`,`tbl1`.`div_id` AS `div_id`,`tbl4`.`div_name` AS `div_name`,`tbl1`.`level3_progress` AS `level3_progress`,`tbl1`.`level3_notes` AS `level3_notes`,`tbl1`.`create_by` AS `create_by`,`tbl1`.`create_name` AS `create_name`,`tbl1`.`create_date` AS `create_date`,`tbl1`.`edited_by` AS `edited_by`,`tbl1`.`edited_name` AS `edited_name`,`tbl1`.`edited_date` AS `edited_date` from ((((`tr_level3` `tbl1` left join `tr_level2` `tbl2` on((`tbl1`.`level2_id` = `tbl2`.`level2_id`))) left join `tab_action_plan` `tbl3` on((`tbl1`.`action_plan_id` = `tbl3`.`action_plan_id`))) left join `tab_action_plan` `tbl3_2` on((`tbl2`.`action_plan_id` = `tbl3_2`.`action_plan_id`))) left join `tab_division` `tbl4` on((`tbl1`.`div_id` = `tbl4`.`div_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_action_plan`
--
ALTER TABLE `tab_action_plan`
  ADD PRIMARY KEY (`action_plan_id`);

--
-- Indexes for table `tab_department`
--
ALTER TABLE `tab_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tab_directorate`
--
ALTER TABLE `tab_directorate`
  ADD PRIMARY KEY (`dir_id`);

--
-- Indexes for table `tab_division`
--
ALTER TABLE `tab_division`
  ADD PRIMARY KEY (`div_id`);

--
-- Indexes for table `tr_level1`
--
ALTER TABLE `tr_level1`
  ADD PRIMARY KEY (`level1_id`);

--
-- Indexes for table `tr_level2`
--
ALTER TABLE `tr_level2`
  ADD PRIMARY KEY (`level2_id`);

--
-- Indexes for table `tr_level3`
--
ALTER TABLE `tr_level3`
  ADD PRIMARY KEY (`level3_id`);

--
-- Indexes for table `tr_level4`
--
ALTER TABLE `tr_level4`
  ADD PRIMARY KEY (`level4_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_action_plan`
--
ALTER TABLE `tab_action_plan`
  MODIFY `action_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tab_department`
--
ALTER TABLE `tab_department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `tab_directorate`
--
ALTER TABLE `tab_directorate`
  MODIFY `dir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tab_division`
--
ALTER TABLE `tab_division`
  MODIFY `div_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tr_level1`
--
ALTER TABLE `tr_level1`
  MODIFY `level1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tr_level2`
--
ALTER TABLE `tr_level2`
  MODIFY `level2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tr_level3`
--
ALTER TABLE `tr_level3`
  MODIFY `level3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tr_level4`
--
ALTER TABLE `tr_level4`
  MODIFY `level4_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
