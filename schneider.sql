-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2019 at 04:54 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schneider`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `code` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `store_location` varchar(15) NOT NULL,
  `clasification` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`code`, `nama_barang`, `store_location`, `clasification`) VALUES
(1, 'Combination spanner 5.5 mm', 'B-1-3-1', 'Tool'),
(2, 'Combination spanner 6 mm', 'B-1-3-2', 'Tool'),
(3, 'Combination spanner 7 mm', 'B-1-3-3', 'Tool'),
(4, 'Combination spanner 8 mm', 'B-1-3-4', 'Tool'),
(5, 'Combination spanner 9 mm', 'B-1-3-5', 'Tool');

-- --------------------------------------------------------

--
-- Table structure for table `detail_request`
--

CREATE TABLE `detail_request` (
  `id` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `store_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `tanggal_request` varchar(50) NOT NULL,
  `tanggal_acc` varchar(50) NOT NULL,
  `requester` varchar(100) NOT NULL,
  `departement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `status` enum('admin','admin2','admin3','user') NOT NULL,
  `jabatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `departement`, `status`, `jabatan`) VALUES
(1, 'dio', '27b205035c328b16d8c8329c4b41e87e', 'Muhammad Dio Syahrizal', 'Administrator', 'admin', ''),
(2, 'lala', '2e3817293fc275dbee74bd71ce6eb056', 'Lala', 'Engineering', 'user', ''),
(3, 'mirai', 'c631dac97d3f6112e92c51af79b3ed4a', 'Mirai Suenaga', 'Electrical', 'user', ''),
(6, 'ash', '2852f697a9f8581725c6fc6a5472a2e5', 'Ash', 'ACB MCCB', 'user', 'user'),
(7, 'loco', '4c193eb3ec2ce5f02b29eba38621bea1', 'Loco', 'ACB MCCB', 'admin', 'Supervisor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `detail_request`
--
ALTER TABLE `detail_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detail_request`
--
ALTER TABLE `detail_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
