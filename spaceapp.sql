-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 08:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spaceapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `ShipID` int(11) NOT NULL,
  `ShipName` varchar(20) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ship`
--

INSERT INTO `ship` (`ShipID`, `ShipName`, `reg_date`, `TypeID`) VALUES
(1, 'Shiiip1', '2019-03-10 19:40:26', 1),
(2, '', '2019-03-10 19:40:54', 2),
(3, 'Shiip', '2019-03-10 19:41:00', 3),
(4, 'Shippp', '2019-03-10 19:41:09', 3);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TypeID` int(11) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TypeID`, `Type`) VALUES
(1, 'Type 1'),
(2, 'Type 2'),
(3, 'Type 3'),
(4, 'Type 4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`ShipID`),
  ADD KEY `TypeID` (`TypeID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `ShipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ship`
--
ALTER TABLE `ship`
  ADD CONSTRAINT `ship_ibfk_1` FOREIGN KEY (`TypeID`) REFERENCES `type` (`TypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
