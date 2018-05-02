-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 06:10 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `status_name` enum('On-going','Completed','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status_name`) VALUES
(0, 'On-going'),
(1, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(30) NOT NULL,
  `task_description` text NOT NULL,
  `task_status` int(11) NOT NULL,
  `task_completed` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`task_id`, `task_name`, `task_description`, `task_status`, `task_completed`, `created_at`, `updated_at`) VALUES
(1, 'edd', 'edd', 1, '2018-05-02 01:53:15', '2018-05-02 01:53:05', '2018-05-02 01:53:15'),
(2, 'edd', 'edd', 1, '2018-05-02 01:53:13', '2018-05-02 01:53:08', '2018-05-02 01:53:13'),
(3, 'eddddddddddddddddddd', 'ed', 1, '2018-05-02 02:05:55', '2018-05-02 01:55:15', '2018-05-02 02:05:55'),
(4, 'scccc', 'c', 1, '2018-05-02 02:05:54', '2018-05-02 02:05:42', '2018-05-02 02:05:54'),
(5, 'eddd', 'edddd', 1, '2018-05-02 02:07:21', '2018-05-02 02:07:16', '2018-05-02 02:07:21'),
(6, 'eddd', 'edd', 1, '2018-05-02 06:09:47', '2018-05-02 06:08:24', '2018-05-02 06:09:47');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_task`
-- (See below for the actual view)
--
CREATE TABLE `view_task` (
`task_id` int(11)
,`task_name` varchar(30)
,`status_name` enum('On-going','Completed','','')
,`task_completed` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `view_task`
--
DROP TABLE IF EXISTS `view_task`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_task`  AS  select `tbl_task`.`task_id` AS `task_id`,`tbl_task`.`task_name` AS `task_name`,`tbl_status`.`status_name` AS `status_name`,`tbl_task`.`task_completed` AS `task_completed` from (`tbl_task` join `tbl_status`) where (`tbl_status`.`status_id` = `tbl_task`.`task_status`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `task_status` (`task_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD CONSTRAINT `tbl_task_ibfk_1` FOREIGN KEY (`task_status`) REFERENCES `tbl_status` (`status_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
