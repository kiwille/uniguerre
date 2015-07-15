<?php

class PlaneteImageDAO extends DataAccessModel {
    
 
    public static function add($obj) {
        
    }

    public static function delete($id) {
        
    }

    public static function selectAll() {
        return (new SQLSelectPlanetsImages())->read();
    }

    public static function selectById($id) {
        //TODO
        $planetImages = PlaneteImageDAO::selectAll();
        
        foreach ($planetImages as $pi) {
            if ($pi->id_planet_image == $id) {
                return $pi;
            }
        }
        
        return null;
    }

    public static function update($obj, $id) {
        
    }
}
