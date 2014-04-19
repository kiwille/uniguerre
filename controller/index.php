<?php

if (filesize("config.php") == 0) {
    echo "config non rempli";
} else {
    require_once "login.php";
}
?>