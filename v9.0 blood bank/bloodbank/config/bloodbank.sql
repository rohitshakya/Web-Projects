-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2020 at 10:00 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bloodsample`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE IF NOT EXISTS `hospital` (
`user_id` int(11) NOT NULL,
  `firstname` varchar(50) ,
  `lastname` varchar(50) ,
  `email` varchar(50) ,
  `password` varchar(50) 
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`user_id`, `firstname`, `lastname`, `email`,`password`) VALUES
(1, 'Rohit', 'Shakya', 'rohit.rkshakya@gmail.com','a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin', 'admin', 'admin@admin.com','a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3'); #password=admin


--
-- Table structure for table `receiver`
--

CREATE TABLE IF NOT EXISTS `receiver` (
`user_id` int(11) NOT NULL,
  `firstname` varchar(50) ,
  `lastname` varchar(50) ,
  `email` varchar(50) ,
  `bloodtype` varchar(50),
  `password` varchar(50) 
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`user_id`, `firstname`, `lastname`, `email`,`bloodtype`, `password`) VALUES
(1, 'Rohit', 'Shakya', 'rohit.rkshakya@gmail.com','B+', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin', 'admin', 'admin@admin.com', 'A+', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3');
-- --------------------------------------------------------

--
-- Table structure for table `bloodsample`
--

CREATE TABLE IF NOT EXISTS `bloodsample` (
`bloodsample_id` int(11) NOT NULL,
  `bloodsample_name` varchar(100) ,
  `hospital_name` varchar(100) 
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodsample`
--

INSERT INTO `bloodsample` (`bloodsample_id`, `bloodsample_name`,`hospital_name`) VALUES
(1, 'B+','Holy Family Hospital'),
(2, 'A+','Fortis Escorts Heart Institute'),
(3, 'B-','Mother and Child Hospital'),
(4, 'O+','City Hospital'),
(5, 'AB+','Holy Family Hospital');

-- --------------------------------------------------------
--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
`request_id` int(11) NOT NULL,
  `request_name` varchar(100) ,
  `request_hospital_name` varchar(100),
  `request_blood_type` varchar(100) 
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `request_name`,`request_hospital_name`,`request_blood_type`) VALUES
(1, 'Kajal Sharma','Holy Family Hospital','B+'),
(2, 'Sam Wilson','Mother and Child Hospital','B-'),
(3, 'Shobha Saini','City Hospital','O+'),
(4, 'Abu Fazal','Fortis Escorts Heart Institute','A+');

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
`log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `user_id`, `action`, `date`) VALUES
(1, 1, 'added a new blood type A+ of flmjkrmklm', '2020-10-04 18:25:35'),
(2, 7, 'added a new blood type B+ of gdrgneknkl', '2020-10-04 18:26:04'),
(3, 4, 'has logged in the system at ', '2020-10-23 01:50:19');

-- --------------------------------------------------------


--
ALTER TABLE `hospital`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `receiver`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `bloodsample`
 ADD PRIMARY KEY (`bloodsample_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `request`
 ADD PRIMARY KEY (`request_id`);


--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `hospital`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `receiver`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `bloodsample`
MODIFY `bloodsample_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
--
ALTER TABLE `request`
MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;




--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
