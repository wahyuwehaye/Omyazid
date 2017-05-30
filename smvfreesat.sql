-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 08:40 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smvfreesat`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `id` int(10) NOT NULL,
  `no_channel` varchar(10) NOT NULL,
  `channel_name` varchar(100) NOT NULL,
  `synopsis_channel` text NOT NULL,
  `url_promo_channel` varchar(500) NOT NULL,
  `logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id`, `no_channel`, `channel_name`, `synopsis_channel`, `url_promo_channel`, `logo`) VALUES
(1, '1', 'NET', 'Masa Kini', 'net.tv', '1495722943946.jpg'),
(2, '2', 'RCTI', 'Oke', 'rcti.tv', '1495722949219.jpg'),
(3, '3', 'SCTV', 'Sinetron Channel TeleVision', 'sctv.tv', '1495722953964.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(10) NOT NULL,
  `program_name` varchar(250) NOT NULL,
  `channel` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `duration` int(10) NOT NULL,
  `synopsis_program` text NOT NULL,
  `genre` varchar(250) NOT NULL,
  `parenting_categories` varchar(100) NOT NULL,
  `broadcast_type` varchar(100) NOT NULL,
  `url_teaser` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `program_name`, `channel`, `date`, `time_start`, `time_end`, `duration`, `synopsis_program`, `genre`, `parenting_categories`, `broadcast_type`, `url_teaser`) VALUES
(1, 'TTS', 'NET', '2017-05-31', '06:00:00', '07:00:00', 60, 'Teka Teki Sulit', 'Family', 'Semua Umur', 'Record', 'tts.net.tv'),
(2, 'WIB', 'NET', '0000-00-00', '22:00:00', '23:00:00', 60, 'Becanda', 'Family', 'PG', 'NC17', 'wib.net.tv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_channel` (`no_channel`),
  ADD KEY `channel_name` (`channel_name`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `channel` (`channel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
