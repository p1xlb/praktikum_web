-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2023 at 02:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `POSTTEST`
--

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
  `airplane_id` int(4) NOT NULL,
  `airplane` varchar(50) NOT NULL,
  `airplane_type` varchar(50) NOT NULL,
  `capacity` int(3) NOT NULL,
  `availability` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `available`
--

INSERT INTO `available` (`airplane_id`, `airplane`, `airplane_type`, `capacity`, `availability`) VALUES
(10, 'Boeing BBJ2', 'Luxury Jet', 78, '2023-11-29'),
(11, 'Cessna C208 Grand Caravan', 'Turboprop', 12, '2023-12-27'),
(12, 'Cessna 182 Skylane', 'Turboprop', 4, '2023-10-31'),
(13, 'Cessna 182 Skylane', 'Turboprop', 4, '2023-10-31'),
(14, 'Cessna 182 Skylane', 'Turboprop', 4, '2023-10-31'),
(16, 'Airbus ACJ330', 'Ultra Long Range Jet', 170, '2024-08-28'),
(17, 'Airbus ACJ320', 'Luxury Jet', 110, '2023-11-22'),
(19, 'Airbus ACJ320', 'Luxury Jet', 100, '2023-12-07'),
(21, 'ATR-42', 'Turboprop', 20, '2023-11-28'),
(22, 'ATR-42', 'Turboprop', 20, '2023-11-30'),
(23, 'ATR-42', 'Turboprop', 20, '2023-10-27'),
(24, 'ATR-72', 'Turboprop', 59, '2023-10-23'),
(25, 'ATR-72', 'Turboprop', 59, '2023-12-20'),
(26, 'Airbus ACH130', 'Helicopter', 6, '2023-11-09'),
(27, 'Airbus ACH130', 'Helicopter', 6, '2023-12-28'),
(28, 'Airbus ACH130', 'Helicopter', 6, '2023-12-13'),
(29, 'Airbus ACH145', 'Helicopter', 9, '2023-11-01'),
(30, 'Airbus ACH145', 'Helicopter', 6, '2024-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `Contact`
--

CREATE TABLE `Contact` (
  `inquiry_id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aircraft_type` varchar(50) NOT NULL,
  `num_of_pax` int(3) NOT NULL,
  `requests` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Contact`
--

INSERT INTO `Contact` (`inquiry_id`, `name`, `email`, `aircraft_type`, `num_of_pax`, `requests`, `image_path`) VALUES
(2, 'hfkdhfsjkdhsfh', 'jkhfjdhsf@gmail.com', 'Helicopter', 4, 'dfdfdsgdg', ''),
(3, 'dfdfjhjgh', 'jdhfhsd@gmail.com', 'Turboprop', 5, 'dfsdsgg', 'uploads/2023-10-29 ACH145-vegan-interior-1_0.jpg'),
(4, 'dfdfjhjgh', 'jdhfhsd@gmail.com', 'Turboprop', 5, 'dfsdsgg', 'uploads/2023-10-29 ACH145-vegan-interior-1_0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `userType` enum('admin','client') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `user_password`, `userType`) VALUES
('udin1', '$2y$10$VbDAmzLNdp7HYVna0DT0uO/4i/3TxGCc0D2MAb64XJemCpjNvPxym', 'client'),
('user4', '$2y$10$txUOPzCd.usrdi4ijILzJuKM6wCvu1PMIUvAE1eiieY/t2iqh/qJG', 'client'),
('admin1', '$2y$10$cxtSeYbeNEGKiUGx9Ff2eO2Cah2F4Kt2AHnWdRg4XVCu/mMgBfz3y', 'admin'),
('user5', '$2y$10$VaONkuPWjYGSZ9ZXVsarIuJK8hns1ogmRJOdZolgPpiVkuPKcHaQK', 'client'),
('udin5', '$2y$10$77Z11FGi.eWYe8EGNJRM/.OsbJgpO2iTJEOg62hwP5ffPkcUncY.m', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`airplane_id`);

--
-- Indexes for table `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available`
--
ALTER TABLE `available`
  MODIFY `airplane_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `Contact`
--
ALTER TABLE `Contact`
  MODIFY `inquiry_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
