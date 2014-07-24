<?php

function access_denied() {
    return (empty($_SESSION) || !$_SESSION["id"]) ? true : false;
}

?>
