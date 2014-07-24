<?php



/**
 * Description of UtilisateurDao
 *
 * @author Alves
 */
class UtilisateurDAO {
    
    public static function selectUtilisateurs() {
        try{
			$SQLSelectUtilisateurs = new SQLSelectUtilisateurs();
            return $SQLSelectUtilisateurs->read();
        } catch (Exception $exc) {
            throw $exc->getTraceAsString();
        }
    }
    
    public static  function selectUtilisateurParId($id) {
        try {
			$SQLSelectUtilisateurParId = new SQLSelectUtilisateurParId($id);
            return $SQLSelectUtilisateurParId->read();
        } catch (Exception $exc) {
            throw $exc->getTraceAsString();
        }
    }
    
    public static  function insertUtilisateur(\Utilisateur $utilisateur) {
        try {
			$SQLInsertUtilisateur = new SQLInsertUtilisateur($utilisateur);
            return $SQLInsertUtilisateur->write();
        } catch (Exception $exc) {
            throw $exc->getTraceAsString();
        }
    }
    
    public static  function selectVerifierIdentiteConnexion($identifiant, $motdepasse) {
        try {
			$SQLSelectVerifierIdentiteConnexion = new SQLSelectVerifierIdentiteConnexion($identifiant, $motdepasse);
            return $SQLSelectVerifierIdentiteConnexion->read();
        } catch (Exception $exc) {
            throw $exc->getTraceAsString();
        }
    }
    
    public static function selectCompterMemeNomUtilisateur($identifiant, $email) {
        try {
			$SQLSelectCompterMemeNomUtilisateur = new SQLSelectCompterMemeNomUtilisateur($identifiant, $email);
            return $SQLSelectCompterMemeNomUtilisateur->read();
        } catch (Exception $exc) {
            throw $exc->getTraceAsString();
        }
    }
    
}

?>
