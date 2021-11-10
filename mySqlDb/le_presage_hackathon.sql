-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 10 nov. 2021 à 03:35
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`adminId`, `hashedPassword`, `email`) VALUES
(1, '309cd3800aacbd003ac36199fa537295', 'admin');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`documentId`, `type`, `file`, `uploadDate`, `investorId`) VALUES
(1, ':type', 0x3a66696c65, '2021-11-09 22:47:54', 1),
(2, ':type', 0x3a66696c65, '2021-11-09 22:49:21', 1),
(3, ':type', 0x3a66696c65, '2021-11-09 22:49:21', 1),
(4, ':type', 0x3a66696c65, '2021-11-09 22:49:22', 1),
(5, ':type', 0x3a66696c65, '2021-11-09 22:49:22', 1),
(6, ':type', 0x3a66696c65, '2021-11-09 22:49:22', 1),
(7, ':type', 0x3a66696c65, '2021-11-09 23:22:45', 1),
(8, ':type', 0x3a66696c65, '2021-11-09 23:22:45', 1),
(9, ':type', 0x3a66696c65, '2021-11-09 23:22:45', 1),
(10, ':type', 0x3a66696c65, '2021-11-09 23:24:33', 1),
(11, ':type', 0x3a66696c65, '2021-11-09 23:24:33', 1),
(12, ':type', 0x3a66696c65, '2021-11-09 23:24:33', 1),
(13, ':type', 0x3a66696c65, '2021-11-09 23:25:00', 1),
(14, ':type', 0x3a66696c65, '2021-11-09 23:25:00', 1),
(15, ':type', 0x3a66696c65, '2021-11-09 23:25:00', 1),
(16, ':type', 0x3a66696c65, '2021-11-09 23:25:00', 1),
(17, ':type', 0x3a66696c65, '2021-11-09 23:25:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `investissement`
--

DROP TABLE IF EXISTS `investissement`;
CREATE TABLE IF NOT EXISTS `investissement` (
  `Cagnotte` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `investissement`
--

INSERT INTO `investissement` (`Cagnotte`) VALUES
(30000);

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
  `budget` int(11) DEFAULT NULL,
  `confirmBudget` tinyint(1) NOT NULL DEFAULT '0',
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `codePostal` varchar(255) DEFAULT NULL,
  `societe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`investorId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `investor`
--

INSERT INTO `investor` (`investorId`, `email`, `passwordHash`, `firstName`, `lastName`, `budget`, `confirmBudget`, `adresse`, `ville`, `codePostal`, `societe`) VALUES
(1, 'meedlaah@gmail.com', '309cd3800aacbd003ac36199fa537295', 'mohamed', 'lahcen', 1200, 0, 'agadiir', 'MARSEILLE', '13996', 'pas de societéee'),
(2, 'lahcen.agricu@gmail.com', '309cd3800aacbd003ac36199fa537295', 'lahcen', 'mohamed', 23, 0, NULL, NULL, NULL, NULL),
(3, 'meedlaah@gmail.com', '309cd3800aacbd003ac36199fa537295', 'laahcen', 'mohamed', 10000, 0, NULL, NULL, NULL, NULL),
(4, 'meedlaah@gmail.com', '309cd3800aacbd003ac36199fa537295', 'mohamed', 'lahcen', NULL, 0, NULL, NULL, NULL, NULL);

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
