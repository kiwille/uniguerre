<?php

class PlaneteDAO extends DataAccessModel {
    
 
    public static function add($obj) {
        
    }

    public static function delete($id) {
        
    }

    public static function selectAll() {
        return (new SQLSelectPlanets())->read();
    }

    public static function selectById($id) {
        
    }

    public static function update($obj, $id) {
        
    }
    
    public static function selectMainPlanet($user) {
        //TODO
        
        $planets = PlaneteDAO::selectAll();
        
        $mainPlanet = array();
        foreach ($planets as $planet) {
            if ($planet->id_user == $user->id_user && $planet->is_main_planet) {
                $mainPlanet[]= $planet;
                break;
            }
        }
        return $mainPlanet;
    }
}
