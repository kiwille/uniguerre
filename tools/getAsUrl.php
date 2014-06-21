<?php

function getAsUrl($url, $titre) {
    if (strlen(trim($titre)) == 0) {
        $titre = $url;
    }
    
    return "<a href='{$url}'>{$titre}</a>";
}

?>
