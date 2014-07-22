<?php



/**
 * Description of UtilisateurDao
 *
 * @author Alves
 */
class UtilisateurDAO {
    
    public static function selectUtilisateurs() {
        try {
            return (new SQLSelectUtilisateurs)->read();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public static  function selectUtilisateurParId($id) {
        try {
            return (new SQLSelectUtilisateurParId($id))->read();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public static  function insertUtilisateur(\Utilisateur $utilisateur) {
        try {
            return (new SQLInsertUtilisateur($utilisateur))->write();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public static  function selectVerifierIdentiteConnexion($identifiant, $motdepasse) {
        try {
            return (new SQLSelectVerifierIdentiteConnexion($identifiant, $motdepasse))->read();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public static function selectCompterMemeNomUtilisateur($identifiant, $email) {
        try {
            return (new SQLSelectCompterMemeNomUtilisateur($identifiant, $email))->read();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
}

?>
