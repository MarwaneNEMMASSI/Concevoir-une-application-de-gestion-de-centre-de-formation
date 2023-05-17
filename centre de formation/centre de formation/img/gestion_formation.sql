-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 05:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_formation`
--
CREATE DATABASE IF NOT EXISTS `gestion_formation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gestion_formation`;

-- --------------------------------------------------------
--
-- Table structure for table `apprenant`
--

DROP TABLE IF EXISTS `apprenant`;
CREATE TABLE `apprenant` (
  `id_apprenant` int(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apprenant`
--

INSERT INTO `apprenant` (`id_apprenant`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'med', 'ashraf', 'medashraf@gmail.com', '1234'),
(2, 'hamza', 'mohamed', 'hamza.med@gg.com', 'abcd'),
(3, 'ahmed', 'moha', 'ahmed123@solicode.com', '123456'),
(5, 'octane', 'user', 'usernew123@gg.com', 'test11');


-- --------------------------------------------------------

--
-- Table structure for table `formateur`
--

DROP TABLE IF EXISTS `formateur`;
CREATE TABLE `formateur` (
  `id_formateur` int(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formateur`
--

INSERT INTO `formateur` (`id_formateur`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'mr', 'bilal', 'bilal1234@formateur.com', '1234'),
(2, 'med', 'allali', 'med123solicode@formateur.com', '098765');

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE `formation` (
  `id_formation` int(50) NOT NULL,
  `sujet` varchar(50) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `masse_horaire` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`id_formation`, `sujet`, `categorie`, `masse_horaire`, `description`) VALUES
(1, 'word', 'informatique', '20', 'Some quick example text to build on the card title and make up the bulk of the card\s content'),
(2, 'chess', 'gaming', '13', 'Some quick example text to build on the card title and make up the bulk of the card\s content'),
(4, 'power point', 'Developement', '9', 'Some quick example text to build on the card title and make up the bulk of the card\s content');

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE `inscription` (
  `id_apprenant` int(50) NOT NULL,
  `id_session` int(50) NOT NULL,
  `resultat` varchar(50) DEFAULT NULL,
  `date_validation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`id_apprenant`, `id_session`, `resultat`, `date_validation`) VALUES
(1, 1, '13', '2023-04-16'),
(2, 2, '18', '2023-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `id_session` int(50) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `nombre_places_max` int(5) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `id_formation` int(50) NOT NULL,
  `id_formateur` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id_session`, `date_debut`, `date_fin`, `nombre_places_max`, `etat`, `id_formation`, `id_formateur`) VALUES
(1, '2023-04-17', '2023-04-30', 10, 'en cours dinscription', 1, 2),
(2, '2023-04-20', '2023-04-25', 15, 'en cours dinscription', 2, 1),
(3, '1999-10-22', '1999-12-22', 6, 'en cours', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apprenant`
--
ALTER TABLE `apprenant`
  ADD PRIMARY KEY (`id_apprenant`);


--
-- Indexes for table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`id_formateur`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`);

--
-- Indexes for table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id_apprenant`,`id_session`),
  ADD KEY `id_session` (`id_session`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id_session`),
  ADD KEY `id_formation` (`id_formation`),
  ADD KEY `id_formateur` (`id_formateur`);

--
-- AUTO_INCREMENT for dumped tables
--


--
-- AUTO_INCREMENT for table `apprenant`
--
ALTER TABLE `apprenant`
  MODIFY `id_apprenant` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


--
-- AUTO_INCREMENT for table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `id_formateur` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id_session` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--


--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`id_apprenant`) REFERENCES `apprenant` (`id_apprenant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`id_session`) REFERENCES `session` (`id_session`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id_formation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`id_formateur`) REFERENCES `formateur` (`id_formateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
