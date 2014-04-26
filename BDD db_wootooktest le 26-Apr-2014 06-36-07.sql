-- ----------------------
-- dump de la base db_wootooktest au 26-Apr-2014
-- ----------------------


-- -----------------------------
-- creation de la table users
-- -----------------------------
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



-- -----------------------------
-- insertions dans la table users
-- -----------------------------
INSERT INTO users(`id`, `username`, `password`, `email`) VALUES(`1`, `manda`, `ahah`, `mandalorien.wootook@gmail.com`),(`2`, `mandalorien`, `$2a$10$HaNAIyflAlIjG5bbhGQ/pe.lY8JrQp3DU8EAJbI332u5wD8scP3Ua`, `mandalorien.wootook@gmail.com`);
