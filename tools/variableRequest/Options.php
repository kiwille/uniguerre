<?php

class Options {
    
    public static function addRange($min_value, $max_value) {
        return array(
            'min_range'    => $min_value,
            'min_range'    => $max_value
        );
    }
    
    public static function addRegExp($regExp) {
        return array(
            'regexp'        => $regExp
        );
    }
    
    public static function addDecimal($decimal) {
        return array(
          'decimal'         => $decimal  
        );
    }
    
}
