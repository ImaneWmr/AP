-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 déc. 2024 à 14:08
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ap3_imane`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `commentaire` text NOT NULL,
  `dateT` datetime NOT NULL,
  `numProf` int(5) NOT NULL,
  `numCR` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`commentaire`, `dateT`, `numProf`, `numCR`) VALUES
('ceci est un commentaire premier essai', '2024-11-26 22:43:34', 4, 5),
('', '2024-11-26 23:36:13', 2, 5),
('bon travail', '2024-11-26 23:38:36', 2, 5),
('TEST', '2024-11-26 23:42:51', 2, 5),
('bonjour\r\n', '2024-11-26 23:51:49', 2, 5),
('zdadzd', '2024-11-27 13:52:33', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `cr`
--

CREATE TABLE `cr` (
  `num` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `datecreation` date NOT NULL,
  `datemodification` date NOT NULL,
  `vu` tinyint(1) NOT NULL,
  `numEleve` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cr`
--

INSERT INTO `cr` (`num`, `date`, `description`, `datecreation`, `datemodification`, `vu`, `numEleve`) VALUES
(1, '2024-02-20 00:00:00', 'Présentation du projet final', '2024-01-15', '2024-02-18', 1, 1),
(3, '2024-04-10 00:00:00', 'Validation du stage', '2024-03-05', '2024-04-08', 1, 4),
(5, '0000-00-00 00:00:00', '                                        ville 2222 333                                           ', '2024-11-12', '2024-11-12', 0, 16),
(8, '2024-11-26 00:00:00', '        teste        ', '2024-11-18', '2024-11-18', 0, 16),
(9, '2024-11-25 00:00:00', 'qsdsqdsqd', '2024-11-18', '2024-11-18', 0, 16),
(17, '2019-09-12 00:00:00', 'changement', '2024-11-24', '2024-11-24', 0, 16),
(18, '2024-11-13 00:00:00', 'best', '2024-11-25', '2024-11-25', 0, 16),
(19, '2024-11-27 00:00:00', 'jlhljhljhjlh', '2024-11-27', '2024-11-27', 0, 16);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE `stage` (
  `num` int(5) NOT NULL,
  `entreprise` varchar(50) NOT NULL,
  `dated` date NOT NULL,
  `datef` date NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `teltuteur` int(10) NOT NULL,
  `nomtuteur` varchar(50) NOT NULL,
  `prenomtuteur` varchar(50) NOT NULL,
  `emailtuteur` varchar(50) NOT NULL,
  `libelle` text NOT NULL,
  `description` text NOT NULL,
  `heured` datetime NOT NULL,
  `heuref` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`num`, `entreprise`, `dated`, `datef`, `adresse`, `ville`, `cp`, `teltuteur`, `nomtuteur`, `prenomtuteur`, `emailtuteur`, `libelle`, `description`, `heured`, `heuref`) VALUES
(1, '', '0000-00-00', '0000-00-00', '', '', 0, 0, '', '', '', '', '', '2024-09-16 16:32:16', '2024-09-16 16:32:16'),
(2, 'Tech Innov', '2024-01-10', '2024-06-10', '12 rue de Rivoli', 'Paris', 75001, 145236789, 'Dupont', 'Jean', 'jean.dupont@techinnov.com', 'bootsrap', 'Développement d\'une application mobile en React Native', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Web Solutions', '2024-03-01', '2024-09-01', '35 avenue des Champs-Élysées', 'Paris', 75008, 148567890, 'Leroy', 'Sophie', 'sophie.leroy@websolutions.fr', 'Stage Web Designer', 'Création et optimisation de sites web sous WordPress', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'DataSoft', '2024-02-15', '2024-05-15', '28 boulevard Saint-Michel', 'Paris', 75005, 145123456, 'Martin', 'Marc', 'marc.martin@datasoft.com', 'Stage Data Analyst', 'Analyse de données avec Python et création de rapports.', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `num` int(5) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`num`, `nom`) VALUES
(1, 'ELEVE'),
(2, 'PROF');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `num` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `daten` date NOT NULL,
  `tel` int(10) NOT NULL,
  `login` varchar(50) NOT NULL,
  `motdepasse` varchar(50) NOT NULL,
  `option` varchar(4) NOT NULL,
  `numType` int(5) NOT NULL,
  `numStage` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`num`, `email`, `nom`, `prenom`, `daten`, `tel`, `login`, `motdepasse`, `option`, `numType`, `numStage`) VALUES
(1, 'ouamar1.imane@outlook.fr', 'eleve', 'student', '2014-09-17', 123456789, 'imane', '970c86285daddf4398b261ce6094fc43', 'SLAM', 1, 1),
(2, 'dupond@gmail.com', 'Gravouil', 'Benjamin', '2014-09-11', 123456789, 'user2', 'e10adc3949ba59abbe56e057f20f883e', '', 2, 1),
(4, 'test@gmail.com', 'Dupond', 'jean', '2014-09-17', 123456789, 'imane', '5f4dcc3b5aa765d61d8327deb882cf99', 'SLAM', 1, 2),
(16, 'HELLO@gmail.com', 'OUAMAR', 'Imane', '2024-11-06', 987654321, 'eleve', '5f4dcc3b5aa765d61d8327deb882cf99', 'SLAM', 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD KEY `FK4` (`numProf`),
  ADD KEY `FK5` (`numCR`);

--
-- Index pour la table `cr`
--
ALTER TABLE `cr`
  ADD PRIMARY KEY (`num`),
  ADD KEY `FK3` (`numEleve`);

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`num`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`num`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`num`),
  ADD KEY `FK1` (`numType`),
  ADD KEY `FK2` (`numStage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cr`
--
ALTER TABLE `cr`
  MODIFY `num` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `stage`
--
ALTER TABLE `stage`
  MODIFY `num` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `num` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `num` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK4` FOREIGN KEY (`numProf`) REFERENCES `utilisateur` (`num`),
  ADD CONSTRAINT `FK5` FOREIGN KEY (`numCR`) REFERENCES `cr` (`num`);

--
-- Contraintes pour la table `cr`
--
ALTER TABLE `cr`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`numEleve`) REFERENCES `utilisateur` (`num`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`numType`) REFERENCES `type` (`num`),
  ADD CONSTRAINT `FK2` FOREIGN KEY (`numStage`) REFERENCES `stage` (`num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
