-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 06:04 PM
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
-- Database: `exam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lib_regions`
--

CREATE TABLE `lib_regions` (
  `region_code` varchar(10) NOT NULL,
  `region_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lib_regions`
--

INSERT INTO `lib_regions` (`region_code`, `region_name`) VALUES
('050000000', 'REGION V [Bicol Region]'),
('060000000', 'REGION VI [Western Visayas]'),
('070000000', 'REGION VII [Central Visayas]'),
('080000000', 'REGION VIII [Eastern Visayas]');

-- --------------------------------------------------------

--
-- Table structure for table `lib_sex`
--

CREATE TABLE `lib_sex` (
  `sex_id` int(11) NOT NULL,
  `name` char(10) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lib_sex`
--

INSERT INTO `lib_sex` (`sex_id`, `name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Unknown');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_list`
--

CREATE TABLE `volunteer_list` (
  `volunteerid` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `sex_id` int(11) DEFAULT NULL,
  `region_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer_list`
--

INSERT INTO `volunteer_list` (`volunteerid`, `firstname`, `lastname`, `age`, `birthdate`, `sex_id`, `region_code`) VALUES
(1, 'Christian', 'Cernechez', 27, '1996-07-05 00:00:00', 1, '050000000'),
(2, 'Antonio', 'Tupaz', 27, '1996-05-07 00:00:00', 1, '050000000'),
(3, 'John', 'Doe', 29, '1994-07-05 00:00:00', 1, '060000000'),
(4, 'Sheen', 'Cernechez', 29, '1994-04-09 00:00:00', 2, '060000000'),
(6, 'Jane', 'Doe', 28, '1995-04-02 00:00:00', 2, '070000000'),
(7, 'Vin', 'Diesel', 30, '1993-04-04 00:00:00', 1, '080000000'),
(8, 'Bruno', 'Mars', 31, '1992-07-03 00:00:00', 1, '060000000'),
(9, 'Taylor', 'Swift', 28, '1995-05-05 00:00:00', 2, '070000000'),
(10, 'Selena', 'Gomez', 26, '1997-04-02 00:00:00', 2, '080000000'),
(11, 'Anne', 'Curtis', 30, '1993-03-03 00:00:00', 2, '080000000'),
(12, 'Kath', 'Bernardo', 28, '1995-09-09 00:00:00', 2, '080000000'),
(13, 'Marvin', 'Pellarda', 25, '1998-08-02 00:00:00', 1, '050000000'),
(14, 'Elias', 'Blanquera', 27, '1996-06-03 00:00:00', 1, '050000000'),
(15, 'Joan', 'Diaz', 27, '1996-02-02 00:00:00', 2, '070000000'),
(16, 'Jhun', 'Corteza', 28, '1995-09-09 00:00:00', 1, '070000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lib_regions`
--
ALTER TABLE `lib_regions`
  ADD PRIMARY KEY (`region_code`);

--
-- Indexes for table `lib_sex`
--
ALTER TABLE `lib_sex`
  ADD PRIMARY KEY (`sex_id`);

--
-- Indexes for table `volunteer_list`
--
ALTER TABLE `volunteer_list`
  ADD PRIMARY KEY (`volunteerid`),
  ADD KEY `sex_id` (`sex_id`),
  ADD KEY `region_code` (`region_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lib_sex`
--
ALTER TABLE `lib_sex`
  MODIFY `sex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `volunteer_list`
--
ALTER TABLE `volunteer_list`
  MODIFY `volunteerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `volunteer_list`
--
ALTER TABLE `volunteer_list`
  ADD CONSTRAINT `volunteer_list_ibfk_1` FOREIGN KEY (`sex_id`) REFERENCES `lib_sex` (`sex_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `volunteer_list_ibfk_2` FOREIGN KEY (`region_code`) REFERENCES `lib_regions` (`region_code`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
