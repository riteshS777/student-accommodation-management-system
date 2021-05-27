-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 11:30 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students_room`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `AEmail` varchar(255) NOT NULL,
  `APassword` varchar(255) NOT NULL,
  `Date Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `AEmail`, `APassword`, `Date Time`) VALUES
(1, 'demoadmin@gmail.com', '12345', '2021-05-19 19:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `ID` int(11) NOT NULL,
  `SEmail` varchar(255) NOT NULL,
  `RoomID` varchar(255) NOT NULL,
  `payment_status` text NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`ID`, `SEmail`, `RoomID`, `payment_status`, `DateTime`) VALUES
(2, 'demomail2@gmail.com', '3001A', '1', '2021-05-27 14:51:50'),
(3, 'demomail3@gmail.com', '2001A', '0', '2021-05-27 14:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `ID` int(11) NOT NULL,
  `Room ID` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Charge` int(11) NOT NULL,
  `Room Status` varchar(255) NOT NULL,
  `Date Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`ID`, `Room ID`, `Type`, `Location`, `Charge`, `Room Status`, `Date Time`) VALUES
(1, '1001A', 'Standard', '1st Floor', 69, 'Available', '2021-05-21 17:50:51'),
(2, '2001A', 'Delux', '2nd Floor', 110, 'Available', '2021-05-21 17:58:28'),
(3, '3001A', 'Super Delux', '3rd Floor', 190, 'Allocated', '2021-05-21 18:01:26'),
(4, '4001A', 'Premium Delux', '4th Floor', 230, 'Available', '2021-05-22 11:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `Student Name` varchar(255) NOT NULL,
  `SEmail` varchar(255) NOT NULL,
  `SPassword` varchar(255) NOT NULL,
  `Date Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Student Name`, `SEmail`, `SPassword`, `Date Time`) VALUES
(1, 'Demo Student1', 'demomail1@gmail.com', '12345', '2021-05-27 14:49:28'),
(2, 'Demo Student2', 'demomail2@gmail.com', '1234', '2021-05-27 14:49:43'),
(3, 'Demo Student3', 'demomail3@gmail.com', '123', '2021-05-27 14:49:54'),
(4, 'Demo Student4', 'demomail4@gmail.com', '123', '2021-05-27 14:56:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
