<?php

require_once dirname(__DIR__) . "/tools/includes.php";
require_once dirname(__DIR__) . "/json/langue.php";

$TabLangue = array();
$option = "";
$AlLanguages = LanguesDAO::selectLangue();
foreach($AlLanguages as $value=>$UnLanguage)
{
	$option .="<option value='".$UnLanguage['code']."'>".utf8_encode($UnLanguage['name'])."</option>";
}

$parse['option_langage'] = $option;
$parse['langimg'] = $langimg;
echo Page::construirePagePartielle('part_login_inscription', $parse);
?>
