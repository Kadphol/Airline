-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2019 at 05:34 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zp11276_airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `AddOn`
--

CREATE TABLE `AddOn` (
  `AddOnID` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AddOnName` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AddOnPrice` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Airplane`
--

CREATE TABLE `Airplane` (
  `AirplaneID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `RegisterDate` date NOT NULL,
  `PayLoad` float NOT NULL,
  `Status` enum('N','A') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ModelNo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AirplaneSeat`
--

CREATE TABLE `AirplaneSeat` (
  `SeatID` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AirplaneID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ClassID` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Airport`
--

CREATE TABLE `Airport` (
  `AirportID` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AirportName` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AirportTax` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Billing`
--

CREATE TABLE `Billing` (
  `BillingID` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CardNo` int(16) NOT NULL,
  `MemberID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MemberPromotionID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PromotionCode` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PayDate` date NOT NULL,
  `AmountPaid` float NOT NULL,
  `Status` enum('P','U') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `BookingID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `FlightID` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PassengerID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `BillingID` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SeatID` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `ClassName` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ServiceDescription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Flight`
--

CREATE TABLE `Flight` (
  `FlightID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DepartureDate` date NOT NULL,
  `ArrivalDate` date NOT NULL,
  `RouteID` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AirplaneID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Gate` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `FlightSeatPrice`
--

CREATE TABLE `FlightSeatPrice` (
  `FlightID` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AirplaneID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SeatID` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AddOnID` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Member`
--

CREATE TABLE `Member` (
  `MemberID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prefix` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Country` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNumber` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Passport` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MilesPoint` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `MemberPromotion`
--

CREATE TABLE `MemberPromotion` (
  `MemberID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MemberPromotionID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MemberPromotionDescription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Passenger`
--

CREATE TABLE `Passenger` (
  `PassgenerID` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prefix` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PaymentMethod`
--

CREATE TABLE `PaymentMethod` (
  `CardNo` int(16) NOT NULL,
  `CardType` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ExpiredDate` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CVV` int(3) NOT NULL,
  `Fee` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Promotion`
--

CREATE TABLE `Promotion` (
  `PromotionCode` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PromotionDescription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Route`
--

CREATE TABLE `Route` (
  `RouteID` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Origin` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Destination` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Miles` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `StaffID` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AirportID` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prefix` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Country` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNumber` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `Passport` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Position` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`SeatID`),
  ADD KEY `PK,FK` (`AirplaneID`),
  ADD KEY `FK` (`ClassID`);

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
  ADD KEY `FK` (`CardNo`,`MemberID`,`MemberPromotionID`,`PromotionCode`);

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `FK` (`PassengerID`,`BillingID`,`SeatID`);

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
  ADD KEY `FK` (`RouteID`,`AirplaneID`);

--
-- Indexes for table `FlightSeatPrice`
--
ALTER TABLE `FlightSeatPrice`
  ADD KEY `PK,FK` (`FlightID`,`AirplaneID`,`SeatID`),
  ADD KEY `FK` (`AddOnID`);

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
  ADD KEY `PK,FK` (`MemberID`);

--
-- Indexes for table `Passenger`
--
ALTER TABLE `Passenger`
  ADD PRIMARY KEY (`PassgenerID`);

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
  ADD KEY `FK` (`Origin`,`Destination`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `FK` (`AirportID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
