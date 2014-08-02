-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 30 Juillet 2014 à 23:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `wootook`
--

-- --------------------------------------------------------

--
-- Structure de la table `game_languages`
--

CREATE TABLE IF NOT EXISTS `game_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `game_languages`
--

INSERT INTO `game_languages` (`id`, `code`, `name`) VALUES
(1, 'FR', 'Français'),
(2, 'EN', 'Anglais');

-- --------------------------------------------------------

--
-- Structure de la table `game_planets`
--

CREATE TABLE IF NOT EXISTS `game_planets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `game_resources`
--

CREATE TABLE IF NOT EXISTS `game_resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `coef_prod` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `game_resources`
--

INSERT INTO `game_resources` (`id`, `name`, `coef_prod`) VALUES
(1, 'metal', 2),
(2, 'cristal', 1);

-- --------------------------------------------------------

--
-- Structure de la table `game_translations`
--

CREATE TABLE IF NOT EXISTS `game_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_language` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `game_translations`
--

INSERT INTO `game_translations` (`id`, `id_lang`, `name`, `value`) VALUES
(1, 1, 'res_metal', 'Métal'),
(2, 1, 'res_cristal', 'Cristal'),
(3, 2, 'res_metal', 'Metal'),
(4, 2, 'res_cristal', 'Crystal');

-- --------------------------------------------------------

--
-- Structure de la table `game_users`
--

CREATE TABLE IF NOT EXISTS `game_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_language` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `game_users`
--

INSERT INTO `game_users` (`id`, `id_language`, `username`, `password`, `email`) VALUES
(1, 1, 'Kiwille', '$2a$10$NlW3CW6Z1PKCgAtUuqHXOeH965T064ImfVL6Fw4m8VtIj7v5cw5oW', 'test@test.fr');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
