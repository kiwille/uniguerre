<?php

$message = trim($_POST["message"]);
$is_connected = $_POST["is_connected"];
$id_user = (int)$_SESSION['id'];


$chat = new Chat();
$chat->time_msg = (new DateTime("now", new DateTimeZone(DATETIME_ZONE)))->getTimestamp();

if (strlen($message) > 0) {
    if ($is_connected) {
        $chat->id_recipients = 0;
        $chat->id_sender = $id_user;
        $chat->msg = $message;
    }else{
        $chat->id_recipients = $id_user;
        $chat->id_sender = 0;
        $chat->msg = utf8_decode("Vous n'êtes pas connecté au chat.");
    }
}else{
    $chat->id_recipients = $id_user;
    $chat->id_sender = 0;
    $chat->msg = utf8_decode("Aucun message saisi.");
}

//send into chat
ChatDAO::add($chat);