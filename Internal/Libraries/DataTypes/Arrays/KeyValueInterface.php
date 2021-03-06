<?php namespace ZN\DataTypes\Arrays;

interface KeyValueInterface
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
    // Keyval
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array  $array
    // @param string $keyval: val/value, key, vals/values, keys
    //
    //--------------------------------------------------------------------------------------------------------
    public function use(Array $array, String $keyval = 'value');

    //--------------------------------------------------------------------------------------------------------
    // Value
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array  $array
    //
    //--------------------------------------------------------------------------------------------------------
    public function value(Array $array);

    //--------------------------------------------------------------------------------------------------------
    // Key
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array  $array
    //
    //--------------------------------------------------------------------------------------------------------
    public function key(Array $array);

    //--------------------------------------------------------------------------------------------------------
    // Values
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array  $array
    //
    //--------------------------------------------------------------------------------------------------------
    public function values(Array $array) : Array;

    //--------------------------------------------------------------------------------------------------------
    // Keys
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array  $array
    //
    //--------------------------------------------------------------------------------------------------------
    public function keys(Array $array) : Array;
}
