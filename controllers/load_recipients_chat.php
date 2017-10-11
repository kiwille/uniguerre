<?php

$users = UserDAO::selectAll();

$available_users = array();
foreach ($users as $i => $user) {
    $available_users[$i]["id"] = $user->id_user;
    $available_users[$i]["value"] = $user->username;
}

echo json_encode($available_users);
die;