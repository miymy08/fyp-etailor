-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 11:02 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etailor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone_no` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `phone_no`) VALUES
(1, 'admin', 'admin', '0175358729'),
(2, 'test', 'test', '0195735116');

-- --------------------------------------------------------

--
-- Table structure for table `fashion`
--

CREATE TABLE `fashion` (
  `id_fashion` int(10) NOT NULL,
  `fashion_name` varchar(20) NOT NULL,
  `fashion_price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fashion`
--

INSERT INTO `fashion` (`id_fashion`, `fashion_name`, `fashion_price`) VALUES
(1, 'Baju Kurung', '50'),
(2, 'Baju Kurung Moden', '55'),
(3, 'Baju Kebaya', '40');

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `id_measurement` int(10) NOT NULL,
  `bahu` varchar(10) NOT NULL,
  `dada` varchar(10) NOT NULL,
  `l_baju` varchar(10) NOT NULL,
  `lengan` varchar(10) NOT NULL,
  `l_tangan` varchar(10) NOT NULL,
  `l_depan` varchar(10) DEFAULT NULL,
  `l_belakang` varchar(10) DEFAULT NULL,
  `pinggang` varchar(10) NOT NULL,
  `punggung` varchar(10) NOT NULL,
  `l_kain` varchar(10) NOT NULL,
  `kekek` varchar(10) DEFAULT NULL,
  `pesak_atas` float DEFAULT NULL,
  `pesak_bwh` varchar(10) DEFAULT NULL,
  `id_fashion` varchar(10) NOT NULL,
  `id_users` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`id_measurement`, `bahu`, `dada`, `l_baju`, `lengan`, `l_tangan`, `l_depan`, `l_belakang`, `pinggang`, `punggung`, `l_kain`, `kekek`, `pesak_atas`, `pesak_bwh`, `id_fashion`, `id_users`) VALUES
(95, '15', '40', '40', '14', '22', '43', '40', '26', '37', '40', '4', 3, '4.625', '0', '28'),
(102, '16', '40', '40', '14', '22', '42', '40', '26', '37', '40', '4', 3, '4.625', '0', '30'),
(103, '16', '40', '40', '14', '22', '', '', '26', '37', '40', '4', 3, '4.625', '1', '30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `receive_date` date NOT NULL,
  `pickup_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `notice` varchar(10) NOT NULL,
  `id_users` int(10) NOT NULL,
  `id_fashion` int(10) NOT NULL,
  `id_measurement` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `order_code`, `receive_date`, `pickup_date`, `status`, `catatan`, `notice`, `id_users`, `id_fashion`, `id_measurement`, `image`) VALUES
(89, 'kg35ru6pev', '2019-12-14', '2019-12-15', 'Dah siap', 'Biasa', 'Dah', 30, 1, 103, 'Cloth 5df498ad1590d.png'),
(90, '840s9aqdit', '2019-12-14', '2019-12-21', 'Dalam progress', 'Biasa', 'Belum', 30, 1, 103, 'Cloth 5de40a438a331.png');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(100) NOT NULL,
  `payment_code` varchar(20) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `id_fashion` varchar(10) NOT NULL,
  `kuantiti` varchar(10) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `deposit` varchar(10) DEFAULT NULL,
  `baki` varchar(10) DEFAULT NULL,
  `status_p` varchar(10) NOT NULL,
  `time_done` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `payment_code`, `order_code`, `id_fashion`, `kuantiti`, `jumlah`, `deposit`, `baki`, `status_p`, `time_done`) VALUES
(17, 'e2mrgwdyol', 'kg35ru6pev', '1', '1', '50', '23', '0', 'Dah', '2019-12-14'),
(18, 'ol7ys9dcnr', '840s9aqdit', '1', '1', '50', '23', '27', 'Belum', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tailor`
--

CREATE TABLE `tailor` (
  `id_tailor` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `f_tailor` varchar(100) NOT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `tailor_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tailor`
--

INSERT INTO `tailor` (`id_tailor`, `username`, `password`, `f_tailor`, `phone_no`, `tailor_type`) VALUES
(1, 'tailor1', 'tailor1', 'Mak Tam', '0189927265', '1'),
(2, 'tele2', 'tele2', 'mak jemah', '0198027654', '2'),
(3, 'tele3', 'tele3', 'mak cik siti', '0198027655', '3'),
(4, 'tele1', 'tele1', 'mak cik tie', '0186759879', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `phone_no` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `ic_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `f_name`, `phone_no`, `alamat`, `ic_no`) VALUES
(28, 'fatimah', 'fatimah123', 'Fatimah binti Saad', '0175358729', 'Taman Bahtera', '980830025340'),
(30, 'sal', 'sal123', 'Salmah binti Mail', '0175358729', 'Taman Bernam', '960727025456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `fashion`
--
ALTER TABLE `fashion`
  ADD PRIMARY KEY (`id_fashion`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`id_measurement`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `tailor`
--
ALTER TABLE `tailor`
  ADD PRIMARY KEY (`id_tailor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fashion`
--
ALTER TABLE `fashion`
  MODIFY `id_fashion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `id_measurement` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tailor`
--
ALTER TABLE `tailor`
  MODIFY `id_tailor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
