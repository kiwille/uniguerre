<?php

abstract class DataAccessModel {
    
    //In PHP 5.3, cannot implemented abstract static method.
    /*public abstract static function selectAll();
    public abstract static function selectById($id);
    public abstract static function add($obj);
    public abstract static function update($obj, $id);
    public abstract static function delete($id);*/
    
    //In PHP 5.3
    public static function selectAll() {        throw new RuntimeException("Unimplemented method: ".__FUNCTION__ ); }
    public static function selectById($id) {    throw new RuntimeException("Unimplemented method: ".__FUNCTION__ ); }
    public static function add($obj) {          throw new RuntimeException("Unimplemented method: ".__FUNCTION__ ); }
    public static function update($obj, $id) {  throw new RuntimeException("Unimplemented method: ".__FUNCTION__ ); }
    public static function delete($id) {        throw new RuntimeException("Unimplemented method: ".__FUNCTION__ ); }
    
    public static function refresh() {
        self::$_instance = null;
        self::get();
    }
    
}
