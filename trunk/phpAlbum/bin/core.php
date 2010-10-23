<?php 
if(!defined("PHPALBUM_APP")){
	die("Direct access not permitted!");
}

//global variables.
$pa_setup=Array();
$pa_quality=Array();
$pa_theme=Array();
$pa_lang=Array();
$pa_color_map=Array();
$pa_colors=Array();
$pa_parameters=Array();
$act_dir_sorting="default";
/*   header buffering   */
$pa_errors=Array();


require("phptemplate/engine.php");
require("phpdatabase.php");
require("xml2array.php");
require("cache.php");
require("viewer.php");
require("interact.php");
require("fulltext.php");
require("photonotes.php");
require("utils.php");

function pa_initialize(){
	// changing umask due to security reasons.
	@umask(0077);
	// set time limit to unlimited if possible
	@set_time_limit(0);
	set_error_handler("pa_error_handler");
	return true;
}

function pa_start_database(){
	global $data_dir,$init_album_dir,$init_cache_dir,$init_ftp_server,$init_ftp_photos_dir;
	if(!is_dir($data_dir)){
		pa_put_error("Your data directory does not exists. <br/>Please check your config.php and correct the setting.");
		return false;
	}
	if(!pa_check_writable($data_dir)){
		pa_put_error("Your data directory is not writable for phpAlbum. <br/>Please change access rights so phpAlbum can create files in it.");
		return false;		
	}
	if(!db_startup_database("album",$data_dir)){
		if(!db_create_database("album",$data_dir)){
			pa_put_error("Unable to create Database, check if your data directory exists and is writable!");
		}
		require "install_db.php";
	}
	db_set_auto_commit(false);
	$pa_db_version=db_select_all("phpalbum_version");
	if(isset($pa_db_version[0]) && $pa_db_version[0]["version"]!=$phpalbum_version){
		require "upgrade_db.php";
	}
	return true;
}

function pa_get_parameters(){
	global $_GET,$_POST,$_COOKIE;

	global $pa_parameters;
	
	$allowed_parameters=Array("search","show","display","get","id","page","size");
	
	if (!get_magic_quotes_gpc()) {
		//doing magic quotes manually, some servers does not have this setting
		foreach($_GET as $key=>$value){
			$_GET[$key]=addslashes($value);
		}
		foreach($_POST as $key=>$value){
			$_POST[$key]=addslashes($value);
		}
		foreach($_COOKIE as $key=>$value){
			$_COOKIE[$key]=addslashes($value);
		}
	
	}
	
	foreach($_GET as $key=>$value){
		//only allowed parameters will be used.
		if(array_search($key,$allowed_parameters)){
			$pa_parameters[$key]=stripslashes($value);
		}
	}
}

function pa_execute_command(){
	global $pa_parameters,$pa_grants,$pa_setup;
	
	
	if(isset($pa_parameters["show"])){
		
		switch($pa_parameters["show"]) {
			case "album":
				pa_write_log();
	        	$cache_this_doc=generate_album();
	        	break;	
	        	pa_write_log();
			case "search":
	    		$cache_this_doc=generate_search($var1,$var3);
			case "image":
				pa_write_log();
				$cache_this_doc=generate_image_view();	
				break;
			case "setup":
				require("bin/setup.php");
		        generate_setup_page();
				break;
			case "errorpage":
			default:
				theme_generate_error_page();
				break;
		}
	}
	if(isset($pa_parameters["get"])){
		switch($pa_parameters["get"]){
			case "logo":
				theme_generate_logo();
				break;
			case "image":
				if(is_movie($var1) || is_audio($var1)){
					pa_write_log();
				}
	        	$cache_this_doc=generate_image();
				break;
			case "antispampic":
				header("Content-type: image/jpeg");
				pa_readfile($pa_setup["cache_dir"]."cp".$pa_parameters["id"].".jpg");
				@unlink($pa_setup["cache_dir"]."cp".$pa_parameters["id"].".jpg");
				break;
			case "theme":
				generate_theme();
				break;
			case "themeimage":
				if(!isset($pa_parameters["scale"])){$pa_parameters["scale"]=100;}//no scaling if not defined
				$cache_this_doc=theme_generate_theme_image($var1,$var2,$var3);
				break;
			default:
				theme_generate_error_page();
				break;
		}
	}
	if(isset($pa_parameters["put"])){
		switch($pa_parameters["put"]){
			case "photonotes":
				pa_apply_photonotes();
				break;
			default:
				theme_generate_error_page();
				break;
		}
			
	}
}

function pa_terminate_with_errors(){
	global $pa_errors;
	echo "<html><body><table width=\"100%\"><tr><td align=center><table style=\"background-color:#FFCCCC;border: 2px solid black;\">";
	foreach($pa_errors as $err){
		echo "<tr><td><b><h3>".$err."</h3></b></td></tr>";
	}
	echo "</table></td></tr></table></body></html>";
}
function pa_put_error($err){
	global $pa_errors;
	$pa_errors[]=$err;
}

function pa_check_writable($dir){
     $file=fopen($dir."writablity_test","w");
     fclose($file);
     return $file;
}

function pa_error_handler($errno, $errmsg, $filename, $linenum, $vars)
{
   global $data_dir,$pa_setup;
   // timestamp for the error entry
   if(isset($pa_setup['error_logging_enabled'])){
   	if($pa_setup['error_logging_enabled']=="true"){
   		$dt = date("y/m/d H:i:s");

	   // define an assoc array of error string
	   // in reality the only entries we should
	   // consider are E_WARNING, E_NOTICE, E_USER_ERROR,
	   // E_USER_WARNING and E_USER_NOTICE
	   $errortype = array (
	               E_ERROR          => "Error",
	               E_WARNING        => "Warning",
	               E_PARSE          => "Parsing Error",
	               E_NOTICE          => "Notice",
	               E_CORE_ERROR      => "Core Error",
	               E_CORE_WARNING    => "Core Warning",
	               E_COMPILE_ERROR  => "Compile Error",
	               E_COMPILE_WARNING => "Compile Warning",
	               E_USER_ERROR      => "User Error",
	               E_USER_WARNING    => "User Warning",
	               E_USER_NOTICE    => "User Notice"
	               );
	   // set of errors for which a var trace will be saved
	   //$user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);
	   if($errno==E_NOTICE){
	   	return;
	   }
	   if(defined("E_STRICT")){
		   if($errno==E_STRICT){
		   	return;
		   }
	   }
	   $err = "\$phpalbum_Errors[]= Array(\"datetime\" => \"$dt\",";
	   $err .= "\"errornum\" => \"$errno\",";
	   $err .= "\"errortype\" => \"".$errortype[$errno]."\",";
	   $err .= "\"errormsg\" => \"$errmsg\",";
	   $err .= "\"scriptname\" => \"$filename\",";
	   $err .= "\"scriptlinenum\" => \"$linenum\"";
	   $err .= ");";
	   if(file_exists($data_dir."error.log")){
		   if(filesize($data_dir."error.log")>1024*1024*2){
		   		unlink($data_dir."error.log");
		   }
	   }
	   if(substr($errmsg,0,6)!="unlink"){
		   //ignore unlink errors - not important as it can happen
		   $ff=fopen($data_dir."error.log","a");
		   fwrite($ff,"<?php  ".$err." ?>\n");
		   fclose($ff);
	   }
	}
 }
}

function pa_read_settings(){
	global $pa_setup,$pa_theme,$pa_color_map,$pa_lang,$pa_colors;
	global $pa_setup_texts,$mbstring;
	
	//load setup record
	$rec=db_select_all("setup");
	$pa_setup=$rec[0];
	
	//load theme
	$rec=db_select_all("theme","name=='".$pa_setup["site_theme"]."'");
	if(count($rec)==0){
		//used new theme, never used before
		echo "error #001<br>";
	}
	$pa_theme=$rec[0];
	
	//load colors
	$rec=db_select_all("color_map","id==".$pa_theme["color_map"]);
	$pa_color_map=$rec[0];
	$pa_colors=$pa_color_map["colors"];
	
	require_once("language.php");
	pa_load_language();
}


function pa_update_view_stats(){
	//TODO: pa_update_stats
}

function pa_check_username(){
	global $pa_user;

	if(isset($_POST["p_username"])){
		$username=$_POST["p_username"];
		$userpassword=md5($_POST["p_userpassword"]);
		$rec=db_select_all("user","name=='".$username."' && password=='".$userpassword."'");
		if(isset($rec[0])){
			$pa_user=$rec[0];
			$_SESSION["username"]=$username; // store looged in user.
			if(isset($_POST["p_storepassword"])){
				setcookie("userid",$pa_user["id"],time()+60*60*24*365*10);
				setcookie("userpassword",$userpassword,time()+60*60*24*365*10);
			}
		}else{
			return -1; //login failed
		}
	}else{
		if(isset($_SESSION["username"])){
			$rec=db_select_all("user","id=='".$userid."' && password=='".$userpassword."'");
			if(isset($rec[0])){
				$pa_user=$rec[0];
			}else{
				$pa_user=Array("name"=>"guest","groups"=>Array("guest"=>"1"));
			}
		}else{
			$pa_user=Array("name"=>"guest","groups"=>Array("guest"=>"1"));
		}
	}
}

function pa_check_access(){
	//TODO: check access
}

function pa_clean_up_and_scan_dir(){
	//TODO: make the interval configurable in setup	
	if($pa_setup["last_dir_scan"]<time()-24*60*60 && is_dir($pa_setup["album_dir"])){
		scan_photos_directories("");
		delete_old_ecards();
		delete_old_anitspam();
	}
}
function pa_write_debug($msg){
	global $pa_setup,$cmd,$var1,$passwd,$pa_user;
	$file_log=fopen($pa_setup["cache_dir"].$pa_setup["logs_filename"],"a");
	  	fwrite($file_log,date("D.M.j G:i:s")."|DEBUG|".$msg."|".$pa_user["name"]."|".$host."|\n");
	  	fclose($file_log);
}
function pa_write_log(){
global $pa_setup,$cmd,$var1,$passwd,$pa_user;
	if($pa_setup["logs_enabled"]=="true"){
	  $strings=explode(";",$pa_setup["logs_exclude"]);
	  $found="false";
	  $host=gethostbyaddr($_SERVER['REMOTE_ADDR']);
	  foreach($strings as $num=>$string){
	  	if(strlen($string)>0)
	  		if(strstr($host,$string))$found="true";
	  }
	  if($found=="false"){
	  	$file_log=fopen($pa_setup["cache_dir"].$pa_setup["logs_filename"],"a");
	  	fwrite($file_log,date("D.M.j G:i:s")."|".$cmd."|".$var1."|".$pa_user["name"]."|".$host."|\n");
	  	fclose($file_log);
	  }
	}
}


?>