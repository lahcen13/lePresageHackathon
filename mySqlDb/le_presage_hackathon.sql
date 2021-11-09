-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 nov. 2021 à 16:23
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `le_presage_hackathon`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `hashedPassword` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `documentId` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `file` blob NOT NULL,
  `uploadDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `investorId` int(11) DEFAULT NULL,
  PRIMARY KEY (`documentId`),
  KEY `docBelongsTo` (`investorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `investor`
--

DROP TABLE IF EXISTS `investor`;
CREATE TABLE IF NOT EXISTS `investor` (
  `investorId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `passwordHash` text NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `codePostal` varchar(255) DEFAULT NULL,
  `societe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`investorId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `investor`
--

INSERT INTO `investor` (`investorId`, `email`, `passwordHash`, `firstName`, `lastName`, `gender`, `budget`, `adresse`, `ville`, `codePostal`, `societe`) VALUES
(1, 'meedlaah@gmail.com', '309cd3800aacbd003ac36199fa537295', 'mohamed', 'lahcen', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'lahcen.agricu@gmail.com', '309cd3800aacbd003ac36199fa537295', 'lahcen', 'mohamed', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'meedlaah@gmail.com', '309cd3800aacbd003ac36199fa537295', 'laahcen', 'mohamed', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'meedlaah@gmail.com', '309cd3800aacbd003ac36199fa537295', 'mohamed', 'lahcen', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `docBelongsTo` FOREIGN KEY (`investorId`) REFERENCES `investor` (`investorId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
