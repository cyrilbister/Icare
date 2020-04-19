-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 19 avr. 2020 à 10:25
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `icare_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `acces`
--

DROP TABLE IF EXISTS `acces`;
CREATE TABLE IF NOT EXISTS `acces` (
  `N° d'accès` int(11) NOT NULL,
  `Date d'accès` date NOT NULL,
  `Durée d'accès` datetime DEFAULT NULL,
  PRIMARY KEY (`N° d'accès`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `administrateur/etablissement`
--

DROP TABLE IF EXISTS `administrateur/etablissement`;
CREATE TABLE IF NOT EXISTS `administrateur/etablissement` (
  `N° de SIRET de l'établissement` int(11) NOT NULL,
  `Nom de l'auto école` text NOT NULL,
  `Logo` text NOT NULL,
  PRIMARY KEY (`N° de SIRET de l'établissement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `N° d'adresse` int(11) NOT NULL AUTO_INCREMENT,
  `Numéro de bâtiment` int(11) DEFAULT NULL,
  `Nom de rue` text NOT NULL,
  `Code postal` int(11) NOT NULL,
  `Ville` text NOT NULL,
  `Pays` text NOT NULL,
  PRIMARY KEY (`N° d'adresse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contenu forum`
--

DROP TABLE IF EXISTS `contenu forum`;
CREATE TABLE IF NOT EXISTS `contenu forum` (
  `N° de contenu` int(11) NOT NULL AUTO_INCREMENT,
  `Date de publication` date NOT NULL,
  `Contenu` text NOT NULL,
  `Validation administrateur` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`N° de contenu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etat du test`
--

DROP TABLE IF EXISTS `etat du test`;
CREATE TABLE IF NOT EXISTS `etat du test` (
  `N° de validité` int(11) NOT NULL AUTO_INCREMENT,
  `Validité` tinyint(1) NOT NULL,
  PRIMARY KEY (`N° de validité`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

DROP TABLE IF EXISTS `gestionnaire`;
CREATE TABLE IF NOT EXISTS `gestionnaire` (
  `N° de compte` int(11) NOT NULL AUTO_INCREMENT,
  `Date de création de compte` date NOT NULL,
  PRIMARY KEY (`N° de compte`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `identite`
--

DROP TABLE IF EXISTS `identite`;
CREATE TABLE IF NOT EXISTS `identite` (
  `Adresse email` text NOT NULL,
  `Nom` text NOT NULL,
  `Prénom` text NOT NULL,
  `Numéro de téléphone` text NOT NULL,
  `Mot de passe` text NOT NULL,
  `N° Identité` int(11) NOT NULL,
  PRIMARY KEY (`N° Identité`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `N° de message` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Objet` text NOT NULL,
  `Contenu` text NOT NULL,
  PRIMARY KEY (`N° de message`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `question forum`
--

DROP TABLE IF EXISTS `question forum`;
CREATE TABLE IF NOT EXISTS `question forum` (
  `N° de question` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`N° de question`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reponse forum`
--

DROP TABLE IF EXISTS `reponse forum`;
CREATE TABLE IF NOT EXISTS `reponse forum` (
  `N° de réponse` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`N° de réponse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `resultats du test`
--

DROP TABLE IF EXISTS `resultats du test`;
CREATE TABLE IF NOT EXISTS `resultats du test` (
  `N° de test` int(11) NOT NULL AUTO_INCREMENT,
  `Température` int(11) NOT NULL,
  `Tonalité` int(11) DEFAULT NULL,
  `Fréquence cardiaque` int(11) NOT NULL,
  `Audition` int(11) DEFAULT NULL,
  `Vue` int(11) DEFAULT NULL,
  `Temps de réaction` int(11) NOT NULL,
  `Score total` int(11) NOT NULL,
  PRIMARY KEY (`N° de test`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sujet forum`
--

DROP TABLE IF EXISTS `sujet forum`;
CREATE TABLE IF NOT EXISTS `sujet forum` (
  `N° de sujet` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`N° de sujet`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `N° d'utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Date de naissance` date NOT NULL,
  `Sexe` char(1) NOT NULL,
  PRIMARY KEY (`N° d'utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
