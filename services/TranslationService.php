<?php

class TranslationService {
    
    private static $_cacheTranslation = null;
    
    ///////////////////////////////////////
    // PUBLIC METHOD
    ///////////////////////////////////////
    
    public static function translate($id_lang, $name) {
        $translations_language = TranslationService::getTranslationsByLanguage($id_lang);
        
        foreach ($translations_language as $translation_lang) {
            if ($translation_lang->name == $name) {
                return $translation_lang;
            }
        }
        
        return null;
    }
    
    public static function getTranslationsByLanguage($id_lang) {
        $translations = TranslationService::getTranslations();
        
        $translations_language = null;
        foreach ($translations as $translation) {
            if ($translation->id_language == $id_lang) {
                $translations_language[] = $translation;
            }
        }
        
        return $translations_language;
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

