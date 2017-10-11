<?php

ob_start();

$fullData = false;

$username = trim($_POST["identifiant"]);
$password = $_POST["motdepasse"];

if (isset($username) && respectsLengthWord($username, ">=", 3) &&
    isset($password) && respectsLengthWord($password, ">=", 3)) {
        $fullData = true;
}

//Toutes les informations sont complètes...
if ($fullData) {
    $user = UserService::getUserByLogins($username, $password);
    
    //Si les données sont exactes, on va alors tenter la redirection
    if (isset($user) && $user->id_user > 0) {
        $_SESSION = array();
        $_SESSION["id"] = $user->id_user;
        
        echo "<script>window.location = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
        exit;
    } else {        
        MessageSIWE::showAjaxMessage($lang['error_write_conn'], $lang['title_conn'] . $lang['title_game'], null, MessageSIWE::MESSAGE_ERROR);
    }
} else {
    MessageSIWE::showAjaxMessage($lang['error_champs_empty'], $lang['title_conn'] . $lang['title_game'], null, MessageSIWE::MESSAGE_ERROR);
}

ob_end_flush();
