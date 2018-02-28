-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 04:42 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_code` varchar(255) NOT NULL,
  `dept_code` varchar(255) NOT NULL,
  `branch_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_code`, `dept_code`, `branch_name`) VALUES
('111', 'ICI', 'SOFTWARE'),
('1234', 'BST', 'ACCOUNTING'),
('1234', 'EEE', 'LIGHT');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_code` varchar(255) NOT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `dept_desc` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_code`, `dept_name`, `category`, `dept_desc`) VALUES
('BST', 'BUSINESS', 'BUSINESS', 'BST'),
('CVL', 'CIVIL ENGINEERING', 'ENGINEEERING', 'CVL'),
('EEE', 'ELECTRONIC AND ELECTRICAL ENGINEERING', 'ENGINEERING', 'EEE'),
('EST', 'ESTATES', 'ESTATES', 'EST'),
('HOS', 'HOSPITALITY', 'HOSPITALITY', 'HOS'),
('HR', 'HUMAN RESOURCE', 'HUMAN RESOURCE MANAGEMENT', 'HR'),
('ICI', 'INSTITUTE OF COMPUTING AND INFORMATICS', 'IT', 'CSIT'),
('MD', 'MEDIA', 'COMMUNICATION STUDIES', 'MD'),
('MED', 'MEDICAL', 'HEALTH', 'MED'),
('SPRT', 'SPORTS', 'SPORTS', 'SPORTS'),
('TOR', 'TOURISM', 'TUORISM', 'TOURISM');

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `staff_no` varchar(255) NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `pay_rate` varchar(255) DEFAULT 'Monthly',
  `pay_method` varchar(255) DEFAULT 'Bank',
  `pay_status` varchar(255) DEFAULT 'Active',
  `contract` varchar(255) DEFAULT 'No',
  `emp_date` date DEFAULT NULL,
  `nhif` varchar(255) DEFAULT NULL,
  `nssf` varchar(255) DEFAULT NULL,
  `kra` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_details`
--

INSERT INTO `job_details` (`staff_no`, `job_title`, `branch`, `dept`, `pay_rate`, `pay_method`, `pay_status`, `contract`, `emp_date`, `nhif`, `nssf`, `kra`, `role`) VALUES
('EMP/1831/2017', 'LECTURER', '111', 'ICI', 'Monthly', 'Bank', 'Active', 'No', '2017-04-04', '7894512', '124568', 'A0056799H', 'employee'),
('EMP/2710/2017', 'null', 'null', 'BST', 'Monthly', 'Bank', 'Active', 'No', '2016-12-01', '', '', '', 'employee'),
('EMP/2817/2017', 'LECTURER', '111', 'ICI', 'Monthly', 'Bank', 'Active', 'No', '2017-04-04', '', '', '', 'employee'),
('EMP/3057/2017', 'COD', '1234', 'EEE', 'Monthly', 'Bank', 'Active', 'No', '2017-04-04', '456120', '7845120', 'A00786543F', 'employee'),
('EMP/4195/2017', 'LECTURER', '1234', 'BST', 'Monthly', 'Bank', 'Active', 'No', '2016-12-07', '09877666', '8900007', 'A00135466G', 'employee'),
('EMP/5121/2017', 'LECTURER', '111', 'ICI', 'Monthly', 'Bank', 'Active', 'No', '2014-01-08', '890665', '76885', 'AD06665656', 'supervisor'),
('EMP/6833/2017', 'COD', '1234', 'BST', 'Monthly', 'Cashier', 'Active', 'Yes', '2017-04-06', '56789', '4556666', 'A0076589H', 'employee'),
('EMP/7927/2017', 'LECTURER', '111', 'ICI', 'Monthly', 'Bank', 'Active', 'No', '2017-04-10', '1234', '12345', 'A007513769F', 'employee'),
('EMP/7965/2017', 'null', 'null', 'BST', 'Monthly', 'Bank', 'Active', 'No', '2017-02-06', '562115521', '2145688', 'A001763456G', 'employee'),
('EMP/8780/2017', 'LECTURER', '111', 'ICI', 'Monthly', 'Bank', 'Active', 'No', '2017-02-01', '567890', '435667', 'AOO756456F', 'employee'),
('EMP/9705/2017', 'null', 'null', 'BST', 'Monthly', 'Bank', 'Active', 'No', '2017-01-01', '890765', '1234321', 'AOO1874567G', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `job_positions`
--

CREATE TABLE `job_positions` (
  `job_code` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `job_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_positions`
--

INSERT INTO `job_positions` (`job_code`, `branch_code`, `job_title`) VALUES
('1233', '111', 'LECTURER'),
('1234', '1234', 'COD'),
('12347', '1234', 'LECTURER');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_no` varchar(255) NOT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `p_address` varchar(255) DEFAULT NULL,
  `p_code` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `nat_id` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `marital_stat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_no`, `staff_name`, `phone_no`, `email`, `p_address`, `p_code`, `town`, `nat_id`, `gender`, `marital_stat`) VALUES
('EMP/1831/2017', 'ALEX MWAILU', '0723456789', 'ALEXMWAILU@GMAIL.COM', '7845120', '2300', 'ELDORET', 2345677, 'Male', 'Single'),
('EMP/2710/2017', 'JIMMY MUREITHI', '0721345675', 'JIMMY@GMAIL.COM', 'KC', '45612', 'MOMBASA', 31567890, 'Male', 'Single'),
('EMP/2817/2017', 'STELLA WINNIE', '0722546423', 'STELLAWINNIE@gmail.com', 'KC', '8970', 'nakuru', 7654532, 'Female', 'Single'),
('EMP/3057/2017', 'NZEKI JANUERIS', '0745678990', 'NZEKI@YAHOO.COM', 'TUDOR', '34567', 'MOMBASA', 32456790, 'Male', 'Single'),
('EMP/4195/2017', 'CALEB MUSHIRI', '0734234123', 'CALEB@GMAIL.COM', 'MAKUPA', '5670', 'MOMBASA', 290076456, 'Male', 'Single'),
('EMP/5121/2017', 'ELLY KITOTO', '0712345678', 'ellykits@yahoo.com', 'siaya', '40601', 'bondo', 32070216, 'Male', 'Single'),
('EMP/6833/2017', 'CHARLES KIHARA', '0723456432', 'CHARLES@YAHOO.COM', 'Kisauni Bamburi', '45120', 'MOMBASA', 32300444, 'Male', 'Single'),
('EMP/7927/2017', 'DANIEL KIPKOSGEI', '0718109796', 'danielchepkeres477@gmail.com', 'ELDORET', '2370', 'eldoret', 31906062, 'Male', 'Single'),
('EMP/7965/2017', 'NJENGA RAPHAEL', '0756434287', 'NJENGARAPH89@GMAIL.COM', 'KISAUNI', '4567', 'MOMBASA', 2956045, 'Male', 'Single'),
('EMP/8780/2017', 'VALENTINE MATHAI', '0723456778', 'VALMATHAI@GMAIL.COM', 'MOMBASA', '90420', 'MOMBASA', 30678970, 'Female', 'Single'),
('EMP/9705/2017', 'MERCY CHERUTO', '0723456765', 'CHERUTOMERCY@YAHOO.COM', 'KC', '89076', 'MOMBASA', 32145678, 'Female', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `staff_leave`
--

CREATE TABLE `staff_leave` (
  `leave_code` varchar(255) NOT NULL,
  `staff_no` varchar(255) NOT NULL,
  `leave_type` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `reason` varchar(1000) DEFAULT NULL,
  `leave_status` varchar(255) DEFAULT NULL,
  `approver` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user`, `password`) VALUES
('elly', '1348');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_code`,`dept_code`),
  ADD KEY `dept_code` (`dept_code`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_code`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`staff_no`);

--
-- Indexes for table `job_positions`
--
ALTER TABLE `job_positions`
  ADD PRIMARY KEY (`job_code`,`branch_code`),
  ADD KEY `branch_code` (`branch_code`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_no`);

--
-- Indexes for table `staff_leave`
--
ALTER TABLE `staff_leave`
  ADD PRIMARY KEY (`staff_no`,`leave_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`dept_code`) REFERENCES `departments` (`dept_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_details`
--
ALTER TABLE `job_details`
  ADD CONSTRAINT `job_details_ibfk_1` FOREIGN KEY (`staff_no`) REFERENCES `staff` (`staff_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_positions`
--
ALTER TABLE `job_positions`
  ADD CONSTRAINT `job_positions_ibfk_1` FOREIGN KEY (`branch_code`) REFERENCES `branches` (`branch_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_leave`
--
ALTER TABLE `staff_leave`
  ADD CONSTRAINT `staff_leave_ibfk_1` FOREIGN KEY (`staff_no`) REFERENCES `staff` (`staff_no`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
