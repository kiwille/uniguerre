<?php

class TranslationDAO {
     
     /**
      * Récupère la traduction par code de langue
      * 
      * @param type $code code de la langue (ex: FR)
      * @return type
      * @throws Exception
      */
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
