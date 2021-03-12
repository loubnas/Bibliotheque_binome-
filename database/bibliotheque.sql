-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 12 mars 2021 à 16:14
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
-- Base de données : `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cin` varchar(30) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `date_birth` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id`, `cin`, `FullName`, `date_birth`) VALUES
(1, 'HHH1', 'ilyass tahzima', '2021-03-09'),
(2, 'HH2', 'SOUSSI Loubna', '2021-03-04');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameBook` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `date` date NOT NULL,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `nameBook`, `price`, `date`, `image`) VALUES
(12, 'Book 3', 500, '2021-03-26', 'book3.jpg'),
(13, 'Book 2', 123, '2021-03-17', 'book2.jpg'),
(14, 'Book 1', 500, '2021-04-02', 'book1.jpg'),
(15, 'Book 1113', 600, '2021-03-05', 'book6.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `bookauthor`
--

DROP TABLE IF EXISTS `bookauthor`;
CREATE TABLE IF NOT EXISTS `bookauthor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idBook` int(11) NOT NULL,
  `idAuthor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idBook` (`idBook`),
  KEY `iddAuthor` (`idAuthor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bookauthor`
--

INSERT INTO `bookauthor` (`id`, `idBook`, `idAuthor`) VALUES
(12, 12, 1),
(13, 13, 2),
(14, 14, 2),
(15, 15, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bookauthor`
--
ALTER TABLE `bookauthor`
  ADD CONSTRAINT `idBook` FOREIGN KEY (`idBook`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iddAuthor` FOREIGN KEY (`idAuthor`) REFERENCES `author` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
