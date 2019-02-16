-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2019 at 10:40 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

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
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_request` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_requester` varchar(100) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_request` varchar(20) NOT NULL,
  `tgl_acc` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `admin1_acc` enum('0','1','2') NOT NULL,
  `admin2_acc` enum('0','1','2') NOT NULL,
  `admin3_acc` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_request`, `id_user`, `nama_requester`, `barang`, `jumlah`, `tgl_request`, `tgl_acc`, `status`, `admin1_acc`, `admin2_acc`, `admin3_acc`) VALUES
(1, 2, 'Lala', 'Combination spanner 5.5 mm', 2, '28-01-2019', '', 'Proses Cek', '1', '1', '0'),
(2, 3, 'Mirai Suenaga', 'Combination spanner 9 mm', 1, '28-01-2019', '', 'Proses Cek', '0', '0', '2'),
(4, 3, 'Mirai Suenaga', 'Combination spanner 7 mm', 2, '28-01-2019', '', 'Proses Cek', '0', '0', '0');

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
  `status` enum('admin','admin2','admin3','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `departement`, `status`) VALUES
(1, 'dio', '27b205035c328b16d8c8329c4b41e87e', 'Muhammad Dio Syahrizal', 'IT', 'admin'),
(2, 'lala', '2e3817293fc275dbee74bd71ce6eb056', 'Lala', 'Engineering', 'user'),
(3, 'mirai', 'c631dac97d3f6112e92c51af79b3ed4a', 'Mirai Suenaga', 'Electrical', 'user'),
(4, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'Admin2', 'Administrator', 'admin2'),
(5, 'admin3', '32cacb2f994f6b42183a1300d9a3e8d6', 'Admin3', 'Administrator', 'admin3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`);

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
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
