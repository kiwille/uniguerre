<?php

class RessourceDAO {
   
     public static function selectRessources() {
         try {
            $SQLSelectRessources = new SQLSelectRessources();
            return $SQLSelectRessources->read();
         } catch (Exception $ex) {
             throw $ex;
         }
     }
     
     public static function selectRessourcesParLangue($id_language) {
         try {
            $SQLSelectRessources = new SQLSelectRessourcesParIdLangue($id_language);
            return $SQLSelectRessources->read();
         } catch (Exception $ex) {
             throw $ex;
         }
     }
}