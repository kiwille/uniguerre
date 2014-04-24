<?php

require_once dirname(__DIR__) . "/tools/includes.php";

$infos_complete = true;

//Validation de l'username
if (isset($_POST["identifiant"]) && wordLength_respected($_POST["identifiant"], SIGNE_SUP_EGAL, 3)) {
    //TODO: Vérifier que le pseudo n'est pas déjà utilisé...
    $identifiant = EncodeString($_POST["identifiant"]);
} else {
    $infos_complete = false;
}

//Validation du mot de passe.
if (isset($_POST["motdepasse"]) && wordLength_respected($_POST["motdepasse"], SIGNE_SUP_EGAL, 3)) {
    $motDePasse = EncodeString($_POST["motdepasse"]);
} else {
    $infos_complete = false;
}

//Toutes les informations sont complètes...
if ($infos_complete) {
    $id = UtilisateurDAL::verifierIdentiteConnexion($identifiant, md5($motDePasse));
    if ($id > 0) {
        $_SESSION["id"] = $id;
        
    }
    
} else {
    //TODO: afficher erreur...
    echo "pas assez d'infos";
    var_dump($_POST);
}



# fonctionne
$requete = $sql->query("SELECT * FROM {table1};", array("users"));
$requete->execute();
$test = $requete->fetchAll();

$requete2 = $sql->query("SELECT * FROM {table1} WHERE username=:username;", array("users"));
$param = $sql->parameter($requete2, ':username', 'x');
$param->execute();
$test2 = $requete2->fetch();
var_dump($test2);

/* faire :
 * si les donner son bonne alors on rerige avec une session vers la page overview
 * sinon il retourne à la case départ 
 */
die();
?>
