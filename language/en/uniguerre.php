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
	$lang['username'] = "login";
	$lang['password'] = "password";
	$lang['return'] = "return";
	$lang['return_mail'] = " ,you will receive by email a reminder of your username and password.";
	$lang['error_champs_empty'] = "Please enter the fields!";
	
	// navbar
	$lang['menu'] = "menu";
	$lang['home'] = "Home";
	$lang['connect'] = "Sign in";
	$lang['register'] = "register";
	$lang['credit'] = "Crédits";
	$lang['board'] = "board";
	
	// login home
	$lang['title_login'] = "Welcome On ";
	$lang['title_dec_1'] = "is a strategy game online free, playable browser.
             Conquer the universe expanding your empire.
             Establish yourself and dominate fighting other players.";
	$lang['title_dec_2'] = "Join us now!";
	
	// Inscription home
	$lang['title_sign'] = "registration on ";
	$lang['sign_email'] = "e-mail";
	$lang['sign_name_pla'] = "Planet name";
	$lang['sign_name_lang'] = "language";
	$lang['sign_valide'] = "registration";
	$lang['sign_reset'] = "reset";
	$lang['sign_finish'] = "registration is complete , ";
	$lang['error_isset_user'] = "watch out, is nickname or email are already registered!";
	
	
	// connexion home
	$lang['title_conn'] = "Log on";
	$lang['btn_connect'] = "Login";
	$lang['welcome'] = "Welcome";
	$lang['error_write_conn'] = "Username or password incorrect";
	
	// credit home
	$lang['credit_link'] ="Links";
	$lang['credit_fnd'] = "founder";
	$lang['credit_dev'] = "Developers";
	$lang['credit_des'] = "Designer";
?>