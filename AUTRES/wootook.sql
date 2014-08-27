-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 28 Août 2014 à 00:09
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
-- Structure de la table `game_menus`
--

CREATE TABLE IF NOT EXISTS `game_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_parent` int(11) DEFAULT NULL,
  `name_menu` varchar(50) NOT NULL,
  `accessibility` int(11) NOT NULL,
  `type_url` enum('ajax','ext') DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `isInGame` tinyint(1) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `game_menus`
--

INSERT INTO `game_menus` (`id`, `id_menu_parent`, `name_menu`, `accessibility`, `type_url`, `url`, `isInGame`, `order`) VALUES
(1, NULL, 'menu_home', 0, 'ajax', 'ajax_login_accueil', 0, 1),
(2, NULL, 'menu_connect', 0, 'ajax', 'ajax_login_connexion', 0, 2),
(3, NULL, 'menu_register', 0, 'ajax', 'ajax_login_inscription', 0, 3),
(4, NULL, 'menu_credit', 0, 'ajax', 'ajax_login_credit', 0, 4),
(5, NULL, 'menu_board', 0, 'ext', 'http://www.wootook.org', 0, 5);

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
(1, 'res_metal', 2),
(2, 'res_cristal', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Contenu de la table `game_translations`
--

INSERT INTO `game_translations` (`id`, `id_language`, `name`, `value`) VALUES
(1, 1, 'res_metal', 'Métal'),
(2, 1, 'res_cristal', 'Cristal'),
(3, 2, 'res_metal', 'Metal'),
(4, 2, 'res_cristal', 'Crystal'),
(17, 1, 'title_game', 'wootook'),
(18, 1, 'username', 'Identifiant'),
(19, 1, 'password', 'Mot de passe'),
(20, 1, 'return', 'retour'),
(21, 1, 'return_mail', ' , vous allez recevoir par mail un rappel de votre pseudo et mot de passe.'),
(22, 1, 'error_champs_empty', 'Veuillez saisir les champs!'),
(23, 1, 'menu', 'Menu'),
(24, 1, 'menu_home', 'Accueil'),
(25, 1, 'menu_connect', 'Se connecter'),
(26, 1, 'menu_register', 'S''inscrire'),
(27, 1, 'menu_credit', 'Crédits'),
(28, 1, 'menu_board', 'Forum'),
(29, 1, 'title_login', 'Bienvenue sur '),
(30, 1, 'title_dec_1', ' est un jeu de stratégie en ligne gratuit, jouable par navigateur. Partez à la conquête de l''univers en développant votre empire. Imposez-vous et dominez en combattant les autres joueurs. '),
(31, 1, 'title_dec_2', 'Rejoignez-nous!'),
(32, 1, 'title_sign', 'Inscription sur '),
(33, 1, 'sign_email', 'Email'),
(34, 1, 'sign_name_pla', 'Nom de planète'),
(35, 1, 'sign_name_lang', 'Langue'),
(36, 1, 'sign_valide', 'Inscription'),
(37, 1, 'sign_reset', 'Réinitialiser'),
(38, 1, 'sign_finish', 'Inscription terminée, '),
(39, 1, 'error_isset_user', 'Attention, ce pseudo ou cet email est déjà utilisée dans le jeu.'),
(40, 1, 'title_conn', 'Connexion sur '),
(41, 1, 'btn_connect', 'Connexion'),
(42, 1, 'welcome', 'Bienvenue'),
(43, 1, 'error_write_conn', 'Pseudo ou mot de passe incorrect'),
(44, 1, 'credit_link', 'Liens'),
(45, 1, 'credit_fnd', 'Fondateur'),
(46, 1, 'credit_dev', 'Développeurs'),
(47, 1, 'credit_des', 'Designer'),
(48, 2, 'title_game', 'Uniguerre'),
(49, 2, 'username', 'Login'),
(50, 2, 'password', 'Password'),
(51, 2, 'return', 'Return'),
(52, 2, 'return_mail', ' , you will receive by email a reminder of your username and password. '),
(53, 2, 'error_champs_empty', 'Please enter the fields!'),
(54, 2, 'menu', 'Menu'),
(55, 2, 'menu_home', 'Home'),
(56, 2, 'menu_connect', 'Sign in'),
(57, 2, 'menu_register', 'Register'),
(58, 2, 'menu_credit', 'Credits'),
(59, 2, 'menu_board', 'Board'),
(60, 2, 'title_login', 'Welcome On '),
(61, 2, 'title_dec_1', 'is a strategy game online free, playable browser.\r\n             Conquer the universe expanding your empire.\r\n             Establish yourself and dominate fighting other players.'),
(62, 2, 'title_dec_2', 'Join us now!'),
(63, 2, 'title_sign', 'Registration on '),
(64, 2, 'sign_email', 'E-mail'),
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
(76, 2, 'credit_fnd', 'Founder'),
(77, 2, 'credit_dev', 'Developers'),
(78, 2, 'credit_des', 'Designer'),
(79, 1, 'btn_register', 'S''enregistrer'),
(80, 2, 'btn_register', 'Register');

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
