-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 09:08 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `dob` varchar(40) NOT NULL,
  `department` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `mobile` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `lastlogin` date NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `dob`, `department`, `address`, `mobile`, `email`, `lastlogin`, `password`) VALUES
(1, 'simbarashe', 'CHIZHANDE', '1996-03-29', 'IT DEPARTMENT', '5 MBITI MUFAKOSE HARARE', 779914219, 'simba@gmail.com', '2018-05-06', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(5) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `national` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(20) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `accountType` varchar(50) NOT NULL,
  `employer` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `national`, `email`, `mobile`, `dob`, `accountType`, `employer`, `address`, `gender`, `city`, `date`, `password`) VALUES
(1, 'mhamha', 'mhama', '11234211111', 'a@gmail.com', 779914219, '2018-90-76', 'Savings Account', 'gogo', 'chitu', 'F', 'mutare', '2018-06-05', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `national` varchar(24) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mobile` int(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `department` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `city` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `firstname`, `lastname`, `national`, `email`, `mobile`, `dob`, `department`, `address`, `gender`, `city`, `date`, `password`) VALUES
(1, 'simbarashe', 'sheldon', 'fhrtt yy nynn', 'b@gmail.com', 773042013, '1234-32-43', 'FINANCE DEPARTMENT', 'home', 'F', 'Harare', '2018-05-07', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
