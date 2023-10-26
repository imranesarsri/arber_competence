-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 12:18 AM
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
-- Database: `protorype_project_2.1`
--

-- --------------------------------------------------------

--
-- Table structure for table `stagiaires`
--

CREATE TABLE `stagiaires` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stagiaires`
--

INSERT INTO `stagiaires` (`id`, `full_name`, `email`, `phone_number`, `adress`, `city_id`) VALUES
(3, 'imrane sarsri', 'sarsri.imrane@gmail.com', '0626156115', 'hay bir jdid gznaya', 6),
(14, 'Mary Johnson', 'mary.johnson@email.com', '9876543210', '456 Elm Avenue', 5),
(17, 'Zachary Sharp', 'xihec@mailinator.com', '101', 'Sed et sed adipisci ', 17),
(18, 'Desiree Bryan', 'cowozemo@mailinator.com', '404', 'Voluptatem animi vo', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_stagiaire_ville` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stagiaires`
--
ALTER TABLE `stagiaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
