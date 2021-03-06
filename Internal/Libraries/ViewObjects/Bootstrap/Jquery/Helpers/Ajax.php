<?php namespace ZN\ViewObjects\Bootstrap\Jquery\Helpers;

use ZN\ViewObjects\Bootstrap\JqueryTrait;
use CallController;

class Ajax extends CallController
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
    // Jquery Trait                                                                 
    //--------------------------------------------------------------------------------------------------------
    //
    // @methods
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    use JqueryTrait;
    
    //--------------------------------------------------------------------------------------------------------
    // Functions                                                              
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    protected $functions = [];
    
    //--------------------------------------------------------------------------------------------------------
    // Sets                                                              
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    protected $sets = [];
    
    //--------------------------------------------------------------------------------------------------------
    // Callbacks                                                              
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    protected $callbacks = [];

    //--------------------------------------------------------------------------------------------------------
    // URL                                                              
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function url(String $url = '') : Ajax
    {
        // Veri bir url içermiyorsa siteUrl yöntemi ile url'ye dönüştürülür.
        if( ! isUrl($url) )
        {
            $url = siteUrl($url);   
        }
        
        $this->sets['url'] = "\turl:\"$url\",".EOL;
        
        return $this;   
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Data                                                              
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function data(String $data) : Ajax
    {
        $this->sets['data'] = "\tdata:$data,".EOL;
        
        return $this;   
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Headers                                                              
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function headers(String $headers) : Ajax
    {
        $this->sets['headers'] = "\theaders:$headers,".EOL;
        
        return $this;   
    }
    
    //--------------------------------------------------------------------------------------------------------
    // If Modified                                                              
    //--------------------------------------------------------------------------------------------------------
    //
    // @param bool $ifModified
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function ifModified(String $ifModified) : Ajax
    {
        $ifModified = $this->_boolToStr($ifModified);
        
        $this->sets['ifModified'] = "\tifModified:$ifModified,".EOL;
        
        return $this;   
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Is Local                                                            
    //--------------------------------------------------------------------------------------------------------
    //
    // @param bool $isLocal
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function isLocal(String $isLocal) : Ajax
    {
        $isLocal = $this->_boolToStr($isLocal);
        
        $this->sets['isLocal'] = "\tisLocal:$isLocal,".EOL;
        
        return $this;   
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Mime Type                                                           
    //--------------------------------------------------------------------------------------------------------
    //
    // @param bool $isLocal
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function mimeType(String $mimeType) : Ajax
    {
        $mimeType = $this->_boolToStr($mimeType);
        $this->sets['mimeType'] = "\tmimeType:$mimeType,".EOL;
        
        return $this;   
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Jsonp                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param scalar $jsonp
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function jsonp(String $jsonp) : Ajax
    {
        if( is_numeric($jsonp) )
        {
            $jsonp = $this->_boolToStr($jsonp); 
        }
        elseif( is_string($jsonp) )
        {
            $jsonp = "\"$jsonp\"";
        }
        
        $this->sets['jsonp'] = "\tjsonp:$jsonp,".EOL;
        
        return $this;   
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Jsonp Callback                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param scalar $jsonpCallback
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function jsonpCallback(String $jsonpCallback) : Ajax
    {
        if( $this->_isFunc($jsonpCallback) === false )
        {
            $jsonpCallback = "\"$jsonpCallback\"";
        }
        
        $this->sets['jsonpCallback'] = "\tjsonpCallback:$jsonpCallback,".EOL;
        
        return $this;   
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Data Type                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $type
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function dataType(String $type) : Ajax
    {   
        $this->sets['type'] = "\tdataType:\"$type\",".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Password                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $password
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function password(String $password) : Ajax
    {
        $this->sets['password'] = "\tpassword:\"$password\",".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Username                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function username(String $username) : Ajax
    {
        $this->sets['username'] = "\tusername:\"$username\",".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Method                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $method
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function method(String $method = 'post') : Ajax
    {
        $this->sets['method'] = "\tmethod:\"$method\",".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Type                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $method
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function type(String $method = 'post') : Ajax
    {
        $this->method($method);
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Script Charset                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $sr
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function scriptCharset(String $scriptCharset = 'utf-8') : Ajax
    {
        $this->sets['scriptCharset'] = "\tscriptCharset:\"$scriptCharset\",".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Traditional                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param scalar $tratidional
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function traditional(String $traditional) : Ajax
    {
        $traditional = $this->_boolToStr($traditional);
        $this->sets['traditional'] = "\ttraditional:$traditional,".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Process Data                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param scalar $processData
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function processData(String $processData) : Ajax
    {
        $processData = $this->_boolToStr($processData);
        $this->sets['processData'] = "\tprocessData:$processData,".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Cache                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param scalar $cache
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function cache(String $cache) : Ajax
    {
        $cache = $this->_boolToStr($cache);
        $this->sets['cache'] = "\tcache:$cache,".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // XHR Fields                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $xhrFields
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function xhrFields(String $xhrFields) : Ajax
    {
        $this->sets['xhrFields'] = "\txhrFields:$xhrFields,".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Context                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $context
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function context(String $context) : Ajax
    {
        $this->sets['context'] = "\tcontext:$context,".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Accepts                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $accepts
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function accepts(String $accepts) : Ajax
    {
        $this->sets['accepts'] = "\taccepts:$accepts,".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Contents                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $contents
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function contents(String $contents) : Ajax
    {
        $this->sets['contents'] = "\tcontents:$contents,".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Async                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param scalar $async
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function async(String $async) : Ajax
    {
        $async = $this->_boolToStr($async);
        $this->sets['async'] = "\tasync:$async,".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Cross Domain                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param scalar $crossDomain
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function crossDomain(String $crossDomain) : Ajax
    {
        $crossDomain = $this->_boolToStr($crossDomain);
        $this->sets['crossDomain'] = "\tcrossDomain:$crossDomain,".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Timeout                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int $timeout
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function timeout(Int $timeout) : Ajax
    {
        $this->sets['timeout'] = "\ttimeout:$timeout,".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Globals                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param scalar $globals
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function globals(String $globals) : Ajax
    {
        $globals = $this->_boolToStr($globals);
        $this->sets['globals'] = "\tglobal:$globals,".EOL;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Content Type                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param scalar $contentType
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function contentType(String $contentType = 'application/x-www-form-urlencoded; charset=UTF-8') : Ajax
    {
        if( is_numeric($contentType) )
        {
            $contentType = $this->_boolToStr($contentType);     
        }
        elseif( is_string($contentType) )
        {
            $contentType = "\"$contentType\"";
        }
        
        $this->sets['contentType'] = "\tcontentType:$contentType,".EOL;
        
        return $this;
    }
    
    
    
    //--------------------------------------------------------------------------------------------------------
    // Status Code                                                         
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $codes
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function statusCode(Array $codes) : Ajax
    {
        $this->_object('statusCode', $codes);
            
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Converters                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $codes
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function converters(Array $codes) : Ajax
    {
        $this->_object('converters', $codes);
            
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Success                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params
    // @param string $success
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function success(String $params, String $success) : Ajax
    {
        $this->_functions('success', $params, $success);    
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Success                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params
    // @param string $error
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function error(String $params, String $error) : Ajax
    {
        $this->_functions('error', $params, $error);    
    
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Complete                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params
    // @param string $complete
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function complete(String $params, String $complete) : Ajax
    {
        $this->_functions('complete', $params, $complete);
        
        return $this;   
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Before Send                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params
    // @param string $beforeSend
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function beforeSend(String $params, String $beforeSend) : Ajax
    {
        $this->_functions('beforeSend', $params, $beforeSend);
        
        return $this;
    }   
    
    //--------------------------------------------------------------------------------------------------------
    // Data Filter                                                          
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params
    // @param string $dataFilter
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function dataFilter(String $params, String $dataFilter) : Ajax
    {
        $this->_functions('dataFilter', $params, $dataFilter);
        
        return $this;
    }   
    
    //--------------------------------------------------------------------------------------------------------
    // Done                                                        
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params
    // @param string $done
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function done(String $params = 'e', String $done = NULL) : Ajax
    {
        $this->_callbacks('done', $params, $done);
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Fail                                                         
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params
    // @param string $fail
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function fail(String $params = 'e', String $fail = NULL) : Ajax
    {
        $this->_callbacks('fail', $params, $fail);
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Always                                                         
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params
    // @param string $always
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function always(String $params = 'e', String $always = NULL) : Ajax
    {
        $this->_callbacks('always', $params, $always);
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Then                                                         
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params
    // @param string $then
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function then(String $params = 'e', String $then = NULL) : Ajax
    {
        $this->_callbacks('then', $params, $then);
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Send                                                         
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    // @param string $data
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function send(String $url = '', String $data = NULL) : String
    {
        if( ! empty($url) )
        {
            $this->url($url);   
        }
        
        if( ! empty($data) )
        {
            $this->data($data); 
        }
        
        if( ! isset($this->sets['method']) )
        {
            $this->method('post');
        } 
        
        $eol  = EOL;
        $ajax = '';
        
        if( ! empty($this->sets) ) foreach( $this->sets as $val )
        {
            $ajax .= $val;
        }
        
        if( ! empty($this->functions) ) foreach( $this->functions as $val )
        {
            $ajax .= "\t$val,";
        }
        
        $ajax = rtrim(trim($ajax), ',');
        
        $callbacks = '';
        
        if( ! empty($this->callbacks) )
        {
            foreach( $this->callbacks as $val )
            {
                $callbacks .= $val; 
            }
            
            $callbacks .= ";".$eol;
        }
        else
        {
            $callbacks = ";".$eol;
        }
        
        $ajax = $this->_tag($eol."$.ajax".$eol."({".$eol."$ajax".$eol."})$callbacks");
        
        $this->_defaultVariable();
        
        return $ajax;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Create                                                         
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params
    // @param string $dataFilter
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function create(String $url = '', String $data = NULL) : String
    {
        return $this->send($url, $data);    
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected                                                          
    //--------------------------------------------------------------------------------------------------------
    protected function _object($name, $codes = [])
    {
        $eol = EOL; 
        
        $statusCode = $eol."\t$name:".$eol."\t{";
        
        if( ! empty($codes) )
        {
            foreach( $codes as $code => $value )
            {
                $param = '';
                if(strstr($value, '->'))
                {
                    $params = explode('->', $value);    
                    $param = $params[0];
                    $value = $params[1];
                }
                
                $statusCode .= $eol."\t\t$code:function($param)".$eol."\t\t{".$eol."\t\t\t$value".$eol."\t\t},".$eol;
            }
            
            $statusCode = trim(trim($statusCode), ',').$eol;
        }
        
        $statusCode .= "\t}";
        
        $this->functions[$name] = $eol."\t".$statusCode;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected                                                          
    //--------------------------------------------------------------------------------------------------------
    protected function _functions($name, $params, $codes)
    {
        $eol = EOL;
        
        $this->functions[$name] = $eol."\t$name:function($params)".$eol."\t{".$eol."\t\t$codes".$eol."\t}";
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected                                                          
    //--------------------------------------------------------------------------------------------------------
    protected function _callbacks($name, $params, $codes)
    {
        if( ! ( is_string($params) || is_string($codes) ) )
        {
            return $this;
        }
        
        $eol = EOL;
        
        $this->callbacks[$name] = $eol.".$name(function($params)".$eol."{".$eol."\t$codes".$eol."})";
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected                                                          
    //--------------------------------------------------------------------------------------------------------
    protected function _defaultVariable()
    {
        $this->functions = [];
        $this->sets      = [];
        $this->callbacks = [];
    }
}