<?php namespace ZN\Services\Response;

use Config, Arrays, Method, CLController;
use ZN\Services\Response\HTTP\Exception\InvalidArgumentException;

class InternalHTTP extends CLController implements InternalHTTPInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    const config = 'Services:http';

    //--------------------------------------------------------------------------------------------------------
    // Settings
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $settings;

    //--------------------------------------------------------------------------------------------------------
    // Types
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $types =
    [
        'post',
        'get',
        'env',
        'server',
        'request'
    ];

    //--------------------------------------------------------------------------------------------------------
    // Is Ajax
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function isAjax() : Bool
    {
        if( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest' )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Is Curl
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function isCurl() : Bool
    {
        return ! empty($_SERVER['HTTP_COOKIE'])
               ? false
               : true;
    }

    //--------------------------------------------------------------------------------------------------------
    // Browser Lang
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $default tr
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function browserLang(String $default = 'en') : String
    {
        $languages = Config::get('Language', 'shortCodes');

        $lang = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));

        if( isset($languages[$lang]) )
        {
            return strtolower($lang);
        }

        return $default;
    }

    //--------------------------------------------------------------------------------------------------------
    // Code
    //--------------------------------------------------------------------------------------------------------
    //
    // @param numeric $code
    //
    //--------------------------------------------------------------------------------------------------------
    public function code(Int $code = 200) : String
    {
        $messages = Arrays::multikey(SERVICES_HTTP_CONFIG['messages']);

        if( isset($messages[$code]) )
        {
            return $messages[$code];
        }

        return false;
    }

    //--------------------------------------------------------------------------------------------------------
    // Message
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $message
    //
    //--------------------------------------------------------------------------------------------------------
    public function message(String $message) : String
    {
        return $this->code($message);
    }

    //--------------------------------------------------------------------------------------------------------
    // Name
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    //
    //--------------------------------------------------------------------------------------------------------
    public function name(String $name) : InternalHTTP
    {
        $this->settings['name'] = $name;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Value
    //--------------------------------------------------------------------------------------------------------
    //
    // @param mixed $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function value($value) : InternalHTTP
    {
        $this->settings['value'] = $value;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Input
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $input
    //
    //--------------------------------------------------------------------------------------------------------
    public function input(String $input) : InternalHTTP
    {
        if( in_array($input, $this->types) )
        {
            $this->settings['input'] = $input;
        }
        else
        {
            throw new InvalidArgumentException('Error', 'invalidInput', $input.' : get, post, server, env, request');
        }

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Select
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    //
    //--------------------------------------------------------------------------------------------------------
    public function select(String $name)
    {
        $name  = $this->settings['name']  ?? $name;
        $input = $this->settings['input'] ?? false;

        $this->settings = [];

        switch( $input )
        {
            case 'post'    : return Method::post($name);    break;
            case 'get'     : return Method::get($name);     break;
            case 'env'     : return Method::env($name);     break;
            case 'server'  : return Method::server($name);  break;
            case 'request' : return Method::request($name); break;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Insert
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function insert(String $name, $value) : Bool
    {
        $name  = $this->settings['name']  ?? $name;
        $input = $this->settings['input'] ?? false;
        $value = $this->settings['value'] ?? $value;

        $this->settings = [];

        switch( $input )
        {
            case 'post'    : return Method::post($name, $value);    break;
            case 'get'     : return Method::get($name, $value);     break;
            case 'env'     : return Method::env($name, $value);     break;
            case 'server'  : return Method::server($name, $value);  break;
            case 'request' : return Method::request($name, $value); break;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Delete
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    //
    //--------------------------------------------------------------------------------------------------------
    public function delete(String $name) : Bool
    {
        $name  = $this->settings['name']  ?? $name;
        $input = $this->settings['input'] ?? false;

        $this->settings = [];

        switch( $input )
        {
            case 'post'    : unset($_POST[$name]);    break;
            case 'get'     : unset($_GET[$name]);     break;
            case 'env'     : unset($_ENV[$name]);     break;
            case 'server'  : unset($_SERVER[$name]);  break;
            case 'request' : unset($_REQUEST[$name]); break;
        }

        return true;
    }
}
