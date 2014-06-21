<?php

require_once dirname(__FILE__) . "/tools/includes.php";
require_once dirname(__FILE__) . "/controller/message.php";

//echo guid();
message("message", "titre", "http://www.google.fr", MESSAGE_SUCCESS);

?>
