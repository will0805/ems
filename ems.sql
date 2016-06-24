-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2016 at 08:00 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `customised`
--

CREATE TABLE `customised` (
  `custom_id` int(100) UNSIGNED NOT NULL,
  `event_id` int(10) NOT NULL,
  `opt_content` varchar(500) NOT NULL DEFAULT '  ',
  `item` varchar(500) NOT NULL,
  `is_opt` tinyint(1) NOT NULL,
  `mandatory` tinyint(1) NOT NULL,
  `is_mulchoice` tinyint(1) NOT NULL,
  `seq` int(10) NOT NULL DEFAULT '0',
  `is_ticket` tinyint(1) NOT NULL DEFAULT '0',
  `t_no` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customised`
--

INSERT INTO `customised` (`custom_id`, `event_id`, `opt_content`, `item`, `is_opt`, `mandatory`, `is_mulchoice`, `seq`, `is_ticket`, `t_no`) VALUES
(1, 156, '  ', 'how old', 0, 0, 0, 0, 0, 0),
(2, 161, 'A;B', '123', 1, 1, 1, 0, 0, 0),
(3, 161, 'A;B;C', '12345', 1, 1, 1, 0, 0, 0),
(4, 162, '  ', '123', 0, 1, 0, 0, 0, 0),
(5, 162, '  ', '1234', 0, 0, 0, 0, 0, 0),
(7, 0, 'Y;Y', 'N', 1, 1, 0, 0, 0, 0),
(10, 165, 'y;y', 'y', 1, 1, 1, 0, 0, 0),
(11, 165, '  ', 'gaeg', 0, 1, 0, 0, 0, 0),
(12, 166, '  ', 'bdabd', 0, 1, 0, 0, 0, 0),
(13, 165, 'bd ;bdz', 'bd z', 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customised_reg`
--

CREATE TABLE `customised_reg` (
  `id` int(100) UNSIGNED NOT NULL,
  `event_id` int(10) NOT NULL,
  `reg_id` int(10) NOT NULL,
  `iterm` varchar(500) NOT NULL,
  `opt` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customised_reg`
--

INSERT INTO `customised_reg` (`id`, `event_id`, `reg_id`, `iterm`, `opt`) VALUES
(1, 154, 200, '', 'F'),
(2, 165, 210, 'y', 'y;y;'),
(3, 165, 210, 'gaeg', 'vdsa'),
(4, 166, 211, 'bdabd', 'vda');

-- --------------------------------------------------------

--
-- Table structure for table `doctype`
--

CREATE TABLE `doctype` (
  `doctype_id` int(100) UNSIGNED NOT NULL,
  `event_id` int(10) NOT NULL,
  `doc_type` varchar(500) NOT NULL,
  `is_photo` tinyint(1) NOT NULL,
  `is_doc` tinyint(1) NOT NULL,
  `doc_req` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctype`
--

INSERT INTO `doctype` (`doctype_id`, `event_id`, `doc_type`, `is_photo`, `is_doc`, `doc_req`) VALUES
(1, 156, 'doc;pdf', 0, 1, 'resume'),
(2, 162, 'PDF;DOC', 0, 1, 'resume'),
(3, 165, 'pdf', 0, 0, 'D'),
(4, 165, 'image', 0, 0, 'P'),
(5, 0, 'pdf', 0, 0, 'Degree'),
(6, 0, 'image', 0, 0, 'I'),
(7, 0, 'pdf', 0, 0, 'D'),
(8, 167, 'pdf', 0, 0, 'D'),
(9, 0, 'word', 0, 0, 'ECA'),
(10, 0, 'pdf', 0, 0, 'Degree'),
(11, 167, 'word', 0, 0, 'ECA'),
(12, 167, 'pdf', 0, 0, 'Degree');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `location`) VALUES
(1, 'fertttt', 'documents/2015-11-02 10-05.pdf'),
(2, 'fertttt', 'documents/2015-11-02 10-05.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `errormsg`
--

CREATE TABLE `errormsg` (
  `error_id` int(11) NOT NULL,
  `error_msg` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `errormsg`
--

INSERT INTO `errormsg` (`error_id`, `error_msg`) VALUES
(1, 'All fields marked with * are mandatory'),
(2, 'Email address is not valid.'),
(3, 'This username is already registered by other users.'),
(4, 'Your password does not match .'),
(5, 'Wrong Username or Password'),
(6, 'No photo is selected for upload.');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(20) UNSIGNED NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_venue` varchar(200) NOT NULL,
  `start_date` date NOT NULL DEFAULT '0000-00-00',
  `end_date` date NOT NULL DEFAULT '0000-00-00',
  `reg_start` date NOT NULL DEFAULT '0000-00-00',
  `reg_end` date NOT NULL DEFAULT '0000-00-00',
  `quota` varchar(20) NOT NULL,
  `organiser` varchar(100) NOT NULL,
  `org_email` varchar(100) NOT NULL,
  `org_tel` varchar(20) NOT NULL,
  `org_fax` varchar(30) NOT NULL,
  `tar_par` varchar(9999) NOT NULL,
  `event_info` longtext NOT NULL,
  `loc_map` varchar(200) NOT NULL,
  `cus_email` text NOT NULL,
  `is_central` tinyint(1) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL,
  `auto_email` tinyint(1) NOT NULL,
  `etitle` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`user_id`, `event_id`, `event_title`, `event_venue`, `start_date`, `end_date`, `reg_start`, `reg_end`, `quota`, `organiser`, `org_email`, `org_tel`, `org_fax`, `tar_par`, `event_info`, `loc_map`, `cus_email`, `is_central`, `is_confirmed`, `auto_email`, `etitle`) VALUES
(15, 155, 'fyp', 'ntu', '2016-05-14', '2015-04-11', '2014-01-01', '2014-01-01', '998', 'Stef', 'qwang4@e.ntu.edu.sg', '', '', '', 'Please key in more information about the event.', '', 'Please keep this email for your future reference.', 0, 1, 1, 'Invitation: fyp'),
(18, 156, 'Invited Speaker Invitation', 'Singapore', '2015-10-25', '2016-04-15', '2015-01-01', '2016-05-01', '998', 'EEE', 'shum@ieee.org', '', '', '', 'Please key in more information about the event.\r\n\r\nCLEO OECC we intite you', '', 'Please keep this email for your future reference.', 0, 1, 1, 'Invitation: Invited Speaker Invitation'),
(19, 157, 'abc', 'abcd', '2016-05-14', '2015-10-30', '2014-01-01', '2014-01-01', '998', 'abcd', 'abc@abc.com', '', '', '', 'Please key in more information about the event.', '', 'Please keep this email for your future reference.', 0, 1, 1, 'Invitation: abc'),
(21, 158, 'ntu concert', 'ntu', '2016-10-15', '2016-10-25', '2016-08-12', '2016-08-22', '', 'ntu', 'ntu@gmail.com', '', '', '', '<b>concert</b>', '', '', 0, 0, 0, ''),
(21, 159, 'ntuuuuu', 'ntu', '2017-09-13', '2017-09-23', '2016-08-12', '2016-01-10', '', 'NTU ', 'NTU@gmail.com', '', '', '', '<b>ntuuuu</b>', '', '', 0, 0, 0, ''),
(22, 160, '1', '1', '2016-04-02', '2016-04-02', '0000-00-00', '0000-00-00', '', '1', '1@1.com', '', '', '', '<p> <strong>1</strong></p>', '', '', 0, 0, 0, ''),
(23, 161, 'lunch', 'eee', '2016-04-01', '2016-04-01', '0000-00-00', '0000-00-00', '', 'jinli', '1@1.com', '', '', '', '<b>have lunch</b>', '', '', 0, 0, 0, ''),
(23, 162, 'lunch', 'eee', '2016-04-01', '2016-04-01', '0000-00-00', '0000-00-00', '', 'jinli', '1@1.com', '', '', '', '<b>have lunch</b>', '', '', 0, 0, 0, ''),
(24, 165, 'NTU Concert', 'ntu', '2016-05-19', '2016-05-20', '2016-05-12', '2016-05-14', '', 'NTU', 'gg@ntu.sg', '', '', '', 'vbaiodxvn', '', '', 0, 0, 0, ''),
(24, 166, 'EEE week', 'NTU eee', '2016-06-12', '2016-06-19', '2016-05-26', '2016-05-27', '', 'NTU', 'NTU@ntu.edu.sg', '', '', '', 'ntu', '', '', 0, 0, 0, ''),
(24, 167, 'EEE DAY', 'EEE', '2016-06-01', '2016-06-09', '2016-05-28', '2016-06-01', '', 'NTU', 'EEE@GMAIL.COM', '', '', '', 'EEE', '', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `reg_id` int(100) UNSIGNED NOT NULL,
  `event_id` int(10) NOT NULL,
  `salutation` varchar(10) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `org` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `photo` varchar(300) NOT NULL DEFAULT '  ',
  `doc` varchar(300) NOT NULL DEFAULT '  ',
  `firstname` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`reg_id`, `event_id`, `salutation`, `lastname`, `org`, `email`, `contact_no`, `photo`, `doc`, `firstname`) VALUES
(201, 155, 'Miss', 'Wang', 'NTU', 'wangqing.stefanie@gmail.com', '', 'upload/155Wang201.jpeg', 'files/155Wang201.pdf', 'Qing'),
(202, 157, 'Dr.', 'asd', '', 'asd@asd.com', '', '  ', '  ', 'sad'),
(203, 156, 'Dr.', 'Du', '', 'shum@ieee.org', '', '  ', '  ', 'Hao'),
(204, 156, 'Dr.', 'Du', '', 'shum@ieee.org', '', 'upload/156Du204.jpeg', 'files/156Du204.pptx', 'Hao'),
(205, 167, 'Mr', 'Jin', '', 'gj@gmail.com', '88888888', '  ', '  ', 'Guo'),
(206, 167, 'Dr.', 'Guo', '', 'jguo008@e.ntu.edu.sg', '89899898', '  ', '  ', 'Jin'),
(207, 167, 'Mr', 'gavd', '', 'bda@gmail.com', '88888888', '  ', '  ', 'dga'),
(208, 167, 'Mr', 'gavd', '', 'bda@gmail.com', '88888888', '  ', '  ', 'dga'),
(209, 167, 'Mr', 'nf', '', 'bda@gmail.com', '88888888', '  ', '  ', 't'),
(210, 165, 'Dr.', 'vds', '', 'gj@gmail.com', '98766789', '  ', '  ', 'bda'),
(211, 166, 'Mr', 'd z', '', 'vda@gmail.com', '89088998', '  ', '  ', 'd a'),
(212, 167, 'Mr', 'BD', '', 'gj@gmail.com', '', '  ', '  ', 'GEA'),
(213, 167, 'Mr', 'BD', '', 'gj@gmail.com', '', '  ', '  ', 'GEA'),
(214, 167, 'Mr', 'BD', '', 'gj@gmail.com', '', '  ', '  ', 'GEA');

-- --------------------------------------------------------

--
-- Table structure for table `reg_doc`
--

CREATE TABLE `reg_doc` (
  `id` int(100) UNSIGNED NOT NULL,
  `reg_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `doc_req` varchar(500) NOT NULL,
  `photo` varchar(300) NOT NULL DEFAULT '  ',
  `doc` varchar(300) NOT NULL DEFAULT '  '
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_doc`
--

INSERT INTO `reg_doc` (`id`, `reg_id`, `event_id`, `doc_req`, `photo`, `doc`) VALUES
(205, 206, 167, 'D', '  ', 'documents/Jin_Guo_206/ECA Record System.pdf'),
(206, 207, 167, 'D', '  ', 'documents/dga_gavd_207/ECA Record System.pdf'),
(207, 207, 167, 'D', '  ', 'documents/C:fakepath2015-11-02 10-05.pdf.pdf'),
(208, 209, 167, 'D', '  ', 'documents/t_nf_209/ECA Record System.pdf'),
(209, 210, 165, 'D', '  ', 'documents/bda_vds_210/ECA Record System.pdf'),
(210, 210, 165, 'P', '  ', 'documents/bda_vds_210/3.tiff'),
(211, 205, 167, 'D', '  ', 'documents/C:fakepathEE4001-IM2001 - Lecture Notes-1-1.pdf.pdf'),
(212, 205, 167, 'ECA', '  ', 'documents/C:fakepathEE 2073 GUO JIN week3.docx.docx'),
(213, 205, 167, 'Degree', '  ', 'documents/C:fakepath2015-11-02 10-05.pdf.pdf'),
(214, 205, 167, 'D', '  ', 'documents/C:fakepathEE4001-IM2001 - Lecture Notes-1-1.pdf.pdf'),
(215, 205, 167, 'ECA', '  ', 'documents/C:fakepathEE 2073 GUO JIN week3.docx.docx'),
(216, 205, 167, 'Degree', '  ', 'documents/C:fakepath2015-11-02 10-05.pdf.pdf'),
(217, 205, 167, 'D', 'documents/C:fakepathEE4001-IM2001 - Lecture Notes-1-1.pdf.pdf', '  '),
(218, 205, 167, 'ECA', 'documents/C:fakepathEE 2073 GUO JIN week3.docx.docx', '  '),
(219, 205, 167, 'Degree', 'documents/C:fakepath2015-11-02 10-05.pdf.pdf', '  '),
(220, 214, 167, 'D', '  ', 'documents/GEA_BD_214/EE4001-IM2001 - Lecture Notes-1-1.pdf'),
(221, 214, 167, 'ECA', '  ', 'documents/GEA_BD_214/EE 2073 GUO JIN week3.docx'),
(222, 214, 167, 'Degree', '  ', 'documents/GEA_BD_214/2015-11-02 10-05.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `pwd`, `email`) VALUES
(6, '', '', 'b001bcd55ab3f4415e08da69df891480', 'liuy0047@ntu.edu.sg'),
(9, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'liub0005@ntu.edu.sg'),
(15, '   ', '', '81dc9bdb52d04dc20036dbd8313ed055', 'wangqing.iet@gmail.com'),
(16, '   ', '', '827ccb0eea8a706c4c34a16891f84e7b', 'wangqing@gmail.com'),
(17, '   ', '', '5f16f655a2e735232d6f72ef0d1a6b4c', 'epshum@ntu.edu.sg'),
(18, '   ', '', '9d05c2d955b24bd5d20b1638156ea0ef', 'shum@ieee.org'),
(19, '   ', '', '81dc9bdb52d04dc20036dbd8313ed055', 'abc@abc.com'),
(24, 'JIN', 'GUO', '81dc9bdb52d04dc20036dbd8313ed055', 'jguo008@e.ntu.edu.sg'),
(22, 'Xiaoyu', 'Tang', '827ccb0eea8a706c4c34a16891f84e7b', 'tangxiaoyu9@163.com'),
(23, 'Jinli', 'Tang', '81dc9bdb52d04dc20036dbd8313ed055', '12345@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customised`
--
ALTER TABLE `customised`
  ADD PRIMARY KEY (`custom_id`);

--
-- Indexes for table `customised_reg`
--
ALTER TABLE `customised_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctype`
--
ALTER TABLE `doctype`
  ADD PRIMARY KEY (`doctype_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `errormsg`
--
ALTER TABLE `errormsg`
  ADD PRIMARY KEY (`error_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `reg_doc`
--
ALTER TABLE `reg_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customised`
--
ALTER TABLE `customised`
  MODIFY `custom_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `customised_reg`
--
ALTER TABLE `customised_reg`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doctype`
--
ALTER TABLE `doctype`
  MODIFY `doctype_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `reg_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
--
-- AUTO_INCREMENT for table `reg_doc`
--
ALTER TABLE `reg_doc`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
