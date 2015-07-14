<?php

(defined("EXEC") && (int)$_SESSION["id"] > 0) or die();

$users = UtilisateurDAO::selectAll();

$available_users = array();
$i = 0;
foreach ($users as $u) {
    if ($user->id_user != $u->id_user) {
        $available_users[$i]["id"] = $u->id_user;
        $available_users[$i]["value"] = $u->username;
        $i++;
    }
}

$parse['json_available_users'] = json_encode($available_users);

echo Page::construirePagePartielle('part_game_vuechat', $parse);
