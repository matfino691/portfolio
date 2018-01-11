-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  xxxx
-- Généré le :  Mar 09 Janvier 2018 à 10:50
-- Version du serveur :  5.5.58-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db717619266`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `Id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `Nickname` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `Contents` text CHARACTER SET utf8 NOT NULL,
  `CreationTimeStamp` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Mail` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Message` varchar(255) CHARACTER SET utf8 NOT NULL,
  `CreationTimeStamp` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=72 ;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Image` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Image_Desc` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Link` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Link_Desc` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `projects`
--

INSERT INTO `projects` (`Id`, `Image`, `Image_Desc`, `Link`, `Link_Desc`) VALUES
(1, 'svg.png', 'image de l''application svg', 'svg/svg_pfolio/index.php', 'Come play with my SVG application'),
(3, 'painter.png', 'image de l''application painter', 'painter/painter_pfolio/index.html', 'Check out my Painter application');

-- --------------------------------------------------------

--
-- Structure de la table `socials`
--

CREATE TABLE IF NOT EXISTS `socials` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Adress` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Icon` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `socials`
--

INSERT INTO `socials` (`Id`, `Name`, `Adress`, `Icon`) VALUES
(1, 'Facebook', 'https://www.facebook.com/mathieu.finocchiaro/', 'fa fa-facebook'),
(2, 'Instagram', 'https://www.instagram.com/matfino/', 'fa fa-instagram'),
(3, 'Pinterest', 'https://www.pinterest.fr/matDesignn/', 'fa fa-pinterest-p'),
(4, 'Linkedin', 'https://www.linkedin.com/in/mathieu-finocchiaro/', 'fa fa-linkedin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
