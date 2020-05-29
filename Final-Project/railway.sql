-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2016 at 03:20 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `railway`
--

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE IF NOT EXISTS `passengers` (
  `p_id` int(30) NOT NULL AUTO_INCREMENT,
  `p_fname` varchar(30) DEFAULT NULL,
  `p_lname` varchar(30) DEFAULT NULL,
  `p_age` varchar(30) DEFAULT NULL,
  `p_contact` varchar(20) DEFAULT NULL,
  `p_gender` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `p_id` (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`p_id`, `p_fname`, `p_lname`, `p_age`, `p_contact`, `p_gender`, `email`, `password`) VALUES
(1, 'Brijesh', 'Anand', '20', '6204597798', 'Male', 'brijesh@gmail.com', '123456789'),
(2, 'Onkar', 'Priyardarshi', '20', '7488685150', 'Male', 'onkar@gmail.com', '123456789'),
(3, 'Kumar', 'Gaurav', '21', '7004359995', 'Male', 'kumar@gmail.com', '123456789'),
(4, 'Kaustavjit', 'Saha', '22', '6290786500', 'Male', 'kaustav@gmail.com', '123456789'),
(5, 'Nikhil', 'Raj', '21', '7250524688', 'Male', 'nikhil@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_fname` varchar(10) DEFAULT NULL,
  `s_lname` varchar(10) DEFAULT NULL,
  `s_designation` varchar(20) NOT NULL,
  `s_salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `station`
--
INSERT INTO `staff` (`s_id`, `s_fname`, `s_lname`, `s_designation`, `s_salary`) VALUES
(1, 'Amit', 'Kumar', 'Loco Pilot',45000 ),
(2, 'Pankaj', 'Agarwal','General Manager',70000 ),
(3, 'Rakesh', 'Sharma', 'Station Master',50000),
(4, 'Abhay', 'Kumar' , 'Sr Engineer',65000),
(5, 'Jagdish' , 'Singh' , 'Guard',60000);

CREATE TABLE IF NOT EXISTS `station` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(20) DEFAULT NULL,
  `s_code` varchar(20) DEFAULT NULL,
  `s_no_of_platforms` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`s_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`s_no`, `s_name`,`s_code`,`s_no_of_platforms`) VALUES
(1, 'New Delhi','NDLS','12'),
(2, 'Mumbai','CSMT' ,'11'),
(3, 'Udaipur City', 'UDZ','4'),
(4, 'Jammu Tawi', 'JAT','6'),
(5, 'Kolkata', 'KOAA','5'),
(6, 'Bengaluru','SBC', '8'),
(7, 'Ernakulum Jn','ERS', '4'),
(8, 'Mysuru Jn','MYS' ,'4'),
(9, 'Talguppa','TLGP' ,'3'),
(10, 'Dhanbad Jn','DHN', '7'),
(11, 'Patna Jn', 'PNBE','10');


-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `t_no` int(11) NOT NULL,
  `PNR` decimal(10,0) NOT NULL,
  `ticket_status` varchar(20) NOT NULL DEFAULT 'Waiting',
  `ticket_fare` int(11) DEFAULT NULL,
  `p_id` int(20) NOT NULL,
  UNIQUE KEY `PNR` (`PNR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`t_no`,`PNR`, `ticket_status`, `ticket_fare`, `p_id`) VALUES
(12284,8056124359, 'Confirm', 650, 5),
(12951,8551129875, 'Waiting', 540, 1),
(12951,7851693875, 'RAC', 540, 1),
(12951,6851693875, 'Waiting', 540, 2),
(12951,5854592875, 'Confirm', 540, 3);


-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE IF NOT EXISTS `trains` (
  `train_no` decimal(5,0) NOT NULL,
  `t_name` varchar(30) DEFAULT NULL,
  `t_source` varchar(30) DEFAULT NULL,
  `t_destination` varchar(30) DEFAULT NULL,
  `t_type` varchar(30) DEFAULT NULL,
  `t_status` varchar(20) DEFAULT 'On time',
  `no_of_seats` int(11) DEFAULT NULL,
  `journey_duration` int(11) DEFAULT NULL,
  PRIMARY KEY (`train_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`train_no`, `t_name`, `t_source`, `t_destination`, `t_type`, `t_status`, `no_of_seats`, `journey_duration`) VALUES
(49718, 'Garibrath Exp', 'Udaipur City', 'Jammu Tawi', 'Express', 'On time', 550, 20),
(12284, 'Duronto Exp', 'Mumbai Central', 'Ernakulum Jn', 'AC Superfast', 'On time', 800, 24),
(12859, 'Geetanjali Exp', 'Mumbai', 'Kolkata', 'Express', 'On time', 500, 25),
(12951, 'Rajdhani Exp', 'Mumbai Central', 'New Delhi', 'Superfast', 'On time', 700, 15),
(16205, 'Mysuru Exp', 'Talguppa', 'Mysuru Jn', 'Express', 'On time', 475, 21),
(13329, 'Gangadamodar Exp', 'Dhanbad Jn' , 'Patna Jn' , 'Express' , 'On time' , 565 ,7),
(12281, 'Shatabadi Exp', 'Bengaluru' , 'Howrah Jn' , 'AC Superfast' , 'On time' , 1700 , 30);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
