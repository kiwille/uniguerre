<?php

class UtilisateurDAO {
    
    /**
     * Retourne la liste des joueurs du jeu
     * 
     * @return Utilisateur
     * @throws Exception
     */
    public static function selectUtilisateurs() {
        try {
            $SQLSelectUtilisateurs = new SQLSelectUtilisateurs();
            return $SQLSelectUtilisateurs->read();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Retourne un joueur à partir de son id
     * 
     * @param Integer $id
     * @return Utilisateur
     * @throws Exception
     */
    public static function selectUtilisateurParId($id) {
        try {
            $SQLSelectUtilisateurParId = new SQLSelectUtilisateurParId($id);
            return $SQLSelectUtilisateurParId->read();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Insère un utilisateur
     * 
     * @param \Utilisateur $utilisateur Données utilisateur
     * @return type
     * @throws Exception
     */
    public static function insertUtilisateur(\Utilisateur $utilisateur) {
        try {
            $SQLInsertUtilisateur = new SQLInsertUtilisateur($utilisateur);
            return $SQLInsertUtilisateur->write();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Permet de vérifier que les données de connexion (identifiant et mot de  
     * passe) sont correctes.
     * 
     * @param type $identifiant Pseudo du joueur dans le jeu 
     * @param type $motdepasse Mot de passe du joueur dans le jeu 
     * @return type
     * @throws Exception
     */
    public static function selectVerifierIdentiteConnexion($identifiant, $motdepasse) {
        try {
            $SQLSelectVerifierIdentiteConnexion = new SQLSelectVerifierIdentiteConnexion($identifiant, $motdepasse);
            return $SQLSelectVerifierIdentiteConnexion->read();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Permet de vérifier que l'une des données (pseudo ou email) n'a pas été 
     * déjà utilisé
     * 
     * @param type $identifiant Pseudo du joueur dans le jeu 
     * @param type $email Email du joueur dans le jeu 
     * @return type
     * @throws Exception
     */
    public static function selectCompterMemeNomUtilisateur($identifiant, $email) {
        try {
            $SQLSelectCompterMemeNomUtilisateur = new SQLSelectCompterMemeNomUtilisateur($identifiant, $email);
            return $SQLSelectCompterMemeNomUtilisateur->read();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}