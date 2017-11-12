<?php

class FilterValidate {
    
    // Common filter
    const FILTER_VALIDATE_INT = FILTER_VALIDATE_INT;
    const FILTER_VALIDATE_BOOLEAN = FILTER_VALIDATE_BOOLEAN;
    const FILTER_VALIDATE_FLOAT = FILTER_VALIDATE_FLOAT;
    const FILTER_VALIDATE_STRING = FILTER_DEFAULT;
    
    // Special filter
    const FILTER_VALIDATE_REGEXP = FILTER_VALIDATE_REGEXP;
    const FILTER_VALIDATE_URL = FILTER_VALIDATE_URL;
    const FILTER_VALIDATE_EMAIL = FILTER_VALIDATE_EMAIL;
    const FILTER_VALIDATE_IP = FILTER_VALIDATE_IP;
    const FILTER_VALIDATE_MAC = FILTER_VALIDATE_MAC;
    
    public static function values() {
        return array(
            self::FILTER_VALIDATE_INT,
            self::FILTER_VALIDATE_BOOLEAN,
            self::FILTER_VALIDATE_FLOAT,
            self::FILTER_VALIDATE_STRING,
            self::FILTER_VALIDATE_REGEXP,
            self::FILTER_VALIDATE_URL,
            self::FILTER_VALIDATE_EMAIL,
            self::FILTER_VALIDATE_IP,
            self::FILTER_VALIDATE_MAC
        );
    }
}
