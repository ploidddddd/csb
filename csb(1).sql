-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 12:32 PM
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
-- Database: `csb`
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
(404, 'Error', 'Region VII', 'Error St. Cebu City', 'ACTIVE'),
(502, 'Tacloban Branch', 'Region VIII', 'Tacloban', 'ACTIVE'),
(504, 'Sogod-EO ', 'Region VIII', 'Southern Leyte', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `deviceID` int(11) NOT NULL,
  `deviceSerialNo` varchar(30) NOT NULL,
  `deviceOwner` varchar(30) NOT NULL,
  `deviceLocation` int(11) NOT NULL,
  `deviceName` varchar(30) NOT NULL,
  `deviceBrand` varchar(30) NOT NULL,
  `deviceType` enum('Desktop','Laptop','Tablet') NOT NULL,
  `deviceUnitType` enum('New','Service Unit') NOT NULL,
  `deviceProcessor` varchar(30) NOT NULL,
  `deviceMemory` varchar(30) NOT NULL,
  `deviceDisk` varchar(30) NOT NULL,
  `deviceDiskSerial` varchar(30) NOT NULL,
  `deviceLANIP` varchar(30) NOT NULL,
  `deviceLANMAC` varchar(30) NOT NULL,
  `deviceWLANIP` varchar(30) NOT NULL,
  `deviceWLANMAC` varchar(30) NOT NULL,
  `devicePower` enum('UPS','NORMAL','W/ SURGE PROTECTOR','OUTLETS') NOT NULL,
  `deviceStatus` enum('WORKING','DISPOSED','FOR REPAIR') NOT NULL,
  `deviceAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deviceAddedBy` int(11) NOT NULL,
  `deviceLastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deviceLastModifiedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`deviceID`, `deviceSerialNo`, `deviceOwner`, `deviceLocation`, `deviceName`, `deviceBrand`, `deviceType`, `deviceUnitType`, `deviceProcessor`, `deviceMemory`, `deviceDisk`, `deviceDiskSerial`, `deviceLANIP`, `deviceLANMAC`, `deviceWLANIP`, `deviceWLANMAC`, `devicePower`, `deviceStatus`, `deviceAdded`, `deviceAddedBy`, `deviceLastModified`, `deviceLastModifiedBy`) VALUES
(1, '123123123123', 'ADMIN123', 301, '123123123123', '123123123', 'Tablet', 'New', '123123123', '123123123', '123123123', '123123213', '123123123', '123123123', '123123123', '123123123', 'NORMAL', 'WORKING', '2017-10-20 23:42:47', 1, '2017-10-20 23:42:47', 1),
(2, '5CD70742M9', 'ADMIN123', 502, 'CSB108807356L', 'HP COMPAQ', 'Laptop', 'New', 'INTEL CORE i3', '2gb', '500GB', 'WD-WCC2EDC26969', '10.203.31.121', '78-E3-B5-BF-8E-CI', '10.203.31.121', '78-E3-B5-BF-8E-CI', 'NORMAL', 'WORKING', '2017-10-25 01:45:51', 1, '2017-10-25 01:45:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` varchar(30) NOT NULL,
  `empFName` varchar(30) NOT NULL,
  `empMName` varchar(30) DEFAULT NULL,
  `empLName` varchar(30) NOT NULL,
  `empPosition` varchar(30) NOT NULL,
  `empStatus` enum('ACTIVE','INACTIVE') NOT NULL,
  `empBranchCode` int(11) NOT NULL,
  `empAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `empAddedBy` int(11) NOT NULL,
  `empLastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `empLastModifiedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `empFName`, `empMName`, `empLName`, `empPosition`, `empStatus`, `empBranchCode`, `empAdded`, `empAddedBy`, `empLastModified`, `empLastModifiedBy`) VALUES
('ADMIN123', 'Super', NULL, 'Admin', 'Super Admin', 'ACTIVE', 301, '2017-10-20 10:09:10', 1, '2017-10-20 10:09:10', 1),
('NGKHAI7', 'Venerando JR', 'Edano', 'Inoc', 'IT-SUPPORT', 'ACTIVE', 301, '2017-10-25 01:50:57', 1, '2017-10-25 01:50:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `install`
--

CREATE TABLE `install` (
  `installID` int(11) NOT NULL,
  `installSoftwareID` int(11) NOT NULL,
  `installDeviceID` int(11) NOT NULL,
  `installStatus` enum('INSTALLED','UNINSTALLED') NOT NULL,
  `installAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `installAddedBy` int(11) NOT NULL,
  `installLastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `installLastModifiedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `install`
--

INSERT INTO `install` (`installID`, `installSoftwareID`, `installDeviceID`, `installStatus`, `installAdded`, `installAddedBy`, `installLastModified`, `installLastModifiedBy`) VALUES
(1, 5, 1, 'INSTALLED', '2017-10-20 23:42:47', 1, '2017-10-20 23:42:47', 1),
(2, 9, 1, 'INSTALLED', '2017-10-20 23:42:47', 1, '2017-10-20 23:42:47', 1),
(3, 10, 1, 'INSTALLED', '2017-10-20 23:42:47', 1, '2017-10-20 23:42:47', 1),
(4, 11, 1, 'INSTALLED', '2017-10-20 23:42:47', 1, '2017-10-20 23:42:47', 1),
(5, 1, 1, 'INSTALLED', '2017-10-20 23:42:47', 1, '2017-10-20 23:42:47', 1),
(6, 2, 1, 'INSTALLED', '2017-10-20 23:42:47', 1, '2017-10-20 23:42:47', 1),
(7, 14, 1, 'INSTALLED', '2017-10-20 23:42:47', 1, '2017-10-20 23:42:47', 1),
(8, 15, 1, 'INSTALLED', '2017-10-20 23:42:47', 1, '2017-10-20 23:42:47', 1),
(9, 5, 2, 'INSTALLED', '2017-10-25 01:45:51', 1, '2017-10-25 01:45:51', 1),
(10, 9, 2, 'INSTALLED', '2017-10-25 01:45:51', 1, '2017-10-25 01:45:51', 1),
(11, 1, 2, 'INSTALLED', '2017-10-25 01:45:51', 1, '2017-10-25 01:45:51', 1),
(12, 2, 2, 'INSTALLED', '2017-10-25 01:45:51', 1, '2017-10-25 01:45:51', 1),
(13, 16, 2, 'INSTALLED', '2017-10-25 01:45:51', 1, '2017-10-25 01:45:51', 1),
(14, 14, 2, 'INSTALLED', '2017-10-25 01:45:51', 1, '2017-10-25 01:45:51', 1),
(15, 15, 2, 'INSTALLED', '2017-10-25 01:45:51', 1, '2017-10-25 01:45:51', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `peripherals`
--

CREATE TABLE `peripherals` (
  `peripheralID` int(11) NOT NULL,
  `peripheralType` enum('Mouse','Keyboard','Monitor','Webcam','CD-Rom','Printer','Scanner') NOT NULL,
  `peripheralBrand` varchar(30) NOT NULL,
  `peripheralSerialNo` varchar(30) NOT NULL,
  `peripheralStatus` enum('WORKING','NOT WORKING') NOT NULL,
  `peripheralDeviceID` int(11) NOT NULL,
  `peripheralAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `peripheralAddedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peripherals`
--

INSERT INTO `peripherals` (`peripheralID`, `peripheralType`, `peripheralBrand`, `peripheralSerialNo`, `peripheralStatus`, `peripheralDeviceID`, `peripheralAdded`, `peripheralAddedBy`) VALUES
(1, 'Monitor', 'HP LV1911', '6CM31604HS', 'WORKING', 1, '2017-10-25 08:55:02', 1),
(2, 'Mouse', 'A4Tech', 'PH17030P720', 'WORKING', 1, '2017-10-25 09:08:30', 1),
(3, 'Keyboard', 'A4Tech', '3211212', 'WORKING', 1, '2017-10-25 09:16:06', 1),
(4, 'Printer', 'HP LaserJet', 'NPI90BFB9', 'WORKING', 1, '2017-10-25 09:20:26', 1),
(5, 'Scanner', 'HP', 'asdasdasdasdsad', 'WORKING', 1, '2017-10-25 09:20:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `softwareID` int(11) NOT NULL,
  `softwareName` varchar(30) NOT NULL,
  `softwareDescription` varchar(50) DEFAULT NULL,
  `softwareProdKey` varchar(30) NOT NULL,
  `softwareType` enum('OS','Office','Anti-Virus','Specialized','Browser') NOT NULL,
  `softwareStatus` enum('ACTIVE','INACTIVE') NOT NULL,
  `softwareAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `softwareAddedBy` int(11) NOT NULL,
  `softwareLastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `softwareLastModifiedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`softwareID`, `softwareName`, `softwareDescription`, `softwareProdKey`, `softwareType`, `softwareStatus`, `softwareAdded`, `softwareAddedBy`, `softwareLastModified`, `softwareLastModifiedBy`) VALUES
(1, 'Adobe Reader', 'PDF Reader', '', 'Specialized', 'ACTIVE', '2017-10-20 03:20:30', 1, '2017-10-21 04:27:21', 1),
(2, 'Adobe Flash Player', 'Player', '', 'Specialized', 'ACTIVE', '2017-10-20 03:20:47', 1, '2017-10-21 04:27:16', 1),
(3, 'MS Win XP Sp3', 'Sp3 ', '', 'OS', 'ACTIVE', '2017-10-20 20:26:47', 1, '2017-10-20 20:26:47', 1),
(4, 'MS Office XP', 'XP', '', 'Office', 'ACTIVE', '2017-10-20 20:30:13', 1, '2017-10-20 20:30:13', 1),
(5, 'MS Win 7 SP1', 'SP1', '', 'OS', 'ACTIVE', '2017-10-20 20:31:39', 1, '2017-10-20 20:31:39', 1),
(6, 'MS WIN 8 Pro', 'Windows 8', '', 'OS', 'ACTIVE', '2017-10-20 20:32:12', 1, '2017-10-20 20:32:12', 1),
(7, 'MS WIN 8.1', 'Windows 8', '', 'OS', 'ACTIVE', '2017-10-20 20:32:27', 1, '2017-10-20 20:32:27', 1),
(8, 'MS Win 10', 'Windows 10', '', 'OS', 'ACTIVE', '2017-10-20 20:32:47', 1, '2017-10-20 20:32:47', 1),
(9, 'MS Office 2007', 'Office 2007', '', 'Office', 'ACTIVE', '2017-10-20 20:42:38', 1, '2017-10-20 20:42:38', 1),
(10, 'MS Office 2010', 'Office 2010', '', 'Office', 'ACTIVE', '2017-10-20 20:43:00', 1, '2017-10-20 20:43:00', 1),
(11, 'MS Office 2013', '2013', '', 'Office', 'ACTIVE', '2017-10-20 20:43:17', 1, '2017-10-20 20:43:17', 1),
(12, 'MS Office 2016 Pro', 'New Office ', '', 'Office', 'ACTIVE', '2017-10-20 20:44:00', 1, '2017-10-20 20:44:00', 1),
(13, 'Libre Office', 'Libre', '', 'Office', 'ACTIVE', '2017-10-20 20:44:27', 1, '2017-10-20 20:44:27', 1),
(14, 'Sophos AV', 'Anti Virus', '', 'Anti-Virus', 'ACTIVE', '2017-10-20 20:48:13', 1, '2017-10-20 20:48:43', 1),
(15, 'MS Internet Explorer', 'IE', '', 'Browser', 'ACTIVE', '2017-10-20 21:08:53', 1, '2017-10-20 21:08:53', 1),
(16, 'Kofax', 'Description', '', 'Specialized', 'ACTIVE', '2017-10-25 01:42:54', 1, '2017-10-25 01:42:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userEmpID` varchar(30) NOT NULL,
  `userPassword` varchar(30) NOT NULL DEFAULT '123456',
  `userStatus` enum('ACTIVE','INACTIVE') NOT NULL,
  `userAddedBy` int(11) NOT NULL,
  `userAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userLastModifiedBy` int(11) NOT NULL,
  `userLastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userEmpID`, `userPassword`, `userStatus`, `userAddedBy`, `userAdded`, `userLastModifiedBy`, `userLastModified`) VALUES
(1, 'ADMIN123', '123456', 'ACTIVE', 1, '2017-10-25 09:56:30', 1, '2017-10-25 09:56:30'),
(2, 'NGKHAI7', '123456', 'ACTIVE', 1, '2017-10-25 09:56:42', 1, '2017-10-25 09:56:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branchCode`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`deviceID`),
  ADD KEY `deviceOwner` (`deviceOwner`),
  ADD KEY `deviceAddedBy` (`deviceAddedBy`),
  ADD KEY `deviceLastModifiedBy` (`deviceLastModifiedBy`),
  ADD KEY `deviceLocation` (`deviceLocation`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `employee_ibfk_1` (`empBranchCode`),
  ADD KEY `employee_ibfk_2` (`empLastModifiedBy`),
  ADD KEY `empAddedBy` (`empAddedBy`);

--
-- Indexes for table `install`
--
ALTER TABLE `install`
  ADD PRIMARY KEY (`installID`),
  ADD KEY `installDeviceID` (`installDeviceID`),
  ADD KEY `installSoftwareID` (`installSoftwareID`),
  ADD KEY `installAddedBy` (`installAddedBy`),
  ADD KEY `installLastModifiedBy` (`installLastModifiedBy`);

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
-- Indexes for table `peripherals`
--
ALTER TABLE `peripherals`
  ADD PRIMARY KEY (`peripheralID`),
  ADD KEY `peripheralDeviceID` (`peripheralDeviceID`),
  ADD KEY `peripheralAddedBy` (`peripheralAddedBy`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`softwareID`),
  ADD KEY `softwareAddedBy` (`softwareAddedBy`),
  ADD KEY `softwareLastModifiedBy` (`softwareLastModifiedBy`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userAddedBy` (`userAddedBy`),
  ADD KEY `userLastModifiedBy` (`userLastModifiedBy`),
  ADD KEY `userEmpID` (`userEmpID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `deviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `install`
--
ALTER TABLE `install`
  MODIFY `installID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peripherals`
--
ALTER TABLE `peripherals`
  MODIFY `peripheralID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `softwareID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`deviceOwner`) REFERENCES `employee` (`empID`),
  ADD CONSTRAINT `device_ibfk_4` FOREIGN KEY (`deviceLocation`) REFERENCES `branches` (`branchCode`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`empBranchCode`) REFERENCES `branches` (`branchCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `install`
--
ALTER TABLE `install`
  ADD CONSTRAINT `install_ibfk_1` FOREIGN KEY (`installDeviceID`) REFERENCES `device` (`deviceID`),
  ADD CONSTRAINT `install_ibfk_2` FOREIGN KEY (`installSoftwareID`) REFERENCES `software` (`softwareID`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`logBranchCode`) REFERENCES `branches` (`branchCode`),
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`logDeviceSerial`) REFERENCES `devices` (`deviceSerialNO`),
  ADD CONSTRAINT `logs_ibfk_3` FOREIGN KEY (`logMadeBy`) REFERENCES `employee` (`empID`),
  ADD CONSTRAINT `logs_ibfk_4` FOREIGN KEY (`logOwner`) REFERENCES `employee` (`empID`);

--
-- Constraints for table `peripherals`
--
ALTER TABLE `peripherals`
  ADD CONSTRAINT `peripherals_ibfk_1` FOREIGN KEY (`peripheralDeviceID`) REFERENCES `device` (`deviceID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`userEmpID`) REFERENCES `employee` (`empID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
