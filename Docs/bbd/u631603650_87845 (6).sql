
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 20 Janvier 2018 à 06:32
-- Version du serveur: 10.1.20-MariaDB
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `u631603650_87845`
--

-- --------------------------------------------------------

--
-- Structure de la table `adenoide`
--

CREATE TABLE IF NOT EXISTS `adenoide` (
  `alezan` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `alcade` int(11) NOT NULL,
  `ammonite` int(11) NOT NULL,
  `ambre` datetime NOT NULL,
  `anaerobie` longtext COLLATE utf8_unicode_ci NOT NULL,
  `androstone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `andoran` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `angor` int(11) DEFAULT NULL,
  `anoxie` int(11) DEFAULT NULL,
  PRIMARY KEY (`alezan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `adenoide`
--

INSERT INTO `adenoide` (`alezan`, `alcade`, `ammonite`, `ambre`, `anaerobie`, `androstone`, `andoran`, `angor`, `anoxie`) VALUES
(3, 1, 1, '2017-08-12 06:46:37', 'Je vous propose de tondre votre pelouse', NULL, '1', 2, 1),
(2, 3, 1, '2017-08-12 06:35:18', 'bonjour ceci est un test', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `badin`
--

CREATE TABLE IF NOT EXISTS `badin` (
  `baliverne` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `balsamine` smallint(5) unsigned NOT NULL,
  `bigarade` smallint(5) unsigned NOT NULL,
  `bouquetin` tinyint(1) unsigned NOT NULL,
  `brimade` datetime NOT NULL,
  `bryophite` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `benzylique` tinyint(4) NOT NULL,
  PRIMARY KEY (`baliverne`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `badin`
--

INSERT INTO `badin` (`baliverne`, `balsamine`, `bigarade`, `bouquetin`, `brimade`, `bryophite`, `benzylique`) VALUES
(1, 2, 1, 4, '2017-08-12 06:45:23', '', 1),
(2, 2, 1, 6, '2017-08-12 06:45:32', 'Super!', 1),
(3, 2, 3, 3, '2017-08-12 06:47:57', '', 1),
(4, 2, 3, 6, '2017-08-12 06:48:11', 'Merci!', 1),
(5, 3, 3, 5, '2017-08-12 06:49:16', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `clayette`
--

CREATE TABLE IF NOT EXISTS `clayette` (
  `clopinette` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cnidaire` smallint(5) unsigned NOT NULL,
  `cocasse` smallint(5) unsigned NOT NULL,
  `cocufier` tinyint(1) unsigned NOT NULL,
  `coenzine` tinyint(1) unsigned NOT NULL,
  `collutoire` datetime NOT NULL,
  `cephalopode` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`clopinette`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `clayette`
--

INSERT INTO `clayette` (`clopinette`, `cnidaire`, `cocasse`, `cocufier`, `coenzine`, `collutoire`, `cephalopode`) VALUES
(3, 1, 3, 1, 1, '2017-08-12 06:45:16', 0),
(4, 3, 1, 1, 1, '2017-08-12 06:48:53', 0);

-- --------------------------------------------------------

--
-- Structure de la table `dactyle`
--

CREATE TABLE IF NOT EXISTS `dactyle` (
  `dazibao` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `decapode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `decati` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `depressurier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desinence` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desopilant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dessication` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diaspora` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diastole` tinyint(3) unsigned NOT NULL,
  `diatribe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dichotomie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dierese` tinyint(1) unsigned NOT NULL,
  `diergol` text COLLATE utf8_unicode_ci NOT NULL,
  `diglossie` datetime NOT NULL,
  `dilapider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dimorphe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dinanderie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dinghy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dionysaque` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diplopie` bigint(20) unsigned NOT NULL,
  `discarthrose` int(11) NOT NULL,
  `discobole` tinyint(1) unsigned NOT NULL,
  `discurisif` tinyint(1) unsigned NOT NULL,
  `duopole` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`dazibao`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `dactyle`
--

INSERT INTO `dactyle` (`dazibao`, `decapode`, `decati`, `depressurier`, `desinence`, `desopilant`, `dessication`, `diaspora`, `diastole`, `diatribe`, `dichotomie`, `dierese`, `diergol`, `diglossie`, `dilapider`, `dimorphe`, `dinanderie`, `dinghy`, `dionysaque`, `diplopie`, `discarthrose`, `discobole`, `discurisif`, `duopole`) VALUES
(1, 'nat.chevalier', '', '', 'c3996be6a04d2b5b10a0186b0a4def287558b0a8096f6c834b06b84dc2c345c2587855151d2660ff23145c003b726f2ac7e4ef825190ccc3996be6a04d2b5b10a0186b0a4def287558b0a8096f6c834b06b84dc2c345c2587855151d2660ff23145c003b726f2ac7e4ef825190cc5b', 'nathanchevalier.lechatelet@gmail.com', '2016110521261478377576.jpg', '2016110519591478372398.jpg', 1, 'membre', '40927ed4d8a894bfbe456e9f48bd9156', 1, '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, 0, 0, 0),
(2, 'pierre.dupont', '', '', 'c3996be6a04d2b5b10a0186b0a4def287558b0a8096f6c834b06b84dc2c345c2587855151d2660ff23145c003b726f2ac7e4ef825190ccc3996be6a04d2b5b10a0186b0a4def287558b0a8096f6c834b06b84dc2c345c2587855151d2660ff23145c003b726f2ac7e4ef825190cc5b', 'inthefootball@gmail.com', '', '', 1, 'membre', '47d012a9fa4a00470aafe679d2d769d1', 0, '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, 0, 0, 0),
(3, 'pierre.dupont', '', '', 'c323d8843732bcf0c8e60f4eeac40f2459f16ad76236bc9791e40fdf200716677f758f8fd5bb50dd7907e121d351cedaa4c72ca824c0b9c323d8843732bcf0c8e60f4eeac40f2459f16ad76236bc9791e40fdf200716677f758f8fd5bb50dd7907e121d351cedaa4c72ca824c0b99f', 'inthefootball@gmail.com', 'base.jpg', 'base.jpg', 1, 'membre', '8da837915727ef94d5251fe865410470', 1, '', '0000-00-00 00:00:00', '', '', '', '', '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ebalacon`
--

CREATE TABLE IF NOT EXISTS `ebalacon` (
  `ebaubi` mediumint(7) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `ebeyliere` mediumint(7) unsigned NOT NULL COMMENT 'id compte rattaché',
  `ecaude` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'description',
  `ecbase` datetime NOT NULL COMMENT 'date validation compte',
  `echalas` varchar(130) COLLATE utf8_unicode_ci NOT NULL COMMENT 'rue',
  `ecouailles` varchar(8) COLLATE utf8_unicode_ci NOT NULL COMMENT 'code postal',
  `ectypes` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ville',
  `egypan` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'pays',
  `eglogue` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'langue',
  `emblavure` bigint(20) unsigned NOT NULL COMMENT 'telephone',
  `embut` tinyint(1) unsigned NOT NULL COMMENT 'conf informations',
  `emissole` tinyint(1) unsigned NOT NULL COMMENT 'conf abonnement',
  `empeigne` tinyint(1) unsigned NOT NULL COMMENT 'conf coordonnées',
  `enferges` tinyint(1) unsigned NOT NULL COMMENT 'page redirection connexion',
  PRIMARY KEY (`ebaubi`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `ebalacon`
--

INSERT INTO `ebalacon` (`ebaubi`, `ebeyliere`, `ecaude`, `ecbase`, `echalas`, `ecouailles`, `ectypes`, `egypan`, `eglogue`, `emblavure`, `embut`, `emissole`, `empeigne`, `enferges`) VALUES
(1, 3, '', '2017-08-12 06:31:59', '', '', '', '', '', 0, 1, 1, 1, 1),
(2, 1, '', '2017-08-12 06:43:17', '', '', '', '', '', 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `facadisme`
--

CREATE TABLE IF NOT EXISTS `facadisme` (
  `facetie` int(11) NOT NULL AUTO_INCREMENT,
  `factotum` int(11) NOT NULL,
  `faisandage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `falafel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fangotherapie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fastigie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fazenda` tinyint(4) NOT NULL,
  `feldspathique` tinyint(4) NOT NULL,
  `fenestron` smallint(6) NOT NULL,
  `ferblantier` tinyint(4) NOT NULL,
  `ferromolybdene` datetime NOT NULL,
  `feudataire` tinyint(4) NOT NULL,
  PRIMARY KEY (`facetie`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `facadisme`
--

INSERT INTO `facadisme` (`facetie`, `factotum`, `faisandage`, `falafel`, `fangotherapie`, `fastigie`, `fazenda`, `feldspathique`, `fenestron`, `ferblantier`, `ferromolybdene`, `feudataire`) VALUES
(1, 1, 'tonte de gazon', 'Jardinage', 'Histoire', '25', 1, 2, 2, 1, '2017-08-12 06:46:37', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
