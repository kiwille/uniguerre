<?php

class Input {
   
    const INPUT_GET = INPUT_GET;
    const INPUT_POST = INPUT_POST;
    const INPUT_COOKIE = INPUT_COOKIE;
    const INPUT_SERVER = INPUT_SERVER;
    const INPUT_ENV = INPUT_ENV;
    const INPUT_SESSION = INPUT_SESSION; //Not implemented in PHP
    const INPUT_REQUEST = INPUT_REQUEST; //Not implemented in PHP
    
    public static function values() {
        return array(
            self::INPUT_GET,
            self::INPUT_POST,
            self::INPUT_COOKIE,
            self::INPUT_SERVER,
            self::INPUT_ENV,
            self::INPUT_SESSION,
            self::INPUT_REQUEST
        );
    }
}
