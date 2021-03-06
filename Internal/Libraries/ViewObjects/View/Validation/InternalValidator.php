<?php namespace ZN\ViewObjects\View;

use CallController;

class InternalValidator extends CallController implements InternalValidatorInterface
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
    // Phone
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    // @param string $pattern = NULL
    //
    //--------------------------------------------------------------------------------------------------------
    public function phone(String $data, String $pattern = NULL) : Bool
    {
        if( $pattern !== NULL)
        {
            $phoneData = preg_replace('/([^\*])/', 'key:$1', $pattern);
            $phoneData = '/'.str_replace(['*', 'key:'], ['[0-9]', '\\'], $phoneData).'/';
        }
        else
        {
            $phoneData = '/\+*[0-9]{10,14}$/';
        }

        return ! preg_match($phoneData, $data)
               ? false
               : true;
    }

    //--------------------------------------------------------------------------------------------------------
    // Numeric
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function numeric($data) : Bool
    {
        return ! is_numeric($data)
               ? false
               : true;
    }

    //--------------------------------------------------------------------------------------------------------
    // Alnum
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function alnum(String $data) : Bool
    {
        return ! preg_match('/^\w+$/', $data)
               ? false
               : true;
    }

    //--------------------------------------------------------------------------------------------------------
    // Alpha
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function alpha(String $data) : Bool
    {
        return ! ctype_alpha($data)
               ? false
               : true;
    }

    //--------------------------------------------------------------------------------------------------------
    // Identity
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $no
    //
    //--------------------------------------------------------------------------------------------------------
    public function identity($no) : Bool
    {
        if( ! is_numeric($no) || strlen($no) !== 11  )
        {
            return false;
        }

        $no = (string) $no;

        $numone     = ($no[0] + $no[2] + $no[4] + $no[6]  + $no[8]) * 7;
        $numtwo     = $no[1] + $no[3] + $no[5] + $no[7];
        $result     = $numone - $numtwo;
        $tenth      = $result % 10;
        $total      = ($no[0] + $no[1] + $no[2] + $no[3] + $no[4] + $no[5] + $no[6] + $no[7] + $no[8] + $no[9]);
        $elewenth   = $total % 10;

        if( $no[0] == 0 )
        {
            return false;
        }
        elseif( $no[9] != $tenth )
        {
            return false;
        }
        elseif( $no[10] != $elewenth )
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Email
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $no
    //
    //--------------------------------------------------------------------------------------------------------
    public function email(String $data) : Bool
    {
        return ! isEmail($data)
               ? false
               : true;
    }

    //--------------------------------------------------------------------------------------------------------
    // URL
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function url(String $data) : Bool
    {
        return ! isUrl($data)
               ? false
               : true;
    }

    //--------------------------------------------------------------------------------------------------------
    // Special Char
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function specialChar(String $data) : Bool
    {
        return ! preg_match('/[\W]+/', $data)
               ? false
               : true;
    }

    //--------------------------------------------------------------------------------------------------------
    // Maxchar
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    // @param int    $char
    //
    //--------------------------------------------------------------------------------------------------------
    public function maxchar(String $data, Int $char) : Bool
    {
        return ( strlen($data) <= $char )
               ? true
               : false;
    }

    //--------------------------------------------------------------------------------------------------------
    // Minchar
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    // @param int    $char
    //
    //--------------------------------------------------------------------------------------------------------
    public function minchar(String $data, Int $char) : Bool
    {
        return ( strlen($data) >= $char )
               ? true
               : false;
    }
}
