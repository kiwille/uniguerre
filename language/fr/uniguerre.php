<?php

/*
 * TODO A faire:
 * 
 * Je viens de me rendre compte avec les noms de ressources d'un problème.
 * 
 * J'ai fait une table dans la BDD. On ira mettre tout le code dans la table "translation".
 * Ce choix a été fait en raison de la flexibilité du jeu,
 * car l'admin pourra par exemple choisir le texte à afficher à certains endroits.
 * Sur ce fait, la traduction se fera plus tard via une page qu'aura accès l'administrateur.
 * A voir si on ne met pas en place la liste de traduction par partie, comme par exemple des mots
 * qui appartiennent spécifiquement à la vue générale, d'autres à la vue galactique, etc.
 * 
 * L'utilisateur aura le choix à son inscription de sa langue, ainsi que de la modifier via ses options.
 * 
 * La BDD peut être récupéré dans AUTRES > wootook.sql
 */

	// general
	$lang['title_game'] = WOOTOOK_NAME;
	$lang['username'] = "Identifiant";
	$lang['password'] = "Mot de passe";
	$lang['return'] = "retour";
	$lang['return_mail'] = "vous allez recevoir par mail un rappel de votre pseudo et mot de passe.";
	$lang['error_champs_empty'] = "Veuillez saisir les champs!";
	
	// navbar
	$lang['menu'] = "menu";
	$lang['home'] = "Accueil";
	$lang['connect'] = "Se connecter";
	$lang['register'] = "S'inscrire";
	$lang['credit'] = "Crédits";
	$lang['board'] = "Forum";
	
	// login home
	$lang['title_login'] = "Bienvenue sur ". WOOTOOK_NAME ."";
	$lang['title_dec_1'] = "". WOOTOOK_NAME ." est un jeu de stratégie en ligne gratuit, jouable par navigateur. 
            Partez à la conquête de l'univers en développant votre empire. 
            Imposez-vous et dominez en combattant les autres joueurs. ";
	$lang['title_dec_2'] = "Rejoingnez-nous!";
	
	// Inscription home
	$lang['title_sign'] = "Inscription sur ". WOOTOOK_NAME ."";
	$lang['sign_email'] = "Email";
	$lang['sign_name_pla'] = "Nom de planète";
	$lang['sign_valide'] = "Inscription";
	$lang['sign_reset'] = "Réinitialiser";
	$lang['sign_finish'] = "Inscription terminée %s , %s";
	$lang['error_isset_user'] = "Attention ,se pseudo ou cette email sont déja enregistré(e)s!";
	
	
	// connexion home
	$lang['title_conn'] = "Connexion sur ". WOOTOOK_NAME ."";
	$lang['btn_connect'] = "Connexion";
	$lang['welcome'] = "Bienvenue %s";
	$lang['error_write_conn'] = "Pseudo ou mot de passe incorrect";
	
	// credit home
	$lang['credit_link'] = "Liens";
	$lang['credit_fnd'] = "Fondateur";
	$lang['credit_dev'] = "Développeurs";
	$lang['credit_des'] = "Designer";
	
	//GAME
	$lang['ressources1'] = "métal";
	$lang['ressources2'] = "crystal";
	$lang['ressources3'] = "deuterium";
?>