-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 09:07 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toby`
--

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `org_name` varchar(1000) NOT NULL,
  `phone` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `details` text DEFAULT NULL,
  `site_url` varchar(1000) NOT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `total_shares` varchar(100) DEFAULT NULL,
  `shares_on_sale` varchar(100) DEFAULT NULL,
  `selling` varchar(100) DEFAULT NULL,
  `owners` varchar(100) DEFAULT NULL,
  `share_value` varchar(100) DEFAULT NULL,
  `share_value_history` int(11) DEFAULT NULL,
  `docs` varchar(2000) DEFAULT NULL,
  `images` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `organizations`:
--

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `org_name`, `phone`, `email`, `address`, `details`, `site_url`, `password`, `total_shares`, `shares_on_sale`, `selling`, `owners`, `share_value`, `share_value_history`, `docs`, `images`) VALUES
(1, 'Oxfam', '+254 (0) 20 2820000', '1234', 'Oxfam International Headquarters\r\nThe Atrium\r\nChaka Road\r\nKilimani,\r\nNairobi, Kenya', 'Oxfam is a global movement of people, working together to end the injustice of poverty. That means we tackle the inequality that keeps people poor. Together, we save, protect and rebuild lives when disaster strikes. We help people build better lives for themselves, and for others. we take on issues like land rights, climate change and discrimination against women. And we won’t stop until every person on the planet can enjoy life free from poverty.', 'https://www.oxfam.org/en', '0000', ' 10000', '7050', NULL, '/1/3', '0.50', NULL, NULL, '/OxfamHeader.png'),
(6, 'ZIMAS', '0772345763', 'zimas@gmail.com', 'Marondera', '', 'www.zimas.org', '12345678', ' 4000', '2970', NULL, '/1', '.25', NULL, NULL, NULL),
(7, 'KidzCan', '+263242255739', 'admin@kidzcan.org', '6 Natal Road, Belgravia, Harare', 'Our vision is to have a compassionate world where children with cancer are given the chance to lead healthy and fulfilling lives. The team believes that before we can show love to others outside we should first be able to share it among ourselves and hence we are one big family that loves and supports each other. Having grown from a mission of Northside Community Church, we have Christian roots and have precise values of love, empathy and integrity and even though we are christians ourselves we help all children regardless of their religion, ethnicity or race.', 'www.kidzcanzimbabwe.org', '12345678', ' 5000', '1800', NULL, '/1/5', '0.25', NULL, NULL, '/KidzCanLogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `password` varchar(15) NOT NULL,
  `watchlist` varchar(2000) DEFAULT NULL,
  `stocks` varchar(2000) DEFAULT NULL,
  `balance` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `email`, `address`, `password`, `watchlist`, `stocks`, `balance`) VALUES
(1, 'tatenda fambirachimwe', '0782824073', 't.svaku@gmail.com', '136 Bakeway ', 'test1234', '/1/7', '1-200/7-200', '1035'),
(2, 'carlos', '0738444567', 'carlos@gmail.com', 'Chitown', '12345678', NULL, NULL, NULL),
(3, 'Tino', '0734567433', 'tino@gmail.com', 'Belgravia', '12345678', '/7', '/1-100', '450'),
(4, 'Sophia', '0712387564', 'sophia@gmial.com', 'Belvedere', '12345678', NULL, NULL, NULL),
(5, 'Ellain', '0777112737', 'ellain@gmail.com', 'err45', '12345678', '/7', '7-1050', '49937.5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


--
-- Metadata
--
USE `toby`;

--
-- Metadata for table organizations
--

--
-- Metadata for table users
--

--
-- Metadata for database toby
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
