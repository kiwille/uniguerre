<?php

if (filesize("config.php") > 0) {
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR ."common.php";
} else {
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR ."/install/";
}