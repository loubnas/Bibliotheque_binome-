-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 17 mars 2021 à 15:58
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id`, `cin`, `FullName`, `date_birth`) VALUES
(4, 'HH5', 'loubna', '2021-03-13');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `nameBook`, `price`, `date`, `image`) VALUES
(26, 'Book 3', 123, '2021-03-19', 'book1.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bookauthor`
--

INSERT INTO `bookauthor` (`id`, `idBook`, `idAuthor`) VALUES
(26, 26, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(120) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fullName`, `adresse`, `number`, `email`, `pwd`) VALUES
(1, 'TAHZIMA Ilyass', '23 Bloc 14', 606060606, 'tahzima.i@gmail.com', 'ilyass123'),
(2, 'SOUSSI Loubna', 'adr1', 50505005, 'loubna123@gmail.com', 'loubna123'),
(3, 'tahzima', 'adr2', 1231203, 'ilyass.t.1997@gmail.com', 'ilyass'),
(4, 'test', 'test', 213123123, 'test@gmail.com', 'test'),
(5, 'test', 'iudza', 12312412, 'teste@gmail.com', 'teste'),
(6, 'lb', 'lb', 12312312, 'lb@gmail.com', 'lb123'),
(7, 'il', 'il', 1231231, 'il@gmail.com', 'il123'),
(8, 'kljds', 'jfpos', 1231232, 'loubna123@gmail.com', 'AZERTY'),
(9, 'ijvoids', 'ojfepzoje', 2312412, 'tah.i@gmail.com', 'AZERT'),
(10, 'ayoub', 'adr3', 142412, 'ayoub@gmail.com', 'ayoub'),
(11, 'klfbd', 'lkjlk', 12, 'loubna123@gmail.com', 'AZE'),
(12, 'klfbd', 'lkjlk', 12, 'loubna123@gmail.com', 'AZE'),
(13, 'klfd', 'lk', 12, 'ilyass.t.1997@gmail.com', '213'),
(14, 'Book 3', 'lk', 2141, 'ilyass.t.1997@gmail.com', 'tetet'),
(15, 'Book 3', 'lk', 3242, 'ilyass.t.1997@gmail.com', 'efze'),
(16, 'Book 3', 'lk', 2131, 'ilyass.t.1997@gmail.com', 'ZAEaze');

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
