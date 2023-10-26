-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 11:06 AM
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
-- Database: `prototype_project_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id_city` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id_city`, `city_name`) VALUES
(1, 'Casablanca'),
(2, 'Marrakech'),
(3, 'Rabat'),
(4, 'Fes'),
(5, 'Tangier'),
(6, 'Agadir'),
(7, 'Meknes'),
(8, 'Oujda'),
(9, 'Kenitra'),
(10, 'Tetouan'),
(11, 'Nador'),
(12, 'Safi'),
(13, 'Mohammedia'),
(14, 'El Jadida'),
(15, 'Beni Mellal'),
(16, 'Taroudant'),
(17, 'Khouribga'),
(18, 'Larache'),
(19, 'Taza'),
(20, 'Settat');

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
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`);

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
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stagiaires`
--
ALTER TABLE `stagiaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD CONSTRAINT `FK_stagiaire_ville` FOREIGN KEY (`city_id`) REFERENCES `city` (`id_city`),
  ADD CONSTRAINT `fk_ville_id` FOREIGN KEY (`id`) REFERENCES `city` (`id_city`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
