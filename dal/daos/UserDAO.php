<?php

class UserDAO extends DataAccessModel {
    
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
    
}