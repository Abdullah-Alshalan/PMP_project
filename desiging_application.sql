-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 01:49 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00"; 


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desiging_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `design_resource`
--

CREATE TABLE `design_resource` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `resources` varchar(100) DEFAULT NULL,
  `rate` double NOT NULL DEFAULT 0,
  `ovt` double NOT NULL DEFAULT 0,
  `cost` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `design_resource`
--

INSERT INTO `design_resource` (`id`, `name`, `type`, `material`, `resources`, `rate`, `ovt`, `cost`) VALUES
(1, 'test 1', 'Work', 'test', '50', 15, 50, 15),
(2, 'test 2', 'Work', 'test', '50', 15, 50, 15),
(3, 'asd', 'Material', 'test', '1', 23, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `design_task_interface`
--

CREATE TABLE `design_task_interface` (
  `task_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) DEFAULT NULL,
  `duration` int(11) NOT NULL DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `resources` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `design_task_interface`
--

INSERT INTO `design_task_interface` (`task_id`, `name`, `duration`, `start_date`, `end_date`, `resources`) VALUES
(1, 'test', 3, '2020-12-09', '2020-12-11', '1,2'),
(2, 'test', 4, '2020-12-08', '2020-12-11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `design_resource`
--
ALTER TABLE `design_resource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_task_interface`
--
ALTER TABLE `design_task_interface`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `design_resource`
--
ALTER TABLE `design_resource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
