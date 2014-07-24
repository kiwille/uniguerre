<?php

// === PARAMETRES DE DEVELOPPEMENT
ini_set('display_errors', true);
ini_set('max_execution_time', 15);
ini_set('date.timezone','Europe/Paris'); # fuseau horaire de paris

// === PARAMETRES DE URL
$RequestUrl = substr($_SERVER['REQUEST_URI'], 0);
$fragment = explode ("/",$RequestUrl);
$var = count($fragment);
unset($fragment[0]);
unset($fragment[intval($var - 1)]);
$baseUrl = implode("/",$fragment);

if($_SERVER['HTTP_HOST'] == "127.0.0.1" || $_SERVER['HTTP_HOST'] == "localhost"){
	$url = "http://".$_SERVER['HTTP_HOST'] ."/".$baseUrl."";
}else{
	$url = "http://www.".$_SERVER['HTTP_HOST'] ."/".$baseUrl."/";
}

define("WOOTOOK_WEB_URL", $url);
define("WOOTOOK_NAME","wootook"); # peux etre changer

// === PARAMETRES DE CHEMINS DU JEU
define("WOOTOOK_DIR_ROOT", dirname(__DIR__));
define("WOOTOOK_DIR_INSTALL", WOOTOOK_DIR_ROOT . "/install/");
define("WOOTOOK_DIR_ADMIN", WOOTOOK_DIR_ROOT . "/admin/");
define("WOOTOOK_DIR_TOOLS", WOOTOOK_DIR_ROOT . "/tools/");
define("WOOTOOK_DIR_CONTROLLER", WOOTOOK_DIR_ROOT . "/controller/");
define("WOOTOOK_DIR_MODEL", WOOTOOK_DIR_ROOT . "/model/");
define("WOOTOOK_DIR_VIEW", WOOTOOK_DIR_ROOT . "/view/");
define("WOOTOOK_DIR_DAL", WOOTOOK_DIR_ROOT . "/dal/");

// ==== PARAMETRES DES FICHIERS DE JEU
define("WOOTOOK_FILE_CONFIG", "config.php");


?>
