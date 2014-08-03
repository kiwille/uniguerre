<?php

/**
 * Description of RessoucesDao
 *
 * @author Alves
 */
class TranslationDAO {
     
     public static function SQLSelectTranslationParCode($code) {
         try {
            $SQLSelectTranslationParCode = new SQLSelectTranslationParCode($code);
            return $SQLSelectTranslationParCode->read();
         } catch (Exception $ex) {
             throw $ex;
         }
     }
}

?>
