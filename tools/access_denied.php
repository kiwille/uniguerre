<?php

function access_denied() {
    if (session_status() != PHP_SESSION_ACTIVE)
        session_start();
    
    return (empty($_SESSION) || !$_SESSION["id"]) ? true : false;
}

?>
