<?php



/**
 * Description of RessoucesDao
 *
 * @author Alves
 */
class RessourceDAO {
   
     public static function selectRessources() {
         try {
			$SQLSelectRessources = new SQLSelectRessources();
            return $SQLSelectRessources->read();
         } catch (Exception $ex) {
             throw $ex;
         }
     }
     
}

?>
