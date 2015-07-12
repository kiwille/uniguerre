<?php

$fullData       = false;
$username       = trim($_POST["identifiant"]);
$password       = trim($_POST["motdepasse"]);
$email          = trim($_POST["email"]);
$nameMainPlanet = trim($_POST["PM"]);
$id_language    = (int)$_POST['Lang'];

if (isset($username) && respectsLengthWord($username, ">=", 3) &&
    isset($password) && respectsLengthWord($password, ">=", 3) && 
    isset($email) && respectsLengthWord($email, ">=", 3) && 
    isset($nameMainPlanet) && respectsLengthWord($nameMainPlanet, ">=", 3) && 
    isset($id_language)
   ) {
        $fullData = true;
}

//Toutes les informations sont complètes...
if ($fullData) {
    if (!UtilisateurDAO::userExistByUsernameAndEmail($username, $email)) {
        //Création planète
        $p = new Planet();
        $p->assignValueDefault();
        //Création utilisateur
        $u = new User();
        $u->id_language = $id_language;
        $u->username = $username;
        $u->hash_password = encodePassword($password);
        $u->email = $email;
        UtilisateurDAO::add($u);

        $message = $lang['sign_finish'] . "" . $username . "" . $lang['return_mail'];
        MessageSIWE::showAjaxMessage($message, $lang['title_sign'] . $lang['title_game'], null, MessageSIWE::MESSAGE_SUCCESS);
    } else {
        MessageSIWE::showAjaxMessage($lang['error_isset_user'], $lang['title_sign'], null, MessageSIWE::MESSAGE_ERROR);
    }
} else {
    MessageSIWE::showAjaxMessage($lang['error_champs_empty'], $lang['title_sign'] . $lang['title_game'], null, MessageSIWE::MESSAGE_ERROR);
}
?>
