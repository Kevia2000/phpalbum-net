<?php 

if(!defined("PHPALBUM_APP")){
		die("Direct access not permitted!");
}

$pa_sent_header=Array();

function pa_is_cachable(){
	global $pa_setup,$cmd,$var1;
	switch ($cmd){
		case "logo": return false; break;
		case "themeimage": return false; break;
		case "image":
				if($pa_setup["cache_resized_photos"]=="true"){
		  			return true;
				}else{
		  			return false;
				}
				break;
		case "thmb":
				if($pa_setup["cache_thumbnails"]=="true"){
		  			return true;
				}else{
		  			return false;
				}
				break;
		default: return false; break;
	}
}

function pa_load_from_cache(){
	global $cmd,$var1,$var2,$var3;
	global $pa_setup;
	
	$cache_dir=$pa_setup["cache_dir"];
	
	$fn=pa_get_cache_file_name();
	if(!file_exists($fn)){
		return false; // file is not cached	
	}
	
	if($cmd == "thmb" || $cmd=="themeimage" || $cmd == "logo" || $cmd == "dir_logo" || $cmd == "image" ){
		//$headers=getallheaders();-- not supported by others then apache
		if (isset( $_SERVER["HTTP_IF_MODIFIED_SINCE"] ) ){
			if ( gmdate("D, d M Y H:i:s",filemtime($fn))." GMT" == $_SERVER["HTTP_IF_MODIFIED_SINCE"] ) {
				header('HTTP/1.0 304 Not Modified');
				exit; 
			}
		}
	}
	if(file_exists($fn.".hdr")){
		pa_resend_header($fn.".hdr");
	}
	pa_readfile($fn);
	return true;
}

function pa_get_cache_file_name(){
	global $pa_setup;
	global $cmd,$var1,$var2,$var3;
	$cache_dir=$pa_setup["cache_dir"];
	$filename=$cache_dir;
	$filename.=md5($cmd.":::".$var1.":::".$var2.":::".$var3.":::".$quality);
	$filename.=".cache";
	return $filename;
}
function pa_write_chache_and_flush(){
  pa_cache_document($cmd,$var1,$var2,$var3,$quality);
  while (ob_get_level() > 0) {
    ob_end_flush();
  }
}
function pa_cache_document(){
	global $pa_setup;
	$cache_dir=$pa_setup["cache_dir"];
	$doc=ob_get_contents();
	//echo ob_get_length();
	$filename=pa_get_cache_file_name();
	//echo $filename;
	$file=fopen($filename,"wb");
	fwrite($file,$doc);
	fclose($file);
	
	$m_time= filemtime($filename);
	pa_send_header("Last-Modified: ".gmdate("D, d M Y H:i:s",$m_time)." GMT" );
	
	if(pa_sent_header()){
		/*cache header*/
		pa_store_header($filename.".hdr");
	}
	
}
function pa_invalidate_object_cache($type){
	$rec=db_select_all("object_cache","type=='".$type."'");
	if(is_array($rec)){
		foreach($rec as $key=>$record){
			@unlink($record["file"]);
		}
	}
	db_delete("object_cache","type=='".$type."'");
}

function pa_get_cached_object ($type,$var1){
	global $pa_setup;
	$cache_dir=$pa_setup["cache_dir"];
	$filename=$cache_dir.$type.str_replace(" ","_",str_replace("/","_",$var1)).".obj";
	if(file_exists($filename)){
		$string=file_get_contents($filename);
		return unserialize($string);
	}else{
		return null;
	}
}
function pa_cache_object($type,$var1,$obj){
	global $pa_setup;
	$cache_dir=$pa_setup["cache_dir"];
	$filename=$cache_dir.$type.str_replace(" ","_",str_replace("/","_",$var1)).".obj";
	$str=serialize($obj);
	$f=fopen($filename,"w");
	fwrite($f,$str);
	fclose($f);
	db_insert("object_cache",Array("type"=>$type,"file"=>$filename));
}
function pa_send_header($text){
	global $pa_sent_header;
	header($text);
	$pa_sent_header[]=$text; /*store for later use*/
}
function pa_store_header($file_name){
	global $pa_sent_header;
	if(is_array($pa_sent_header)){
		$f=fopen($file_name,"w");
		foreach($pa_sent_header as $header){
				fwrite($f,$header."\n");
		}
		fclose($f);
	}
}
function pa_resend_header($file_name){
	$file=file($file_name);
	foreach($file as $line){
		header(substr($line,0,strlen($line)-1));
	}
}
function pa_sent_header(){
	global $pa_sent_header;
	if(sizeof($pa_sent_header)>0){
		return true;
	}else{
		return false;
	}
}

function delete_cache($cache_dir,$display=1){
   if ($dh = opendir($cache_dir)) {
       while (($file = readdir($dh)) !== false) {
           if($file != "." && $file!=".."){
	       unlink ( $cache_dir . $file);
           	if($display==1) echo "deleting : ".$cache_dir.$file."<br>";
           }
			
       }
       closedir($dh);
   }
} 

?>