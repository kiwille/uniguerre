<?php

class TranslationDAO extends DataAccessModel {
    
 
    public static function add($obj) {
        
    }

    public static function delete($id) {
        
    }

    public static function selectAll() {
        return (new SQLSelectTranslations())->read();
    }

    public static function selectById($id) {
        
    }

    public static function update($obj, $id) {
        
    }
    
}