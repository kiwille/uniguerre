-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 15 Juillet 2015 à 00:19
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
-- Structure de la table `game_chat`
--

CREATE TABLE IF NOT EXISTS `game_chat` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `id_sender` int(11) NOT NULL,
  `id_recipients` text NOT NULL,
  `msg` text NOT NULL,
  `time_msg` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_chat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `game_chat`
--

INSERT INTO `game_chat` (`id_chat`, `id_sender`, `id_recipients`, `msg`, `time_msg`) VALUES
(1, 0, '0', 'Bienvenue sur le chat! C''est ici que vous pourrez communiquer avec les joueurs du jeu.', 0);

-- --------------------------------------------------------

--
-- Structure de la table `game_languages`
--

CREATE TABLE IF NOT EXISTS `game_languages` (
  `id_language` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_language`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `game_languages`
--

INSERT INTO `game_languages` (`id_language`, `code`, `name`) VALUES
(1, 'FR', 'Français'),
(2, 'EN', 'Anglais');

-- --------------------------------------------------------

--
-- Structure de la table `game_menus`
--

CREATE TABLE IF NOT EXISTS `game_menus` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent_menu` int(11) DEFAULT NULL,
  `denomination` varchar(50) NOT NULL,
  `accessibility` int(11) NOT NULL,
  `type_url` enum('ajax','extr') DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_in_game` tinyint(1) NOT NULL DEFAULT '0',
  `number_sort` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `game_menus`
--

INSERT INTO `game_menus` (`id_menu`, `id_parent_menu`, `denomination`, `accessibility`, `type_url`, `url`, `is_in_game`, `number_sort`) VALUES
(1, NULL, 'menu_home', 0, 'ajax', 'ajax_login_accueil', 0, 1),
(2, NULL, 'menu_connect', 0, 'ajax', 'ajax_login_connexion', 0, 2),
(3, NULL, 'menu_register', 0, 'ajax', 'ajax_login_inscription', 0, 3),
(4, NULL, 'menu_credit', 0, 'ajax', 'ajax_login_credit', 0, 4),
(5, NULL, 'menu_board', 0, 'extr', 'http://www.wootook.org', 0, 5),
(6, NULL, 'menu_development', 0, NULL, NULL, 1, 1),
(7, NULL, 'menu_navigation', 0, NULL, NULL, 1, 2),
(8, NULL, 'menu_productivity', 0, NULL, NULL, 1, 3),
(9, NULL, 'menu_community', 0, NULL, NULL, 1, 4),
(10, NULL, 'menu_tools', 0, NULL, NULL, 1, 5),
(11, NULL, 'menu_board', 0, 'extr', 'http://www.wootook.org', 1, 6),
(12, 6, 'menu_building', 0, 'ajax', 'ajax_game_batiment', 1, 1),
(13, 6, 'menu_research', 0, 'ajax', 'ajax_game_recherche', 1, 2),
(14, 6, 'menu_spaceship', 0, 'ajax', 'ajax_game_flotte', 1, 3),
(15, 6, 'menu_defense', 0, 'ajax', 'ajax_game_defense', 1, 4),
(16, 7, 'menu_planetview', 0, 'ajax', 'ajax_game_vueplanete', 1, 1),
(17, 7, 'menu_universeview', 0, 'ajax', 'ajax_game_vueunivers', 1, 2),
(18, 7, 'menu_starport', 0, 'ajax', 'ajax_game_spatioport', 1, 3),
(19, 7, 'menu_empireview', 0, 'ajax', 'ajax_game_vueempire', 1, 4),
(20, 8, 'menu_techtree', 0, 'ajax', 'ajax_game_arbretech', 1, 1),
(21, 8, 'menu_statsress', 0, 'ajax', 'ajax_game_statsress', 1, 2),
(22, 8, 'menu_ranking', 0, 'ajax', 'ajax_game_classement', 1, 3),
(23, 9, 'menu_messages', 0, 'ajax', 'ajax_game_messages', 1, 1),
(24, 9, 'menu_chat', 0, 'ajax', 'ajax_game_chat', 1, 2),
(25, 9, 'menu_relationship', 0, 'ajax', 'ajax_game_relations', 1, 3),
(26, 9, 'menu_contacts', 0, 'ajax', 'ajax_game_contacts', 1, 4),
(27, 10, 'menu_notes', 0, 'ajax', 'ajax_game_notes', 1, 1),
(28, 10, 'menu_rules', 0, 'ajax', 'ajax_game_regles', 1, 2),
(29, 10, 'menu_options', 0, 'ajax', 'ajax_game_options', 1, 3),
(30, 10, 'menu_changelog', 0, 'ajax', 'ajax_menu_changelog', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `game_planets`
--

CREATE TABLE IF NOT EXISTS `game_planets` (
  `id_planet` int(11) NOT NULL AUTO_INCREMENT,
  `id_planet_image` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_main_planet` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_planet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `game_planets`
--

INSERT INTO `game_planets` (`id_planet`, `id_planet_image`, `id_user`, `name`, `is_main_planet`) VALUES
(1, 1, 1, 'Kiwi 1', 1),
(2, 2, 2, 'Manda planet', 1),
(3, 3, 3, 'Demo', 1);

-- --------------------------------------------------------

--
-- Structure de la table `game_planets_images`
--

CREATE TABLE IF NOT EXISTS `game_planets_images` (
  `id_planet_image` int(11) NOT NULL AUTO_INCREMENT,
  `img_static_planet` varchar(30) DEFAULT NULL,
  `img_starfield` varchar(30) DEFAULT NULL,
  `img_sun` varchar(30) DEFAULT NULL,
  `img_sun_cloud_trans` varchar(30) DEFAULT NULL,
  `img_sun_cloud` varchar(30) DEFAULT NULL,
  `img_planet` varchar(30) DEFAULT NULL,
  `img_planet_ring` varchar(30) DEFAULT NULL,
  `img_planet_cloud_trans` varchar(30) DEFAULT NULL,
  `img_planet_cloud` varchar(30) DEFAULT NULL,
  `img_moon` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_planet_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `game_planets_images`
--

INSERT INTO `game_planets_images` (`id_planet_image`, `img_static_planet`, `img_starfield`, `img_sun`, `img_sun_cloud_trans`, `img_sun_cloud`, `img_planet`, `img_planet_ring`, `img_planet_cloud_trans`, `img_planet_cloud`, `img_moon`) VALUES
(1, NULL, 'g01.jpg', 'sun03.jpg', 'cloudmaptrans.jpg', 'cloudmap.jpg', 'p01.jpg', 'ring01.jpg', 'cloudmaptrans.jpg', 'cloudmap.jpg', 'lune02.jpg'),
(2, NULL, 'g03.jpg', 'sun02.jpg', 'cloudmaptrans.jpg', 'cloudmap.jpg', 'p05.jpg', 'ring01.jpg', 'cloudmaptrans.jpg', 'cloudmap.jpg', 'lune01.jpg'),
(3, NULL, 'g01.jpg', 'sun03.jpg', 'cloudmaptrans.jpg', 'cloudmap.jpg', 'p01.jpg', 'ring01.jpg', 'cloudmaptrans.jpg', 'cloudmap.jpg', 'lune02.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `game_resources`
--

CREATE TABLE IF NOT EXISTS `game_resources` (
  `id_resource` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `coef_prod` double NOT NULL,
  PRIMARY KEY (`id_resource`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `game_resources`
--

INSERT INTO `game_resources` (`id_resource`, `name`, `coef_prod`) VALUES
(1, 'res_metal', 2),
(2, 'res_crystal', 1),
(3, 'res_deuterium', 0.5);

-- --------------------------------------------------------

--
-- Structure de la table `game_structures`
--

CREATE TABLE `game_structures` (
  `id_structure` int(11) NOT NULL,
  `structure_type` int(11) DEFAULT NULL,
  `name_label` varchar(50) NOT NULL,
  `name_description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `game_structures`
--

INSERT INTO `game_structures` (`id_structure`, `structure_type`, `name_label`, `name_description`) VALUES
(1, 1, 'buildings_mine_metal_name', 'buildings_mine_metal_description'),
(2, 1, 'buildings_mine_crystal_name', 'buildings_mine_crystal_description');

-- --------------------------------------------------------

--
-- Structure de la table `game_translations`
--

CREATE TABLE IF NOT EXISTS `game_translations` (
  `id_translation` int(11) NOT NULL AUTO_INCREMENT,
  `id_language` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id_translation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Contenu de la table `game_translations`
--

INSERT INTO `game_translations` (`id_translation`, `id_language`, `name`, `value`) VALUES
(1, 1, 'res_metal', 'Métal'),
(2, 1, 'res_crystal', 'Cristal'),
(3, 2, 'res_metal', 'Metal'),
(4, 2, 'res_crystal', 'Crystal'),
(5, 1, 'res_deuterium', 'Deutérium'),
(6, 2, 'res_deuterium', 'Deuterium'),
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
(80, 2, 'btn_register', 'Register'),
(81, 1, 'menu_development', 'Développement'),
(82, 2, 'menu_development', 'Development'),
(83, 1, 'menu_building', 'Bâtiments'),
(84, 2, 'menu_building', 'Buildings'),
(85, 1, 'menu_research', 'Recherches'),
(86, 2, 'menu_research', 'Research'),
(87, 1, 'menu_spaceship', 'Vaisseaux'),
(88, 2, 'menu_spaceship', 'Spaceship'),
(89, 1, 'menu_defense', 'Défenses'),
(90, 2, 'menu_defense', 'Defense'),
(91, 1, 'menu_navigation', 'Navigation'),
(92, 2, 'menu_navigation', 'Navigation'),
(93, 1, 'menu_planetview', 'Vue planétaire'),
(94, 2, 'menu_planetview', 'Overview'),
(95, 1, 'menu_universeview', 'Vue de l''univers'),
(96, 2, 'menu_universeview', 'Universe'),
(97, 1, 'menu_starport', 'Spatioport'),
(98, 2, 'menu_starport', 'Starport'),
(99, 1, 'menu_empireview', 'Vue de l''empire'),
(100, 2, 'menu_empireview', 'Empire'),
(101, 1, 'menu_productivity', 'Productivité'),
(102, 2, 'menu_productivity', 'Productivity'),
(103, 1, 'menu_techtree', 'Arbre technologique'),
(104, 2, 'menu_techtree', 'Tech tree'),
(105, 1, 'menu_statsress', 'Statistiques ressources'),
(106, 2, 'menu_statsress', 'Resource statistics'),
(107, 1, 'menu_ranking', 'Classement'),
(108, 2, 'menu_ranking', 'Ranking'),
(109, 1, 'menu_community', 'Communauté'),
(110, 2, 'menu_community', 'Community'),
(111, 1, 'menu_messages', 'Messagerie'),
(112, 2, 'menu_messages', 'Messages'),
(113, 1, 'menu_chat', 'Chat'),
(114, 2, 'menu_chat', 'Chat'),
(115, 1, 'menu_relationship', 'Relations'),
(116, 2, 'menu_relationship', 'Relationship'),
(117, 1, 'menu_contacts', 'Contacts'),
(118, 2, 'menu_contacts', 'Contacts'),
(119, 1, 'menu_tools', 'Autres outils'),
(120, 2, 'menu_tools', 'Other tools'),
(121, 1, 'menu_notes', 'Notes'),
(122, 2, 'menu_notes', 'Notes'),
(123, 1, 'menu_rules', 'Règles'),
(124, 2, 'menu_rules', 'Rules'),
(125, 1, 'menu_options', 'Options'),
(126, 2, 'menu_options', 'Options'),
(127, 1, 'menu_changelog', 'Changelog'),
(128, 2, 'menu_changelog', 'Chnagelog');

-- --------------------------------------------------------

--
-- Structure de la table `game_users`
--

CREATE TABLE IF NOT EXISTS `game_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_language` int(11) NOT NULL,
  `id_planet` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hash_password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `game_users`
--

INSERT INTO `game_users` (`id_user`, `id_language`, `id_planet`, `username`, `hash_password`, `email`) VALUES
(1, 1, 0, 'Kiwille', '$2a$10$NlW3CW6Z1PKCgAtUuqHXOeH965T064ImfVL6Fw4m8VtIj7v5cw5oW', 'test@test.fr'),
(2, 1, 0, 'Manda', '$2a$10$NlW3CW6Z1PKCgAtUuqHXOeH965T064ImfVL6Fw4m8VtIj7v5cw5oW', 'test2@test.fr'),
(3, 0, 0, 'demo', '$2a$10$ASkYBa9iDdzjpiMpdAqRv.Dt4QfIAyrSGYaaO1TfXSgGbC.fXCK4q', 'demo@demo.demo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
