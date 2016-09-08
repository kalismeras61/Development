<?php namespace ZN\Requirements;

use stdClass;

interface DebugInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Telif Hakkı: Copyright (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Current
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  void
    // @return stdClass
    //
    //--------------------------------------------------------------------------------------------------------
    public function current() : stdClass;

    //--------------------------------------------------------------------------------------------------------
    // Internal
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  void
    // @return stdClass
    //
    //--------------------------------------------------------------------------------------------------------
    public function next() : stdClass;

    //--------------------------------------------------------------------------------------------------------
    // Current
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  mixed $type = 'array', Options: array, string and numeric value
    // @return mixed
    //
    //--------------------------------------------------------------------------------------------------------
    public function output($type = 'array');
}