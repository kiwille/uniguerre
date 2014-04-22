<?php
	require_once dirname(__DIR__) . "/tools/includes.php";
	require_once dirname(__DIR__) . "/". WOOTOOK_FILE_COMMON;
	
	# fonctionne
	$requete = $sql->query("SELECT * FROM {table1};",array("users"));
	$requete->execute();
	$test = $requete->fetchAll();
	
	$requete2 = $sql->query("SELECT * FROM {table1} WHERE username=:username;",array("users"));
	$param = $sql->parameter($requete2,':username','x');
	$param->execute();
	$test2 = $requete2->fetch();
	var_dump($test2);
	
	/* faire :
	 * si les donner son bonne alors on rerige avec une session vers la page overview
	 * sinon il retourne à la case départ 
	 */
die();
?>
