<?php

// === PARAMETRES DE DEVELOPPEMENT
ini_set('display_errors', true);
ini_set('max_execution_time', 15);

// === PARAMETRES DE CHEMINS DU JEU
define("WOOTOOK_ROOT", dirname(__FILE__));
define("WOOTOOK_INSTALL", WOOTOOK_ROOT . "/install/");
define("WOOTOOK_ADMIN", WOOTOOK_ROOT . "/admin/");
define("WOOTOOK_CONTROLLER", WOOTOOK_ROOT . "/controller/");
define("WOOTOOK_MODEL", WOOTOOK_ROOT . "/model/");
define("WOOTOOK_VIEW", WOOTOOK_ROOT . "/view/");

// === PARAMETRES DU JEU
define("GAME_NUMBER_MAX_GALAXY", 9); 
define("GAME_NUMBER_MAX_SYSTEM", 499);
define("GAME_NUMBER_MAX_PLANET", 15);
define("GAME_DIAMETER_MAX_PLANET", 300);


?>
