<?php

require_once dirname(__FILE__) . '/SqlBase.php';

/**
 *
 * @author Alves
 */
abstract class SqlRead extends SqlBase {
    
    /**
     * @return array Obtient les éléments de retour
     */
    abstract protected function retours(PDOStatement $req);
    
    /**
     * Retourne le résultat de la requete
     * @return PDOStatement 
     */
    public function read() {
        try {
            $requete = $this->requeteSQL();
            $tables = $this->tables();
			if(!is_null($this->parametres()))
			{
				$parametres = $this->parametres()->getParametres();
			}
			else
			{
				$parametres= null;
			}
			
            
            $sql = new _SQL();

            $sql->connexion();
            $req = $sql->prepare($requete,$tables);
            
            if (!is_null($parametres) && is_array($parametres)) {
                foreach ($parametres as $champ => $valeur) {
                    $sql->parametre($req, $champ, $valeur);
                }
            }
            
            $sql->execute($req);
            
            $result = $this->retours($req);
            $sql->deconnexion();

            return $result;
        } catch (Exception $ex) {
            throw $ex;
        }
        
    }
    
}

?>
