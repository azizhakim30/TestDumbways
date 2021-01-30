-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 03:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id_s` int(11) NOT NULL,
  `npsn_s` varchar(20) NOT NULL,
  `name_s` varchar(30) NOT NULL,
  `address_s` varchar(100) NOT NULL,
  `logo_s` varchar(20) NOT NULL,
  `level_s` varchar(20) NOT NULL,
  `status_s` varchar(20) NOT NULL,
  `userid_s` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id_s`, `npsn_s`, `name_s`, `address_s`, `logo_s`, `level_s`, `status_s`, `userid_s`) VALUES
(1, '0101', 'SDN 1 PRABUMULIH', 'Jln Jend. Sudirman', 'sdn1.jpg', 'SD', 'Negeri', '4'),
(3, '0109', 'SDN 9 PRABUMULIH', 'Jln A. Yamin', 'sdn9.jpg', 'SD', 'Negeri', '5'),
(4, '0201', 'SMPN 1 PRABUMULIH', 'Jln Mangga No 2', 'smpn1.png', 'SMP', 'Negeri', '6'),
(5, '0202', 'SMPN 2 PRABUMULIH', 'Jln KH.A. Dahlan No.459', 'smp2.jpg', 'SMP', 'Negeri', '7'),
(6, '0311', 'SMA YAYASAN BAKTI PRABUMULIH', 'Jln Nenas No.377', 'sma yb.jpg', 'SMA', 'Swasta', '8');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_u` int(11) NOT NULL,
  `name_u` varchar(20) NOT NULL,
  `email_u` varchar(30) NOT NULL,
  `password_u` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_u`, `name_u`, `email_u`, `password_u`) VALUES
(4, 'azizul', 'azizul@gmail.com', ''),
(5, 'Acong', 'acong@gmail.com', ''),
(6, 'Doni', 'Doni@gmail.com', ''),
(7, 'Saka', 'saka@gmail.com', ''),
(8, 'Rizki', 'rizki@gmail.com', ''),
(9, 'Rifqi', 'rifqi@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id_s`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
