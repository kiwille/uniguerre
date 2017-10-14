<?php

abstract class DataAccessModel {

    public static function selectAll() {        
        throw new RuntimeException("Unimplemented method: ".__FUNCTION__ );
    }
    
    public static function selectById($id) {    
        throw new RuntimeException("Unimplemented method: ".__FUNCTION__ );
    }
    
    public static function add($obj) {          
        throw new RuntimeException("Unimplemented method: ".__FUNCTION__ );
    }
    
    public static function update($obj, $id) {  
        throw new RuntimeException("Unimplemented method: ".__FUNCTION__ );
    }
    
    public static function delete($id) {        
        throw new RuntimeException("Unimplemented method: ".__FUNCTION__ );
    }
    
    public static function refresh() {
        self::$_instance = null;
        self::get();
    }
    
}
