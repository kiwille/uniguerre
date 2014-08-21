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
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `value` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Contenu de la table `game_translations`
--

INSERT INTO `game_translations` (`id`, `id_language`, `name`, `value`) VALUES
(1, 1, 'res_metal', 'Métal'),
(2, 1, 'res_cristal', 'Cristal'),
(3, 2, 'res_metal', 'Métal'),
(4, 2, 'res_cristal', 'Crystal'),
(17, 1, 'title_game', 'wootook'),
(18, 1, 'username', 'Identifiant'),
(19, 1, 'password', 'Mot de passe'),
(20, 1, 'return', 'retour'),
(21, 1, 'return_mail', ' , vous allez recevoir par mail un rappel de votre pseudo et mot de passe.'),
(22, 1, 'error_champs_empty', 'Veuillez saisir les champs!'),
(23, 1, 'menu', 'menu'),
(24, 1, 'home', 'Accueil'),
(25, 1, 'connect', 'Se connecter'),
(26, 1, 'register', 'S''inscrire'),
(27, 1, 'credit', 'Crédits'),
(28, 1, 'board', 'Forum'),
(29, 1, 'title_login', 'Bienvenue sur '),
(30, 1, 'title_dec_1', ' est un jeu de stratégie en ligne gratuit, jouable par navigateur. \r\n            Partez à la conquête de l''univers en développant votre empire. \r\n            Imposez-vous et dominez en combattant les autres joueurs. '),
(31, 1, 'title_dec_2', 'Rejoingnez-nous!'),
(32, 1, 'title_sign', 'Inscription sur '),
(33, 1, 'sign_email', 'Email'),
(34, 1, 'sign_name_pla', 'Nom de planète'),
(35, 1, 'sign_name_lang', 'Langue'),
(36, 1, 'sign_valide', 'Inscription'),
(37, 1, 'sign_reset', 'Réinitialiser'),
(38, 1, 'sign_finish', 'Inscription terminée  , '),
(39, 1, 'error_isset_user', 'Attention ,se pseudo ou cette email sont déja enregistré(e)s!'),
(40, 1, 'title_conn', 'Connexion sur '),
(41, 1, 'btn_connect', 'Connexion'),
(42, 1, 'welcome', 'Bienvenue'),
(43, 1, 'error_write_conn', 'Pseudo ou mot de passe incorrect'),
(44, 1, 'credit_link', 'Liens'),
(45, 1, 'credit_fnd', 'Fondateur'),
(46, 1, 'credit_dev', 'Développeurs'),
(47, 1, 'credit_des', 'Designer'),
(48, 2, 'title_game', 'wootook'),
(49, 2, 'username', 'login'),
(50, 2, 'password', 'password'),
(51, 2, 'return', 'return'),
(52, 2, 'return_mail', ' ,you will receive by email a reminder of your username and password.'),
(53, 2, 'error_champs_empty', 'Please enter the fields!'),
(54, 2, 'menu', 'menu'),
(55, 2, 'home', 'Home'),
(56, 2, 'connect', 'Sign in'),
(57, 2, 'register', 'register'),
(58, 2, 'credit', 'Crédits'),
(59, 2, 'board', 'board'),
(60, 2, 'title_login', 'Welcome On '),
(61, 2, 'title_dec_1', 'is a strategy game online free, playable browser.\r\n             Conquer the universe expanding your empire.\r\n             Establish yourself and dominate fighting other players.'),
(62, 2, 'title_dec_2', 'Join us now!'),
(63, 2, 'title_sign', 'registration on '),
(64, 2, 'sign_email', 'e-mail'),
(65, 2, 'sign_name_pla', 'Planet name'),
(66, 2, 'sign_name_lang', 'language'),
(67, 2, 'sign_valide', 'registration'),
(68, 2, 'sign_reset', 'reset'),
(69, 2, 'sign_finish', 'registration is complete , '),
(70, 2, 'error_isset_user', 'watch out, is nickname or email are already registered!'),
(71, 2, 'title_conn', 'Log on'),
(72, 2, 'btn_connect', 'Login'),
(73, 2, 'welcome', 'Welcome'),
(74, 2, 'error_write_conn', 'Username or password incorrect'),
(75, 2, 'credit_link', 'Links'),
(76, 2, 'credit_fnd', 'founder'),
(77, 2, 'credit_dev', 'Developers'),
(78, 2, 'credit_des', 'Designer');

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
