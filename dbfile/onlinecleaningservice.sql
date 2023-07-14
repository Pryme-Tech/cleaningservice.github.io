-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 09:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinecleaningservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `message` varchar(1500) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user`, `message`, `rating`) VALUES
(1, 'latif@latif.com', 'I recently booked a cleaning service through the online platform and I am extremely satisfied with the service I received. The cleaning team arrived on time and was very professional and thorough in their cleaning. They paid attention to detail and made sure that every corner of my home was spotless. I appreciated their friendly attitude and willingness to accommodate any special requests I had. I will definitely be using this service again in the future and I highly recommend it to others. Overall, I give the cleaning service a 5-star rating for their exceptional work.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `servicerequest`
--

CREATE TABLE `servicerequest` (
  `id` int(11) NOT NULL,
  `user` varchar(150) NOT NULL,
  `company` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `service` varchar(150) NOT NULL,
  `requests` varchar(600) NOT NULL,
  `size` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicerequest`
--

INSERT INTO `servicerequest` (`id`, `user`, `company`, `address`, `tel`, `date`, `time`, `service`, `requests`, `size`, `status`) VALUES
(1, 'latif@latif.com', 'ABC Corporation', 'Ghana,Accra,ACP Estate', '+233502002358', '2023-02-03', '08:54:00', 'Deep Cleaning', '', '1000 sq ft', 'completed'),
(2, 'latif@latif.com', 'Niilano', 'Ghana,Accra,ACP Estate', '+233502002358', '2023-04-19', '10:55:00', 'Spring Cleaning', '', '1000 sq ft', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`) VALUES
(3, 'Another Service', '1200.00'),
(4, 'third service', '61.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `companyhousehold` varchar(50) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone`, `companyhousehold`, `position`, `address`) VALUES
(1, 'Abdul-Latif Mohammed', 'latif@latif.com', '$2y$10$LHg24zCqTx4G3RnxKtcilOxKLQeiZ9/yaGm4e1ldkrsx.vhR2CP.K', 'user', '0593787724', '', ' ', 'Ghana,Accra,ACP Estate'),
(2, 'Lawson Alfred', 'lawson@lawson.com', '$2y$10$KMNL2XiRZrWecETbacwt9.xZPSe9gvLcA9n/rAJMlxLuxrRngZPHO', 'user', '+233502002358', '', '', ''),
(3, 'Abdul-Latif Mohammed', 'latif@admin.com', '$2y$10$VHuy0ssqKxDu6k1IsE0maO1HveYjPnhqWhRRX3JyB1EyV7SfuTbF.', 'admin', '+233502002358', '', '', ''),
(4, 'Abdul-Latif Mohammed', 'latifm8360@gmail.com', '$2y$10$hHnQkfBzhlNOfyHcdKHxM.M.GxheD.ZHAgFEsu/i82dbCr8CFKlMm', 'user', '+233502002358', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `servicerequest`
--
ALTER TABLE `servicerequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
