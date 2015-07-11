<?php

require_once "tools/includes.php";

if (filesize("config.php") > 0) {
    require_once NAME_DIRECTORY_CONTROLLERS."/common.php";
} else {
    require_once "install/";
}