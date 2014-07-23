<?php



/**
 * Description of RessoucesDao
 *
 * @author Alves
 */
class RessourceDAO {
   
     public static function selectRessources() {
         try {
             return (new SQLSelectRessources())->read();
         } catch (Exception $ex) {
             throw $ex;
         }
     }
     
}

?>
