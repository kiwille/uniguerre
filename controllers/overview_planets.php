<?php

$planets = PlanetService::getPlanetsUser($user);

$planete="";
foreach ($planets as $pl) {
  
    $bloc["name"] = $pl->name;
    $bloc["id"] = $pl->id_planet;
     
    $planete .= Page::construirePagePartielle('part_game_barre_planetes', $bloc);
}

$parse['planets_game'] = $planete;

?>
