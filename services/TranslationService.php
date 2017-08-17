<?php

class TranslationService {
    
    private static $_cacheTranslation = null;
    
    ///////////////////////////////////////
    // PUBLIC METHOD
    ///////////////////////////////////////
    
    public static function translate($id_lang, $name) {
        $translations = TranslationService::getTranslations();
        
        foreach ($translations as $translation) {
            if ($translation->id_language == $id_lang && $translation->name == $name) {
                return $translation;
            }
        }
        
        return null;
    }
    
    ///////////////////////////////////////
    // PRiVATE METHOD
    ///////////////////////////////////////
    
    private static function getTranslations() {
        if (self::$_cacheTranslation == null) {
            self::$_cacheTranslation = TranslationDAO::selectAll();
        }
        
        return self::$_cacheTranslation;
    }
    
}

