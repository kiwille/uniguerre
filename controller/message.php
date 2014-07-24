<?php

include_once WOOTOOK_DIR_TOOLS . "/includes.php";

const MESSAGE_SUCCESS = "panel-success";
const MESSAGE_INFORMATION = "panel-info";
const MESSAGE_WARNING = "panel-warning";
const MESSAGE_ERROR = "panel-danger";

function message($message, $titre, $lien = null, $type_message = MESSAGE_ERROR) {
    global $lang;
        
    $parse = $lang;
        
    $parse['message'] = $message;
    $parse['titre'] = $titre;
    $parse['type_message'] = $type_message;
    $parse['lien'] = iif($lien, getAsUrl($lien,$lang['return']), "");
    
    $parse['navbar_login'] = Page::construirePagePartielle('part_navbar_login', $parse);
    $parse['clock_login'] = Page::construirePagePartielle('part_clock', $parse);
    $parse['body_login'] = Page::construirePagePartielle('part_erreur', $parse);

    Page::construirePageFinale('part_body_login', $parse);
    
    die();
}

?>
