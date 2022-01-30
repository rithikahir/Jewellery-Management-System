-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2017 at 08:37 AM
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
-- Database: `jewellery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `Password`) VALUES
('admin101', 'admin101');

-- --------------------------------------------------------

--
-- Table structure for table `base`
--

CREATE TABLE `base` (
  `Pure` varchar(5) NOT NULL,
  `Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `base`
--

INSERT INTO `base` (`Pure`, `Rate`) VALUES
('G22', 6000),
('G24', 8000),
('S22', 1000),
('S24', 500);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `BID` int(11) NOT NULL,
  `BQuantity` int(11) NOT NULL,
  `BAmount` float NOT NULL,
  `Tax` int(11) NOT NULL,
  `PDate` date NOT NULL,
  `TAmount` float NOT NULL,
  `EID` int(11) NOT NULL,
  `CID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`BID`, `BQuantity`, `BAmount`, `Tax`, `PDate`, `TAmount`, `EID`, `CID`) VALUES
(5001, 3, 27415, 6, '2017-10-08', 29059.9, 1004, 4005),
(5002, 2, 25680, 6, '2017-10-08', 27220.8, 1006, 4006),
(5004, 1, 12840, 6, '2017-10-08', 13610.4, 1006, 4005),
(5005, 26, 315675, 6, '2017-10-08', 334616, 1006, 4005),
(5020, 2, 7350, 20, '2017-10-09', 8820, 1003, 4006),
(5021, 2, 24960, 20, '2017-10-10', 29952, 1003, 4006),
(5022, 2, 174400, 20, '2017-10-10', 209280, 1004, 4007),
(5026, 5, 352475, 20, '2017-10-10', 422970, 1003, 4007),
(5027, 3, 224320, 20, '2017-10-10', 269184, 1003, 4005),
(5028, 1, 87200, 20, '2017-10-10', 104640, 1003, 4006),
(5029, 1, 45360, 20, '2017-10-10', 54432, 1003, 4011),
(5030, 1, 87200, 20, '2017-10-10', 104640, 1003, 4007),
(5031, 1, 3675, 20, '2017-10-10', 4410, 1003, 4011),
(5032, 1, 49920, 20, '2017-10-10', 59904, 1003, 4011),
(5033, 1, 3675, 20, '2017-10-10', 4410, 1001, 4010),
(5034, 1, 87200, 20, '2017-10-10', 104640, 1001, 4009),
(5035, 1, 87200, 20, '2017-10-10', 104640, 1003, 4009),
(5036, 1, 45360, 20, '2017-10-10', 54432, 1003, 4005),
(5037, 1, 45360, 20, '2017-10-10', 54432, 1003, 4007),
(5038, 1, 3675, 20, '2017-10-11', 4410, 1003, 4008),
(5039, 1, 49920, 20, '2017-10-11', 59904, 1003, 4008),
(5040, 1, 87200, 20, '2017-10-11', 104640, 1003, 4006),
(5041, 6, 235345, 20, '2017-10-12', 282414, 1003, 4005),
(5042, 1, 49920, 20, '2017-10-12', 59904, 1003, 4006),
(5043, 3, 140640, 20, '2017-10-12', 168768, 1003, 4013),
(5044, 2, 95280, 20, '2017-10-12', 114336, 1003, 4006),
(5045, 1, 3675, 20, '2017-10-12', 4410, 1003, 4007);

--
-- Triggers `bill`
--
DELIMITER $$
CREATE TRIGGER `tr_total` BEFORE UPDATE ON `bill` FOR EACH ROW set NEW.TAmount= (NEW.BAmount + (NEW.BAmount * (NEW.Tax/100)))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bill_jewellery`
--

CREATE TABLE `bill_jewellery` (
  `BID` int(11) NOT NULL,
  `JID` int(11) NOT NULL,
  `JQuantity` int(11) NOT NULL,
  `Grams` float NOT NULL,
  `Gold` varchar(5) NOT NULL,
  `JRate` int(11) NOT NULL,
  `JMakeCost` int(11) NOT NULL,
  `JAmount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_jewellery`
--

INSERT INTO `bill_jewellery` (`BID`, `JID`, `JQuantity`, `Grams`, `Gold`, `JRate`, `JMakeCost`, `JAmount`) VALUES
(5001, 3001, 1, 8, 'G22', 0, 7, 12840),
(5001, 3002, 1, 7, 'S24', 0, 5, 3675),
(5001, 3003, 1, 10, 'G24', 0, 9, 10900),
(5002, 3001, 1, 8, 'G22', 0, 7, 12840),
(5002, 3001, 1, 8, 'G22', 0, 7, 12840),
(5004, 3001, 1, 8, 'G22', 0, 7, 12840),
(5005, 3002, 1, 7, 'S24', 0, 5, 3675),
(5005, 3001, 0, 8, 'G22', 0, 4, 0),
(5005, 3001, 25, 8, 'G22', 0, 4, 312000),
(5020, 3002, 2, 7, 'S24', 0, 5, 7350),
(5021, 3001, 2, 8, 'G22', 0, 4, 24960),
(5022, 3003, 2, 10, 'G24', 0, 9, 174400),
(5026, 3003, 4, 10, 'G24', 0, 9, 348800),
(5026, 3002, 1, 7, 'S24', 0, 5, 3675),
(5027, 3001, 1, 8, 'G22', 6000, 4, 49920),
(5027, 3003, 2, 10, 'G24', 8000, 9, 174400),
(5028, 3003, 1, 10, 'G24', 8000, 9, 87200),
(5029, 3004, 1, 7, 'G22', 6000, 8, 45360),
(5030, 3003, 1, 10, 'G24', 8000, 9, 87200),
(5031, 3002, 1, 7, 'S24', 500, 5, 3675),
(5032, 3001, 1, 8, 'G22', 6000, 4, 49920),
(5033, 3002, 1, 7, 'S24', 500, 5, 3675),
(5034, 3003, 1, 10, 'G24', 8000, 9, 87200),
(5035, 3003, 1, 10, 'G24', 8000, 9, 87200),
(5036, 3004, 1, 7, 'G22', 6000, 8, 45360),
(5037, 3004, 1, 7, 'G22', 6000, 8, 45360),
(5038, 3002, 1, 7, 'S24', 500, 5, 3675),
(5039, 3001, 1, 8, 'G22', 6000, 4, 49920),
(5040, 3003, 1, 10, 'G24', 8000, 9, 87200),
(5041, 3001, 1, 8, 'G22', 6000, 4, 49920),
(5041, 3002, 3, 7, 'S24', 500, 5, 11025),
(5041, 3003, 2, 10, 'G24', 8000, 9, 174400),
(5042, 3001, 1, 8, 'G22', 6000, 4, 49920),
(5043, 3001, 1, 8, 'G22', 6000, 4, 49920),
(5043, 3004, 2, 7, 'G22', 6000, 8, 90720),
(5044, 3001, 1, 8, 'G22', 6000, 4, 49920),
(5044, 3004, 1, 7, 'G22', 6000, 8, 45360),
(5045, 3002, 1, 7, 'S24', 500, 5, 3675);

--
-- Triggers `bill_jewellery`
--
DELIMITER $$
CREATE TRIGGER `tr_amount` BEFORE INSERT ON `bill_jewellery` FOR EACH ROW Begin
set @amt= (NEW.JQuantity * (NEW.Grams * (select Rate from base where Pure=NEW.Gold)));

set NEW.JAmount= ( ( ( @amt * NEW.JMakeCost ) / 100 ) + @amt ) ;

end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_bill` AFTER INSERT ON `bill_jewellery` FOR EACH ROW BEGIN

update bill set BQuantity= BQuantity + (NEW.JQuantity) where BID=NEW.BID;
update bill set BAmount= BAmount + (NEW.JAmount) where BID=NEW.BID;

update jewel set SQuantity= SQuantity - (NEW.JQuantity) where JID=NEW.JID;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CID` int(11) NOT NULL,
  `CName` varchar(20) NOT NULL,
  `CCont` bigint(10) NOT NULL,
  `CAddr` varchar(50) NOT NULL,
  `CGID` varchar(12) NOT NULL,
  `EID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CID`, `CName`, `CCont`, `CAddr`, `CGID`, `EID`) VALUES
(4005, 'Karen J. French', 3334394182, 'LandhausstraÃŸe 17\r\n16208 Eberswalde', '5113', 1004),
(4006, 'Marion A. Howard', 8928135665, 'Am Borsigturm 22\r\n41462 Neuss Vogelsang', '2147483647', 1004),
(4007, 'Emella Watson', 9975461047, 'Hamburg,Germany', '13654', 1003),
(4008, 'Selena Gomez', 8928135665, '5 Star Street,Barcelona', '1245789630', 1008),
(4009, 'Marcos Ferreira', 988766271, 'Rua Padre AntÃ´nio Eising, 38\r\nBrusque-SC', '111', 1003),
(4010, 'Jakob M. Lassen', 234234234, 'Rua Padre AntÃ´nio Eising, 38\r\nBrusque-SC', '222', 1003),
(4011, 'Maria Ebersbache', 981831923, 'Schoenebergerstrasse 71\r\n84573 SchÃ¶nberg', '3333', 1003),
(4012, 'Max Muller', 9970171798, '21 golden street germany', '111-222', 1003),
(4013, 'Abhijeet Gaikwad', 8928135665, '95 somwar peth', '111122223333', 1003);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EID` int(11) NOT NULL,
  `EPass` varchar(11) NOT NULL,
  `EName` varchar(20) NOT NULL,
  `EAddr` varchar(50) NOT NULL,
  `ECont` bigint(10) NOT NULL,
  `Section` varchar(20) NOT NULL,
  `Shift` int(11) NOT NULL,
  `EGID` varchar(20) NOT NULL,
  `Salary` int(11) NOT NULL,
  `AID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EID`, `EPass`, `EName`, `EAddr`, `ECont`, `Section`, `Shift`, `EGID`, `Salary`, `AID`) VALUES
(1001, 'Charlie123', 'Charlie Puth', '21 Street, Central Perk, NYC, USA', 1212121212, 'Ring', 2, '1111-2222-3333', 25000, 'admin101'),
(1002, 'Shawn123', 'Shawn Mendens', '44 Shirley Ave. \r\nWest Chicago, IL 60185', 1111111111, 'Bangles', 2, '1234-1234-1234', 15000, 'admin101'),
(1003, 'lily123', 'Lily Cerny', '4 Goldfield Rd. \r\nHonolulu, HI 96815', 2147483647, 'Anklets', 1, '111-222-333', 20000, 'admin101'),
(1004, 'Paul123', 'Paul Walker', '71 Pilgrim Avenue \r\nChevy Chase, MD 20815', 123456789, 'Magalsutra', 1, '4444455555', 35000, 'admin101'),
(1005, 'Gallert', 'Ross', '70 Bowman St. South Windsor, CT 06074', 9975461047, 'Hearings', 1, '1212112', 12000, 'admin101'),
(1006, 'Ned123', 'Ned Stark', ' 13 ,Lord of winterfall,GOT ', 7387018471, 'Bangles', 2, '123456', 30000, 'admin101'),
(1008, 'Adam123', 'Adam Gilchrist', '4 Goldfield Rd. \r\nHonolulu, HI 96815', 9970171798, 'Antic Jewellery', 1, '123455678', 40000, 'admin101'),
(1009, 'Francesca', 'Francesca Cole', '51 St Maurices Road\r\nPRINCES RISBOROUGH\r\nHP27 3SW', 4152483455, 'Mangalsutra', 2, '070 2824 0436', 10000, 'admin101'),
(1010, 'Courtney123', 'Courtney Quinn', '39 Cunnery Rd\r\nMANDALLY\r\nPH35 5DU', 78, 'Necklace', 2, 'CY 22 29 94 C', 13000, 'admin101'),
(1014, 'Niels123', 'Niels C. Villadsen', '11 Southend Avenue\r\nBLACKDOWN\r\nDT8 9FJ', 7739579416, 'Necklace', 2, 'AG 89 04 81 A', 16000, 'admin101'),
(1015, 'Sander123', 'Sander L. Olesen', '91 Argyll Road\r\nLLANBEDR\r\nLL45 5WT', 7929531778, 'Antic Jewellery', 2, 'RR 40 08 06 C', 15000, 'admin101'),
(1030, 'keith123', 'Keith E. Williams', '174 Reppert Coal Road\r\nJackson, MS 39211', 9552611647, 'Chain', 1, '111aaa222', 20000, 'admin101');

-- --------------------------------------------------------

--
-- Table structure for table `jewel`
--

CREATE TABLE `jewel` (
  `JID` int(11) NOT NULL,
  `TOJ` varchar(20) NOT NULL,
  `Gold` varchar(5) NOT NULL,
  `Grams` float NOT NULL,
  `SQuantity` int(11) NOT NULL,
  `MakeCost` int(11) NOT NULL,
  `AID` varchar(10) NOT NULL,
  `SID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jewel`
--

INSERT INTO `jewel` (`JID`, `TOJ`, `Gold`, `Grams`, `SQuantity`, `MakeCost`, `AID`, `SID`) VALUES
(3001, 'Ring', 'G22', 8, 97, 4, 'admin101', 2001),
(3002, 'Earings', 'S24', 7, 220, 5, 'admin101', 2001),
(3003, 'Bangles', 'G24', 10, 47, 9, 'admin101', 2001),
(3004, 'Chain', 'G22', 7, 294, 8, 'admin101', 2005);

--
-- Triggers `jewel`
--
DELIMITER $$
CREATE TRIGGER `tr_quantity` BEFORE UPDATE ON `jewel` FOR EACH ROW IF (NEW.SQuantity < 0) THEN
SIGNAL SQLSTATE '80000'
SET MESSAGE_TEXT='stock empty contact supplier';
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SID` int(11) NOT NULL,
  `SName` varchar(20) NOT NULL,
  `Company` varchar(20) NOT NULL,
  `Compcode` varchar(11) NOT NULL,
  `SAddr` varchar(50) NOT NULL,
  `SCont` bigint(10) NOT NULL,
  `AID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SID`, `SName`, `Company`, `Compcode`, `SAddr`, `SCont`, `AID`) VALUES
(2001, 'Matrin Garande', 'Shining diamonds', 'shine343', '20 East Street, Melbourne, USA', 2147483647, 'admin101'),
(2005, 'Candance R. Hines', 'Shapithe', 'Yaicei7a', '3849 Java Lane\r\nClover, SC 29710', 8038631619, 'admin101'),
(2013, 'Jeffrey C. Snyder', 'Woundescous', 'Wound13', '1868 Thompson Drive\r\nRichmond, CA 94801', 5103746928, 'admin101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`),
  ADD UNIQUE KEY `passunique` (`Password`);

--
-- Indexes for table `base`
--
ALTER TABLE `base`
  ADD PRIMARY KEY (`Pure`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BID`),
  ADD KEY `BEID` (`EID`),
  ADD KEY `BCID` (`CID`);

--
-- Indexes for table `bill_jewellery`
--
ALTER TABLE `bill_jewellery`
  ADD KEY `ID` (`JID`,`BID`),
  ADD KEY `constraint8` (`BID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`),
  ADD UNIQUE KEY `CGID` (`CGID`),
  ADD KEY `CID` (`CID`),
  ADD KEY `constraint3` (`EID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EID`),
  ADD UNIQUE KEY `EPass` (`EPass`),
  ADD UNIQUE KEY `EGID` (`EGID`),
  ADD KEY `EAID` (`AID`);

--
-- Indexes for table `jewel`
--
ALTER TABLE `jewel`
  ADD PRIMARY KEY (`JID`),
  ADD KEY `constraint5` (`SID`),
  ADD KEY `constraint4` (`AID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SID`),
  ADD UNIQUE KEY `Compcode` (`Compcode`),
  ADD KEY `SAID` (`AID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5046;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4014;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1031;

--
-- AUTO_INCREMENT for table `jewel`
--
ALTER TABLE `jewel`
  MODIFY `JID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3005;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2014;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `constraint6` FOREIGN KEY (`EID`) REFERENCES `employee` (`EID`),
  ADD CONSTRAINT `constraint7` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`);

--
-- Constraints for table `bill_jewellery`
--
ALTER TABLE `bill_jewellery`
  ADD CONSTRAINT `constraint8` FOREIGN KEY (`BID`) REFERENCES `bill` (`BID`),
  ADD CONSTRAINT `constraint9` FOREIGN KEY (`JID`) REFERENCES `jewel` (`JID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `constraint3` FOREIGN KEY (`EID`) REFERENCES `employee` (`EID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `constraint1` FOREIGN KEY (`AID`) REFERENCES `admin` (`AID`);

--
-- Constraints for table `jewel`
--
ALTER TABLE `jewel`
  ADD CONSTRAINT `constraint4` FOREIGN KEY (`AID`) REFERENCES `admin` (`AID`),
  ADD CONSTRAINT `constraint5` FOREIGN KEY (`SID`) REFERENCES `supplier` (`SID`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `constraint2` FOREIGN KEY (`AID`) REFERENCES `admin` (`AID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
