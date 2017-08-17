<?php

// === PARAMETRES DE DEVELOPPEMENT
ini_set('display_errors', true);
ini_set('max_execution_time', 15);

// === PARAMETRES DE SERVEUR
define("DATETIME_ZONE", "Europe/Paris");
ini_set('date.timezone', DATETIME_ZONE);

// ----------------------------------------------------------------------------
/*
 * Les valeurs ci-dessous ne doivent pas être modifiées. Elles sont nécessaires
 * pour le bon fonctionnement du jeu.
 */
// === PARAMETRES DE URL
$url = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/" . $_SERVER['REQUEST_URI'];
define("UNIGUERRE_WEB_URL", $url);

// === PARAMETRES DU JEU
// == Dossiers
define("NAME_DIRECTORY_INSTALL", "install");
define("NAME_DIRECTORY_ADMIN", "install");
define("NAME_DIRECTORY_TOOLS", "tools");
define("NAME_DIRECTORY_CONTROLLERS", "controllers");
define("NAME_DIRECTORY_CLASSES", "classes");
define("NAME_DIRECTORY_SERVICES", "services");
define("NAME_DIRECTORY_THEMES", "themes");
define("NAME_DIRECTORY_DAL", "dal");

// == Architecture du jeu
define("UNIGUERRE_DIR_ROOT", dirname(__DIR__));
define("UNIGUERRE_DIR_INSTALL", UNIGUERRE_DIR_ROOT . DIRECTORY_SEPARATOR . NAME_DIRECTORY_INSTALL . DIRECTORY_SEPARATOR);
define("UNIGUERRE_DIR_ADMIN", UNIGUERRE_DIR_ROOT . DIRECTORY_SEPARATOR . NAME_DIRECTORY_ADMIN . DIRECTORY_SEPARATOR);
define("UNIGUERRE_DIR_TOOLS", UNIGUERRE_DIR_ROOT . DIRECTORY_SEPARATOR . NAME_DIRECTORY_TOOLS . DIRECTORY_SEPARATOR);
define("UNIGUERRE_DIR_CONTROLLERS", UNIGUERRE_DIR_ROOT . DIRECTORY_SEPARATOR . NAME_DIRECTORY_CONTROLLERS . DIRECTORY_SEPARATOR);
define("UNIGUERRE_DIR_MODELS", UNIGUERRE_DIR_ROOT . DIRECTORY_SEPARATOR . NAME_DIRECTORY_CLASSES . DIRECTORY_SEPARATOR);
define("UNIGUERRE_DIR_SERVICES", UNIGUERRE_DIR_ROOT . DIRECTORY_SEPARATOR . NAME_DIRECTORY_SERVICES . DIRECTORY_SEPARATOR);
define("UNIGUERRE_DIR_THEMES", UNIGUERRE_DIR_ROOT . DIRECTORY_SEPARATOR . NAME_DIRECTORY_THEMES . DIRECTORY_SEPARATOR);
define("UNIGUERRE_DIR_DAL", UNIGUERRE_DIR_ROOT . DIRECTORY_SEPARATOR . NAME_DIRECTORY_DAL . DIRECTORY_SEPARATOR);

// == Configuration de la connexion à la base de données
define("UNIGUERRE_FILE_CONFIG", "config.php");

// == Constantes par défaut du jeu
define("UNIGUERRE_NAME", "Uniguerre");
define("UNIGUERRE_LANG", "FR");
define("UNIGUERRE_THEME", "default");

?>