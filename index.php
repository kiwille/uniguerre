<?php

if (filesize("config.php") > 0) {
    require_once "common.php";
} else {
    require_once "install/";
}