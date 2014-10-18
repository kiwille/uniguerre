<?php

function getUrl($url, $titre = "") {
    if (strlen(trim($titre)) == 0) $titre = $url;
    
    return "<a href='{$url}'>{$titre}</a>";
}

?>
