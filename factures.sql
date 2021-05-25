-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 mai 2021 à 20:49
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
-- Base de données : `factures`
--

-- --------------------------------------------------------

--
-- Structure de la table `entetes`
--

DROP TABLE IF EXISTS `entetes`;
CREATE TABLE IF NOT EXISTS `entetes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `lib` text COLLATE utf8mb4_bin NOT NULL,
  `ref` text COLLATE utf8mb4_bin NOT NULL,
  `id_tiers` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `entetes`
--

INSERT INTO `entetes` (`id`, `date`, `lib`, `ref`, `id_tiers`) VALUES
(1, '2021-02-01', 'facture1', '2021-02-01-facture1-AMAZON', 5),
(2, '2021-01-06', 'facture2', '2021-01-06-facture2-EBAY', 3),
(3, '2021-01-13', 'facture3', '2021-01-13-facture3-LDLC', 1),
(4, '2021-02-10', 'facture4', '2021-02-10-facture4-APPLE', 6),
(63, '2021-03-01', 'test63', 'test', 7),
(83, '2021-03-04', 'test2', 'test2', 8);

-- --------------------------------------------------------

--
-- Structure de la table `lignes`
--

DROP TABLE IF EXISTS `lignes`;
CREATE TABLE IF NOT EXISTS `lignes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compte` int(11) NOT NULL,
  `lib` text COLLATE utf8mb4_bin NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `lignes`
--

INSERT INTO `lignes` (`id`, `compte`, `lib`, `debit`, `credit`, `id_facture`) VALUES
(2, 10001, 'pc + ecran', 200000, 200000, 3),
(3, 10001, 'Serveurs', 1000000, 1000000, 2),
(4, 10001, 'Mac PRO 2020', 50000, 600000, 4),
(18, 1001, 'test1', 1, 1, 1),
(19, 1001, 'test2', 2, 2, 1),
(20, 1001, 'test3', 3, 3, 3),
(24, 1001, 'test1', 1, 1, 63),
(25, 1001, 'test2', 2, 2, 63),
(32, 1001, 'test1', 1, 1, 1),
(33, 1001, 'test2', 2, 2, 1),
(34, 1001, 'test3', 3, 3, 1),
(35, 1001, 'test5', 5, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tiers`
--

DROP TABLE IF EXISTS `tiers`;
CREATE TABLE IF NOT EXISTS `tiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raison_sociale` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `tiers`
--

INSERT INTO `tiers` (`id`, `raison_sociale`) VALUES
(1, 'LDLC'),
(2, 'IKEA'),
(3, 'EBAY'),
(4, 'TEST'),
(5, 'AMAZON'),
(6, 'APPLE'),
(7, 'SAMSUNG'),
(8, 'OPT'),
(10, 'LG'),
(11, 'SONY'),
(12, 'SONY'),
(13, 'SONY'),
(14, 'CANON'),
(15, 'CANON');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
