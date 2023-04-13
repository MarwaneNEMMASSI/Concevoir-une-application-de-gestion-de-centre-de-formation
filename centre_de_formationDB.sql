-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 avr. 2023 à 16:56
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `centre_de_formation`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenant`
--

CREATE TABLE `apprenant` (
  `ID_apprenant` int(11) NOT NULL,
  `Prenom` varchar(20) DEFAULT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Mot_de_passe` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `apprenant`
--

INSERT INTO `apprenant` (`ID_apprenant`, `Prenom`, `Nom`, `Email`, `Telephone`, `Mot_de_passe`) VALUES
(1, 'Yassine', 'Moundelsi', 'Yassine@gmail.com', '0710203040', 'AbAb12345'),
(2, 'Samia', 'Taouali', 'Samia@gmail.com', '0711223344', 'AcAc12345');

-- --------------------------------------------------------

--
-- Structure de la table `apprenant_session`
--

CREATE TABLE `apprenant_session` (
  `resultat` varchar(20) DEFAULT NULL,
  `date_evaluation` datetime DEFAULT NULL,
  `ID_session` int(11) NOT NULL,
  `ID_apprenant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `ID_formateur` int(11) NOT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `Prenom` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Mot_de_passe` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`ID_formateur`, `Nom`, `Prenom`, `Email`, `Telephone`, `Mot_de_passe`) VALUES
(1, 'Qori', 'Ahmed', 'Ahmed@gmail.com', '0610203040', 'AzAz1020'),
(2, 'Samadi', 'Zaid', 'Zaid@gmail.com', '0611223344', 'AzAz9080');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `ID_formation` int(11) NOT NULL,
  `Sujet` varchar(20) DEFAULT NULL,
  `Categorie` varchar(20) DEFAULT NULL,
  `Masse_horaire` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`ID_formation`, `Sujet`, `Categorie`, `Masse_horaire`) VALUES
(1, 'Excel', 'Bureautique', '60h'),
(2, 'Word', 'Bureautique', '60h'),
(3, 'PowerPoint', 'Bureautique', '60h'),
(4, 'Javascript', 'Front-end', '60h'),
(5, 'PHP', 'Back-end', '60h'),
(6, 'HTML', 'Front-end', '100h'),
(7, 'CSS', 'Front-end', '100h');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `ID_session` int(11) NOT NULL,
  `Date_debut` datetime DEFAULT NULL,
  `Date_fin` datetime DEFAULT NULL,
  `Nbr_places_max` int(11) DEFAULT NULL,
  `Etat` varchar(20) DEFAULT NULL,
  `ID_formation` int(11) DEFAULT NULL,
  `ID_formateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`ID_session`, `Date_debut`, `Date_fin`, `Nbr_places_max`, `Etat`, `ID_formation`, `ID_formateur`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 20, 'en cours', 1, 1),
(2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 30, 'Inscription achevée', 2, 2),
(3, '2023-04-13 00:00:00', '2023-04-25 00:00:00', 30, 'Inscription achevée', 1, 2),
(4, '2023-04-20 00:00:00', '2023-04-30 00:00:00', 20, 'en cours d\'inscripti', 4, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apprenant`
--
ALTER TABLE `apprenant`
  ADD PRIMARY KEY (`ID_apprenant`);

--
-- Index pour la table `apprenant_session`
--
ALTER TABLE `apprenant_session`
  ADD PRIMARY KEY (`ID_session`,`ID_apprenant`),
  ADD KEY `ID_apprenant` (`ID_apprenant`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`ID_formateur`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`ID_formation`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`ID_session`),
  ADD KEY `ID_formation` (`ID_formation`),
  ADD KEY `ID_formateur` (`ID_formateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apprenant`
--
ALTER TABLE `apprenant`
  MODIFY `ID_apprenant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `ID_formateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `ID_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `ID_session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `apprenant_session`
--
ALTER TABLE `apprenant_session`
  ADD CONSTRAINT `apprenant_session_ibfk_1` FOREIGN KEY (`ID_session`) REFERENCES `session` (`ID_session`),
  ADD CONSTRAINT `apprenant_session_ibfk_2` FOREIGN KEY (`ID_apprenant`) REFERENCES `apprenant` (`ID_apprenant`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`ID_formation`) REFERENCES `formation` (`ID_formation`),
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`ID_formateur`) REFERENCES `formateur` (`ID_formateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
