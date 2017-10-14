<?php

class UserService {
    ///////////////////////////////////////
    // PUBLIC METHOD
    ///////////////////////////////////////
    /**
     * Vérifie que l'email ou le pseudo n'est pas déjà utilisé
     * 
     * @param type $username
     * @param type $email
     * @return boolean
     */
    public static function userExistByUsernameAndEmail($username, $email) {
        $us = UserDAO::selectAll();
        
        foreach ($us as $u) {
            if (strtolower($u->username) == strtolower($username) || 
                strtolower($u->email) == strtolower($email)) {
                return true;
            }
        }
        return false;
    }
    
    public static function getUserByLogins($username, $password) {
        $us = UserDAO::selectAll();
        
        foreach ($us as $u) {
            if (strtolower($u->username) == strtolower($username) && 
                    verifyPassword($password, $u->hash_password)) {
                return $u;
            }
        }
        
        return null;
    }
    
    ///////////////////////////////////////
    // PRiVATE METHOD
    ///////////////////////////////////////
}
