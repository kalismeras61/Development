<?php namespace ZN\DataTypes\Json;

use Json;

class ErrorInfo implements ErrorInfoInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Message
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public static function message() : String
    {
        return json_last_error_msg();
    }

    //--------------------------------------------------------------------------------------------------------
    // No
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public static function no() : Int
    {
        return json_last_error();
    }

    //--------------------------------------------------------------------------------------------------------
    // Check
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public static function check(String $data) : Bool
    {
        return ( is_array(json_decode($data, true)) && self::no() === 0 )
               ? true
               : false;
    }
}
