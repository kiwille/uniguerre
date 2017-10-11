<?php

class LanguageDAO extends DataAccessModel {
    
 
    public static function add($obj) {
        
    }

    public static function delete($id) {
        
    }

    public static function selectAll() {
        return (new SQLSelectLanguages())->read();
    }

    public static function selectById($id) {
        //TODO
        $ls = self::selectAll();
        foreach ($ls as $l) {
            if ($l->id_language == $id) {
                return $l;
            }
        }
        return null;
    }

    public static function update($obj, $id) {
        
    }
}
