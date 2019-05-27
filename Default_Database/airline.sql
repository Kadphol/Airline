-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2019 at 12:45 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `AddOn`
--

CREATE TABLE `AddOn` (
  `AddOnID` int(3) NOT NULL,
  `AddOnName` text NOT NULL,
  `AddOnPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Airplane`
--

CREATE TABLE `Airplane` (
  `AirplaneID` int(6) NOT NULL,
  `RegisterDate` text NOT NULL,
  `PayLoad` float NOT NULL,
  `Status` enum('N','A') NOT NULL,
  `ModelNo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AirplaneSeat`
--

CREATE TABLE `AirplaneSeat` (
  `SeatID` varchar(3) NOT NULL,
  `AirplaneID` int(6) NOT NULL,
  `ClassName` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Airport`
--

CREATE TABLE `Airport` (
  `AirportID` varchar(3) NOT NULL,
  `AirportName` text NOT NULL,
  `Address` text NOT NULL,
  `AirportTax` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Billing`
--

CREATE TABLE `Billing` (
  `BillingID` int(10) NOT NULL,
  `CardNo` varchar(16) NOT NULL,
  `MemberID` int(6) NOT NULL,
  `MemberPromotionID` int(6) NOT NULL,
  `PromotionCode` int(8) NOT NULL,
  `PayDate` date NOT NULL,
  `AmountPaid` float NOT NULL,
  `Status` enum('P','U') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `BookingID` int(6) NOT NULL,
  `FlightID` int(6) NOT NULL,
  `PassengerID` int(8) NOT NULL,
  `BillingID` int(10) NOT NULL,
  `SeatID` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `ClassName` varchar(8) NOT NULL,
  `ServiceDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `classcount`
-- (See below for the actual view)
--
CREATE TABLE `classcount` (
`ClassName` varchar(8)
,`Count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `Flight`
--

CREATE TABLE `Flight` (
  `FlightID` int(6) NOT NULL,
  `DepartureDate` date NOT NULL,
  `ArrivalDate` date NOT NULL,
  `RouteID` int(7) NOT NULL,
  `AirplaneID` int(6) NOT NULL,
  `Gate` varchar(3) NOT NULL,
  `StartOperation` date NOT NULL,
  `EndOperation` date NOT NULL,
  `DOO` varchar(15) NOT NULL,
  `Status` enum('N','A') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `FlightSeatPrice`
--

CREATE TABLE `FlightSeatPrice` (
  `FlightID` int(6) NOT NULL,
  `AirplaneID` int(6) NOT NULL,
  `SeatID` varchar(3) NOT NULL,
  `AddOnID` int(3) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Member`
--

CREATE TABLE `Member` (
  `MemberID` int(6) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Country` varchar(3) NOT NULL,
  `PhoneNumber` int(12) NOT NULL,
  `Passport` varchar(50) NOT NULL,
  `MilesPoint` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Member`
--

INSERT INTO `Member` (`MemberID`, `Email`, `Password`, `Sex`, `FirstName`, `LastName`, `DOB`, `Country`, `PhoneNumber`, `Passport`, `MilesPoint`) VALUES
(1, 'eiei@gmail.com', '12345', 'm', 'Namjoon', 'Kim', '1999-10-31', '+66', 65445620, 'pa123456789', 0);

-- --------------------------------------------------------

--
-- Table structure for table `MemberPromotion`
--

CREATE TABLE `MemberPromotion` (
  `MemberID` int(6) NOT NULL,
  `MemberPromotionID` int(6) NOT NULL,
  `MemberPromotionDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `mostpaymentmethod`
-- (See below for the actual view)
--
CREATE TABLE `mostpaymentmethod` (
`Type` varchar(20)
,`Count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `Passenger`
--

CREATE TABLE `Passenger` (
  `PassengerID` int(8) NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PaymentMethod`
--

CREATE TABLE `PaymentMethod` (
  `CardNo` varchar(16) NOT NULL,
  `CardType` varchar(20) NOT NULL,
  `ExpiredDate` varchar(5) NOT NULL,
  `CVV` int(3) NOT NULL,
  `Fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Promotion`
--

CREATE TABLE `Promotion` (
  `PromotionCode` int(8) NOT NULL,
  `PromotionDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Route`
--

CREATE TABLE `Route` (
  `RouteID` int(7) NOT NULL,
  `Origin` varchar(3) NOT NULL,
  `Destination` varchar(3) NOT NULL,
  `Miles` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `StaffID` int(6) NOT NULL,
  `AirportID` varchar(3) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Country` varchar(3) NOT NULL,
  `PhoneNumber` int(12) NOT NULL,
  `Address` text,
  `Passport` varchar(50) NOT NULL,
  `Position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure for view `classcount`
--
DROP TABLE IF EXISTS `classcount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `classcount`  AS  select `class`.`ClassName` AS `ClassName`,count(0) AS `Count` from ((`class` join `airplaneseat` on((`class`.`ClassName` = `airplaneseat`.`ClassName`))) join `booking` on((`airplaneseat`.`SeatID` = `booking`.`SeatID`))) group by `class`.`ClassName` ;

-- --------------------------------------------------------

--
-- Structure for view `mostpaymentmethod`
--
DROP TABLE IF EXISTS `mostpaymentmethod`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mostpaymentmethod`  AS  select `p`.`CardType` AS `Type`,count(0) AS `Count` from (`paymentmethod` `p` join `billing` `b` on((`p`.`CardNo` = `b`.`CardNo`))) where (`b`.`PayDate` between '2019-01-01' and '2019-12-31') group by `p`.`CardType` order by count(0) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AddOn`
--
ALTER TABLE `AddOn`
  ADD PRIMARY KEY (`AddOnID`);

--
-- Indexes for table `Airplane`
--
ALTER TABLE `Airplane`
  ADD PRIMARY KEY (`AirplaneID`);

--
-- Indexes for table `AirplaneSeat`
--
ALTER TABLE `AirplaneSeat`
  ADD PRIMARY KEY (`SeatID`,`AirplaneID`),
  ADD KEY `AirplaneID` (`AirplaneID`),
  ADD KEY `ClassName` (`ClassName`);

--
-- Indexes for table `Airport`
--
ALTER TABLE `Airport`
  ADD PRIMARY KEY (`AirportID`);

--
-- Indexes for table `Billing`
--
ALTER TABLE `Billing`
  ADD PRIMARY KEY (`BillingID`),
  ADD KEY `CardNo` (`CardNo`),
  ADD KEY `MemberID` (`MemberID`),
  ADD KEY `MemberPromotionID` (`MemberPromotionID`),
  ADD KEY `PromotionCode` (`PromotionCode`);

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `BillingID` (`BillingID`),
  ADD KEY `FlightID` (`FlightID`),
  ADD KEY `PassengerID` (`PassengerID`),
  ADD KEY `SeatID` (`SeatID`);

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`ClassName`);

--
-- Indexes for table `Flight`
--
ALTER TABLE `Flight`
  ADD PRIMARY KEY (`FlightID`),
  ADD KEY `RouteID` (`RouteID`),
  ADD KEY `AirplaneID` (`AirplaneID`);

--
-- Indexes for table `FlightSeatPrice`
--
ALTER TABLE `FlightSeatPrice`
  ADD PRIMARY KEY (`FlightID`,`AirplaneID`,`SeatID`),
  ADD KEY `AddOnID` (`AddOnID`),
  ADD KEY `AirplaneID` (`AirplaneID`),
  ADD KEY `SeatID` (`SeatID`);

--
-- Indexes for table `Member`
--
ALTER TABLE `Member`
  ADD PRIMARY KEY (`MemberID`);

--
-- Indexes for table `MemberPromotion`
--
ALTER TABLE `MemberPromotion`
  ADD PRIMARY KEY (`MemberPromotionID`),
  ADD KEY `MemberID` (`MemberID`);

--
-- Indexes for table `Passenger`
--
ALTER TABLE `Passenger`
  ADD PRIMARY KEY (`PassengerID`);

--
-- Indexes for table `PaymentMethod`
--
ALTER TABLE `PaymentMethod`
  ADD PRIMARY KEY (`CardNo`);

--
-- Indexes for table `Promotion`
--
ALTER TABLE `Promotion`
  ADD PRIMARY KEY (`PromotionCode`);

--
-- Indexes for table `Route`
--
ALTER TABLE `Route`
  ADD PRIMARY KEY (`RouteID`),
  ADD KEY `Origin` (`Origin`),
  ADD KEY `Destination` (`Destination`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `AirportID_fk` (`AirportID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AddOn`
--
ALTER TABLE `AddOn`
  MODIFY `AddOnID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Airplane`
--
ALTER TABLE `Airplane`
  MODIFY `AirplaneID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Billing`
--
ALTER TABLE `Billing`
  MODIFY `BillingID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `BookingID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Flight`
--
ALTER TABLE `Flight`
  MODIFY `FlightID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Member`
--
ALTER TABLE `Member`
  MODIFY `MemberID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Passenger`
--
ALTER TABLE `Passenger`
  MODIFY `PassengerID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Route`
--
ALTER TABLE `Route`
  MODIFY `RouteID` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Staff`
--
ALTER TABLE `Staff`
  MODIFY `StaffID` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AirplaneSeat`
--
ALTER TABLE `AirplaneSeat`
  ADD CONSTRAINT `airplaneseat_ibfk_1` FOREIGN KEY (`AirplaneID`) REFERENCES `Airplane` (`AirplaneID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `airplaneseat_ibfk_2` FOREIGN KEY (`ClassName`) REFERENCES `Class` (`ClassName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Billing`
--
ALTER TABLE `Billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`CardNo`) REFERENCES `PaymentMethod` (`CardNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`MemberID`) REFERENCES `Member` (`MemberID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `billing_ibfk_3` FOREIGN KEY (`MemberPromotionID`) REFERENCES `MemberPromotion` (`MemberPromotionID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `billing_ibfk_4` FOREIGN KEY (`PromotionCode`) REFERENCES `Promotion` (`PromotionCode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`BillingID`) REFERENCES `Billing` (`BillingID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`FlightID`) REFERENCES `Flight` (`FlightID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`PassengerID`) REFERENCES `Passenger` (`PassengerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`SeatID`) REFERENCES `AirplaneSeat` (`SeatID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Flight`
--
ALTER TABLE `Flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`RouteID`) REFERENCES `Route` (`RouteID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`AirplaneID`) REFERENCES `Airplane` (`AirplaneID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `FlightSeatPrice`
--
ALTER TABLE `FlightSeatPrice`
  ADD CONSTRAINT `flightseatprice_ibfk_1` FOREIGN KEY (`AddOnID`) REFERENCES `AddOn` (`AddOnID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flightseatprice_ibfk_2` FOREIGN KEY (`AirplaneID`) REFERENCES `Airplane` (`AirplaneID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flightseatprice_ibfk_3` FOREIGN KEY (`SeatID`) REFERENCES `AirplaneSeat` (`SeatID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flightseatprice_ibfk_4` FOREIGN KEY (`FlightID`) REFERENCES `Flight` (`FlightID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `MemberPromotion`
--
ALTER TABLE `MemberPromotion`
  ADD CONSTRAINT `memberpromotion_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `Member` (`MemberID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Route`
--
ALTER TABLE `Route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`Origin`) REFERENCES `Airport` (`AirportID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `route_ibfk_2` FOREIGN KEY (`Destination`) REFERENCES `Airport` (`AirportID`);

--
-- Constraints for table `Staff`
--
ALTER TABLE `Staff`
  ADD CONSTRAINT `AirportID_fk` FOREIGN KEY (`AirportID`) REFERENCES `Airport` (`AirportID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
