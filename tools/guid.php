<?php

/**
 * Génère et renvoie un guid unique.
 * 
 * @return string un guid unique
 */
function guid() {
    return md5(microtime().rand());
}


?>
