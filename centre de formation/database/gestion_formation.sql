-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 12:07 AM
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
(2, 'hamza', 'mohamed', 'hamza.med@gg.com', '1234'),
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
(1, 'Master Microsoft Word Beginner to Advanced', 'Informatique', '30', 'Master the most popular Word Processing tool, Microsoft Word. Microsoft Word 2010, Word 2013, Word 2016, Word 2019'),
(2, 'Beginner\'s Guide to Game Development in Unity', 'Gaming Developement', '13', 'Learn how to create a multiplayer game using Unity, the C# programming language and Photon 2'),
(4, 'Powerpoint 2019  - Master powerpoint presentation', 'Informatique', '9', 'Complete Powerpoint Masterclass, 20+ powerpoint 365 presentation slides. Learn Microsoft Powerpoint beginner to advanced'),
(5, 'JS For Beginners', 'Developement', '30', 'Learn javascript online and supercharge your web design with this Javascript for beginners training course.'),
(6, 'Kids Coding -  HTML, CSS and JavaSc', 'Developement', '10', 'Your kid could be the next Zuckerberg!'),
(7, 'Database Design Introduction', 'Developement', '20', 'Prevent typical developer mistakes by learning how to properly create and normalize a relational database'),
(8, 'Microsoft Excel from Beginner to Advanced', 'Informatique', '15', 'Excel with this A-Z Microsoft Excel Course. Microsoft Excel 2010, 2013, 2016, Excel 2019 and Microsoft/Office 365'),
(9, 'The Ultimate Guide to Game Development with Unity', 'Gaming Developement', '40', 'Created in partnership with Unity Technologies: learn C# by developing 2D & 3D games with this comprehensive guide');

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
(1, 1, NULL, NULL),
(2, 1, NULL, NULL),
(2, 4, NULL, NULL),
(3, 1, NULL, NULL);

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
(1, '2023-05-05', '2023-05-07', 10, 'cloturée', 1, 2),
(2, '2023-05-07', '2023-05-31', 5, 'annulée', 2, 1),
(4, '2023-09-17', '2023-09-30', 10, 'annulée', 1, 2),
(5, '2023-03-17', '2023-03-30', 20, 'annulée', 2, 1),
(6, '2023-01-17', '2023-03-23', 50, 'cloturée', 2, 1),
(7, '2023-08-02', '2023-08-04', 5, 'inscription achevée', 1, 1);

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
  MODIFY `id_formation` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id_session` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
