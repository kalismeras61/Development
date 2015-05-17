﻿<?php
/************************************************************/
/*                    COMPONENT  SCRIPT                   	*/
/************************************************************/
/*

Author: Ozan UYKUN
Site: http://www.zntr.net
Copyright 2012-2015 zntr.net - Tüm hakları saklıdır.

*/
class ComponentJqueryScript
{
	protected $ready    = true;
	protected $type 	= 'text/javascript';
	
	public function type($type = 'text/javascript')
	{
		if( ! is_string($type))
		{
			return $this;	
		}
		
		$this->type = $type;
		
		return $this;
	}
	
	public function ready($type = true)
	{
		if( ! is_bool($type))
		{
			return $this;	
		}
		
		$this->ready = $type;
		
		return $this;
	}
	
	public function library()
	{
		$arguments = array_unique(func_get_args());
		import::script($arguments);
		
		return $this;
	}
	
	public function open()
	{		
		$script = "";
		$script .= import::script('Jquery', true);
		$script .= "<script type=\"$this->type\">\n";
		
		if($this->ready)
		{
			$script .= "$(document).ready(function()\n{\n";
		}
		return $script;
	}
	
	public function close()
	{	
		$script = "";
		if($this->ready)
		{
			$this->ready = true;
			$script .= "\n".'});'."\n";
		}
		$script .=  '</script>'."\n";
		return $script;
	}	
}