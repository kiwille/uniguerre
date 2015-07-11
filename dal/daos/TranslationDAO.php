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
    
    public static function translate($id_lang, $name) {
        $translations = TranslationDAO::selectAll();
        
        foreach ($translations as $t) {
            if ($t->id_language == $id_lang && $t->name == $name) {
                return $t;
            }
        }
        
        return null;
    }
}