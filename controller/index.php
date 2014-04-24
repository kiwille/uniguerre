<?php

if (filesize("config.php") == 0) {
    //require_once "install.php";
    
    echo "config non rempli";
} else {
    require_once "login.php";
}
?>