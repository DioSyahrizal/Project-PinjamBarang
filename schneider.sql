-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2019 at 07:31 PM
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
-- Table structure for table `detail_replace`
--

CREATE TABLE `detail_replace` (
  `id` int(11) NOT NULL,
  `id_replace` int(11) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `store_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_request`
--

CREATE TABLE `detail_request` (
  `id` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `barang` text NOT NULL,
  `qty` int(11) NOT NULL,
  `store_location` varchar(200) NOT NULL
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
  `departement` varchar(100) NOT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `supervisor` int(11) NOT NULL,
  `manager` int(11) NOT NULL,
  `s_maintenance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replace`
--

CREATE TABLE `tbl_replace` (
  `id` int(11) NOT NULL,
  `tanggal_replace` varchar(50) NOT NULL,
  `tanggal_acc` varchar(50) NOT NULL,
  `replacer` varchar(100) NOT NULL,
  `departement` varchar(100) NOT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `supervisor` int(11) NOT NULL,
  `s_maintenance` int(11) NOT NULL
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
  `status` enum('admin','superadmin','user') NOT NULL,
  `jabatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `departement`, `status`, `jabatan`) VALUES
(1, 'wijaya', 'd5ae0f43f56adb44d5a48f9605794c27', 'Joko Dwi Admawijaya', 'Administrator', 'superadmin', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `detail_replace`
--
ALTER TABLE `detail_replace`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_replace`
--
ALTER TABLE `tbl_replace`
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
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detail_replace`
--
ALTER TABLE `detail_replace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail_request`
--
ALTER TABLE `detail_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_replace`
--
ALTER TABLE `tbl_replace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
