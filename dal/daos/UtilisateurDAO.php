<?php

class UtilisateurDAO extends DataAccessModel {
    
    public static function add($obj) {
        
    }

    public static function delete($id) {
        
    }

    public static function selectAll() {
        return (new SQLSelectUsers())->read();
    }

    public static function selectById($id) {
        //TODO 
        $us = self::selectAll();
        foreach ($us as $u) {
            if ($u->id_user == $id) {
                return $u;
            }
        }
        return null;
    }

    public static function update($obj, $id) {
        
    }
    
    public static function userExistByUsernameAndEmail($username, $email) {
        //TODO 
        $us = self::selectAll();
        foreach ($us as $u) {
            if (strtolower($u->username) == strtolower($username) || 
                strtolower($u->email) == strtolower($email)
               ) {
                return true;
            }
        }
        return false;
    }
    
    public static function getUserByLogins($username, $password) {
        $us = self::selectAll();
        
        foreach ($us as $u) {
            if (strtolower($u->username) == strtolower($username) && 
                    verifyPassword($password, $u->hash_password)) {
                return $u;
            }
        }
        
        return null;
    }
}