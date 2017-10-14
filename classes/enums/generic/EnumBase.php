<?php

abstract class EnumBase {
    private static $cache = NULL;

    private function __construct() { }
    
    private static function getConstants() {
        if (self::$cache == NULL) {
            self::$cache = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$cache)) {
            $reflect = new ReflectionClass($calledClass);
            self::$cache[$calledClass] = $reflect->getConstants();
        }
        return self::$cache[$calledClass];
    }

    public static function isValidName($name, $strict = false) {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    public static function isValidValue($value, $strict = true) {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }
}
