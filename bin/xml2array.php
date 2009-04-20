<?php 
if(!defined("PHPALBUM_APP")){
		die("Direct access not permitted!");
}
/*(c)2007 Patrik Jakab*/
function pa_parse_attr($text){
	$pos=0;
	$ret=Array();
	while(true){
		if(preg_match("/^\s*(\w+)=\"([^\"]*)\"/",substr($text,$pos),$attr)){
				$ret[$attr[1]]=$attr[2];
				$pos+=strlen($attr[0]);
		}else{
			break;
		}
	}
	return $ret;
}
function pa_xml2array($xml){
	$array = Array();
	
	//clear the header
	$regexp="/<\?xml([^>])*>/";
	$xml=preg_replace($regexp,"",$xml);
	
	//delete comments
	$regexp="/<!--[^>]*-->/";
	$xml=preg_replace($regexp,"",$xml);
	$offset=0;
	$test=0;
	
	$stack[]=Array();
	$stck_pos=0;
	$tags[]=Array();
	while(true){

		if(preg_match("/^\s*<(\w+)\s*([^>]*)\s*\/>/i",substr($xml,$offset),$out)){
			$stck_pos++;
			$tags[$stck_pos]=$out[1];
			
			$stack[$stck_pos]=Array();
			$stack[$stck_pos]["attr"]=pa_parse_attr($out[2]);
			//ende
			$stack[$stck_pos-1][$tags[$stck_pos]][]=$stack[$stck_pos];
			$stck_pos--;
		}else if(preg_match("/^\s*<(\w+)\s*([^>]*)\s*>/i",substr($xml,$offset),$out)){
			$stck_pos++;
			$tags[$stck_pos]=$out[1];
			$stack[$stck_pos]=Array();
			$stack[$stck_pos]["attr"]=pa_parse_attr($out[2]);
						
		}
		else if(preg_match("/^\s*<\/(\w+)\s*>/i",substr($xml,$offset),$out)){
			$stack[$stck_pos-1][$tags[$stck_pos]][]=$stack[$stck_pos];
			$stck_pos--;
		}else if(preg_match("/^\s*([^<]+)\s*/i",substr($xml,$offset),$out)){
			$stack[$stck_pos]["#PCDATA"]=$out[1];
		}else{
			break;
		}
		$offset+=strlen($out[0]);
	}
	//TODO: error handling if not correctyl parsed.
	return $stack[0];
}
//$xml=file_get_contents("themes/Borders/theme.xml");
//var_dump(pa_xml2array($xml));

?>