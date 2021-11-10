-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 10 nov. 2021 à 03:13
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `documentId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `link` text,
  `uploadDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `investorId` int(11) DEFAULT NULL,
  PRIMARY KEY (`documentId`),
  KEY `docBelongsTo` (`investorId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`documentId`, `name`, `link`, `uploadDate`, `investorId`) VALUES
(14, 'epitech.jfif', '../uploads/14.jfif', '2021-11-10 04:01:08', 1),
(15, 'Image1.png', '../uploads/15.png', '2021-11-10 04:03:59', 1);

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
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `codePostal` varchar(255) DEFAULT NULL,
  `societe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`investorId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `investor`
--

INSERT INTO `investor` (`investorId`, `email`, `passwordHash`, `firstName`, `lastName`, `budget`, `adresse`, `ville`, `codePostal`, `societe`) VALUES
(1, 'florent.2re@gmail.com', '202cb962ac59075b964b07152d234b70', 'Florent', 'Dreux', 10000, '105 Chemin de Mérindol', 'Mornas', '84550', ' Epitech'),
(2, 'florent.dreux@epitech.eu', '202cb962ac59075b964b07152d234b70', 'Florent', 'Dreux', NULL, NULL, NULL, NULL, NULL);

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
