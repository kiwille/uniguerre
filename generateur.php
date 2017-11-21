<?php
if (filesize("config.php") > 0) {
	require_once "config.php";
	require_once "tools/constant.php";
	require_once UNIGUERRE_DIR_TOOLS . '/DALFramework/_SQL.php';
	require_once UNIGUERRE_DIR_MODELS . '/core/Page.php';
    require_once UNIGUERRE_DIR_MODELS . '/core/class.model.php';
} else {
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR ."/install/";
}

$PDO  = new _SQL();

// exemple d'utilisation
if($PDO->connexion() !== false){
	$GENERATE = new Classes($PDO->connexion());
	
	# avec 1 table en particulier
	// $GENERATE->set_Table('users');
	// $GENERATE->write_class(DATABASE);
	
	# avec la liste de toute les tables
	$GENERATE->list_tables(DATABASE);
	foreach($GENERATE->get_ListTables() as $Tables){
		var_dump($Tables);
		// $GENERATE->set_Table($Tables);
		// $GENERATE->write_class(DATABASE);
	}
}