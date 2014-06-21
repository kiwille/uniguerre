<?php

function message($message, $titre, $retour) {
    $parse['navbar_login'] = Page::construirePagePartielle('part_navbar_login', $parse);
    $parse['clock_login'] = Page::construirePagePartielle('part_clock', $parse);
    
    $parse['message'] = $message;
    $parse['titre'] = $titre;
    $parse['retour'] = $retour;
    
    Page::construirePageFinale('part_body_erreur', $parse);
    die();
}

?>
