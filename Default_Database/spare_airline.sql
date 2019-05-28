-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2019 at 02:35 AM
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
  `AddOnPrice` float NOT NULL,
  `Description` text NOT NULL,
  `ClassName` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AddOn`
--

INSERT INTO `AddOn` (`AddOnID`, `AddOnName`, `AddOnPrice`, `Description`, `ClassName`) VALUES
(1, 'FirstClass_Flex', 10000, 'Checked baggage: 20 kg,Cabin baggage: 2x7 kg,Seat Selection: Complimentary,Refund fee: Allow', 'First'),
(2, 'FirstClass_ExtraFlex', 15000, 'Checked baggage: 25 kg,Cabin baggage: 2x7 kg,Seat Selection: Complimentary,Refund fee: Allow', 'First'),
(3, 'Business_Flex', 5000, 'Checked baggage: 10 kg,Cabin baggage: 2x7 kg,Seat Selection: Complimentary,Refund fee: Allow', 'Business'),
(4, 'Business_ExtraFlex', 7500, 'Checked baggage: 15 kg,Cabin baggage: 2x7 kg,Seat Selection: Complimentary,Refund fee: Allow', 'Business'),
(5, 'Economy_Flex', 250, 'Checked baggage: 5 kg,Cabin baggage: 2x7 kg,Seat Selection: Complimentary,Refund fee: Allow', 'Economy'),
(6, 'Economy_ExtraFlex', 400, 'Checked baggage: 7 kg,Cabin baggage: 2x7 kg,Seat Selection: Complimentary,Refund fee: Allow', 'Economy');

-- --------------------------------------------------------

--
-- Table structure for table `Airplane`
--

CREATE TABLE `Airplane` (
  `AirplaneID` int(6) NOT NULL,
  `RegisterDate` date NOT NULL,
  `PayLoad` float NOT NULL,
  `Status` enum('N','A') NOT NULL,
  `ModelNo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Airplane`
--

INSERT INTO `Airplane` (`AirplaneID`, `RegisterDate`, `PayLoad`, `Status`, `ModelNo`) VALUES
(1, '2018-10-01', 10000, 'A', 'Boeing 777-300ER'),
(2, '2019-02-01', 10000, 'A', 'Boeing 777-300ER\r\n'),
(3, '2018-10-03', 10000, 'A', 'Boeing 777-300ER\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `AirplaneSeat`
--

CREATE TABLE `AirplaneSeat` (
  `Row` varchar(5) NOT NULL,
  `AirplaneID` int(6) NOT NULL,
  `ClassName` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AirplaneSeat`
--

INSERT INTO `AirplaneSeat` (`Row`, `AirplaneID`, `ClassName`) VALUES
('03-04', 1, 'Business'),
('03-04', 2, 'Business'),
('03-04', 3, 'Business'),
('05-08', 1, 'Economy'),
('05-08', 2, 'Economy'),
('05-08', 3, 'Economy'),
('01-02', 1, 'First'),
('01-02', 2, 'First'),
('01-02', 3, 'First');

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

--
-- Dumping data for table `Airport`
--

INSERT INTO `Airport` (`AirportID`, `AirportName`, `Address`, `AirportTax`) VALUES
('AKL', 'Auckland Airport', 'Auckland,New Zealand', 450),
('AMS', 'Amsterdam Airport Schiphol', 'Amsterdam,Netherlands', 600),
('ARN', 'Stockholm-Arlanda Airport', 'Stockholm,Sweden', 500),
('ATH', 'Athens International Airport', 'Athens,Greece', 650),
('AUH', 'Abu Dhabi International Airport', 'Abu Dhabi,United Arab Emirates', 700),
('BKK', 'Suvarnabhumi Airport', 'Bangkok,Thailand', 450),
('BOG', 'El Dorado International Airport', 'Bogota,Columbia', 550),
('BRU', 'Brussels Airport', 'Brussels,Belgium', 660),
('CDG', 'Charles de Gaulle Airport', 'Paris,France', 470),
('CGK', 'Soekarno Hatta International Airport', 'Jakarta,Indonesia', 440),
('CPH', 'Copenhagen Airport', 'Copenhagen,Denmark', 400),
('DEL', 'Indira Gandhi International Airport', 'Delhi,India', 500),
('DME', 'Domodedovo International Airport', 'Moscow,Russia', 450),
('DOH', 'Hamad International Airport', 'Doha,Qatar', 580),
('DUB', 'Dublin Airport', 'Dublin,Ireland', 400),
('FCO', 'Leonardo da Vinci-Fiumicino Airport', 'Rome,Italy', 500),
('GRU', 'Sao Paulo-Guarulhos International Airport', 'Sao Paulo,Brazil', 400),
('HKG', 'Hong Kong International Airport', 'Hong Kong,Hong Kong', 420),
('ICN', 'Incheon International Airport', 'Incheon,South Korea', 460),
('JFK', 'John F. Kennedy International Airport', 'New York City,USA', 500),
('JNB', 'OR Tambo International Airport', 'Johannesburg,South Africa', 500),
('KUL', 'Kuala Lumpur International Airport', 'Kuala Lumpur,Malaysia', 400),
('LAX', 'Los Angeles International Airport', 'Los Angeles,USA', 600),
('MAD', 'Mad-Barajas Airport', 'Madrid,Spain', 560),
('MAN', 'Manchester Airport', 'Manchester,UK', 500),
('MEX', 'Mexico City International Airport', 'Mexico City,Mexico', 450),
('MNL', 'Ninoy Aquino International Airport', 'Manila,Philippines', 500),
('MUC', 'Munich Airport', 'Munich,Germany', 560),
('NRT', 'Narita International Airport', 'Tokyo\\Yokohama,Japan', 600),
('OSL', 'Oslo Airport-Gardermoen', 'Oslo,Norway', 690),
('PEK', 'Beijing Capital International Airport', 'Beijing,China', 470),
('RUH', 'King Khalid International Airport', 'Riyadh,Saudi Arabia', 750),
('SAW', 'Sabiha Gokken International Airport', 'Istanbul,Turkey', 530),
('SGN', 'Tan Son Nhat International Airport', 'Ho Chi Minh City,Vietnam', 570),
('SIN', 'Singapore Changi Airport', 'Singapore,Singapore', 550),
('SYD', 'Sydney Airport', 'Sydney,Australia', 500),
('TPE', 'Taiwan Taoyuan International Airport', 'Taoyuan,Taiwan', 400),
('VIE', 'Vienna International Airport', 'Vienna,Austria', 500),
('YVR', 'Vancouver International Airport', 'Vancouver,Canada', 550),
('ZRH', 'Zurich Airport', 'Zurich,Switzerland', 560);

-- --------------------------------------------------------

--
-- Table structure for table `Billing`
--

CREATE TABLE `Billing` (
  `BillingID` int(10) NOT NULL,
  `CardNo` varchar(16) NOT NULL,
  `MemberID` int(6) DEFAULT NULL,
  `MemberPromotionID` int(6) DEFAULT NULL,
  `PromotionCode` int(8) DEFAULT NULL,
  `PayDate` date NOT NULL,
  `AmountPaid` float NOT NULL
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
  `SeatID` varchar(3) NOT NULL,
  `AddOnID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `ClassName` varchar(8) NOT NULL,
  `ServiceDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`ClassName`, `ServiceDescription`) VALUES
('Business', ''),
('Economy', ''),
('First', '');

-- --------------------------------------------------------

--
-- Table structure for table `Flight`
--

CREATE TABLE `Flight` (
  `FlightID` int(6) NOT NULL,
  `DepartureDate` datetime NOT NULL,
  `ArrivalDate` datetime NOT NULL,
  `RouteID` int(7) NOT NULL,
  `AirplaneID` int(6) NOT NULL,
  `Gate` varchar(3) NOT NULL,
  `Status` enum('N','A') NOT NULL,
  `Price` float NOT NULL,
  `Seat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Flight`
--

INSERT INTO `Flight` (`FlightID`, `DepartureDate`, `ArrivalDate`, `RouteID`, `AirplaneID`, `Gate`, `Status`, `Price`, `Seat`) VALUES
(3, '2019-05-27 09:35:00', '2019-05-27 10:35:00', 23, 1, 'G22', 'A', 9890, ''),
(4, '2019-05-01 00:00:00', '2019-05-01 06:00:00', 2, 1, 'A12', 'A', 12500, ''),
(5, '2019-05-01 13:30:00', '2019-05-02 18:30:00', 10, 1, 'A22', 'A', 65600, ''),
(6, '2019-05-03 08:00:00', '2019-05-04 11:00:00', 19, 1, 'A33', 'A', 45000, ''),
(7, '2019-05-28 01:25:00', '2019-05-28 05:25:00', 13, 1, 'G11', 'A', 34700, ''),
(16, '2019-05-28 00:00:00', '2019-05-28 06:00:00', 3, 2, 'G09', 'A', 13000, ''),
(17, '2019-05-28 07:00:00', '2019-05-28 13:00:00', 38, 2, 'G01', 'A', 13000, ''),
(18, '2019-05-28 13:47:00', '2019-05-29 03:41:00', 4, 2, 'B12', 'A', 17000, ''),
(19, '2019-05-28 04:15:00', '2019-05-28 16:20:00', 9, 3, 'C12', 'A', 25000, ''),
(20, '2019-05-28 17:00:00', '2019-05-29 04:15:00', 28, 3, 'D10', 'A', 29800, ''),
(21, '2019-01-09 20:15:00', '2019-01-10 03:20:00', 25, 1, 'D36', 'A', 24500, ''),
(22, '2019-01-14 01:00:00', '2019-01-14 01:00:00', 1, 2, 'A10', 'A', 26500, ''),
(23, '2019-01-21 12:35:00', '2019-01-22 01:35:00', 5, 3, 'S13', 'A', 32000, ''),
(24, '2019-01-22 04:30:00', '2019-01-22 14:20:00', 33, 3, 'A05', 'A', 26800, ''),
(25, '2019-02-01 09:50:00', '2019-02-02 03:50:00', 6, 2, 'B04', 'A', 27800, ''),
(26, '2019-02-03 10:20:00', '2019-02-03 15:20:00', 31, 2, 'B07', 'A', 15600, ''),
(27, '2019-01-01 15:20:00', '2019-01-01 21:20:00', 3, 3, 'A17', 'A', 13000, ''),
(28, '2019-02-03 14:00:00', '2019-02-03 20:00:00', 3, 3, 'A14', 'A', 13000, ''),
(29, '2019-03-11 02:30:00', '2019-03-11 06:30:00', 3, 1, 'A01', 'A', 13000, ''),
(30, '2019-04-22 23:30:00', '2019-04-23 05:40:00', 3, 1, 'A21', 'A', 13000, ''),
(31, '2019-03-14 02:10:00', '2019-03-15 06:20:00', 22, 2, 'C14', 'A', 38700, '');

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
(1, 'eiei@gmail.com', '12345', 'm', 'Namjoon', 'Kim', '1999-10-31', '+66', 65445620, 'pa123456789', 0),
(2, 'kihae@gmail.com', 'kihae12938', 'm', 'Kibum', 'Kim', '1987-08-21', '+1', 2110748763, 'PA999999', 25870),
(3, 'haeki@gmail.com', 'haeki129', 'm', 'Donghae', 'Lee', '1986-10-15', '+82', 2118904785, 'PA999998', 234567),
(4, 'jimin@gmail.com', 'jiminkikkakkk', 'm', 'Jimin', 'Park', '1995-10-13', '+82', 2143789046, 'PA999997', 554826),
(5, 'vvv@gmail.com', 'vtae', 'm', 'Taehyung', 'Kim', '1995-12-30', '+82', 2135678902, 'PA999996', 526739),
(6, 'jungkook@gmail.com', 'jungjungjung', 'm', 'Jeon', 'Jungkook', '1997-09-01', '+82', 2143567682, 'PA999995', 5426780),
(7, 'jiji@gmail.com', 'jijjiji', 'f', 'jele', 'jubena', '1987-09-13', '+86', 2134567829, 'PA999994', 34765),
(8, 'huhuhaha@gmail.com', 'hahaha', 'f', 'Gigi', 'shawanna', '1988-05-16', '+91', 1238749873, 'PA999993', 77672),
(9, 'five@gmail.com', 'fudfidforfive', 'm', 'Yahooo', 'Google', '2016-04-12', '971', 2134567894, 'PA999992', 2345),
(10, 'six@gmail.com', 'ooppppp', 'f', 'Sixsax', 'Supsup', '1965-05-07', '+34', 2124568793, 'PA999991', 8764),
(11, 'seven@gmail.com', 'savaggrag', 'm', 'Lolita', 'Tadima', '1975-05-23', '+91', 2137890374, 'PA999990', 674822),
(12, 'something@somewhere.com', '12345', 'm', 'someone', 'somename', '1999-09-11', '+66', 1234567890, 'ka123912831029', 0);

-- --------------------------------------------------------

--
-- Table structure for table `MemberPromotion`
--

CREATE TABLE `MemberPromotion` (
  `MemberID` int(6) DEFAULT NULL,
  `MemberPromotionID` int(6) NOT NULL,
  `MemberPromotionDescription` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `CVV` int(3) NOT NULL
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

--
-- Dumping data for table `Route`
--

INSERT INTO `Route` (`RouteID`, `Origin`, `Destination`, `Miles`) VALUES
(1, 'BKK', 'LAX', 8275),
(2, 'BKK', 'ICN', 2315),
(3, 'BKK', 'NRT', 2898),
(4, 'BKK', 'MUC', 5472),
(5, 'NRT', 'AUH', 5041),
(6, 'BRU', 'CGK', 7103),
(7, 'PEK', 'CDG', 5111),
(8, 'MEX', 'CPH', 5915),
(9, 'JFK', 'DME', 4672),
(10, 'ICN', 'GRU', 11410),
(11, 'FCO', 'GRU', 5894),
(12, 'JNB', 'KUL', 5313),
(13, 'MAN', 'SYD', 10573),
(14, 'MNL', 'OSL', 6026),
(15, 'SAW', 'VIE', 793),
(16, 'TPE', 'HKG', 505),
(17, 'ZRH', 'YVR', 5169),
(18, 'MAD', 'MAN', 906),
(19, 'GRU', 'BKK', 10200),
(20, 'DOH', 'JNB', 3891),
(21, 'ARN', 'CPH', 325),
(22, 'ATH', 'AKL', 10865),
(23, 'AMS', 'MAN', 307),
(24, 'JFK', 'ICN', 6875),
(25, 'PEK', 'DEL', 2349),
(26, 'DUB', 'MUC', 857),
(27, 'RUH', 'DME', 2198),
(28, 'DME', 'SGN', 857),
(29, 'BOG', 'JFK', 2497),
(30, 'SIN', 'NRT', 3340),
(31, 'CGK', 'SGN', 1872),
(32, 'JFK', 'DUB', 3182),
(33, 'AUH', 'CGK', 4121),
(34, 'TPE', 'ARN', 5193),
(35, 'VIE', 'SYD', 9938),
(36, 'SYD', 'HKG', 4586),
(37, 'NRT', 'LAX', 5051),
(38, 'NRT', 'BKK', 2898);

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
  `PhoneNumber` bigint(12) NOT NULL,
  `Address` text,
  `Passport` varchar(50) NOT NULL,
  `Position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`StaffID`, `AirportID`, `Email`, `Password`, `Sex`, `FirstName`, `LastName`, `DOB`, `Country`, `PhoneNumber`, `Address`, `Passport`, `Position`) VALUES
(1, 'ICN', 'aaa@airline.com', '1111', 'm', 'Taeyong', 'Lee', '1986-06-18', '+82', 2654789123, 'Korea', 'XX123456', 'Pilot'),
(2, 'JFK', 'bbb@airline.com', '2222', 'm', 'Johnny', 'Suh', '1980-01-02', '+1', 2974027403, 'USA', 'XX123457', 'Pilot'),
(3, 'ICN', 'ccc@airline.com', '3333', 'm', 'Taeil', 'Moon', '1985-10-21', '+82', 2984038960, 'Korea', 'XX123458', 'Pilot'),
(4, 'NRT', 'ddd@airline.com', '4444', 'm', 'Yuta', 'Nakamoto', '1976-03-18', '+81', 7648392817, 'Japan', 'XX123459', 'Pilot'),
(5, 'PEK', 'eee@airline.com', '5555', 'm', 'Kun', 'Qian', '1980-03-11', '+86', 8492038574, 'China', 'XX123460', 'Pilot'),
(6, 'ICN', 'ggg@airline.com', '6666', 'm', 'Doyoung', 'Kim', '1966-02-28', '+82', 4839025167, 'Korea', 'XX123461', 'Pilot'),
(7, 'BKK', 'hhh@airline.com', '7777', 'm', 'Chittapon', 'Leechaiyapornkul', '1996-02-27', '+66', 9374906543, 'Thailand', 'XX123462', 'Pilot'),
(8, 'AUH', 'iii@airline.com', '8888', 'f', 'Jennie', 'Kim', '1983-10-19', '971', 3245267890, 'United Arab Emirates', 'XX123463', 'Ground Service'),
(9, 'CPH', 'jjj@airline.com', '9999', 'f', 'Jisoo', 'Kim', '1983-11-29', '+46', 4563890178, 'Denmark', 'XX123464', 'Ground Service'),
(10, 'BKK', 'kkk@airline.com', '11110', 'f', 'Lalisa', 'Manoban', '1988-06-23', '+66', 4235627901, 'Thailand', 'XX123465', 'Ground Service'),
(11, 'AKL', 'lll@airline.com', '12221', 'f', 'Chaeyoung', 'Park', '1986-03-19', '+64', 2945393785, 'New Zealand', 'XX123466', 'Ground Service'),
(12, 'SYD', 'mmm@airline.com', '13332', 'f', 'Ryujin', 'Shin', '1988-01-27', '+61', 5784902122, 'Australia', 'XX123467', 'Ground Service'),
(13, 'SAW', 'nnn@airline.com', '14443', 'f', 'Jisu', 'Choi', '1976-05-25', '+90', 5637289102, 'Turkey', 'XX123468', 'Ground Service'),
(14, 'PEK', 'ooo@airline.com', '15554', 'm', 'Si Cheng', 'Dong', '1980-08-25', '+86', 1890424653, 'China', 'XX123469', 'Pilot'),
(15, 'HKG', 'ppp@airline.com', '16665', 'm', 'Yukhei', 'Wong', '1977-07-19', '852', 2157984521, 'Hongkong', 'XX123470', 'Pilot'),
(16, 'YVR', 'qqq@airline.com', '17776', 'm', 'Mark', 'Lee', '1978-08-18', '+1', 1027896357, 'Canada', 'XX123471', 'Pilot'),
(17, 'MUC', 'rrr@airline.com', '18887', 'm', 'Yangyang', 'Liu', '1986-01-17', '+49', 5548793564, 'Germany', 'XX123472', 'Flight Attendant'),
(18, 'SGN', 'sss@airline.com', '19998', 'm', 'GuanHeng', 'Huang', '1976-09-24', '+84', 7894863258, 'Vietname', 'XX123473', 'Flight Attendant'),
(19, 'JFK', 'ttt@airline.com', '21109', 'f', 'Taylor', 'Swift', '1976-06-16', '+1', 4789532059, 'USA', 'XX123474', 'Flight Attendant'),
(20, 'MAN', 'uuu@airline.com', '22220', 'f', 'Thanaporn', 'Yankomut', '1998-07-22', '+44', 8851296663, 'UK', 'XX123475', 'Admin'),
(21, 'DUB', 'vvv@airline.com', '23331', 'f', 'Chonrada', 'Kongmuang', '1983-08-16', '353', 123456789, 'Ireland', 'XX123476', 'Admin'),
(22, 'OSL', 'xxx@airline.com', '24442', 'f', 'Nailsa', 'Srisamrith', '1967-01-27', '+47', 6304787201, 'Norway', 'XX123477', 'Admin'),
(23, 'BKK', 'yyy@airline.com', '25553', 'f', 'Phraewadee', 'Chutirat', '1977-07-18', '+66', 6734987323, 'Thailand', 'XX123478', 'Flight Attendant'),
(24, 'SIN', 'zzz@airline.com', '26664', 'f', 'Thidarat', 'Chaichana', '1986-01-31', '+65', 5628917820, 'Singapore', 'XX123479', 'Flight Attendant'),
(25, 'AMS', 'abc@airline.com', '27775', 'f', 'Natkanok', 'Poksappaiboon', '1988-07-27', '599', 5628910567, 'Netherlands', 'XX123480', 'Flight Attendant'),
(26, 'DEL', 'def@airline.com', '28886', 'm', 'Kadphol', 'Lenglerdphol', '1987-08-25', '+91', 884527225, 'India', 'XX123481', 'Admin'),
(27, 'HKG', 'ghi@airline.com', '29997', 'm', 'Jackson', 'Wang', '1972-04-15', '852', 8261753264, 'Hongkok', 'XX123482', 'Flight Attendant'),
(28, 'TPE', 'jkl@airline.com', '31108', 'm', 'Mark', 'Tuan', '1978-10-24', '886', 5638201234, 'Taiwan', 'XX123483', 'Flight Attendant'),
(29, 'BKK', 'mno@airline.com', '32219', 'm', 'Thanot', 'Kim', '1969-01-01', '+66', 1029348756, 'Thailand', 'XX123484', 'Flight Attendant'),
(30, 'ATH', 'some@some.com', '12345', 'm', 'some', 'some', '1995-06-13', '+66', 8472902345, 'Bangkok', 'XX129380', 'Pilot');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AddOn`
--
ALTER TABLE `AddOn`
  ADD PRIMARY KEY (`AddOnID`),
  ADD KEY `ClassName` (`ClassName`);

--
-- Indexes for table `Airplane`
--
ALTER TABLE `Airplane`
  ADD PRIMARY KEY (`AirplaneID`);

--
-- Indexes for table `AirplaneSeat`
--
ALTER TABLE `AirplaneSeat`
  ADD PRIMARY KEY (`Row`,`AirplaneID`),
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
  ADD KEY `SeatID` (`SeatID`),
  ADD KEY `AddOnID` (`AddOnID`);

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
  ADD KEY `AirplaneID` (`AirplaneID`),
  ADD KEY `RouteID` (`RouteID`);

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
  MODIFY `AddOnID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Airplane`
--
ALTER TABLE `Airplane`
  MODIFY `AirplaneID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `FlightID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `Member`
--
ALTER TABLE `Member`
  MODIFY `MemberID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Passenger`
--
ALTER TABLE `Passenger`
  MODIFY `PassengerID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Route`
--
ALTER TABLE `Route`
  MODIFY `RouteID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `Staff`
--
ALTER TABLE `Staff`
  MODIFY `StaffID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AddOn`
--
ALTER TABLE `AddOn`
  ADD CONSTRAINT `addon_ibfk_1` FOREIGN KEY (`ClassName`) REFERENCES `Class` (`ClassName`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`AddOnID`) REFERENCES `AddOn` (`AddOnID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Flight`
--
ALTER TABLE `Flight`
  ADD CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`AirplaneID`) REFERENCES `Airplane` (`AirplaneID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `flight_ibfk_3` FOREIGN KEY (`RouteID`) REFERENCES `Route` (`RouteID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
