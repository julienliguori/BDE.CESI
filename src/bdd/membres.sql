-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 21 jan. 2019 à 08:26
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `espace_membre`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Mail` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Centre` varchar(255) NOT NULL,
  `MDP` text NOT NULL,
  `Status` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`ID`, `Mail`, `Nom`, `Prenom`, `Centre`, `MDP`, `Status`, `avatar`) VALUES
(1, 'fe@viacesi.fr', 'GHg', 'dede', 'Arras', '600ccd1b71569232d01d110bc63e906beab04d8c', 'Etudiant', 'avatar.png'),
(2, 'fg@viacesi.fr', 'GHg', 'dede', 'Arras', '57f378cca8e1bd5ea94400ff922e6451409e0765', 'Membre BDE', 'avatar.png'),
(3, 'd@viacesi.fr', 'dzqd', 'zdq', 'Arras', '600ccd1b71569232d01d110bc63e906beab04d8c', 'Membre BDE', 'avatar.png'),
(4, 'fef@viacesi.fr', 'Edouart', 'Micheal', 'Arras', '600ccd1b71569232d01d110bc63e906beab04d8c', 'Salarier', 'avatar.png'),
(5, 'hd@gmail.com', 'Julien', 'Jacky', 'Arras', '600ccd1b71569232d01d110bc63e906beab04d8c', 'Salarier', 'avatar.png'),
(6, 'de@viacesi.fr', 'de', 'de', 'Arras', '600ccd1b71569232d01d110bc63e906beab04d8c', 'Etudiant', 'avatar.png'),
(7, 'de@cesi.fr', 'trois', 'trois', 'Arras', '4a0a19218e082a343a1b17e5333409af9d98f0f5', 'Salarier', 'avatar.png'),
(8, 're@viacesi.fr', 'Etienne', 'Salim', 'Arras', 'c387c982a132d05cbd5f88840aef2c8157740049', 'Etudiant', '8.png'),
(9, 'ij@viacesi.fr', '&quot;) SELECT * FROM membres', 'ij', 'Arras', '4cfa380a7a05ae26270f5ea888009520ab54b677', 'Etudiant', 'avatar.png'),
(10, 'romain.deschamps@viacesi.fr', 'Deschamps', 'Romain', 'Aix-en-Provence', 'b8aabb4b95c817d9df69b6be95b2b94d6b1efe17', 'Etudiant', '10.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
