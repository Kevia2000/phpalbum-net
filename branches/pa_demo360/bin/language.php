<?php 
/*checking for security reasons*/
if(!defined("PHPALBUM_APP")){
		die("Direct access not permitted!");
}

if(function_exists("mb_get_info")){
	$mbstring=true;
}else{
	$mbstring=false;
}
$mbstring=false;
function p($id,$par=null){
	global $actual_language;
	/* function prints text for ide $id and actual language, if not found then EN*/
	if($par === null){
		print pa_get_text($id);
	}else{
		printf ( pa_get_text($id),$par);
	}
	
}
function t($id,$par=null,$par2=null){
	if($par===null){
		return pa_get_text($id);
	}else if($par2==null){
		return sprintf(pa_get_text($id),$par);
	}else{
		return sprintf(pa_get_text($id),$par,$par2);
	}
}
function pa_get_text($id){
	global $pa_texts,$pa_translated_texts,$pa_modules_texts;
	if(isset($pa_translated_texts[$id])){
		 return $pa_translated_texts[$id];
	}else if(isset($pa_texts[$id])){
		   return $pa_texts[$id];
	}else if(isset($pa_modules_texts[$id])){
		   return $pa_modules_texts[$id];
	}else{
	  	return "#N/A:$id#";
	}
}
function pa_load_language($cmd){
	// depending on cmd can be decided if the whole language will be loaded
	// or only that for frontend, or none of these
	global $pa_lang,$pa_texts,$pa_module_texts,$data_dir,$pa_setup,$pa_translated_texts;
	if(isset($pa_lang["include_file"])){
		return; // it can be done only once	
	}
		if($cmd="phpinfo" || $cmd=="album" || $cmd=="search" || $cmd=="imageview" || $cmd=="setup" || $cmd=="setquality" || $cmd=="ecardview"){
			if(!isset($_POST['p_language'])){
				$rec=db_select_all("languages","name=='".$pa_setup["language"]."'");
			}else{
				$rec=db_select_all("languages","name=='".$_POST['p_language']."'");
			}
			$pa_lang=$rec[0];
			require_once("lang/".$pa_lang["include_file"]);
			$pa_texts=pa_get_frontend_lang();
			if($cmd=="setup"){
				$pa_texts=array_merge($pa_texts,pa_get_backend_lang());			
			}
			if(file_exists($data_dir.$pa_lang["translate_file"])){
				require($data_dir.$pa_lang["translate_file"]);
			}
			
		}
		//else no language will be loaded
}
function conv_in($string){
	global $pa_setup,$mbstring,$pa_lang;
	if($mbstring){
		return mb_convert_encoding($string,$pa_lang["character_set"]);
	}else{
		return $string;
	}
}
function conv_out_header ($string){
	global $pa_setup,$mbstring,$pa_lang;
	if($mbstring){
		return mb_encode_mimeheader($string,$pa_lang["character_set"]);
	}else{
		return $string;
	}
}
function conv_out($string){
	global $pa_setup,$mbstring,$pa_lang;
	if($mbstring && $pa_setup["filesystem_charset"]!=$pa_lang["character_set"]){
		return mb_convert_encoding($string,$pa_lang["character_set"],$pa_setup["filesystem_charset"]);
	}else{
		return $string;
	}
	
}
