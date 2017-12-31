-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 07:27 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citysavings`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branchCode` int(11) NOT NULL,
  `branchName` varchar(30) NOT NULL,
  `branchRegion` enum('NCR','Region I','CAR','Region II','Region III','Region IV-A','MIMAROPA','Region V','NIR','Region VII','Region VIII','Region IX','Region X','Region XI','Region XII','Region XIII','ARMM') NOT NULL,
  `branchAddress` varchar(80) NOT NULL,
  `branchStatus` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branchCode`, `branchName`, `branchRegion`, `branchAddress`, `branchStatus`) VALUES
(301, 'Head Office', 'Region VII', 'City Savings Financial Plaza, Corner Osmeña Blvd. & P. Burgos St., Cebu City', 'ACTIVE'),
(404, 'Error', 'Region VII', 'Error St. Cebu City', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `deviceSerialNO` varchar(30) NOT NULL,
  `deviceName` varchar(30) NOT NULL,
  `deviceBrand` varchar(30) NOT NULL,
  `deviceModelNo` varchar(30) NOT NULL,
  `deviceOSProdKey` varchar(30) DEFAULT NULL,
  `deviceSoftwares` varchar(300) NOT NULL,
  `deviceType` enum('PC','Laptop','Tablet','Printer','Avaya','Others') NOT NULL,
  `deviceLocation` int(11) NOT NULL,
  `deviceOwner` varchar(30) NOT NULL,
  `deviceLastSupportBy` varchar(30) NOT NULL,
  `deviceLastSupport` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deviceStatus` enum('WORKING','DISPOSED','FOR REPAIR') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`deviceSerialNO`, `deviceName`, `deviceBrand`, `deviceModelNo`, `deviceOSProdKey`, `deviceSoftwares`, `deviceType`, `deviceLocation`, `deviceOwner`, `deviceLastSupportBy`, `deviceLastSupport`, `deviceStatus`) VALUES
('A123B321', 'CSB40499999D2', 'ACER', 'E5-123A-404W', '1234567890', 'WIN 10, MS Office', 'PC', 404, '99999', '99999', '2017-10-15 18:45:12', 'WORKING');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` varchar(30) NOT NULL,
  `empPassword` varchar(30) NOT NULL DEFAULT '123456',
  `empFName` varchar(30) NOT NULL,
  `empMName` varchar(30) DEFAULT NULL,
  `empLName` varchar(30) NOT NULL,
  `empPosition` varchar(30) NOT NULL,
  `empStatus` enum('ACTIVE','INACTIVE') NOT NULL,
  `empBranchCode` int(11) NOT NULL,
  `empLastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `empLastModifiedBy` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `empPassword`, `empFName`, `empMName`, `empLName`, `empPosition`, `empStatus`, `empBranchCode`, `empLastModified`, `empLastModifiedBy`) VALUES
('99999', '123456', 'Super', '', 'Admin', 'Super Admin', 'ACTIVE', 301, '2017-10-15 18:49:07', '99999');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logID` int(11) NOT NULL,
  `logRemarks` enum('SUPPORT','DISPOSE','INSTALL','TRANSFER','UPDATE','REFORMAT','REPAIR','NEW') NOT NULL,
  `logDescription` varchar(100) NOT NULL,
  `logStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logDeviceSerial` varchar(30) NOT NULL,
  `logBranchCode` int(11) NOT NULL,
  `logOwner` varchar(30) NOT NULL,
  `logMadeBy` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logID`, `logRemarks`, `logDescription`, `logStamp`, `logDeviceSerial`, `logBranchCode`, `logOwner`, `logMadeBy`) VALUES
(1, 'NEW', 'NEW DEVICE', '2017-10-15 18:42:30', 'A123B321', 301, '99999', '99999'),
(2, 'NEW', 'UPDATED USING EDIT BUTTON', '2017-10-15 18:44:00', 'A123B321', 301, '99999', '99999'),
(3, 'TRANSFER', 'Transfer Laptop to 404', '2017-10-15 18:45:12', 'A123B321', 404, '99999', '99999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branchCode`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`deviceSerialNO`),
  ADD KEY `devices_ibfk_1` (`deviceLocation`),
  ADD KEY `devices_ibfk_3` (`deviceOwner`),
  ADD KEY `devices_ibfk_2` (`deviceLastSupportBy`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `employee_ibfk_1` (`empBranchCode`),
  ADD KEY `employee_ibfk_2` (`empLastModifiedBy`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`),
  ADD KEY `logs_ibfk_1` (`logBranchCode`),
  ADD KEY `logs_ibfk_2` (`logDeviceSerial`),
  ADD KEY `logs_ibfk_3` (`logOwner`),
  ADD KEY `logs_ibfk_4` (`logMadeBy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_ibfk_2` FOREIGN KEY (`deviceLastSupportBy`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `devices_ibfk_3` FOREIGN KEY (`deviceOwner`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`empBranchCode`) REFERENCES `branches` (`branchCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`empLastModifiedBy`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`logBranchCode`) REFERENCES `branches` (`branchCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`logDeviceSerial`) REFERENCES `devices` (`deviceSerialNO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `logs_ibfk_3` FOREIGN KEY (`logOwner`) REFERENCES `employee` (`empID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `logs_ibfk_4` FOREIGN KEY (`logMadeBy`) REFERENCES `employee` (`empID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
