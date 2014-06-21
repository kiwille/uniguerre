-- ----------------------
-- dump de la base wootook au 17-Jun-2014
-- ----------------------


-- -----------------------------
-- creation de la table game_users
-- -----------------------------
CREATE TABLE `game_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- -----------------------------
-- insertions dans la table game_users
-- -----------------------------
INSERT INTO game_users(`id`, `username`, `password`, `email`) VALUES
